<?php

session_start();
if (!isset($_SESSION['email']))
{
    header("location:../index.php");  
}


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


?>    

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Vendor/css/style.css">
    <title>DentiDesk</title>
  </head>
    <div class="container">
        
        <div class="row">
            <div class="col">
                <img src="../Vendor/img/logo.png" />
            </div>
            <div class="col text-right">
                <?php echo "User: ".$_SESSION['email'] ?>
            </div>
        </div>

        <div class="row" style="margin-top: 3em;">
            <div class="col-md-6 text-left">
                <a href="create.php">
                    <button type="button" class="btn btn-primary">  Crear Nuevo  </button>
                </a>    
            </div>   
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-alert"><a href="../Models/Close.php">Logout </a></button>
            </div>   
            
                    
            
            
            
        </div>    

 

        <div class="row" style="margin-top: 2em;">
            <div class="col">
            <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$sql = "SELECT * FROM users"; 
$query = $db -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo "<tr>
<td>".$result -> user_id."</td>
<td>".$result -> name."</td>
<td>".$result -> email."</td>
<td>".$result -> phone."</td>

<td>
<form  onsubmit=\"return confirm('Realmente desea eliminar el registro?');\" method='POST' action='../Controllers/DeleteController.php'>
<input type='hidden' name='id' value='".$result -> user_id."'>
<button name='eliminar'>Eliminar</button>
</form>
</td>
</tr>";

   }
 }
?>
</tbody>
                    </table>
                    </tbody>
                    </table>
            </div>
        </div>




   </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>