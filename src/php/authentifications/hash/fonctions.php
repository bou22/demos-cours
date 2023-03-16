<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<title>Démo 22 février</title>
</head>
<body>
    <?php 
        echo time();
        echo "<br>";
        echo password_hash("soleil123!",PASSWORD_DEFAULT);
        echo "<br>";
        //Cette variable contiendrait normalement une valeur 
        // provenant de la base de données.
        $hash = password_hash("soleil123!",PASSWORD_DEFAULT);
        var_dump(password_verify("fsdafsadfdsf",$hash));
        var_dump(password_verify("soleil123!",$hash));
        var_dump(empty($hash));
    ?>
</body>
</html>