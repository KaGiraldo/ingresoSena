<?php
    session_start();
    if (!isset($_SESSION['instructor'])) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola Instructor</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non temporibus modi labore qui exercitationem esse saepe, ipsam voluptas repellat ad id quia quam dicta enim mollitia aliquid, officia adipisci maiores?</p>
    <p>cedula : <?php echo $_SESSION['instructor']?></p>
    <a href="logout.php">Cerrar session</a>
</body>
</html>