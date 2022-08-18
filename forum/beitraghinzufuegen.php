<?php
$thema_id=isset($_POST['thema_id']) ? (int)$_POST['thema_id'] : 0;
if(empty($thema_id)) {
  header('Location:index.php');
  exit;
}
$inhalt=isset($_POST['inhalt']) ? str_replace("\r","\n",str_replace("\r\n","\n",$_POST['inhalt'])) : '';
if(empty($inhalt)) {
  header('Location:themaanzeigen.php?id='.$thema_id);
  exit;
}
$autor=isset($_POST['autor']) ? $_POST['autor'] : '';
if(empty($autor)) {
  header('Location:themaanzeigen.php?id='.$thema_id);
  exit;
}

require_once 'db.php';
require_once 'Beitrag.php';
Beitrag::beitragHinzufuegen($thema_id,$inhalt,$autor);

header('Location:themaanzeigen.php?id='.$thema_id);
exit;
?>