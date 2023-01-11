<?php
include 'Database.php';
include 'Form.php';
include 'OverviewTable.php';

$db = new Database();
$form = new Form($db);
$form->createForm();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form->validateAndSafeData();
}

$overviewTable = new OverviewTable($db);
$overviewTable->generateTable();