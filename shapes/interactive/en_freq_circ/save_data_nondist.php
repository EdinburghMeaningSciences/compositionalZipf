<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$raw = file_get_contents('php://input');

// Log the raw request body
file_put_contents(
    "/home/wuegaki/server_data/en_freq/debug.log",
    date("Y-m-d H:i:s") . " RAW: " . $raw . "\n",
    FILE_APPEND
);

// Decode JSON
$obj = json_decode($raw, true);

// If JSON is invalid, log and return error
if (json_last_error() !== JSON_ERROR_NONE) {
    file_put_contents(
        "/home/wuegaki/server_data/en_freq/debug.log",
        date("Y-m-d H:i:s") . " JSON ERROR: " . json_last_error_msg() . "\n",
        FILE_APPEND
    );
    http_response_code(500);
    exit("❌ JSON decode error: " . json_last_error_msg());
}

// Build save path
$username = explode("/", dirname(__FILE__))[2];
// $server_data = "/home/".$username."/server_data/en_freq";
$server_data = "/home/wuegaki/server_data/en_freq";
$path = $server_data . "/" . basename($obj["filename"]);

// Security check
if (substr(realpath(dirname($path)), 0, strlen($server_data)) != $server_data) {
    error_log("❌ Attempt to write to bad path: " . $path);
    http_response_code(400);
    exit("❌ Invalid path");
}

// Try to open file
$outfile = fopen($path, "a");
if ($outfile === false) {
    error_log("❌ Failed to open file for writing: " . $path);
    http_response_code(500);
    exit("❌ Failed to open file for writing");
}

// Write data
if (fwrite($outfile, $obj["filedata"]) === false) {
    error_log("❌ Failed to write data to file: " . $path);
    http_response_code(500);
    fclose($outfile);
    exit("❌ Failed to write data");
}

fclose($outfile);
echo "✅ Data saved successfully to $path";
?>