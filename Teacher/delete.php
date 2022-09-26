<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Teacher;

$id = $_GET['id'];
$teacher = new Teacher('');
$teacher->setConnection($connection);
$teacher->getById($id);
$teacher->delete();
header("Location: index.php");
exit();

?>