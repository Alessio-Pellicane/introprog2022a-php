<?php
  // Import du tableau
  require_once("php/array-fellowship.php");
  // Import du Header
  include("common/header.php");
?>

<section class="gallery-grid">
  <?php $borderColor = "bkgr-default" ?>
  <?php foreach($fellowshipList as $key => $value):?>
    <figure class="gallery-frame <?php echo  $borderColor; ?>">
    <h2><?php echo ($value["nom"]); ?></h2>
    <h3><?php echo ($value["origine"]) . "-" . ($value["age"]) . "ans"; ?></h2>
    <?php  echo "<div class=\"gallery-img\"><img src=\"assets/img/" . $value["url-img"]  . "\" alt=\"" . $value["nom"] . "\"></div>"; ?>
    <div class="quote"> <?php echo ($value["citation"]); ?></div>
    </figure >
  <?php endforeach; ?>
</section>

<?php
  // Import du Footer
  include("common/footer.php");
?>