<?php


/**
 * class : structure (blue print) : properities , methods
 * object :instance of class 
 * --------- Access Modifiers ----
 * public : any calss
 * protected  : classes that inherite this class
 * private  : only belog to this class
 * 
 * ---------- construcor --------
 * function __construct () {} ====> single constructor 
 *    -- not parametarized
 *    -- parametarized
 *   ----------- construcor called while creating object
 *  --------- Class has only one constructor in PHP ------
 * 
 * ===================== Princeplies of OOP===========
 * ----- Encapsulation  
 *  (save data)--------
 * setter : set Data
 * getter : get data
 * 
 * ---------------------- Inheritance --------------
 * -- single Inheritance 
 * -- Multi Level Inheritance 
 * -- Hyrarchiacl Inheritance 
 * ===================== Not Permitted ==============
 * -- multible Inheritance 
 * -- Hypried Inheritance
 * 
 * ========================== Class Variables =====
 * static 
 * const 
 * ========================== Ploymorphism  (تعدد الاشكال ) =====
 * override  : accepted (same name of function and parameters and data type but differenet in return of function)
 * overloading :  not accepted 
 * 
 * ======================== Abstraction =============
 * Abstract Class 
 * how to Prevent class to Take Object From it?make this class Abstract Class
 * how to Prevent class to Take Object From it?make  constructor os this class private
 * 
 * 
 * ==================== Interface
 * interface can extend another interface 
 * class can implement more than one interface
 */


// class Human
// {
//     public $name;
//     private $email;
//     protected $address;
//    static $count=0;
//    const ID=1;


//     // constructor 
//     function __construct($userName, $userAddress = "")
//     {

//         // this : refer object
//         $this->name = $userName;
//         $this->address = $userAddress;
//        self::$count++;
//     }


//     function setEmail($e)
//     {
//         $this->email = $e;
//     }
//     function getEmail()
//     {
//         return $this->email;
//     }
//     function setAddress($d)
//     {
//         $this->address = $d;
//     }
//     function getAddress():string
//     {
//         return $this->address;
//     }

//     function print_data()
//     {
//         // echo "first class";

//         echo "name :", $this->name, "<br> ",
//         "email : ", $this->getEmail(),
//         "<br>", "address:$this->address";
//     }
// }

// // $h = new Human(userAddress:"cairo",userName:"test");
// // // // $h->name="php track";
// // // $h->setEmail("iti@gmail.com");
// // // $h->setAddress("menoufia");
// // // echo $h->getAddress() , "<br>";
// // // echo $h->getEmail(), "<br>";
// // $h->print_data();
// // var_dump($h);
// $h = new Human(
//     userAddress: "cairo",
//     userName: "test"
// );
// $h2 = new Human(
//     userAddress: "cairo",
//     userName: "test"
// );
// $h3 = new Human(
//     userAddress: "cairo",
//     userName: "test"
// );

// // $h->setEmail("iti@gmail.com");
// echo Human::$count;
// echo Human::ID;
// // $h->print_data();


// class Person extends Human
// {
//     public $phone;
//     function  __construct($phone, $name, $address)
//     {
//         parent::__construct($name, $address);
//         $this->phone = $phone;
//     }


//     function allData()
//     {

//        $this->setEmail("mahmoud@gmail.com");
//       echo "email:",  $this->getEmail() ,"<br>";
//         echo " <br> phone: ", $this->phone, "<br>";
//     }

//      function print_data()
//     {
//         // echo "first class";

//         return "hello";
//     }
// }

// // $h = new Human(userAddress: "cairo", userName: "test");
// // // $h->setEmail("iti@gmail.com");
// // $p = new Person(phone: "0122342345", name: "person", address: "sadat");
// // // echo $h->getEmail();
// // // $p->setEmail("mohammed@gmail.com");
// // // echo $p->getEmail();
// // $p->allData();


// class Child extends Person{



// 	function __construct($phoneNumber="324612375463", $nameText="ejhwefk", $addressText="endm,wem,f")
//     {
//      parent::__construct($phoneNumber, $nameText, $addressText);
//     }
// }


// $c=new Child();
// // print_r($c);

// class Girl extends Person {

// }


//------------------------------------ Abstraction ---------------
// abstract class Data{
// public $allData;
// abstract function test($allData):string;
// abstract function apply():void;
// }
// class TestAll extends Data{
// public $testData;


// function __construct($test)
// {
    
// $this->testData=$test;
// }

// function test($allData):string{

// $allData=$this->testData;
// return $allData;
// }
// function apply():void{
//    echo "apply all Data";
// }
// }

// // $d=new Data();  xxxxxxxxxxxxx error
// $t=new TestAll("test argument"); 

// echo $t->test("test argument");



// ---------- Interface ---------------

// interface A{
//     /**
//      * abstract methods 
//      */

//     function printA();
// }
// interface   B{
//     /**
//      * abstract methods 
//      */

//     function printB();
// }
// interface C extends B{
//     /**
//      * abstract methods 
//      */

//     function printC();
// }

// Class Y implements C {
    
//     function printC(){

//     }
//     function printB(){

//     }
// }
// class Z implements A , B,C{
// function printA(){
//     echo "A";
// }
// function printB(){
//     echo "A";
// }
// function printC(){
//     echo "A";
// }
// }



// =========== Trait =========


namespace testTest {
    trait A {
        public function b() {
            echo "hello ";
        }
    }
}

namespace test {
    // Import Trait A from testTest namespace
    use testTest\A;

    class MyClass {
        use A; // Uses testTest\A
    }
}

