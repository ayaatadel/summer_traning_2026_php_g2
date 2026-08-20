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
 * 
 * ===================== Princeplies of OOP===========
 * ----- Encapsulation  (save data)--------
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
 */


class Human
{
    public $name;
    private $email;
    protected $address;


    // constructor 
    function __construct($userName, $userAddress = "")
    {

        // this : refer object
        $this->name = $userName;
        $this->address = $userAddress;
    }


    function setEmail($e)
    {
        $this->email = $e;
    }
    function getEmail()
    {
        return $this->email;
    }
    function setAddress($d)
    {
        $this->address = $d;
    }
    function getAddress():string
    {
        return $this->address;
    }

    function print_data()
    {
        // echo "first class";

        echo "name :", $this->name, "<br> ",
        "email : ", $this->getEmail(),
        "<br>", "address:$this->address";
    }
}

// $h = new Human(userAddress:"cairo",userName:"test",userEmail:"test@gmail.com");
// // $h->name="php track";
// $h->setEmail("iti@gmail.com");
// $h->setAddress("menoufia");
// echo $h->getAddress() , "<br>";
// echo $h->getEmail(), "<br>";
// $h->print_data();
// var_dump($h);



class Person extends Human
{
    public $phone;
    function  __construct($phone, $name, $address)
    {
        parent::__construct($name, $address);
        $this->phone = $phone;
    }


    function allData()
    {

       $this->setEmail("mahmoud@gmail.com");
      echo "email:",  $this->getEmail() ,"<br>";
        echo " <br> phone: ", $this->phone, "<br>";
    }
}

$h = new Human(userAddress: "cairo", userName: "test");
// $h->setEmail("iti@gmail.com");
$p = new Person(phone: "0122342345", name: "person", address: "sadat");
// echo $h->getEmail();
// $p->setEmail("mohammed@gmail.com");
// echo $p->getEmail();
$p->allData();


class Child extends Person{



	function __construct($phoneNumber="324612375463", $nameText="ejhwefk", $addressText="endm,wem,f")
    {
     parent::__construct($phoneNumber, $nameText, $addressText);
    }
}


$c=new Child();
print_r($c);

class Girl extends Person {

}