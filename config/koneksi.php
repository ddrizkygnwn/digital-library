<?php

class Koneksi
{
    public function koneksi(){
    $kon = mysqli_connect('localhost', 'root', '', 'ujikom2');
    return $kon;
    }
}