<?php

$failure = false;
$success = false;

if ( isset($_POST['articles']) && isset($_POST['amount']) ) {

    if ( strlen($_POST['articles']) < 1 || strlen($_POST['amount']) < 1 ) {

        $failure = "Es necesario introducir el número de artículos y su importe.";

    } else if ( !is_numeric($_POST['articles']) || !is_numeric($_POST['amount']) ) {

        $failure = "El número de artículos y su importe tienen que ser valores numéricos.";

    } else {

        $success = "Cálculo realizado correctamente.";
    }
}

?>


<!DOCTYPE html>

<html>

<head>

    <?php require_once "bootstrap.php"; ?>
    <link href="starter-template.css"  rel="stylesheet" type="text/css">
    <title>Supply Chain Calculator</title>

</head>

<body>

    <div class = "container">

        <img src="logo.jpg"
        alt="Freshly Cosmetics Logo"
        width="200em">

        <h1>⚙️ Supply Chain Calculator</h1>

        <form method = "POST">

            <label>Número de artículos:</label>
            <input type = "text" name = "articles"><br/>

            <label>Importe por pedido (€):</label>
            <input type = "text" name ="amount"><br/>

            <label>País de origen:</label>
            <select name = "country">
	            <option selected = "yes">España</option>
                <option>Italia</option>
                <option>Francia</option>
                <option>Portugal</option>
                <option>Reino Unido</option>
            </select><br/>

            <input type = "submit" value = "Calcular">
            <input type = "submit" name = "clean" value = "Limpiar">

        </form>

        <?php

            if ( $failure !== false ) {

                echo('<br><p style="color: red;">'.htmlentities($failure)."</p>\n");

            }

            if ( $success !== false ) {

                echo('<br><p style="color: green;">'.htmlentities($success)."</p>\n");

            }
        ?>

        <hr>

        <h2>📃 Historial de cálculo</h2>

        <?php
        include('functions.php');

        if ( isset($_POST['clean']) ) {

            resetFile();
            header("Location: index.php");
            return;
        } 

        if ( $success !== false ) {

            calculatePriceSuppliers($_POST['articles'], $_POST['amount'], $_POST['country']);
            readFromFile();
            return;

        } else if ( $failure !== false ) {

            readFromFile();
            return;

        } 

        ?>

    </div>
</body>