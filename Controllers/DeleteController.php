<?php  

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','dentidesk');
try
{
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
    exit("Error: " . $e->getMessage());
}

$id=trim($_POST['id']);
$consulta = "DELETE FROM `users` WHERE `user_id`=:id";
$sql = $db-> prepare($consulta);
$sql -> bindParam(':id', $id, PDO::PARAM_INT);
$sql->execute();

if($sql->rowCount() > 0)
{
    header("location:../Views/main.php");  
}
else{
    echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";
    print_r($sql->errorInfo()); 
}

?>