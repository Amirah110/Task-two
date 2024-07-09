<?php
$host = 'localhost';
$db = 'robot_control';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT command, time FROM commands WHERE DATE(time) = CURDATE()";
$result = $conn->query($sql);
$commands = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commands[] = $row;
    }
}

echo json_encode($commands);

$conn->close();
?>