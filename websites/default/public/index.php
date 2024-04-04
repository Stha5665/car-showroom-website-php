<?php
session_start();
// starting session
// requiring template loader
require 'carsFunctions/templateLoader.php';
// requiring autoloader
require 'autoloader.php';
// require database connect
require 'dbConnect.php';

// array to store tables object
$controllers = [];
// object of car table
$car_table = new \classes\databaseTable('cars', 'id', $pdo);
// object of manufacturers table
$manufacturer_table = new \classes\databaseTable('manufacturers', 'id', $pdo);
// object of user_table
$user_table = new \classes\databaseTable('Users', 'id', $pdo);
// object of article_table
$article_table = new \classes\databaseTable('articles', 'id', $pdo);
// for enquiry table
$enquiry_table = new \classes\databaseTable('enquiries', 'id', $pdo);
// for job table
$job_table = new \classes\databaseTable('jobs', 'id', $pdo);

// object of main controller instantiated in controller array
$controllers['mainController'] = new \webControllers\mainController($car_table, $manufacturer_table,$article_table, $enquiry_table);
// For admin controller
// passing the constructor value
$controllers['adminController'] = new \webControllers\adminController($car_table, $manufacturer_table, $user_table, $article_table, $enquiry_table);
// to shortened url so that the specific controller can be called

//$urlRoute = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/' );
if(isset($_GET['page'])){
    // Getting the requested url
    $urlRoute = $_GET['page'];
}
else{
    // if not then empty
    $urlRoute = '';
}

// if empty or index.php
if($urlRoute == '' || $urlRoute == 'index.php'){
    // call the home() function 
    $page = $controllers['mainController'] -> home();
}
else if($urlRoute == 'contact'){
    // if request for contact page
    // calls the contactUs function 
    $page = $controllers['mainController'] -> contactUs();
}
else if($urlRoute == 'cars'){
    // if for car page
    // calls ourCars function
    $page = $controllers['mainController'] -> ourCars();
}
else if($urlRoute == 'careers'){
    // if requested for careers page
    //calls this
    $page = $controllers['mainController'] -> ourCareers();
}
else if($urlRoute == 'about'){
    // check for about page
    // call the function
    $page = $controllers['mainController'] -> aboutUs();
}
//  check for manufacturer
else if($urlRoute == 'manufacturer'){
// calls this controller
    $page = $controllers['mainController'] -> manufacturerCar();
}
// start of the request for 
// admin page
else if($urlRoute == 'admin'){
    // calls this function of the controller
    $page = $controllers['adminController'] -> home();
}
else if($urlRoute == 'admin/cars'){
    // if this page is requested
    //
    if(isset($_POST['archiveId'])){
        // If the archive is pressed 
        // than archive car
        $controllers['adminController'] -> archiveCar();
    }
    // calls to load template
    $page = $controllers['adminController'] -> adminCars();
}
// for archive page
else if($urlRoute == 'admin/archiveCars'){
    // if restoreId is set
    if(isset($_POST['restoreId'])){
        // then it restores the car
        $controllers['adminController'] -> restoreCar();
        // for deleting
    }else if(isset($_POST['deleteCarId'])){
        // this function of the controller is called
        $controllers['adminController'] -> deleteCar($_POST['deleteCarId']);
    }
    // calls the template, title , variable for archivePage
    $page = $controllers['adminController'] -> archivePage();
}
else if($urlRoute == 'addcar'){
    // if addcar requested
    // then calls
    // function addCar()
    $page = $controllers['adminController'] -> addCar();
}
else if($urlRoute == 'editcar'){
    // for edit car
    // this controller
    // 
    $page = $controllers['adminController'] -> editCar();
}
else if($urlRoute == 'showAdmin'){
    // For showing admin details
    // this function 
    $page = $controllers['adminController'] -> showAdmins();
}
else if($urlRoute == 'addAdmin'){
    // when addAdmin
    // function addAdmin() is called or executed
    $page = $controllers['adminController'] -> addAdmin();
}
else if($urlRoute == 'admin/articles'){
    // For articles list in admin panel
    $page = $controllers['adminController'] -> adminArticles();
}
// checking for addArticle
else if($urlRoute == 'addArticle'){
    // article adding logic is in this function
    $page = $controllers['adminController'] -> addArticle();
}
else if($urlRoute == 'enquiries'){
    // for showing all the enquiries
    // following method is called
    $page = $controllers['adminController']->adminEnquiries();
}
//  To see previous enquiries
// 
else if($urlRoute == 'previousEnquiries'){
    // calls this function for this request
    $page = $controllers['adminController']->previousEnquiries();
}
// for adding job title, description
else if($urlRoute == 'addJob'){
    // calling addJob function
    $page = $controllers['adminController']->addJob($job_table);
}

else if($urlRoute == 'logout'){
    // when users logout
    $page = $controllers['adminController'] -> adminLogout();
}

else{
    header('Location: /');
    // list($controllerName, $functionName) = explode('/', $urlRoute);
    // $controller = $controllers[$controllerName];
    // $page = $controller-> $functionName();
    // $page = $controllers['mainController'] -> home();
}
// $outputView stores the layout as string
$outputView = loadTemplate('templates/'.$page['template'], $page['variables']);
// setting the title of the page
$title = $page['title'];
// if user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // calls this template or layout
    require 'templates/admin/adminLayout.html.php';
}else{
    // if not calls this
    require 'templates/layout.html.php';
}
// end of the code
?>