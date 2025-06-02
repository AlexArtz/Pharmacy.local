<?php
$host = 'my-mysql';
$user = 'root';
$password = 'Gfhjkm';
$database = 'pharmacy';

$attempts = 5;
while ($attempts > 0) {
    $conn = @new mysqli($host, $user, $password, $database);
    if (!$conn->connect_error) {
        break;
    }
    sleep(2);
    $attempts--;
}

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
echo "Подключение к базе данных успешно!";

// Пример запроса
$result = $conn->query("SELECT * FROM drugs");
while ($row = $result->fetch_assoc()) {
    print_r($row);
}

$conn->close();
?>