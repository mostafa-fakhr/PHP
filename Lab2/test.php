<?php
function store_submits()
{
    $fp = fopen(submit_file, "a+");
    if ($fp) {
        $input = date("m-d-Y h:i:s") . "?" . $_SERVER['REMOTE_ADDR'] . "?" . "$name" . "?" . "$email" . PHP_EOL;
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

if(isset($_POST["submit"]) && $errMessage=""){
    store_submits($name,$email)
    die("Contact Saved" . "<br/> To see all contacts <a href='index.php?view=display'> Click here</a>");

}


fuction display_all_submits(){
    $allLines= file(submit_file);
    foreach ($allLines as $oneLine) {
        echo"New user detsils";
        $word= explode("?", $oneLine);
        $i=0;
        foreach ($oneLine as $line) {
            if (i==0) {
                echo"Date is $line "
            }
            i++;
        }
    }
}