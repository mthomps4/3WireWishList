<!-- foreach($products as $row => $innerArray){
 +    $names[] = $innerArray["name"];
 +    $prices[] = $innerArray["price"];
 +
 +    echo "Name: " . $innerArray["name"] . " - Cost: " . $innerArray["price"] . "<br>";
 +  } -->

<?php

function getWishList($filter = null){
  include './inc/connection.php';
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




?>
