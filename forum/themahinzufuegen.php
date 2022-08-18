<?php
$titel=isset($_POST['titel']) ? $_POST['titel'] : '';
if(!empty($titel)) {
  require_once 'db.php';
  require_once 'Thema.php';
  $id=Thema::themaHinzufuegen($titel);
  header('Location:themaanzeigen.php?id='.$id);
  exit;
}
header('Location:index.php');
exit;
?>