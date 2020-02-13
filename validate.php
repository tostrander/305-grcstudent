<?php
    function validForm()
    {
        return validGpa($_POST['gpa'])
            && validName($_POST['firstName'])
            && validName($_POST['lastName']);
    }

    function validGpa($gpa)
    {
        echo "<p>GPA must be 0.0 to 4.0</p>";
        return !empty($gpa) && $gpa >= 0.0 && $gpa <= 4.0;
    }

    function validName($name)
    {
        echo "<p>First and last name are required</p>";
        return !empty($name);
    }