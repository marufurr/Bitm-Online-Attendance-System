<?php

namespace App\classes;
class Connection
{
    public function dbConnection(){
        $link = mysqli_connect('localhost','root','','demo');
        return $link;
    }
}