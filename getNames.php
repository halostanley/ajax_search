<?php
session_start();
require_once('data.php');

// 1) Retrieve a string S sent from html.
// 2) Retrieve all strings in $names[] in which S is their prefix (case sensitive).
// 3) Send the retrieved strings in the response

$results = [];
if (isset($_GET['S'])) {
    $pattern    = "/" . $_GET['S'] . "/";
    $string_len = strlen($_GET['S']);
    foreach ($names as $k => $v) {
        if (preg_match($pattern, substr($v, 0, $string_len))) {
            $results[$k] = $v;
        }
    }
}
header("Content-Type: application/json; charset=utf-8");
echo json_encode($results);

?>
