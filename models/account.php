<?php
function insertAccount($name, $email, $password, $phone)
{
    $sql = "INSERT INTO account(username, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')";
    pdo_execute($sql);
}

function getAccount($email, $password)
{
    $sql = "SELECT * FROM account WHERE email = '$email' AND password = '$password'";
    return pdo_query_one($sql);
}
function updateAccount($id, $name, $email, $password, $phone, $address)
{
    $sql = "UPDATE account SET username = '$name', email = '$email', password = '$password', phone = '$phone', address = '$address' WHERE id = $id";
    return pdo_execute($sql);
}
function getOneAccount($id)
{
    $sql = "SELECT * FROM account WHERE id = $id";
    return pdo_query_one($sql);
}
