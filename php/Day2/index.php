<?php

use LDAP\Result;

require "./home.php";
$day = "Day2";

echo "<h1 style='text-align:center; color:red'>     $day Functions      </h1>";

/**
 * Functions : 
 * Decleration Function
 * Anonoumus function (clousure function)
 * arrow function
 * Expression Function 
 * Call Back function
 * Higher Order Function 
 * Constructor function 
 * IIFE ==> Immediatly Invoked Function 
 * Asynchronous Functions 
 */


// function data()
// {   // void and not parametarized  function 
//     // echo "hello from function";
//     return "hello from function  decleration<br>";

// }


// // echo data();


// $result=function()
// {
//    echo data();
//       return "hello from function expression <br>";
// };


// echo $result();
// echo "<br>";
// // var_dump($result) ;



// (
// function(){
//     echo "hello from IIFE";
// }
// )();


/**
 * global scope 
 * block scope {}
 */

// $track="php";
// function print_track_name($branch) 
// {
//     global $track;
//   echo "<br>$track  $branch<br>"  ;
// }
// print_track_name("cairo");


// $test="test data";
// $result=function()  use ($test)
// {
// global $test;

//       return "<p style='text-align:center'> $test : hello from function expression  </p><br>";
// };


// echo $result();





// $result = fn() => "hello";   // return ==> echp $result()
// $result = fn($x) => $x;


// echo $result(5);


// $result= function (){

// };



// call by value , call by refrence 

// call by value 
// $x=5;
// $y=10;
// $x=$y;// $x=10;
// echo $y , "<br>";
// $x=12;
// echo $y , "<br>";
// echo $x;

// // call by refrence
// $x=5;
// $y=10;
// $x=&$y;
// echo $x ,"<br>";
// echo $y , "<br>";
// $x=15;
// echo $x ,"<br>";
// echo $y , "<br>";



// // ============= variable of variable 

// $name="track";
// $$name="php"; // $track=php
// echo $$name;  // $track







// predefined Declared function
/**
 * print
 * echo 
 * vardump
 * setType
 * getType 
 * is_int
 * 
 * 
 * ============= array===
 * push 
 * pop
 * shift
 * unshift 
 * count
 * ============ string =========
 * strlen : length of  string
 *  trim :  remove spaced
 *  strtoupper :  upper case
 *  strtolower:  lower case
 *  str_replace:  replace (srting) with another string
 *  str_word_count:  count of number of words
 *  str_contains() ==> str_pos :  check if string contain specific string
 *  str_starts_with :   check if string start with specific string
 *  str_ends_with : check if string end with specific string
 *  substr : get sub string from string

 * implode : convert array to string
 * explode : convert string to arrat
 */
                      
// $text="hello from php ";
// echo "<br>";
// echo strlen($text);
// echo "<br>";
// echo trim($text);
// echo "<br>";
// echo strtoupper($text);
// echo "<br>";
// echo strtolower($text);
// echo "<br>";
// echo str_starts_with($text,"hello");
// echo "<br>";
// echo str_ends_with($text,"php");
// echo "<br>";
// echo str_contains($text,"php");
// echo "<br>";


// implode : convert array to string
// explode : convert string to array
// $text="hello from php ";
// echo gettype($text);
// echo "<br>";

// $arrayText=explode(" ",trim(($text)));
// print_r($arrayText);

// $arr=["php","laravel"];
// $strArray=implode("#",$arr); // php#laravel
// $strArray=implode(" ",$arr); // php laravel
// echo $strArray;


// data from user ==> form ==> insert in data base 
/**
 * array 
 * sql ==> string
 */


/**
 * Super Global Variables : predefined variables 
 * 
 * $_GET : get data from  url ,form (method="get")
 * $_POST : send data using from ==> collect in server (method="post")
 * $_REQUEST : data about request ==> (methd=(get or post))
 * $_SERVER : data about server
 * $_FILE  : select sent files from server
 * $_COOKIES : cookies in server
 * $_SESSION : session in server
 */
