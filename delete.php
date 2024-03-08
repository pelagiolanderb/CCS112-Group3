<?php
    include_once('connection.php');

    if (isset($_POST['id'])) {
        $taskId = $_POST['id'];
        $sql = "DELETE FROM tbltask WHERE taskId=$taskId";

        if (mysqli_query($mysqli, $sql)) {
            echo 'Task deleted successfully.';
        } else {
            echo 'Error deleting task: ' . mysqli_error($mysqli);
        }
    } else {
        echo 'Invalid request.';
    }

    mysqli_close($mysqli);
?>
