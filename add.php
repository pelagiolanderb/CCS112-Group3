<?php
    include_once('connection.php');

    $sql = mysqli_query($mysqli, "select max(taskId) as taskId from tbltask;");
    $fetch_id = mysqli_fetch_assoc($sql);

    $taskId = isset($fetch_id['taskId']) ? $fetch_id['taskId'] + 1 : 1001;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $taskName = $_POST['task-name'];
        $taskDeadline = $_POST['task-deadline'];

        $sql = "INSERT INTO tbltask VALUES ($taskId, '$taskName', '$taskDeadline', NOW(), 'In Progress');";

        if (mysqli_query($mysqli, $sql)) {
            echo 'Task added successfully.';
        } else {
            echo 'Error adding task: ' . mysqli_error($mysqli);
        }
    }

    mysqli_close($mysqli);
?>