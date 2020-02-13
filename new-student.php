<?php
    //Turn on error reporting -- this is critical!
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRC Student</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>

    <div class="container">
    <h3>Add a New Student</h3>

    <form id="student-form" action="add-student.php" method="post">

        <div class="form-group">
            <label for="sid">SID</label>
            <input type="text" class="form-control"
                   id="sid" name="sid">
        </div>
        <div class="form-group">
            <label for="firstName">First name</label>
            <input type="text" class="form-control"
                   id="firstName" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control"
                   id="lastName" name="lastName">
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="text" class="form-control"
                   id="birthdate" name="birthdate">
        </div>
        <div class="form-group">
            <label for="gpa">GPA</label>
            <input type="text" class="form-control"
                   id="gpa" name="gpa">
        </div>
        <div class="form-group">
            <label for="advisor">Advisor</label>
            <select id="advisor" name="advisor">
                <option value="none">--Select--</option>

                <?php
                    //Connect to database
                    require('/home/tostrand/db2.php');

                    //Write query
                    $sql = "SELECT advisor_id as id, advisor_last as last, advisor_first as first
                            FROM advisor";

                    //Send query to database and get result
                    $result = mysqli_query($cnxn, $sql);

                    //Process result
                    foreach ($result as $row) {

                        //Get the row data
                        $id = $row['id'];
                        $first = $row['first'];
                        $last = $row['last'];

                        echo "<option value='$id'>$last, $first</option>";
                    }

                ?>

            </select>
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            Submit
        </button>

    </form>
    </div>

    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
