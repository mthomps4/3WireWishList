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

  $filter = "false";//Set Filter with DropDown Select set "" option = "false"
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $filter = trim(filter_input(INPUT_POST, 'Filter', FILTER_SANITIZE_STRING));
  }



?>


<div id="Filter">
  <h1></h1>
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


<div class="Container">
  <div class="Cards">
    <?php
    $wishlist = getWishList($filter);
    foreach($wishlist as $item){
      echo "<div class='itemCard'>";
        echo "<div class='imageWrap'><img class='cardImage' src='". $item['IMAGE'] . "' /></div>";
        echo "<h4 class='cardTitle'>" . $item['NAME'] . "</h4>";

        echo "<div class='cardInfo'>";
              if($item['TYPE'] == "Books"){
              echo "<p><b>Author: </b>". $item['SOURCE'] ."</p>";
            }elseif($item['TYPE'] == "Tool"){
              echo "<p><b>Maker: </b>". $item['SOURCE'] ."</p>";
            }else{
              echo "<p><b>Creator: </b>". $item['SOURCE'] ."</p>";
            }
            echo "<p><b>Price: </b>$". $item['PRICE'] ."</p>";
            echo "<a class='cardSourceSite' href='". $item['URL'] . "' target='_blank'>View Website</a>";
            echo "<a class='cardMoreDetails' href='../Views/details.php/?id=" . $item['ID'] . "'>More Details</a>";
        echo "</div>"; //cardInfo
      echo "</div>";//itemCard
    }
    ?>
  </div>
</div>


<?php
include './Partials/_footer.php';
?>
