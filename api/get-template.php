<?php
header('Content-Type: application/json');

$data = @file_get_contents('../data/templates.json');
$data = (array) json_decode($data);

echo json_encode($data);
