<?php

function connectionPDO() : object {
    $dsn = "mysql:dbname=nfactoryblog;host=localhost;charset=utf8";
    $username = "root";
    $password = "";
    try {
        $db = new PDO($dsn, $username, $password);
        return $db;
    }
    catch (PDOException $e) {
        echo ($e -> getMessage());
        return false;
    }
}