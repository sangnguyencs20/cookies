<?php
require_once('config.php');

function execute($sql)
{
    // open connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    // querry
    mysqli_query($conn, $sql);

    // closer connection
    mysqli_close($conn);
}


function executeResult($sql, $isSingle = false)
{
    $data = null;
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
    // querry
    $resultset = mysqli_query($conn, $sql);
    if ($isSingle) {
        $data = mysqli_fetch_array($resultset, 1);
    } else {
        while (($row = mysqli_fetch_array($resultset, 1)) != null) {
            // Tham số 1 ở hàm trên giúp trả kêt quả truy vấn của hàm my_fetch_array ra dạng key và value chứ không phải dạng chỉ mục index
            $data[] = $row;
        }
    }

    // closer connection
    mysqli_close($conn);
    return $data;
}
