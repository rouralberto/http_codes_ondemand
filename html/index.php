<?php

$codes = [
    200 => 'OK',
    301 => 'Moved Permanently',
    400 => 'Bad Request',
    404 => 'Not Found',
    418 => 'I\'m a teapot',
    500 => 'Internal Server Error'
];

$requested_code = $_GET['code'];

if (!is_numeric($requested_code) || !array_key_exists($requested_code, $codes)) {
    exit('Requested code is not valid');
}

$response = "HTTP/1.1 ${requested_code} ${codes[$requested_code]}";

header($response);

exit($response);
