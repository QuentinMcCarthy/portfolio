<?php
	if(is_dir("vendor")){
		require "vendor/autoload.php";
	} else{
		require "../vendor/autoload.php";
	}

	$dotenv = new Dotenv\Dotenv(__DIR__."/.."); $dotenv->load();
	$baseURL = getenv("PROJECT_URL");

	require "./includes/db_connect.php";

	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="<?= $baseURL; ?>">

		<meta charset="utf-8">
		<title>Quentin McCarthy's Portfolio</title>

		<!-- FontAwesome -->
		<link rel="stylesheet" href="./assets/css/fontawesome.min.css">
		<link rel="stylesheet" href="./assets/css/solid.min.css">
		<link rel="stylesheet" href="./assets/css/brands.min.css">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="./assets/css/bootstrap.min.css">

		<link rel="stylesheet" href="./assets/css/master.css">
	</head>
	<body>
