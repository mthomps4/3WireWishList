<?php
session_start();
if(!$_SESSION["logged_in"]){
  $_SESSION['errorLoginMsg'] = "You have been logged out. Log back in to Add Item.";
  header("Location: /");
}
include '../inc/functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $Name = trim(filter_input(INPUT_POST, 'NAME', FILTER_SANITIZE_STRING));
  $Type = trim(filter_input(INPUT_POST, 'TYPE', FILTER_SANITIZE_STRING));
  $ImageUrl = trim(filter_input(INPUT_POST, 'IMAGEURL', FILTER_SANITIZE_STRING));
  $SourceUrl = trim(filter_input(INPUT_POST, 'SOURCEURL', FILTER_SANITIZE_STRING));
  $Price = trim(filter_input(INPUT_POST, 'PRICE', FILTER_SANITIZE_STRING));
  $Source = trim(filter_input(INPUT_POST, 'SOURCE', FILTER_SANITIZE_STRING));
  $Notes = trim(filter_input(INPUT_POST, 'NOTES', FILTER_SANITIZE_STRING));

  if(isset($_POST['OBTAINED'])){
    $Obtained = 1;
  }else{
    $Obtained = 0;
  }


  //ADD ITEM
    if (empty($Name) || empty($Type) || empty($Price) || empty($SourceUrl)){
      $error_message = 'Please fill in the required fileds: Name, Type, Price, and SourceURL';
    }else{
      if(add_item($Name, $Type, $ImageUrl, $SourceUrl, $Price, $Source, $Notes, $Obtained)){
        header('Location: ../Views/adminIndex.php');
        exit;
      }else{
        $error_message='Could not add project.';
      }
    }
}//IF POST


include '../Partials/_header.php';
?>

<?php if(isset($error_message)){echo"<h4>". $error_message . "</h4>";}?>


<div class=subNav>
  <a href="adminIndex.php">Back to list</a>
</div>


<div class="Container">
<h1> Add Item </h1>


<form class="entryForm" method="post" action="#">

  <label for="NAME"> Name </label>
    <input type="text" id="NAME" name="NAME" value="" placeholder="Name">
    <br>

  <label for="TYPE"> Type </label>
      <select class="selectBox" id="TYPE" name="TYPE">
        <option value="false">Select One</option>
        <option value="Books">Books</option>
        <option value="Tools">Tools</option>
        <option value="Other"> Other </option>
      </select>
      <br>

  <label for="IMAGEURL"> Image URL </label>
    <input type="text" id="IMAGEURL" name="IMAGEURL" value="" placeholder="http://www.abc.com/image.jpg">
    <br>

  <label for="SOURCEURL"> Source URL </label>
    <input type="text" id="SOURCEURL" name="SOURCEURL" value="" placeholder="http://www.something.com/">
    <br>

  <label for="PRICE"> Price </label>
    <input type="number" id="PRICE" name="PRICE" min="0" max="9999" step="0.01" size="4" />
    <br>

  <label for="SOURCE"> Source/Author </label>
    <input type="text" id="SOURCE" name="SOURCE" value="" placeholder="Lee Valley Tools">
    <br>

  <label for="NOTES">Notes: </label>
    <textarea id="NOTES" name="NOTES" rows="5" cols="50"></textarea>
    <br>

  <label for="OBTAINED"> Obtained </label>
    <input class="checkbox" type="checkbox" id="OBTAINED" name="OBTAINED"/>
    <br>

  <input class="submitButton" type="submit" value="Add Item" />
</form>

</div>
<?php
include '../Partials/_footer.php';
?>
