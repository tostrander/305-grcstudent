<?php
/**
 *  305/students.php reads students from a database
 *  Tina Ostrander
 *  Feb 11, 2020
 *
 */

    //Turn on error reporting -- this is critical!
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Connect to db
    require('/home/tostrand/db2.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRC Student Summary</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
<div class="container">

    <h3>Student Summary</h3>

    <table id="student-table">
        <thead>
            <tr>
                <th>SID</th>
                <th>Name</th>
                <th>GPA</th>
            </tr>
        </thead>

    <?php

        //Define a query
        $sql = "SELECT * FROM student";

        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        //Process the result
        foreach ($result as $row) {
            //var_dump($row);

            $sid = $row['sid'];
            $first = $row['first'];
            $last = $row['last'];
            $gpa = $row['gpa'];
            $birthdate = $row['birthdate'];

            echo "<tr>
                    <td>$sid</td>
                    <td>$first $last</td>
                    <td>$gpa</td>
                  </tr>";
        }

    ?>
    </table>
</div>


<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $('#student-table').DataTable();
</script>
</body>
</html>