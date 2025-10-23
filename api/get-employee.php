<?php
header('Content-Type: application/json');

$data = @file_get_contents('../data/employees.json');
$data = (array)json_decode($data);

echo json_encode($data);