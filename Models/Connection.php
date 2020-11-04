<?php  

 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "dentidesk";  
 
 try  
 {  
      $db = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  

           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                echo $message = "Debe introducir todos los datos";  
           }  
           else  
           {  
                $query = "SELECT * FROM users WHERE email = :email AND password = :password";  
                $statement = $db->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'        =>     $_POST["email"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                    $_SESSION["email"] = $_POST["email"];  
                    header("location:../Views/main.php");  
                }  
                else  
                {  
                    echo "Datos invalidos" ;
                    $message = '<label> Datos invalidos </label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  


?>  