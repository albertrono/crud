<?php
// FETCH ALL USERS
function fetchUsers($conn){
    $query = mysqli_query($conn,"SELECT * FROM `users`");
    return mysqli_fetch_all($query,MYSQLI_ASSOC);
};

// FETCH SINGLE USER BY ID
function fetchUser($conn, $id){
    $id = mysqli_real_escape_string($conn,$id);
    $query = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id'");
    $data = mysqli_fetch_assoc($query);
    if(!count($data)){
        header('Location: index.php');
        exit;
    }
    return $data;
}