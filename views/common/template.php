<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="<?= $page_description ?>"> <!--Ici $page_description permet modification dynamique depuis le MainController.controller.php -->
    <title><?= $page_title ?></title> <!--Ici $page_title permet modification dynamique depuis le MainController.controller.php  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link  href="<?= URL ?>public/CSS/main.css"  rel="stylesheet">
    <?php if(!empty($page_css) && is_array($page_css)) : ?>
    <?php foreach($page_css as $fichier_css) : ?>
    <link  href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="stylesheet">
    <?php endforeach ?>
    <?php endif; ?>

</head>
<body>

 <?php require_once("views/common/header.php"); ?> <!--Affichage du fichier header.php-->

 <div class="container">
    <?php if(!empty($_SESSION['alert'])) : ?> <!--Vérifie si la variable session est vide -->
    <div class="alert <?=$_SESSION['alert']['type']; ?>" role="alert"> <!--Ajoute dynamiquement une autre classe provenant du type d'alerte stocké dans $_SESSION-->
        <?=$_SESSION['alert']['message']; ?> <!-- Affiche le message de l'alerte, qui est stocké dans $_SESSION['alert']['message'] -->
    </div>
<?php 
unset($_SESSION['alert']);//Supprime la variable de session $_SESSION['alert'] après l'avoir affichée
endif; ?>

<?= $page_content ?></div><!--Ici $page_description permet modification dynamique depuis le MainController.controller.php-->

    <?php require_once("views/common/footer.php"); ?> <!--Affichage du fichier footer.php-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>