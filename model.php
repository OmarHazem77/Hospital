<?php

include "connect.php";

function all($table)
{
    global $conn; // Get the connection from outside the function <)
    $stmt = $conn->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchall();
}
// print_r(all('ahmed_patients')) . "<br>";

/* sigle function */

function single($tabble, $id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM $tabble WHERE id = '$id'");
    $stmt->execute();
    return $stmt->Fetch();
}
 

// function insert($table,$set){
//     global $conn;
//     $stmt = $conn->prepare("INSERT INTO $table SET $set");
//     $stmt-> execute();
// }
function insert($table, $columns, $values) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO $table ($columns) VALUES ($values)");
    $stmt->execute();
}


function update($table, $set, $id)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE $table SET $set WHERE id='$id' ");
    $stmt->execute();
}

function delete ($table , $id){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM $table WHERE id = '$id'");
    $stmt->execute();

}
// delete('ahmed_patients',5);


