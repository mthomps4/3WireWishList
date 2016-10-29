<?php
session_start();
if(!$_SESSION["logged_in"]){
  $_SESSION['errorLoginMsg'] = "You have been logged out. Log back in to Add Item.";
  header("Location: /");
}

include '../inc/functions.php';

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $results = get_item($id);

  $Name = $results['NAME'];
  $Type = $results['TYPE'];
  $ImageUrl = $results['IMAGE'];
  $SourceUrl = $results['URL'];
  $Price = $results['PRICE'];
  $Source = $results['SOURCE'];
  $Notes = $results['NOTES'];
  $Obtained = $results['OBTAINED'];

}

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
      if(update_item($Name, $Type, $ImageUrl, $SourceUrl, $Price, $Source, $Notes, $Obtained, $id)){
        exit;
      }else{
        echo "Trouble saving item.";
        }
      }
}//IF POST


include '../Partials/_header.php';
?>

<?php if(isset($error_message)){echo"<h4>". $error_message . "</h4>";}?>

<h1> Edit Item </h1>
<a href="../adminIndex.php">Back to list</a>
<a href="../inc/logout.php">Logout</a>


<form method="post" action="#">

  <label for="NAME"> Name </label>
    <input type="text" id="NAME" name="NAME" value="<?php echo $Name ?>" placeholder="Name">
    <br>

  <label for="TYPE"> Category </label>
      <select id="TYPE" name="TYPE">
        <option value="false" <?php if($Type == "false"){echo " selected";}?>>Select One</option>
        <option value="Books"<?php if($Type == "Books"){echo " selected";}?>>Books</option>
        <option value="Tools"<?php if($Type == "Tools"){echo " selected";}?>>Tools</option>
        <option value="Other" <?php if($Type == "Other"){echo " selected";}?>> Other </option>
      </select>
      <br>

  <label for="IMAGEURL"> Image URL </label>
    <input type="text" id="IMAGEURL" name="IMAGEURL" value="<?php echo $ImageUrl ?>" placeholder="http://www.abc.com/image.jpg">
    <br>

  <label for="SOURCEURL"> Source URL </label>
    <input type="text" id="SOURCEURL" name="SOURCEURL" value="<?php echo $SourceUrl ?>" placeholder="http://www.something.com/">
    <br>

  <label for="PRICE"> Price </label>
    <input type="number" id="PRICE" name="PRICE" min="0" max="9999" step="0.01" size="4" value="<?php echo $Price ?>"/>
    <br>

  <label for="SOURCE"> Source/Author </label>
    <input type="text" id="SOURCE" name="SOURCE" value="<?php echo $Source ?>" placeholder="Lee Valley Tools">
    <br>

  <label for="NOTES">Notes: </label>
    <textarea id="NOTES" name="NOTES" rows="5" cols="50"><?php echo $Notes ?></textarea>
    <br>

  <label for="OBTAINED"> Obtained </label>
    <input type="checkbox" id="OBTAINED" name="OBTAINED" <?php if($Obtained == 1){echo " checked";}?>/>
    <br>

  <input type="submit" value="Save Item" />
</form>


<?php
include '../Partials/_footer.php';
?>
