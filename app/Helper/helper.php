<?php

function mobileEncode($str)
{
    $fulldata = \base64_encode(json_encode($str));    
    $salt = substr(ENV('APP_KEY'),-10, -1);
    return $salt.$fulldata;
}

function mobileDecode($str)
{
    return \base64_decode((substr($str, 9)));
}

function mobileEncap($str)
{
    return $result = [
        'data' => $str
    ];
}


?>