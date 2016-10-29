<?php
session_start();
require './inc/functions.php';
include './Partials/_header.php';
?>

<?php
  if(isset($_SESSION['errorLoginMsg'])){
    echo"<h4>". $_SESSION['errorLoginMsg'] . "</h4>";
    session_unset($_SESSION['errorLoginMsg']);
  }
?>

<div>
  <button><a href="./Views/login.php">Admin Login</a></button>
  <!-- //If Logged in ... Swap Button for "Add Item" -->
</div>

<div>
  <h2> Content </h2>
  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

  <?php
  $filter = "false";//Set Filter with DropDown Select set "" option = "false"
  $wishlist = getWishList($filter);
  foreach($wishlist as $item){
    echo "<p>". $item['NAME'] ."</p>";
  }
  ?>
</div>


<?php
include './Partials/_footer.php';
?>
