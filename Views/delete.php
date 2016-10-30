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

  if(isset($_POST['ID'])){
  include '../inc/connection.php';
  $id = trim(filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_STRING));
     $sql= "DELETE FROM `wishlist`
          WHERE `ID` = $id
          LIMIT 1";
    try{
      $results = $db->prepare($sql);
      $results->execute();
    } catch(Exception $e){
      echo "Error!: " . $e->getMessage(). "<br>";
    }
    header('Location: ../adminIndex.php');
}




  include '../Partials/_header.php';
  ?>

  <?php if(isset($error_message)){echo"<h4>". $error_message . "</h4>";}?>

  <div class=subNav>
    <a href="../adminIndex.php">Back to list</a>
  </div>


  <div class="Container">

  <h1 id="deleteH1"> Would you like to delete this item?</h1>

<div>
  <table class="deleteTable">
    <tr>
      <td><b>Name: </b></td>
      <td><?php echo $Name; ?></td>
    </tr>

    <tr>
      <td><b>Type: </b></td>
      <td><?php echo $Type; ?> </td>
    </tr>

    <tr>
      <td><b>Image URL: </b></td>
      <td><?php echo substr($ImageUrl,0,30). "..."; ?> </td>
    </tr>

    <tr>
      <td><b>Source URL: </b></td>
      <td><?php echo substr($SourceUrl,0,30) . "..."; ?> </td>
    </tr>

    <tr>
      <td><b>Price: </b></td>
      <td><?php echo $Price; ?> </td>
    </tr>

    <tr>
      <td><b>Maker/Author: </b></td>
      <td><?php echo $Source; ?> </td>
    </tr>

    <tr>
      <td><b>Notes: </b></td>
      <td><?php echo substr($Notes,0,50) . "..."; ?> </td>
    </tr>

    <tr>
      <td><b>Obtained: </b></td>
      <td><?php echo $Obtained; ?> </td>
    </tr>

  </table>
</div>

<div class="confirm">
  <form method="post" action="#">
    <input type="hidden" value="<?php echo $id; ?>" name="ID" />
    <button class="confirmDelete" type='submit'>Yes, Delete</button>
  </form>

  <a href="../adminIndex.php"><button class="cancelDelete" >No, Cancel</button></a>
</div>

</div>
  <?php
  include '../Partials/_footer.php';
  ?>
