<?php include("db.php") ?>
<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card-header text-center">
                <h2>Nueva Tasks</h2>
            </div>
            <div class="card card-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task Title">
                    </div>
                    <div class="form-group">
                        <textarea name="descriptions" rows="5" class="form-control" placeholder="Task Descriptions"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8"></div>
    </div>
</div>

<?php include("includes/footer.php")?>

