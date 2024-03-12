<?php
require_once '../app/vendor/autoload.php';
require_once "../app/core/Controller.php";
require_once "../app/models/User.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/MainController.php";
require_once "../app/controllers/UserController.php";
require_once "../app/controllers/PostController.php";
use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\PostController;

$url = $_SERVER["REQUEST_URI"];

// Create instances of the controllers
$mainController = new MainController();
$postController = new PostController();
$userController = new UserController();

// Parse the URL to get the path only, excluding query string
$urlPath = parse_url($url, PHP_URL_PATH);

// Routing switch statement
switch ($urlPath) {
    case "/posts":
        // Return an array of posts via the post controller
        echo json_encode($postController->getPosts());
        break;
    case "/":
        // Return the homepage view from the main controller
        $mainController->index();
        break;
    default:
        // Return a 404 view from the main controller
        $mainController->pageNotFound();
        break;
}

// Implement the methods getPosts, index, and pageNotFound in their respective controllers.
