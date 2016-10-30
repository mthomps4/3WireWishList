<?php
session_start();
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

  $NotesWrap = wordwrap($Notes, 20, "<br>");
}

include '../Partials/_header.php';
?>
<div class="subNav">
  <a href="/">Back To Home</a>
</div>

<div class="Container">
    <div class="detailsImage">
      <img class="" src="<?php echo "$ImageUrl"; ?>" alt="BOOM" />
    </div>

  <div class="detailsCard">
      <h3 class="detailTitle"><?php echo $Name; ?></h3>
      <p><b>From: </b><?php echo $Source . " -- " . "<a href='" . $SourceUrl . "' target='_blank'>Visit Their Website </a>"; ?></p>
      <p><b>Price: </b>$<?php echo $Price; ?></p>
      <p><b>Obtained: </b><?php if($Obtained == 0){echo "Nope.. Not yet";}else{echo "Yep, I'm one step closer";} ?></p>
      <p><b>Notes: </b><?php echo $Notes; ?></p>
  </div>
</div>




<?php
include '../Partials/_footer.php';
?>
