<?php
    include 'fonctions.php';

    $pdo = dbbConnexion();
    $req = $pdo->prepare("INSERT INTO 'membres'(avatar) VALUES (?)");
    $req->execute(array($_FILES['image']['name']));
    var_dump($_FILES)

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
    
    <form action="form_image.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image"></br>
        <input type="submit" name="valider" value="Charger">
    </form>
</body>
</html>