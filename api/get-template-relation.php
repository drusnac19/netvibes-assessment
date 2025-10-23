<?php
header('Content-Type: application/json');

$templateId = $_GET['template_id'] ?? null;

$data = @file_get_contents('../data/template_relation.json');
$data = (array)json_decode($data, true);

$data = array_filter($data, fn($template) => $template['template_id'] == $templateId);
$data = (array) array_shift($data);


echo json_encode($data);
