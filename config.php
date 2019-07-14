<?php 
require_once "db.php";

$data_conf = $_POST;
if (isset($data_conf['do_conf'])) {
    $sql = "CREATE TABLE IF NOT EXISTS `settings` ( 
    `ID` INT NOT NULL AUTO_INCREMENT, 
    `title` VARCHAR(40) NOT NULL,
    `descr` VARCHAR(250) NOT NULL,
    `style` TINYINT(4) NOT NULL,
    PRIMARY KEY (`ID`)
  ) ";
  $db->exec($sql);

  //create, if table is empty
  $sql = 'SELECT id FROM settings LIMIT 1';
  $result = $db->query($sql);
  if (!$result->fetch()) {
    $sql = 'INSERT INTO settings(title, descr, style) VALUES(:title, :descr, :style)';
    $query = $db->prepare($sql);
    $query->execute(['title' => $data_conf['title'], 'descr' => $data_conf['descr'], 'style' => $data_conf['style']]);
    echo '<div style="color: green;"> Settings updated </div><hr>';
  }
}

//read
$sql = $db->prepare('SELECT title, descr, style FROM settings');
$sql->execute();
$query = $sql->fetch(PDO::FETCH_ASSOC);

//update
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

//redirect
if (isset($data_conf['do_conf'])) {
  header('Location: /admin.php');
}

?>
