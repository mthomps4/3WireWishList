<?php
session_start();
include('../inc/connection.php'); // Includes Login Script


if (isset($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['errorLoginMsg'] = "Username or Password is empty.";
  }
  else
    {
      // Define $username and $password
      $username= $_POST['username'];
      $password= $_POST['password'];
      $password= md5($password);

      $sql="SELECT `password` FROM `admin-user` WHERE `username` = ? LIMIT 1";

      try {
      $results = $db->prepare($sql);
      $results->bindParam(1,$username, PDO::PARAM_STR);
      $results->execute();
      } catch(Exception $e){
        echo "Error!: " . $e->getMessage() . "<br>";
       return false;
      }
        $DataPassword = $results->fetch(PDO::FETCH_ASSOC);
        $DataPassword = md5($DataPassword['password']);


        if($password === $DataPassword)
        {
          $_SESSION['logged_in'] = true;
          $_SESSION['username'] = $username;
          header("Location: ../Views/adminIndex.php");
        }
        else{
          $_SESSION['logged_in'] = false;
          $_SESSION['errorLoginMsg'] = "Username and Password do not match!";
          header("Location: ../Views/login.php");
        }
    }//else
  }//if empty

include '../Partials/_header.php';
?>


<h1> Login </h1>
<a href="/"> back to home </a>

<div id="login">

<h2>Login Form</h2>

<?php
  if(isset($_SESSION['errorLoginMsg'])){
      echo "<h4>" . $_SESSION['errorLoginMsg'] . "</h4>";
  }
?>

    <form action="#" method="post">
    <label>UserName :</label>
    <input id="username" name="username" placeholder="username" type="text">
    <label>Password :</label>
    <input id="password" name="password" placeholder="**********" type="password">
    <input name="submit" type="submit" value=" Login ">
    </form>


</div>
