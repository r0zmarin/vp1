<?php
    $mysqli = new mysqli('localhost', 'debian-sys-maint', 'LC4bVdcN8eikPty8', 'new_schema');

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $street = trim($_POST['street']);
    $home = trim($_POST['home']);
    $part = trim($_POST['part']);
    $appt = trim($_POST['appt']);
    $floor = trim($_POST['floor']);

// Проверим есть ли email в users
$test_email = $mysqli->query("SELECT count(usersId) FROM users WHERE email = '$email'");

if (is_string($name) == true && isset($email) && is_string($phone) == true) {
        $query = $mysqli->query("INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')");
    }

    //передаем usersId из users в orders если email есть в users
if (isset($test_email)) {
    $uId = $mysqli->query("SELECT usersId FROM users WHERE email = '$email'");
    $arr = mysqli_fetch_array($uId);
    $usersId = $arr[0];
}   else    {
    $usersId = $mysqli->insert_id;
}

// Если поля не заполнены, тогда мы берем их из прошлого запроса
if (isset($test_email)) {
    if (is_numeric($home) == false) {
        $uhome = $mysqli->query("SELECT home FROM orders WHERE usersId = '$usersId'");
        $arr = mysqli_fetch_array($uhome);
        $home = $arr[0];
    }
    if (is_numeric($part) == false)  {
        $upart = $mysqli->query("SELECT part FROM orders WHERE usersId = '$usersId'");
        $arr = mysqli_fetch_array($upart);
        $part = $arr[0];
    }
    if (is_numeric($appt) == false)  {
        $uappt = $mysqli->query("SELECT appt FROM orders WHERE usersId = '$usersId'");
        $arr = mysqli_fetch_array($uappt);
        $appt = $arr[0];
    }
    if (is_numeric($floor) == false)  {
        $ufloor = $mysqli->query("SELECT floor FROM orders WHERE usersId = '$usersId'");
        $arr = mysqli_fetch_array($ufloor);
        $floor = $arr[0];
    }
    if (is_string($street) == false)  {
        $ustreet = $mysqli->query("SELECT street FROM orders WHERE usersId = '$usersId'");
        $arr = mysqli_fetch_array($ustreet);
        $street = $arr[0];
    }
}

// Количество заказов
$count1 = $mysqli->query("SELECT COUNT(*) FROM orders WHERE usersId = '$usersId'");
if (isset($count1)) {
    $count2 = $count1->fetch_row();
    $count = $count2[0];
}   else    {
    $count = 1;
}


    if (isset($street) && isset($home) && isset($part) && isset($appt) && isset($floor)) {
//      if (isset($email))    {
        $query2 = $mysqli->query("INSERT INTO orders (street, home, part, appt, floor, usersId, buy_count ) VALUES ('$street', '$home', '$part', '$appt', '$floor', '$usersId', '$count' )");
    }
