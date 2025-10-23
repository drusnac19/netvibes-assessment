<?php
header('Content-Type: application/json');

$templateId = $_GET['template_id'] ?? null;

$template = @file_get_contents('../data/templates.json');
$template = (array)json_decode($template, true);
$template = array_filter($template, fn($i) => $i['id'] == $templateId);
$template = array_pop($template);

$template_relation = @file_get_contents('../data/template_relation.json');
$template_relation = (array)json_decode($template_relation, true);
$template_relation = array_filter($template_relation, fn($i) => $i['template_id'] == $templateId);
$template_relation = array_pop($template_relation);

echo json_encode([
    'template' => $template,
    'relation' => $template_relation
]);
