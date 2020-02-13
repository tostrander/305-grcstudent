<?php

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";
array(6) {
    ["sid"]=>
  string(1) "a"
    ["firstName"]=>
  string(1) "b"
    ["lastName"]=>
  string(1) "c"
    ["birthdate"]=>
  string(10) "1900-02-03"
    ["gpa"]=>
  string(3) "3.5"
    ["advisor"]=>
  string(4) "none"
}
*/

//Pretend that we validated
require ('validate.php');
if (!validForm()) {
    die("Please click back and try again");
}

//Connect to your database
require('/home/tostrand/db2.php');

//Get the form data and "escape" it
$sid = mysqli_real_escape_string($cnxn, $_POST['sid']);
$firstName = mysqli_real_escape_string($cnxn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($cnxn, $_POST['lastName']);
$birthdate = mysqli_real_escape_string($cnxn, $_POST['birthdate']);
$gpa = mysqli_real_escape_string($cnxn, $_POST['gpa']);
$advisor = mysqli_real_escape_string($cnxn, $_POST['advisor']);

//Write an SQL statement
$sql = "INSERT INTO student 
        VALUES ('$sid', '$firstName', '$lastName',
                '$birthdate', '$gpa', '$advisor')";
//echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
}


