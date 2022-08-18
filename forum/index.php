<?php
require_once 'db.php';
require_once 'Thema.php';
//:: erreicht die static Funktion alleLaden() der Klasse Thema.
$themen=Thema::alleLaden();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="styles.css" />
  <title>Forum - Themen</title>
</head>
<body>
<h1>Forum - Themen</h1>
<table border="1" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <th>Titel</th>
  </tr>
<?php
foreach($themen as $thema) {
?>
  <tr>
    <td><?php $thema->linkGenerieren(); ?></td>
  </tr>
<?php
}
?>
</table>
<form action="themahinzufuegen.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
Neues Thema:<br />
Titel:&nbsp;<input type="text" name="titel" value="" style="width:500px;" />
<input type="submit" value="Hinzufügen" />
</form>
</body>
</html>