<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title><?= Lang::get('title.dashboard') ?> | Intelboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Intelboard - Delivery Management Dashboard" name="description" />
    <meta content="Intelboard" name="author" />

    <link rel="shortcut icon" href="/views/assets/images/favicon.ico">
    <link href="/views/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/views/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/views/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="/views/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="layout-wrapper">
<?php require_once __DIR__.'/sidebar.php'; ?>