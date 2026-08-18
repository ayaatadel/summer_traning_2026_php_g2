<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
</head>
<body>
    <?php  require "./home.php";
    
    if(isset($_GET["message"]))
        {
         echo "<p class=' mt-5 alert alert-success w-75 m-auto text-center'>". $_GET["message"]."</p>";
        }
    ?>
    <section class="m-3">
 <form action="server.php" method="post" class="border border-primary w-75 m-auto p-5">
    <input  class="form-control  m-3" type="email" name="userEmail" id="" placeholder="Enter Your Email">
    <input  class="form-control  m-3" type="password" name="userPassword" id="" placeholder="Enter Your Password">
    <input class="btn btn-primary" type="submit" value="login" name="btn-login" >
</form>
    </section>
</body>
</html>