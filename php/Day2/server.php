<?php

echo "<h1 style='text-align:center; color:red'>server Page  </h1>";
// url : +userName=iti&userEmail=iti%40gmail.com&userPassword=12345&btn-register=Register

// var_dump($_GET);
// // array(4) { ["userName"]=> string(3) "iti" ["userEmail"]=> string(13) "iti@gmail.com" ["userPassword"]=> string(5) "12345" ["btn-register"]=> string(8) "Register" }

// var_dump($_POST);
// //array(4) { ["userName"]=> string(5) "ayaat" ["userEmail"]=> string(22) "ayaatadel128@gmail.com" ["userPassword"]=> string(5) "ayaat" ["btn-register"]=> string(8) "Register" }

// echo $_POST["userName"];

// var_dump($_REQUEST);
// var_dump($_SERVER);


// $_SESSION ===> get data from session
// session : store data in browser 

session_start();
if (!isset($_SESSION["usersData"])) {
    $_SESSION["usersData"] = [];
}
if (isset($_POST["btn-register"])) {
    // echo "register ";
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $user = [
        "userName" => $userName,
        "userEmail" => $userEmail,
        "userPassword" => $userPassword,
    ];
    array_push($_SESSION["usersData"], $user);

    header("location:login.php?message=register successfully");
    exit;
}
// var_dump($_SESSION["usersData"]);


if (isset($_POST["btn-login"])) {
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $found = false;
        // check : userEmail , User Password already exist or not 
    /**
     * exist : login + allUsersInfo (table ==> all users data)
     * nor exist : login : error messag (check you email or password )
     */
    // var_dump($_SESSION["usersData"]);
    foreach ($_SESSION["usersData"] as $user) {
        var_dump($user);
        // echo "<br> ********* <br>";
        //  echo "login";
        if (($user['userEmail'] == $userEmail) && ($user['userPassword'] == $userPassword)) {
            $found = true;
            header("location:allUsers.php?message=login Successfully");
            exit;
            
        }
    }

    if (!$found) {
        header("location:login.php?error_message=check your email or password");
        exit;
    }
}

