<!doctype html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
      <link rel="stylesheet" href="../../Styles/main.css">
      <link rel="stylesheet" href="../../Styles/mediabreaks.css">
</head>
<body>

<hr>
<header>
    <h1> 3Wire Wish List </h1>

    <?php
    if(isset($_SESSION['logged_in'])){
      echo "<a style='margin-right:2%' href='../../Views/adminIndex.php'><button>Dashboard</button></a>";
      echo "<a href='../../inc/logout.php'><button>Logout</button></a>";
      }else{
      echo "<a href='../../Views/login.php'><button>Admin Login</button></a>";
      }
    ?>
</header>
<hr>
