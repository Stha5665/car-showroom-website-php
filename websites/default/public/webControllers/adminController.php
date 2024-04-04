<?php
// creating namespace for autoloading the class
namespace webControllers;
// class for admin controller
// of the websites
class adminController{
    // for storing manufacturer table
    private $manufacturer_table;
    // for cars
    private $cars_table;
    // for users table
    private $users_table;
    // to store articles table object
    private $aritcles_table;
    // for enquiry table
    private $enquiry_table;
// initialize the value of these variable
// by use of the constructor
    public function __construct($cars, $manufacturer, $users, $article, $enquiry){
        // setting the values
        // asks by constructor to the relative variables
        $this->cars_table = $cars;
        $this->manufacturer_table = $manufacturer;
        $this->users_table = $users;
        $this->articles_table = $article;
        $this->enquiry_table = $enquiry;
    }
//  functions for the homepage
    public function home(){
        // for checking login details
       $users = $this -> users_table -> findAllData();
       // return 
       // template to load, title of the website,
       // variables i.e users details
        return [
            'template' => 'admin/adminHome.html.php',
            'title' => 'Claires\'s Cars - Admin  Home',
            'variables' => [
                'users' => $users
            ]
        ];
    }
    // function to add job
    public function addJob($job_table){
        // when joke is submitted
        if(isset($_POST['submit'])){
            // unset the submit value
            unset($_POST['submit']);
            // save that job to database
            $job_table -> saveData($_POST);
        }
        // return these
        // three fields
         return [
             'template' => 'admin/addjob.html.php',
             'title' => 'Claires\'s Cars - Admin Add Job',
             'variables' => [
             ]
         ];
     }
 
// for control of cars
// section of the admin page
    public function adminCars(){
        // finds all the unarchived cars from
        // the database
        $cars = $this -> cars_table -> find('archive', 'N');
        // return template, title, variables
         return [
             'template' => 'admin/cars.html.php',
             'title' => 'Claires\'s Cars - Admin cars page',
             'variables' => [
                 'cars' => $cars,
                 'tableLayoutFor' => 'car-page'
             ]
         ];
     }
     // end of function

    //  for archive page
     public function archiveCar(){
        // sets the values in the array
        // id to update and sets the archived as 'Y'
        // when archived button is pressed
        $records = [
            'archive' => 'Y',
            'id' => $_POST['archiveId']
        ];
        // to update data of cars table
        $cars = $this -> cars_table -> updateData($records);
     }

     // This for the archive page of the website
     public function archivePage(){
        // finding
        // all the archived cars
        $cars = $this -> cars_table -> find('archive', 'Y');
        // return the template to load
        // title
        // tableLayoutFor is passed to utilize same cars.html.page template
         return [
             'template' => 'admin/cars.html.php',
             'title' => 'Claires\'s Cars - Admin Archive page',
             'variables' => [
                 'cars' => $cars,
                 'tableLayoutFor' => 'archive-page'
             ]
         ];
     }

     public function restoreCar(){
        // to restore cars
        // sets archive field to 'N'
        $records = [
            'archive' => 'N',
            'id' => $_POST['restoreId']
        ];
        // Update that field and value
        $cars = $this -> cars_table -> updateData($records);
     }

     // for deleting the car
     public function deleteCar($value){
        // calls the delete query
        $this -> cars_table -> deleteData($value);
     }
// For adding car
     public function addCar(){
        // find all
        $stmt = $this -> manufacturer_table -> findAllData();

        if(isset($_POST['submit'])){
            // unset so that the submit key can be removed from array
            // and we can directly pass the $_POST to the function
            unset($_POST['submit']);
            //saveData checks data whether to 
            // update or insert
            $this -> cars_table->saveData($_POST);
            // the inserted id is fetched to store the photo
            $lastInsertId = $this->cars_table->lastInsertedId();
            // counts the no of images
            $noOfImages = count($_FILES['image']['name']);
            $i = 0;
            // while less than size of image array
            while($i < $noOfImages ){
                // if no erro in image
                if ($_FILES['image']['error'][$i] == 0) {
                    // name that image joining with '-' and counter variable
                    // like : Eg 18-1.jpg
                    $fileName = $lastInsertId .'-'.($i+1). '.jpg';
                    // $fileName = $lastInsertId . '.jpg';
                    move_uploaded_file($_FILES['image']['tmp_name'][$i], 'images/cars/' . $fileName);
                    // saves images to the given direction
                }
                // increasing the counter variable
                $i++;
            }
        }
        // return the value
        return [
            'template' => 'admin/addcar.html.php',
            'title' => 'Claires\'s Cars - Admin Add Car page',
            'variables' => [
                'stmt' => $stmt,
                'heading' => 'Add Car'
            ]
        ];

    }
// Functions for edit Car
    public function editCar(){
        // fetch
        $stmt = $this -> manufacturer_table -> findAllData();
        // if submited
        if(isset($_POST['submit'])){
            // unset so that the submit key can be removed from array
            // and we can directly pass the $_POST to the function
            unset($_POST['submit']);
            //save
            $this -> cars_table->saveData($_POST);
            $lastInsertId = $this->cars_table->lastInsertedId();
            // counts the images
            $noOfImages = count($_FILES['image']['name']);
            $i = 0;
            // until size of array
            while($i < $noOfImages ){
                // if not error
                if ($_FILES['image']['error'][$i] == 0) {
                    // for file name
                    $fileName = $_GET['carId'] .'-'.($i+1). '.jpg';
                    // $fileName = $lastInsertId . '.jpg';
                    move_uploaded_file($_FILES['image']['tmp_name'][$i], 'images/cars/' . $fileName);

                }
                //
                $i++;
            }
        }
        // find that cars_details via use of id
        $carData = $this -> cars_table -> find('id', $_GET['carId']);
        // return the value
        return [
            'template' => 'admin/addcar.html.php',
            'title' => 'Claires\'s Cars - Admin Edit Car page',
            'variables' => [
                'stmt' => $stmt,
                'heading' => 'Edit Car',
                'carData' => $carData[0]
            ]
        ];

    }
// This functions to get list of admins of the website
    public function showAdmins(){
        // fetch all admin user
        $adminusers = $this->users_table -> findAllData();
        // return in the template
        return [
            'template' => 'admin/showAdmins.html.php',
            'title' => 'Claires\'s Cars - Admins of website',
            'variables' => [
                'admins' => $adminusers
            ]
        ];
    }

    public function addAdmin(){
        if(isset($_POST['submit'])){
            // to remove the submit key from array use unset
            // so we can directly pass the $_POST to the function
            unset($_POST['submit']);
            $this->users_table->saveData($_POST);
        }
        // return the values
        return [
            'template' => 'admin/addAdmin.html.php',
            'title' => 'Claires\'s Cars - Add admin page',
            'variables' => [
            ]
        ];
    }

    public function adminArticles(){
        // for all articles
        $articleData = $this->articles_table->findAllData();
        // return these
        return[
            'template' => 'admin/articles.html.php',
            'title' => 'Claires\'s Cars - Articles page',
            'variables' => [
                'articles' => $articleData
            ]
        ];
    }

    public function addArticle(){
        // for adding articles
            if(isset($_POST['submit'])){
                unset($_POST['submit']);
                // save the form inputed value via passing $_POST
                $this -> articles_table->saveData($_POST);
                $lastInsertId = $this->articles_table->lastInsertedId();
                // count images
                $noOfImages = count($_FILES['image']['name']);
                $i = 0;
                // upload images
                while($i < $noOfImages ){
                    if ($_FILES['image']['error'][$i] == 0) {
                        // upload images
                        $fileName = $lastInsertId .'-'.($i+1). '.jpg';
                        // $fileName = $lastInsertId . '.jpg';
                        // upload in articlesImg directory
                        move_uploaded_file($_FILES['image']['tmp_name'][$i], 'images/articlesImg/' . $fileName);
                    }
    //  counter variable 
                    $i++;
                }
            }
            // for layout
            return [
                'template' => 'admin/addArticle.html.php',
                'title' => 'Claires\'s Cars - Admin Add Article Page',
                'variables' => [
                ]
            ];

        
    }

    public function adminEnquiries(){
       // to show all the enquiries
        if(isset($_POST['submit'])){
            unset($_POST['submit']);
            // store the values
            // in the $records 
            // array
            $records = [
                'completed' => 'Y',
                'id' => $_POST['enquiryId'],
                'completed_by' => $_SESSION['loggedUsername']
            ];
            // pass this array to updateData 
             $this -> enquiry_table -> updateData($records);
            
        }
        // finds all uncompleted enquiries
        $enquiry = $this->enquiry_table->find('completed', 'N');
//   and returns to template
        return [
            'template' => 'admin/enquiries.html.php',
            'title' => 'Claires\'s Cars - Admin Enquiry Page',
            'variables' => [
                'enquiriesData' => $enquiry,
                'previousEnquiryPage' => false
            ]
        ];

    }

    public function previousEnquiries(){
        // to see previous enquiries
        // using find function of enquiry class
        $enquiry = $this->enquiry_table->find('completed','Y');
        // return required values
        // along with title
        return [
            'template' => 'admin/enquiries.html.php',
            'title' => 'Claires\'s Cars - Admin Previous Enquiry Page',
            'variables' => [
                'enquiriesData' => $enquiry,
                'previousEnquiryPage' => true
            ]
        ];

    }
// for logout
    public function adminLogout(){
        // following changes occurs
        session_unset();
	    session_destroy();
        // move to homepage
        header("Location: /");
    }
}
?>