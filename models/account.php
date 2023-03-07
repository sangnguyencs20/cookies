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
