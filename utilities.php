<?php 
ini_set('display_errors', true);
session_start();

function sanitize($data) {
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);

    return $data;
}

function myVarDump($data, $title = '') {
    $output = '<pre>';
    if($title !== '') {
        $output .= "<p>{$title}</p>";
    }
    $output .= var_export($data, true);
    $output .= '</pre> <hr>';
    print $output;
}
 
?>