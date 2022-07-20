<?php

include('database/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    $run_query = mysqli_query($con, $query);
    return $run_query;
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id'";
    $run_query = mysqli_query($con, $query);
    return $run_query;
}

function getByGenderActive($table, $gender)
{
    global $con;
    $query = "SELECT * FROM $table WHERE gender='$gender' AND available='1'";
    $run_query = mysqli_query($con, $query);
    return $run_query;
}

function getAllTrending($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE trending='1'";
    $run_query = mysqli_query($con, $query);
    return $run_query;
}

function getAllBrand($table, $brand)
{
    global $con;
    $query = "SELECT * FROM $table WHERE brand='$brand'";
    $run_query = mysqli_query($con, $query);
    return $run_query;
}

?>