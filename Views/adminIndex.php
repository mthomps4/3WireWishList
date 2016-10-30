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

<div class="AddNav">
  <h1> Admin Dashboard </h1>
  <a href="addItem.php"><button class="addButton"> Add Item </button></a>
</div>

<div id="Filter">
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
    echo "<th class='noShow3'> Id </th>";
    echo "<th class='noShow3'> Image </th>";
    echo "<th> Name </th>";
    // echo "<th> Type </th>";
    echo "<th class='noShow'> Source URL </th>";
    echo "<th class='noShow4'> Price </th>";
    echo "<th class='noShow2'> Source </th>";
    echo "<th class='noShow2'> Notes </th>";
    echo "<th class='noShow3'> Obtained </th>";
    echo "<th> </th>";
    echo "<th> </th>";
  echo "</tr>";
  foreach($wishlist as $item){
    echo "<tr>";
      echo "<td class='noShow3'>". $item['ID'] ."</td>";
      echo "<td class='noShow3'><img src= '". $item['IMAGE'] ."' width=50px height=50px/></td>";
      echo "<td>". $item['NAME'] ."</td>";
      echo "<td class='noShow'>". substr($item['URL'],0,20) ."</td>";
      echo "<td class='noShow4'>". $item['PRICE'] ."</td>";
      echo "<td class='noShow2'>". $item['SOURCE'] ."</td>";
      echo "<td class='noShow2'>". substr($item['NOTES'], 0, 30) ."</td>";

      //echo "<td>". $item['OBTAINED'] ."</td>";
      if($item['OBTAINED'] == true){
        echo "<td class='noShow3'> Yes </td>";
      }elseif($item['OBTAINED'] == false) {
        echo "<td class='noShow3'> No </td>";
      }else{
        echo "<td class='noShow3'> NULL </td>";
      }

      echo "<td><button class='editButton'><a href='edit.php/?id=" . $item['ID'] . "'> Edit </a></button></td>";
      echo "<td><button class='deleteButton'><a href='delete.php/?id=" . $item['ID'] . "'> Delete </a></button> </td>";
    echo "</tr>";
  }
  ?>

</div>
