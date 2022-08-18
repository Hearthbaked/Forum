<?php
class Beitrag {
  var $id;
  var $thema_id;
  var $inhalt;
  var $zeitpunkt;
  var $autor;
  
  static function beitragHinzufuegen($thema_id,$inhalt,$autor) {
    global $db;
    $stmt=$db->prepare("insert into beitraege(thema_id,inhalt,autor) values(?,?,?)");
    $stmt->bind_param('iss',$thema_id,$inhalt,$autor);
    $stmt->execute();
    return $db->insert_id;
  }
  
  static function beitraegeFuerThemaLaden($thema_id) {
    global $db;
    $beitraege=array();
    $result=$db->query("SELECT * FROM `beitraege` WHERE thema_id=".$thema_id." order by zeitpunkt");
    while($row=$result->fetch_object('Beitrag')) {
      $beitraege[]=$row;
    }
    $result->free();
    return $beitraege;
  }
  
  function anzeigen() {
?>
  <div class="beitrag">
    <div class="autor"><?= $this->autor ?></div>
    <div class="zeitpunkt"><?= $this->zeitpunkt ?></div>
    <div class="inhalt"><?= nl2br($this->inhalt) ?></div>
  </div>
<?php
  }
}
?>