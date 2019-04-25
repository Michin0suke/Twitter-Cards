<?php
require_once('tc_db_login.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

$query = "SELECT * FROM tc";
$result = $conn->query($query);
if(!$result) die("Fatal Error!");

$rows = $result->num_rows;

for ($j = 0; $j < $rows; ++$j)
{
    $result->data_seek($j);
    echo 'Message: '.htmlspecialchars($result->fetch_assoc()['say_something']).'<br><br>';
}
$result->close();
$conn->close();