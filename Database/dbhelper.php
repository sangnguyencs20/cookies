<?php
require_once('config.php');

function execute($sql)
{
    // open connection
    echo '<script>'.$sql.'</script>';
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, $sql);

    // closer connection
    mysqli_close($conn);
}

function getOrderId(){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result = mysqli_insert_id($conn);
    return $result - 1;
}

function executeResult($sql, $isSingle = false)
{
    //$isSingle = true => return 1 record
    $data = null;
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
    $resultset = mysqli_query($conn, $sql);
    if ($isSingle) {
        $data = mysqli_fetch_array($resultset, 1);
    } else {
        while (($row = mysqli_fetch_array($resultset, 1)) != null) {
            $data[] = $row;
        }
    }

    // closer connection
    mysqli_close($conn);
    return $data;
}
