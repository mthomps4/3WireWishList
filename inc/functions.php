<!-- foreach($products as $row => $innerArray){
 +    $names[] = $innerArray["name"];
 +    $prices[] = $innerArray["price"];
 +
 +    echo "Name: " . $innerArray["name"] . " - Cost: " . $innerArray["price"] . "<br>";
 +  } -->

<?php

function getWishList($filter = null){
  include 'connection.php';
  echo "<br>";

  if($filter == "false"){
    $sql = "SELECT * FROM `wishlist`"; //get all
    echo $sql;
  }else{
    $sql = "SELECT * FROM `wishlist` WHERE `type`= ?"; //$filter = Select options Book,Tool,Other
    echo $sql;
  }

  try{
    $results = $db->prepare($sql);
      if(isset($filter)){
        $results->bindParam(1, $filter);
      }
    $results->execute();
  }catch(Exception $e){
    echo "Error: " . $e->getMessage() . "<br>";
    return false;
  }
  $wishlist = $results->fetchAll(PDO::FETCH_ASSOC);
  return $wishlist;

}//getWishList



function add_item($Name, $Type, $ImageURL, $SourceURL, $Price, $Source, $Notes, $Obtained){
    include 'connection.php';
    $sql = 'INSERT INTO `wishlist` (`NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
    try {
      $results = $db->prepare($sql);

      $results->bindValue(1, $Name, PDO::PARAM_STR);
      $results->bindValue(2, $Type, PDO::PARAM_STR);
      $results->bindValue(3, $ImageURL, PDO::PARAM_STR);
      $results->bindValue(4, $SourceURL, PDO::PARAM_STR);
      $results->bindValue(5, $Price, PDO::PARAM_STR);
      $results->bindValue(6, $Source, PDO::PARAM_STR);
      $results->bindValue(7, $Notes, PDO::PARAM_STR);
      $results->bindValue(8, $Obtained, PDO::PARAM_INT);

      $results->execute();
    } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br>";
      return false;
    }
    return true;
  }//Add_item

function get_item($id){
    //Get and set ThisTask
    include 'connection.php';
      $sql = 'SELECT * FROM `wishlist` WHERE `id` = ?';
      try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $id, PDO::PARAM_INT);
        $results->execute();
      } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br>";
        return false;
      }
      return $results->fetch();
    }//get_item

function update_item($Name, $Type, $ImageUrl, $SourceUrl, $Price, $Source, $Notes, $Obtained,$id){
  include 'connection.php';
  $sql = "UPDATE `wishlist`
          SET `NAME`= '$Name',
              `TYPE` = '$Type',
              `IMAGE` = '$ImageUrl',
              `URL` = '$SourceUrl',
              `PRICE` = '$Price',
              `SOURCE` = '$Source',
              `NOTES` = '$Notes',
              `OBTAINED` = '$Obtained'
          WHERE `ID` = $id";
  try{
    $results = $db->prepare($sql);
    $results->execute();
  }catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br>";
    return false;
  }
  return header('Location: ../adminIndex.php');
}

function delete_item($id){

  
}



?>
