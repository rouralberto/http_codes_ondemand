<?php

if (!isset($_GET['code'])) {
    header("HTTP/1.1 400 Bad Request");
    exit('Code not provided');
}

$code_list = json_decode(file_get_contents('codes.json'), true);
$codes = array_column($code_list, 'code');

$requested_code = $_GET['code'];

if (!is_numeric($requested_code) || !in_array($requested_code, $codes)) {
    exit('Requested code is not valid');
}

$key = array_search($requested_code, $codes);
$code_meta = $code_list[$key];

$response = "HTTP/1.1 ${requested_code} ${code_meta['phrase']}";

header($response);

echo "<h1>${response}</h1>";
echo "<dl><dt><a target='_blank' href='${code_meta['spec_href']}'>${code_meta['spec_title']}</a></dt><dd>${code_meta['description']}</dd></dl>";
echo "<hr/>";
echo "<address>${_SERVER['SERVER_SOFTWARE']}</address>";
