<?php

    $cid = $_POST["cid"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    deleteComments($conn);

?>