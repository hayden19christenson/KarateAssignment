<?php
session_start();
$_SESSION['IDFilter'] = $_POST['ID'];
header("Location: adminpage.php");
?>