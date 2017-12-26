<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$title = "Blood Requests";
$setBloodRequestActive = "active";
include 'layout/_header.php';

include 'layout/_top_nav.php';

?>