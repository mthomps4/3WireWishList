<?php
session_start();
if(!$_SESSION["logged_in"]){
  $_SESSION['errorLoginMsg'] = "You have been logged out. Log back in to Add Item.";
  header("Location: /");
}
include '../inc/functions.php';
include '../Partials/_header.php';
?>

<h1> Admin Dashboard </h1>
<a href="../inc/logout.php"> Logout </a>
<a href="addItem.php"> Add Item </a>


  <?php
  $filter = "false";//Set Filter with DropDown Select set "" option = "false"
  $wishlist = getWishList($filter);

  echo "<table>";
  echo "<tr>";
    echo "<th> ID </th>";
    echo "<th> Name </th>";
    echo "<th> Type </th>";
    echo "<th> Image URL </th>";
    echo "<th> Source URL </th>";
    echo "<th> Price </th>";
    echo "<th> Source </th>";
    echo "<th> Notes </th>";
    echo "<th> Obtained </th>";
    echo "<th> </th>";
    echo "<th> </th>";
  echo "</tr>";
  foreach($wishlist as $item){
    echo "<tr>";
      echo "<td>". $item['ID'] ."</td>";
      echo "<td>". $item['NAME'] ."</td>";
      echo "<td>". $item['TYPE'] ."</td>";
      echo "<td>". $item['IMAGE'] ."</td>";
      echo "<td>". $item['URL'] ."</td>";
      echo "<td>". $item['PRICE'] ."</td>";
      echo "<td>". $item['SOURCE'] ."</td>";

      $ShortNotes = substr($item['NOTES'], 0, 30);

      echo "<td>". $ShortNotes ." ... </td>";

      //echo "<td>". $item['OBTAINED'] ."</td>";
      if($item['OBTAINED'] == true){
        echo "<td> Yes </td>";
      }elseif($item['OBTAINED'] == false) {
        echo "<td> No </td>";
      }else{
        echo "<td> NULL </td>";
      }

      echo "<td><a href='edit.php/?id=" . $item['ID'] . "'> EDIT </a> </td>";
      echo "<td><a href='delete.php/?id=" . $item['ID'] . "'> DELETE </a> </td>";
    echo "</tr>";
  }
  ?>
