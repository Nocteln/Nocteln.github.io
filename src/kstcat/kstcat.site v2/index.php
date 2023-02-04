<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat forms</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <form action="" method="post">
    <input type="text" name="pseudo">
    <input type="password" name="password">
    <input type="submit" name="submit" value="VALIDER" class="cta">
    </form><br>
    <?php
    $host = 'localhost:3306';
    $user = 'kstcatsi_BG';
    $pass = 'Lebg!!';
    $database = 'kstcatsi_kstcat';
    try {
        $db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $pass);
    } catch (PDOException $e) {
        echo 'Un problème est survenu';
    }
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $passw = htmlspecialchars($_POST["password"]);
    $rpseudo = "kst";
    $rpassw = "cat";
        if ($pseudo === $rpseudo && $passw === $rpassw) {
            $request = $db->query("SELECT * FROM formulaires");
            foreach ($request->fetchAll() as $res) {
                echo "<h1>FORMULAIRE ID=".$res["id"]."</h1>
                <h2>email</h2>
                <p>".$res["email"]."</p>
                <h2>sujet</h2>
                <p>".$res["sujet"]."</p>
                <h2>message</h2>
                <p>".$res["message"]."</p><br>";
            }
        }
    ?>
</body>
</html>