<?php
require "./navbar.php";
// include "./navbar.php";  
$var1 = "test";

// single comment
# single comment
/**
 * multi line comment 
 */

/**
 * variable naming   : $Variable_name
 * 
 * ---------------
 * php case sensitive
 * $varName
 * $_userName
 * $userName
 * $user_name 
 * $user-name ===>xxxxxxxxxxxxx error 
 */

$name = "iti";
$course = "php";
$students = ["mohammed", "mahmoud", "hossam"];


/**
 * printing 
 * 
 * echo  : has no return ==> more speed than print 
 *        --> echo : with out practices => echo $name , $course; : more than one parameter , deal with data type string
 *        --> echo : with  practices => echo ($name) : only one parameter
 * print  : return  ===> single parameter  , , deal with data type string
 * print_r : any data type : datatype of variable + index(value) : most take 2 arguments
 * var_dump : any data type : datatype of variable + index(data type + length + value of index ) : any number of parameters
 * 
 * 
 * 
 * ================== echo , print , print_r : false ==> give me nothing
 * ================== var_dump ==> boolean(false)
 */

// $name="sql";
// echo( $name);
// echo "<br>";
// echo $name , $course;
// echo "<br>";
// echo $Name;
// print($name);
// print_r( $students,$name); //Array ( [0] => mohammed [1] => mahmoud [2] => hossam )
// echo "<br>";
// var_dump($students); //array(3) { [0]=> string(8) "mohammed" [1]=> string(7) "mahmoud" [2]=> string(6) "hossam" }



// ================ Data types
/**
 * "boolean" 
 * "integer" 
 * "float"       
 * "string"
 * "array"
 * "object"
 * "null" 
 */

//***************** PHP is Loosely typed language  */
/**
 * get data type : print_r || var_dump  || getType($var_name)
 *  
 * setType ===> settype($age,"integer");
 * setType ===>$age=(integer) $age;
 * 
 * 
 * ------------- check on data type 
 *   getType (dataType)
 *   
 * common  and declerated functions :
 *  is_bool    
 *  is_integer    
 *  is_array   
 *  is_string   
 *  is_object  
 */

// echo gettype($name);
// casting
// $age = "15";

// // echo gettype($age);
// // echo "<br>";
// // // settype($age,"integer");
// // //  echo gettype($age);

// // $age=(integer) $age;

// // echo gettype($age);

// var_dump(is_integer($age));
// var_dump(is_string($age));



// operators 
/**
 * arethmatic operators  (+,-,*,/ ,% , **)
 * comparison operators (> , < , ,= , <> ,<= , >=)
 * assignment operators ( != , !==  ,== ,===)
 * logical operators (&& , || , !)
 * increment , decrement operators  (+= , =+ , ++ , -- )
 */


//arethmatic operators  
// $n1 = 5;
// $n2 = 3;

// echo $n1 + $n2, "<br>";
// echo $n1 - $n2, "<br>";
// echo $n1 * $n2, "<br>";
// echo $n1 / $n2, "<br>";
// echo $n1 % $n2, "<br>";
// echo $n1 ** $n2, "<br>";


//================== conditional statement :
/**
 * if  , if else , if else if else   (condition)
 * ternary operator
 * switch case  : equal 
 */


// $n1 = 5;
// $n2 = 10;

// if($n1<$n2)
//     {
//         echo "less than";
//     }else{
//  echo "more  than";
//     }
// if ($n1 < $n2) {
//     echo "less than";
// } else if ($n1 > $n2) {
//     echo "more  than";
// } else {
//     echo "equal";
// }

// $grade=80;

// switch ($grade) {
//     case 80:
//         # code...
//         echo "A";
//         break;
//     case 70:
//         # code...
//         echo "B";
//         break;
    
//     default:
//        echo "hello";
//         break;
// }




// ternary operaor

// $n1 = 5;
// $n2 = 10;

// // echo ($n1<$n2)?"less than":"morethan";
// // ($n1<$n2)? print ("less than"):print("more than");
// ($n1<$n2)?print("less than"):(($n1>$n2)?print("more than"):print("equal"));
// echo($n1<$n2)?("less than"):(($n1>$n2)?("more than"):("equal"));







// Array 
/**
 * $data=["iti","php"]
 * $data=array("iti","php")
 * 
 * indexed array   ==> index  start with 0 , length => numbers of array     elemnts =====> count(array_name)
 * 
 * 
 * multi dimension array : $all_info=[1,2,3]["iti","php"]
 * 
 * Associative array ===> ["key":value]
 * 
 * add elemnet from start : unshif
 * add elemnet from end : push
 * remove elemnet from start : shift
 * remove elemnet from end  :  pop
 */
// $data=["iti","php","sql"];

// print_r($data);
// echo "<br>";
// array_pop($data);
// print_r($data);
// echo "<br>";
// array_shift($data);
// print_r($data);
// echo "<br>";
// array_push($data,"true","laravel");
// print_r($data);
// echo "<br>";
// array_unshift($data,"first","html");
// print_r($data);
// echo "<br>";


// =========== loop on array 
/**
 * for (start, condition  , increment || decrement)
 * while ==>start 
 * do while 
 */


// for($i=1;$i<=5;$i++)
// {
//     echo $i;
// }


// $i=5;
// while($i>0)
//     {
//         echo $i;
//         $i--;
//     }
// $i=5;

//     do{
//         echo $i;
//         $i--;
//     }while($i>0);


// $data=["iti","php","sql"];
// for($i=0;$i<count($data);$i++)
//     {
//         echo $data[$i] ."<br>";
//     }


$data = ["iti", "php", "sql"];

echo "<table border='1' class='table table-striped '>";
echo "<thead>";
echo "<tr>";
echo "<td>";
echo "id";
echo "</td>";
echo "<td>";
echo "data";
echo "</td>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";
$j = 0;
for ($i = 0; $i < count($data); $i++) {
    echo "<tr>";
    echo "<td>" . ++$j  . "</td>";
    echo "<td>" . $data[$i]  . "</td>";


    echo "</tr>";
}
echo "</tbody>";



echo "</table>";




// $data = [
//     ["basmala", 24, "cs"],  // row
//     ["nada", 25, "ai"] // row
// ];

// echo "<table border='1'>";
// echo "<thead>";
// echo "<tr>";
// echo "<td>";
// echo "name";
// echo "</td>";
// echo "<td>";
// echo "age";
// echo "</td>";

// echo "<td>";
// echo "department";
// echo "</td>";
// echo "</tr>";
// echo "</thead>";
// echo "<tbody>";

// for($i=0;$i<count($data);$i++)  // array
//     {
//        echo "<tr>";
// for($j=0;$j<count($data[$i]);$j++) // data of this array
//     {
//               echo "<td>".$data[$i][$j]."</td>";
//     }
//     echo "<tr>";
//     }
// echo "</tbody>";



// echo "</table>";

// for($i=0;$i<count($data);$i++)
//     {

// for($j=0;$j<count($data[$i]);$j++)
//     {
//               echo $data[$i][$j]."<br>";
//     }
//     }



// //============ associative array  ==> key : value ===> name:basmala || address:cairo
// $data=["name"=>"basmala",
//     "address"=>"cairo"];

//     // echo $data["name"];
//     // echo $data["address"];
    

//     // multi dimenssion array ==> associative array ===> index : associative array
// $data=[
//     ["name"=>"basmala",
//     "address"=>"cairo"]
//     ,
//      ["name"=>"habiba",
//     "address"=>"sadat"]
//     ,
//      ["name"=>"mohammed",
//     "address"=>"menoufia"]
// ];


// // print_r ($data[0]);
//                  // key=index , value = array
// foreach ($data as $key => $user) {
//     # code...         // key : value ==> name:basmala
//     foreach ($user as $key => $value) {
//         # code...
//         // var_dump($key);
//         // echo "<br>";
//         // var_dump($value);
//         // echo "<br>";

//         echo "$key : $value <br>";


//     }
  
// }
