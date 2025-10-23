<?php

header('Content-Type: application/json');

$templates = @file_get_contents('../data/templates.json');
$templates = (array)json_decode($templates, true);


$data = $_POST;
$data['interval'] = $data['interval'][$data['type']] ?? [];
$data['id'] = rand(1000,9999);

$templates[] = $data;

// Write file
@file_put_contents('../data/templates.json', json_encode($templates, JSON_PRETTY_PRINT));

echo json_encode([
    'status' => 'ok',
    'data' => $data,
]);

