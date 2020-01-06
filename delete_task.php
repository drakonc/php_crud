<?php 
    include("db.php");  
    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM task WHERE id = $id";

        $result = mysqli_query($conn,$query);
        
        if($result){   
            while($row = mysqli_fetch_array($result)){
                $id = $row['id']; 
                
                $query = "DELETE FROM task WHERE id = $id";
                $result = mysqli_query($conn,$query);

                if(!$result){
                    $_SESSION['message'] = "Query Faild";
                    $_SESSION['message_type'] = "danger";
                    header ("Location: index.php"); 
                }
                else {    
                    $_SESSION['message'] = "Task Removed Successfully";
                    $_SESSION['message_type'] = "success";
                    header ("Location: index.php");   
                }
            }
        }
        else{
            $_SESSION['message'] = "Task ID Does Not Exist";
            $_SESSION['message_type'] = "danger";

            header ("Location: index.php"); 
        }
    }
    else{
        $_SESSION['message'] = "Task ID Can't Go Blank";
        $_SESSION['message_type'] = "danger";

        header ("Location: index.php"); 
    }
?>