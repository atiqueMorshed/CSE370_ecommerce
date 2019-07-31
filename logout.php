<?php include_once 'resources/session.php';
include_once 'resources/regFunc.php';
session_destroy();
redirectTo(index);
