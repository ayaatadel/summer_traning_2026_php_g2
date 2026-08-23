<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});







route::get('/students',function()
{
  $students = [
    [
        "id" => 1,
        "name" => "leena",
        "email" => "leena@gmail.com",
    ],
    [
        "id" => 2,
        "name" => "salma",
        "email" => "salma@gmail.com",
    ],
    [
        "id" => 3,
        "name" => "login",
        "email" => "login@gmail.com",
    ],
    [
        "id" => 4,
        "name" => "mohammed",
        "email" => "mohammed@gmail.com",
    ],

];
// return view('allStudents',["students"=> $students]);
return view('allStudents',compact("students"));
//     foreach ($students as $student) {
//     // var_dump($student);
//     // echo "<br> ******************************* <br>";

//     # code...
// }

});


//********************* Get Single student  (task) */
route::get('/students/{id}',function()
{
      $students = [
    [
        "id" => 1,
        "name" => "leena",
        "email" => "leena@gmail.com",
    ],
    [
        "id" => 2,
        "name" => "salma",
        "email" => "salma@gmail.com",
    ],
    [
        "id" => 3,
        "name" => "login",
        "email" => "login@gmail.com",
    ],
    [
        "id" => 4,
        "name" => "mohammed",
        "email" => "mohammed@gmail.com",
    ],

];
    // $student;//
    return view('student',compact('student'));
});

// route::get('url',action); // action ===> function  || controller

/***
 *
 * get
 * post
 * put
 * update
 * edit
 * delete
 */
