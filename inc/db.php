<?php
    /**
     * Created by PhpStorm.
     * User: Baldo MWAMBA
     * Date: 13/03/2021
     * Time: 10:11
     */

    $con = new PDO('odbc:driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=C:\Users\Baldo MWAMBA\Documents\gestion-clients-altech.mdb;Uid=;Pwd=');
    //$con = new PDO('mysql:host=localhost;dbname=gestion-clients-altech', 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
