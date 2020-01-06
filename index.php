<?php include("db.php") ?>
<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])) {?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); }?>
            <div class="card border border-primary">
                <div class="card-header text-center bg-primary text-white">
                    <h2>Nueva Tasks</h2>
                </div>
                <div class="card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="5" class="form-control" placeholder="Task Descriptions"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM task ORDER BY id";
                            $result_tasks = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?= $row['title']; ?></td>
                                <td><?= $row['descriptions']; ?></td>
                                <td><?= $row['create_at']; ?></td>
                                <td>
                                    <a href="edit_task.php?id=<?= $row['id'];?>" class="btn btn-primary"><i class="fas fa-marker"></i></a>
                                    <a href="delete_task.php?id=<?= $row['id'];?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            
                        <?php } ?>

                        
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>

