<?php
session_start();

class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /php-mvc-auth/login');
            exit;
        }
        
        include 'views/dashboard/index.php';
    }

    public function my_static_page() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /php-mvc-auth/login');
        exit;
    }
        include 'views/dashboard/my_static_page.php';
    }

    public function static_page() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /php-mvc-auth/login');
        exit;
    }
        include 'views/dashboard/static_page.php';
    }

    public function quiz() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /php-mvc-auth/login');
        exit;
    }
        include 'views/dashboard/quiz.php';
    }
    
    public function personal_intro_page() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /php-mvc-auth/login');
        exit;
    }
        include 'views/dashboard/personal_intro_page.php';
    }

    public function ctrlearn() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /php-mvc-auth/login');
        exit;
    }
        include 'views/dashboard/ctrlearn.php';
    }

     public function my_static_page_rev01() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /php-mvc-auth/login');
        exit;
    }
        include 'views/dashboard/my_static_page_rev01.php';
    }

     public function thunkable_creatives() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /php-mvc-auth/login');
        exit;
    }
        include 'views/dashboard/thunkable_creatives.php';
    }

}
?>