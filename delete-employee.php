<?php

require_once './config/Database.php';

$db = new Database();

$id = $_GET['id'];

if (isset($_GET['id']) && is_numeric($_GET['id']) && $row = $db->find('employees', $_GET['id'])):

  $db->delete('employees', $id);

  header("Location: employess.php");

  exit;

endif;