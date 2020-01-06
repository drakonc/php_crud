<?php 
    include("db.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $titulo = $row['title'];
            $descripcion = $row['descriptions'];
        }
    }

    if (isset($_POST['update'])){
        $id = $_GET['id'];
        $titulo = $_POST['title'];
        $descripcion = $_POST['description'];

        $query = "UPDATE task SET title = '$titulo' ,descriptions = '$descripcion' WHERE id = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            $_SESSION['message'] = "Query Faild";
            $_SESSION['message_type'] = "danger";
            header ("Location: index.php");
        }
        else{

            $_SESSION['message'] = "Task Update Successfully";
            $_SESSION['message_type'] = "success";

            header ("Location: index.php"); 
        }
    }

?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card border border-primary">
                    <div class="card-header text-center bg-primary text-white">
                        <h2>Editando Tasks</h2>
                    </div>
                    <div class="card-body">
                        <form action="edit_task.php?id=<?= $id;?>" method="POST">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Task Title" value="<?= $titulo;?>">
                            </div>
                            <div class="form-group">
                                <textarea name="description" rows="5" class="form-control" placeholder="Task Descriptions"><?= $descripcion;?></textarea>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="update" value="Update Task">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>