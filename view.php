<?php
    include_once('connection.php');

    $sql = "select * from tbltask order by taskDeadline;";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>$row[currentDate]</td>
                    <td>$row[taskName]</td>
                    <td>$row[taskDeadline]</td>
                    <td>$row[status]</td>
                    <td>
                        <button class='action btnEdit'>Edit</button>
                        <button class='action btnDelete' data-id='$row[taskId]'>Delete</button>
                    </td>
                  </tr>";
        }
    }
    
    mysqli_close($mysqli);
?>