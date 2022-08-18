<?php
class Thema {
  // Dies ist nur Info für den nächsten Programmierer,
  // die Variablen werden von fetch_object() angelegt und initialisiert.
  var $id;
  var $titel;
  
  // Variablen werden von fetch_object() aus der DB initialisiert:
  // Kein Konstruktor nötig.
  // Wenn wir einen Konstruktor bräuchten, dürfte er keine Parameter haben,
  // damit fetch_object() ihn aufrufen kann.
  
  static function themaHinzufuegen($titel) {
    global $db;
    $stmt=$db->prepare("insert into themen(titel) values(?)");
    $stmt->bind_param('s',$titel);
    $stmt->execute();
    return $db->insert_id;
  }
  
  static function alleLaden() {
    global $db;
    $themen=array();
    $result=$db->query("select * from themen");
    while($thema=$result->fetch_object('Thema')) {
      $themen[]=$thema;
    }
    $result->free();
    return $themen;
  }
  
  static function einesLaden($id) {
    global $db;
    $result=$db->query("select * from themen where id=".$id." limit 1");
    $thema=$result->fetch_object('Thema');
    $result->free();
    
    if(empty($thema)) {
      return null;
    }
    $thema->beitraege=Beitrag::beitraegeFuerThemaLaden($thema->id);
    
    return $thema;
  }
  
  function linkGenerieren() {
?>
    <a href="themaanzeigen.php?id=<?= $this->id ?>"><?= $this->titel ?></a>
<?php
  }
  
  function anzeigen() {
    echo '<h1>'.$this->titel.'</h1>';
    foreach($this->beitraege as $beitrag) {
      $beitrag->anzeigen();
    }
  }
}
?>