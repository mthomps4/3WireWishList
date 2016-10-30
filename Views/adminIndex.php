<?php
session_start();
if(!$_SESSION["logged_in"]){
  $_SESSION['errorLoginMsg'] = "You have been logged out. Log back in to Add Item.";
  header("Location: /");
}

$filter = "false";//Set Filter with DropDown Select set "" option = "false"
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $filter = trim(filter_input(INPUT_POST, 'Filter', FILTER_SANITIZE_STRING));
}

include '../inc/functions.php';
include '../Partials/_header.php';
?>

<div class=subNav>
  <a href="/"> Back to Home </a>
</div>

<div class="Container">

<div id="Filter">
  <h1> Admin Dashboard </h1>
  <button class="addButton"><a href="addItem.php"> Add Item </a></button>
  <p>Filter Results:</p>
      <form method='post' action='#'>
          <select name="Filter">
            <option value='false'<?php if($filter == "false"){echo ' selected';}?>>All</option>
            <option value='Books'<?php if($filter == "Books"){echo ' selected';}?>>Books</option>
            <option value='Tool'<?php if($filter == "Tool"){echo ' selected';}?>>Tools</option>
            <option value='Other'<?php if($filter == "Other"){echo ' selected';}?>>Other</option>
          </select>
        <input name="submit" type="submit" value="Go!">
      </form>
</div>

<?php
  $wishlist = getWishList($filter);

  echo "<table id='AdminTable'>";
  echo "<tr>";
    echo "<th> Id </th>";
    echo "<th> Image </th>";
    echo "<th> Name </th>";
    // echo "<th> Type </th>";
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
      echo "<td><img src= '". $item['IMAGE'] ."' width=50px height=50px/></td>";
      echo "<td>". $item['NAME'] ."</td>";
      // echo "<td>". $item['TYPE'] ."</td>";
      // echo "<td><img src= '". $item['IMAGE'] ."' width=50px /></td>";
      echo "<td>". substr($item['URL'],0,20) ."</td>";
      echo "<td>". $item['PRICE'] ."</td>";
      echo "<td>". $item['SOURCE'] ."</td>";
      echo "<td>". substr($item['NOTES'], 0, 30) ."</td>";

      //echo "<td>". $item['OBTAINED'] ."</td>";
      if($item['OBTAINED'] == true){
        echo "<td> Yes </td>";
      }elseif($item['OBTAINED'] == false) {
        echo "<td> No </td>";
      }else{
        echo "<td> NULL </td>";
      }

      echo "<td><button class='editButton'><a href='edit.php/?id=" . $item['ID'] . "'> Edit </a></button></td>";
      echo "<td><button class='deleteButton'><a href='delete.php/?id=" . $item['ID'] . "'> Delete </a></button> </td>";
    echo "</tr>";
  }
  ?>

</div>
