<?php

$mysqli = new mysqli('localhost', 'debian-sys-maint', 'LC4bVdcN8eikPty8', 'new_schema');
$qury2 = $mysqli->query("SELECT * FROM users ORDER BY usersId DESC ");
$users = [];
while ($row = $qury2->fetch_assoc())    {
    $users['usersId'][] = $row['usersId'];
    $users['name'][] = $row['name'];
    $users['email'][] = $row['email'];
    $users['phone'][] = $row['phone'];
}
$message = 'Все хорошо';


$out = array(
    'message' => $message,
    'users' => $users
);

header('Content-Type: text/json; charset = utf-8');

echo json_encode($out);