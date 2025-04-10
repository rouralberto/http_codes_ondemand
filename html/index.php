<?php

if (!isset($_GET['code'])) {
    header("HTTP/1.1 400 Bad Request");
    exit('HTTP Code not provided.');
}

$code_list = json_decode(file_get_contents('codes.json'), true);
$codes = array_column($code_list, 'code');

$requested_code = $_GET['code'];

if (!in_array($requested_code, $codes)) {
    header("HTTP/1.1 404 Not Found");
    exit('Requested HTTP code was not found.');
}

$key = array_search($requested_code, $codes);
$code_meta = $code_list[$key];

$response = "HTTP/1.1 {$requested_code} {$code_meta['phrase']}";

header($response);

echo "<h1>{$response}</h1>";
echo "<dl><dt><a target='_blank' href='{$code_meta['spec_href']}'>{$code_meta['spec_title']}</a></dt><dd>{$code_meta['description']}</dd></dl>";
echo "<hr/>";
echo "<address>roura/http-codes-ondemand - {$_SERVER['SERVER_SOFTWARE']}</address>";
