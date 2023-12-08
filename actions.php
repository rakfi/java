<?php

    include("classes.php");

    $obj = new DataOperation;

    if (isset($_POST["submit"])) {

        $myArray = array(
            "name"=> $_POST["name"],
            "email" => $_POST["email"],
            "password" => md5($_POST["password"])
        );

        if($obj->insert_record("user", $myArray)) {
            header("location:index.php?msg=Record Inserted");
        } else {
            header("location:index.php?msg=Inserted Failed");
        }
    }

    if (isset($_POST["update"])) {
        $id = $_POST["id"] ?? null;
        $where = array(
            'id' => $id 
        );
        $myArray = array(
            "name"=> $_POST["name"],
            "email" => $_POST["email"],
            "password" => md5($_POST["password"])
        );

        if($obj->update_record("user", $where, $myArray)){
            header("location:index.php?msg=Record Updated");
        }

    }

    if(isset($_GET['delete'])) {
        $id = $_GET['id'] ?? null;
        $where = array(
            "id" => $id
        );

        if($obj->delete_record("user", $where)) {
            header("location:index.php?msg=Record Deleted");
        } else {
            header("location:index.php?msg=Deleting failed");
        }
    }

    $sql = $obj->fetch_record("user");  

?>