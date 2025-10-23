<?php

header('Content-Type: application/json');

$templates = @file_get_contents('../data/template_relation.json');
$templates = (array)json_decode($templates, true);


$data = $_POST;
$data['id'] = substr(time(), 0, 5);


$key = array_search($_POST['template_id'], array_column($templates, 'template_id'));

if ($key === false)
{
    $templates[] = $data;
} else
{
    $templates[$key] = $data;
}

// Write file
@file_put_contents('../data/template_relation.json', json_encode($templates, JSON_PRETTY_PRINT));

echo json_encode([
    'status' => 'ok',
    'data' => $data,
]);

