<?php
// creating namespace for autoloading
namespace webControllers;
// class for controlling 
// the logic of public part of 
// the website
class mainController{
    // attributes
    private $manufacturer_table;
    // car table
    private $cars_table;
    // articles table
    private $articles_table;
    // enquiry table
    private $enquiry_table;
//  constructor that sets the values of the attributes
    public function __construct($cars, $manufacturer, $articles, $enquiry_table){
        // sets
        $this->cars_table = $cars;
        // these
        $this->manufacturer_table = $manufacturer;
        // values
        $this->articles_table = $articles;
        // in attributes
        $this->enquiry_table = $enquiry_table;
    }
//  for homepage
    public function home(){
        // fetch all articles
        $articles = $this->articles_table->findAllData();
        // return templates, title and datas
        return [
            'template' => 'home.html.php',
            'title' => 'Claires\'s Cars - Home',
            'variables' => [
                'articles' => $articles
            ]
        ];
    }
// for contact us page
    public function contactUs(){
// when enquiry is submmitted
        if(isset($_POST['submit'])){
            // unseting submit value
            unset($_POST['submit']);
            // setting the date of enquiry
            $_POST['enquiry_date'] = date("Y-m-d");
            // not completed so
            $_POST['completed'] = 'N';
            // no one has completed so null
            $_POST['completed_by'] = 'NULL';
            // saving data to enquiry table
            $this -> enquiry_table-> saveData($_POST);
            echo 'saved';
        }
        // returning the values
        //
        return [
            'template' => 'contact.html.php',
            'title' => 'Claires\'s Cars - Contact Us',
            'variables' => [
            ]
        ];
    }
// functions to list all cars
    public function ourCars(){
        // fetches the manufacturer details
        $manu = $this->manufacturer_table->findAllData();
        $cars = $this->cars_table->find('archive', 'N');
        // Un archived cars details will be fetched
        // and returned
        return  [
            'title' => 'Claires\'s Cars - Our Cars',
            'template' => 'cars.php',
            'variables' => [
                'cars' => $cars,
                'manu' => $manu,
                'heading' => 'Our Cars'
            ]
        ];
    }
// controller for manufacturerCar
    public function manufacturerCar(){
        $manu = $this->manufacturer_table->findAllData();
        // find all cars details 
        // by use of manufacturer detail
        $cars = $this->cars_table->find('manufacturerId', $_GET['manufacturerId']);
        // return the required
        // value for layout
        return  [
            'title' => 'Claires\'s Cars - '.$_GET['manuName'].' Cars',
            'template' => 'cars.php',
            'variables' => [
                'cars' => $cars,
                'manu' => $manu,
                'heading' => $_GET['manuName']
            ]
        ];
    }
// for career page
    public function ourCareers(){
        // return title, template
        // empty variable array
        return [
            'title' => 'Claires\'s Careers',
            'template' => 'careers.html.php',
            'variables' => []
        ];
    }
// for about us page
    public function aboutUs(){
        // return the title template
        return [
            'title' => 'Claires\'s About us page',
            'template' => 'about.html.php',
            'variables' => []
        ];
    }
}