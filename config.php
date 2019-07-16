<?php 
require_once "db.php";

$data_conf = $_POST;

    //check if table is empty
  function tableExists($db, $table = 'settings') {
    try {
      $result = $db->query("SELECT 1 FROM $table LIMIT 1"); 
    } catch (Exception $e) {
      return false;
    }
    return $result == true;
  }


if (isset($data_conf['do_conf'])) {
    $sql = "CREATE TABLE IF NOT EXISTS `settings` ( 
    `ID` INT NOT NULL AUTO_INCREMENT, 
    `title` VARCHAR(40) DEFAULT 'Landing',
    `descr` VARCHAR(250) DEFAULT 'This is a landing page',
    `style` TINYINT(4) DEFAULT '2',
    PRIMARY KEY (`ID`)
  ) ";
  $db->exec($sql);
  
    //if table is empty - create table, else - show data
  if (($table=tableExists($db, 'settings')) == true) {
    $result = $db->query("SELECT 1 FROM settings LIMIT 1");
    if (!$result->fetch()) {
      $sql = 'INSERT INTO settings(title, descr, style) VALUES(:title, :descr, :style)';
      $query = $db->prepare($sql);
      $query->execute(['title' => $data_conf['title'], 'descr' => $data_conf['descr'], 'style' => $data_conf['style']]);
      echo '<div style="color: green;"> Settings updated </div><hr>';
    } 
 
  }       //update
    $sql = $db->prepare(
      'UPDATE settings 
      SET title = :title, 
      descr = :descr,
      style = :style'
    );

    $sql->bindParam(':title', $data_conf['title']);
    $sql->bindParam(':descr', $data_conf['descr']);
    $sql->bindParam(':style', $data_conf['style']);
    $sql->execute();

} 

//read
if (($table=tableExists($db, 'settings')) == true) {
 
    $sql = $db->prepare('SELECT title, descr, style FROM settings');
    $sql->execute();
    $query = $sql->fetch(PDO::FETCH_ASSOC); 
}
//redirect
if (isset($data_conf['do_conf'])) {
  header('Location: /admin.php');
}

?>
