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


$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$created_at = date('Y-m-d');

$sql="insert into users(name,email,phone,password,created_at) values (:name,:email,:phone,:password,:created_at)";
$sql = $db->prepare($sql);

$sql->bindParam(':name',$name,PDO::PARAM_STR, 25);
$sql->bindParam(':email',$email,PDO::PARAM_STR, 25);
$sql->bindParam(':phone',$phone,PDO::PARAM_STR,25);
$sql->bindParam(':password',$password,PDO::PARAM_STR,25);
$sql->bindParam(':created_at',$created_at,PDO::PARAM_STR);
$sql->execute();

$lastInsertId = $db->lastInsertId();
if($lastInsertId>0)
{
    header("location:../Views/main.php");  
}
else
{
    echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador </div>";
    print_r($sql->errorInfo()); 
}

?>