<?php
    session_start();
    $success = 0;
    $id=$_GET['editid'];
    include 'config.php';
    echo $id;
    $select_sql = "SELECT * FROM tasks WHERE task_id=$id";
    $result = mysqli_query($conn,$select_sql);
    $row = mysqli_fetch_assoc($result);
    $task_name = $row['task_name'];
    $task_description = $row['task_description'];

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $task_name = $_POST['title'];
        $task_description = $_POST['description'];
        
        $update_sql = "UPDATE tasks SET task_id='$id', task_name='$task_name', task_description='$task_description' WHERE task_id=$id";
        // result
        $result = mysqli_query($conn,$update_sql);
        if($result){
            // echo "Teacher successfully inserted";
            header('location:tasks.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit task</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <div class="dash">
            <div class="row">
                <div class="col-md-3">
                    <?php include('menu.php')?>
                </div>
                <div class="col-md-9">
                    <div class="content">
                        <!-- <div class="row">
                            <a href="add_task.php">
                                <button type="button" class="btn btn-primary">
                                    Add Task
                                </button>
                            </a>
                        </div> -->
                        <div class="row text">
                            <form method="POST" style="height:10px;">
                                <input type="text" name="title" placeholder="Task Title" required class="form-control mb-3" value="<?php echo $task_name ?>">
                                <textarea name="description" placeholder="Task Description" class="form-control mb-3" value=""><?php echo $task_description ?></textarea>
                                <button type="submit" name="task" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>