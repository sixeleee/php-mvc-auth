<?php
session_start();
require_once 'models/User.php';
require_once 'config/google_config.php';

class AuthController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function showRegister() {
        include 'views/auth/register.php';
    }

    public function showLogin() {
        include 'views/auth/login.php';
    }

    public function register() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            if (empty($username)) {
                $errors[] = "Username is required";
            } elseif ($this->user->usernameExists($username)) {
                $errors[] = "Username already exists";
            }

            if (empty($email)) {
                $errors[] = "Email is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            } elseif ($this->user->emailExists($email)) {
                $errors[] = "Email already registered";
            }

            if (empty($password)) {
                $errors[] = "Password is required";
            } elseif (strlen($password) < 6) {
                $errors[] = "Password must be at least 6 characters";
            }

            if ($password !== $confirm_password) {
                $errors[] = "Passwords do not match";
            }

            if (empty($errors)) {
                if ($this->user->register($username, $email, $password)) {
                    $_SESSION['success'] = "Registration successful! Please login.";
                    header('Location: /php-mvc-auth/login');
                    exit;
                } else {
                    $errors[] = "Registration failed. Please try again.";
                }
            }
        }

        include 'views/auth/register.php';
    }

    public function login() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email)) {
                $errors[] = "Email is required";
            }

            if (empty($password)) {
                $errors[] = "Password is required";
            }

            if (empty($errors)) {
                $user = $this->user->login($email, $password);
                
                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    
                    header('Location: /php-mvc-auth/dashboard');
                    exit;
                } else {
                    $errors[] = "Invalid email or password";
                }
            }
        }

        include 'views/auth/login.php';
    }

    public function googleLogin() {
        $googleOAuth = getGoogleOAuth();
        $auth_url = $googleOAuth->getAuthUrl();
        header('Location: ' . $auth_url);
        exit;
    }

    public function googleCallback() {
        $googleOAuth = getGoogleOAuth();
        
        if (isset($_GET['code'])) {
            $token_data = $googleOAuth->getAccessToken($_GET['code']);
            
            if ($token_data && isset($token_data['access_token'])) {
                $user_info = $googleOAuth->getUserInfo($token_data['access_token']);
                
                if ($user_info) {
                    $google_id = $user_info['id'];
                    $email = $user_info['email'];
                    $name = $user_info['name'] ?? '';
                    
                    // Check if user exists by Google ID
                    $user = $this->user->findByGoogleId($google_id);
                    
                    if (!$user) {
                        // Check if user exists by email
                        $user = $this->user->findByEmail($email);
                        
                        if (!$user) {
                            // Create new user
                            $username = $name ?: explode('@', $email)[0];
                            $username = preg_replace('/[^a-zA-Z0-9_]/', '', $username);
                            $counter = 1;
                            $original_username = $username;
                            
                            while ($this->user->usernameExists($username)) {
                                $username = $original_username . $counter;
                                $counter++;
                            }
                            
                            if ($this->user->register($username, $email, null, $google_id)) {
                                $user = $this->user->findByGoogleId($google_id);
                            } else {
                                header('Location: /php-mvc-auth/login?error=registration_failed');
                                exit;
                            }
                        } else {
                            $this->user->updateGoogleId($user['id'], $google_id);
                        }
                    }
                    
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    
                    header('Location: /php-mvc-auth/dashboard');
                    exit;
                }
            }
        }
        
        header('Location: /php-mvc-auth/login?error=google_auth_failed');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: /php-mvc-auth/login');
        exit;
    }
}
?>