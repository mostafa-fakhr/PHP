<?php
function store_submits_to_file($name, $email)
{
    $fp = fopen(submit_file, "a+"); //open file to append line by line
    if ($fp) {
        $input = date("m-d-Y H:i:s") . "?" .  $_SERVER['REMOTE_ADDR'] . "?" . "$name" . "?" . "$email" . PHP_EOL;
        if (fwrite($fp, $input)) {
            fclose($fp);
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function display_all_submits()
{

    $lines = file(submit_file);
    foreach ($lines as $line) {
        echo "<h3> new user details </h3>";
        $words = explode("?", $line);
        $i = 0;
        foreach ($words as $word) {
            if ($i == 0) {
                echo "<h3> date: $word </h3>";
            } elseif ($i == 1) {
                echo "<h3> IP : $word </h3>";
            } elseif ($i == 2) {
                echo "<h3> Name : $word </h3>";
            } elseif ($i == 3) {
                echo "<h3> Email : $word </h3>";
            }
            $i++;
        }
    }
}
