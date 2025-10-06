<?php
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$path = str_replace('/php-mvc-auth', '', $path);

switch ($path) {
    case '/':
    case '/login':
        require_once 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
        
    case '/register':
        require_once 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->register();
        break;
        
    case '/auth/google':
        require_once 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->googleLogin();
        break;
        
    case '/auth/google-callback':
        require_once 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->googleCallback();
        break;
        
    case '/logout':
        require_once 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;
        
    case '/dashboard':
        require_once 'controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;

    case '/dashboard/my_static_page':
        require_once 'controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->my_static_page();
        break;

    case '/dashboard/static_page':
        require_once 'controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->static_page();
        break;

    case '/dashboard/quiz':
        require_once 'controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->quiz();
        break;

    case '/dashboard/personal_intro_page':
        require_once 'controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->personal_intro_page();
        break;
    
    case '/dashboard/ctrlearn':
        require_once 'controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->ctrlearn();
        break;
           
    case '/dashboard/my_static_page_rev01':
        require_once 'controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->my_static_page_rev01();
        break;

    case '/dashboard/thunkable_creatives':
        require_once 'controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->thunkable_creatives();
        break;


    default:
        http_response_code(404);
        echo "404 - Page Not Found";
        break;
}
?>