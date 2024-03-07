<?php
class Visitor
{
    public static function isCounted()
    {
        //to check if the session of the user is set or not, if the user session is counted then do nothing, if not make it evaluate by true and end the function
        if (!isset($_SESSION["is_counted"])) {
            $_SESSION["is_counted"] = true;
            return false;
        }
        return true;
    }
}
