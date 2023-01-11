<?php
include 'Database.php';
include 'Form.php';

$db = new Database();
$form = new Form($db);
$form->createForm();