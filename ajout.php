<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test PDO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style3.css">
</head>
<body>
<?php
    $host = 'localhost';
    $db = 'record';
    $user = 'root'; 
    $pass = '20021975'; 
    try {
        $db = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $requete = $db->prepare("SELECT * FROM disc WHERE disc_id = ?");
    $requete->execute(array($_GET["disc_id"]));
    $disc = $requete->fetch(PDO::FETCH_OBJ);

    $countDisc = $db->query('SELECT COUNT(*) FROM disc');
    $totaldisc = $countDisc->fetchColumn();

    $discinforequet = $db->prepare("SELECT d.disc_picture, d.disc_title, a.artist_name, d.disc_label, d.disc_year, d.disc_genre FROM disc d LEFT JOIN artist a ON a.artist_id = d.artist_id");
    $discinforequet->execute();
    $discs = $discinforequet->fetchAll(PDO::FETCH_OBJ); // Получаем массив объектов
?>




</div>
</body>
<script src="/assets/js/script.js"></script>
</html>
