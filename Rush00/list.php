<?php

	session_start();
?>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Localshop</title>
		<meta name="description" content="Mini site e-commerce">
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="shortcut icon" href="#">
		<style>
			.boxe {
				position: relative;
				margin-left: auto;
				margin-right: auto;
				background-color: lightgrey;
				width: 50%;
				height: auto;
				min-width: 330px;
				margin-top: 20px;
                border-radius: 10px 10px;
                padding-bottom: 15px;
			}
			
			h1 {
				text-align: center;
				margin-top: -10px;
			}
			form {
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			form input{
				width: 300px;
			}
			</style>
	</head>
	<body>
		<?php include("menu.php"); ?>

        		<div class="boxe">
			<br>
			<h1>Liste des utilisateurs</h1>
            <center>
            <?php
            $users = unserialize(file_get_contents(".private/passwd"));
            foreach($users as $id)
                echo $id['login']."<br>";
            ?>
            <a href="./admin.php"> Retour </a>
            </center>