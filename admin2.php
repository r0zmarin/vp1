<?php

$mysqli = new mysqli('localhost', 'debian-sys-maint', 'LC4bVdcN8eikPty8', 'new_schema');
$qury2 = $mysqli->query("SELECT * FROM orders ORDER BY send_id DESC ");
$users = [];
while ($row = $qury2->fetch_assoc())    {
    $users['send_id'][] = $row['send_id'];
    $users['home'][] = $row['home'];
    $users['part'][] = $row['part'];
    $users['appt'][] = $row['appt'];
    $users['floor'][] = $row['floor'];
    $users['street'][] = $row['street'];
    $users['buy_count'][] = $row['buy_count'];
    $users['usersId'][] = $row['usersId'];
}
$message = 'Все хорошо';


$out = array(
    'message' => $message,
    'users' => $users
);

header('Content-Type: text/json; charset = utf-8');

echo json_encode($out);