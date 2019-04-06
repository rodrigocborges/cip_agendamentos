<?php
    include("src/connection_class.php");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Centro Integrado de Pesquisa</title>
</head>
<body>

<main>
    <header>
        <img src="img/logo.png" alt="">
    </header>
    <article>
        <?php
            if(isset($_GET["pg"])){
                $pg = $_GET["pg"];
                if(is_file("src/".$pg.".php")){
                    echo '<p><a class="btn "href="?">Voltar</a></p>';
                    include("src/".$pg.".php");
                }else {
                    include("src/page_home.php");
                }
            }else {
                include("src/page_home.php");
            }
        ?>
    </article>
</main>

</body>
</html>
