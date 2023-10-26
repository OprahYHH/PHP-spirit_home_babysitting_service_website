<?php
session_start();
$_SESSION['title1'] = "SpiritHome Babysitter Service";
$header = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$_SESSION['title1']}</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" href="../image/favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="left_col">
        <a class="logo" href="../index.html">
            <span class="name">SpiritHome</span><br>
            <span class="sub">Babysitting Service</span>
        </a>
        <div class="menu">
            <a class="view button" href="list.php"><span class="icon">List</span></a>
            <a class="search button" href="../search.html"><span class="icon">Search</span></a>
            <a class="add button" href="../insert.html"><span class="icon">Insert</span></a>
            <a class="update button" href="../update.html"><span class="icon">Update</span></a>
            <a class="delete button" href="../delete.html"><span class="icon">Delete</span></a>
            <a class="database button" href="../index.html"><span class="icon">Database<span class="check"></span></span></a>
        </div>
    </div>
    <div class="right_col">
        <div class="title">
            <h2>{$_SESSION['title2']}</h2>
        </div>
        <div class="content">
            <div class="part">
HTML;
echo $header;
?>