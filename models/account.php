<?php
function insertAccount($name, $email, $password, $phone)
{
    $sql = "INSERT INTO account(username, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')";
    pdo_execute($sql);
}
