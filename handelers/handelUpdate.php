<?php

require_once './../config/Database.php';

$errors = [];
$departments = ['it', 'cs'];

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $errors = [];

  foreach ($_POST as $key => $value) {
    $$key = htmlspecialchars(htmlentities(stripslashes(trim($value))));
  }


  // valid name
  if (empty($name)) {
    $errors[] = 'Name is required';
  } elseif (strlen($name) < 3) {
    $errors[] = 'Name must be greater than 3 chars';
  } elseif (strlen($name) > 15) {
    $errors[] = 'Name must be smaller than 15 chars';
  }

  $department = strtolower($department);

  // valid department
  if (empty($department)) {
    $errors[] = 'Deparment is required';
  } elseif (!in_array($department, $departments)) {
    $errors[] = 'This department not found';
  }

  // valid email
  if (empty($email)) {
    $errors[] = 'Email is required';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'This is not email enter the valid email';
  }


  if (empty($errors)) {

    $db = new Database();

    $sql = "UPDATE `employees` SET `name` = '$name',`email`='$email',`department`='$department' WHERE `id`=$id";

    $_SESSION['success'] = $db->update($sql);

    header("Location: ./../employess.php");

    exit;

  } else {
    $_SESSION['errors'] = $errors;

    header("Location: ./../edit-employee.php?id=$id");

    exit;
  }
} else {
  header("Location: ./../edit-employee.php");
  exit;
}