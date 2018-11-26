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

		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arimo">

		<!-- FontAwesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<link rel="stylesheet" href="css/master.css">
	</head>
	<body>
