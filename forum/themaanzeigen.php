<?php
//ID des Themas vom Nutzer bekommen
$id=isset($_GET['id']) ? (int)$_GET['id'] : 0;
if(empty($id)) {
  //keine valide ID von der URL bekommen: zurück zur Liste
  header('Location:index.php');
  exit;
}
//Thema aus der DB laden
require_once 'db.php';
require_once 'Thema.php';
require_once 'Beitrag.php';

$thema=Thema::einesLaden($id);
if(empty($thema)) {
  //Kein Thema mit dieser ID in der DB: zurück zur Liste
  header('Location:index.php');
  exit;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="styles.css" />
  <title>Forum - <?= $thema->titel ?></title>
</head>
<body>
<?php $thema->anzeigen(); ?>
<form action="beitraghinzufuegen.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
<input type="hidden" name="thema_id" value="<?= $thema->id ?>" />
Neuer Beitrag:<br />
Autor:&nbsp;<input type="text" name="autor" value="" /><br />
Inhalt:<br />
<textarea name="inhalt" style="width:400px;height:200px;"></textarea><br />
<input type="submit" value="Hinzufügen" />
</form>
</body>
</html>