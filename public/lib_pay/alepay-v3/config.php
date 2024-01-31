<?php

//Thông tin cấu hình
define('URL_DEMO', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST']);
define('URL_CALLBACK', URL_DEMO . '/result.php'); // URL đón nhận kết quả 
//Alepay cung cấp 

/* $config = array(
    "apiKey" => "0COVspcyOZRNrsMsbHTdt8zesP9m0y", //Là key dùng để xác định tài khoản nào đang được sử dụng.
    "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCIh+tv4h3y4piNwwX2WaDa7lo0uL7bo7vzp6xxNFc92HIOAo6WPZ8fT+EXURJzORhbUDhedp8B9wDsjgJDs9yrwoOYNsr+c3x8kH4re+AcBx/30RUwWve8h/VenXORxVUHEkhC61Onv2Y9a2WbzdT9pAp8c/WACDPkaEhiLWCbbwIDAQAB", //Là key dùng để mã hóa dữ liệu truyền tới Alepay.
    "checksumKey" => "hjuEmsbcohOwgJLCmJlf7N2pPFU1Le", //Là key dùng để tạo checksum data.
    "callbackUrl" => URL_CALLBACK,
    "env" => "test",
); */
/// key test live nội bộ
$config = array(
    "apiKey" => "imt4pZsjbCDE2ioVxnQs71wzNv4TZW", //Là key dùng để xác định tài khoản nào đang được sử dụng.
    "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCVdQKI15hS23XGT9DBQzIardNBBCPa86XeEhMzP2TKKi737SBUXg+z/o3BNhcFZRdTsL5uQpAmBEP3IJYEvclOGgOyWBbpjUf0MXENexaXB9gX9fI/bEiso7k0shBdi8dZt1FdabX/NSTzM+WcQElgLYgXnlwoyCiyzOFL60V4BwIDAQAB", //Là key dùng để mã hóa dữ liệu truyền tới Alepay.
    "checksumKey" => "5iaPavRj8FQXb6eXCj7gFcXC43jsg5", //Là key dùng để tạo checksum data. 
    "callbackUrl" => URL_CALLBACK,
    "env" => "live",
);
?>