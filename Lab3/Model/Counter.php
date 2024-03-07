<?php

class Counter
{
    private $counterFile; //Stores counter file path(counter.txt)
    public function __construct($counterFile)
    {
        $this->counterFile = $counterFile;
    }

    public function get_visit_number() //returns current visit count from counter file
    {
        if (file_exists($this->counterFile)) {

            return intval(file_get_contents($this->counterFile)); //returns string which will turn to a number using intval
        } else {
            return 0;
        }
    }

    //function to increment count when user enters the session
    public function increment_visit_count()
    {
        $count = $this->get_visit_number(); // to get number of visitors now
        file_put_contents($this->counterFile, ++$count); // to write the new incremented count in the given file 
    }
}
