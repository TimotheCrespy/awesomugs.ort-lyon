<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Timothé Crespy, and Bootstrap contributors">
    <title>Awesomugs</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="./styles/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./styles/base.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include("./navbar.php"); ?>

    <div class="container">
        <div class="py-5 text-center">
            <h2>Tous les mugs</h2>
            <p class="lead">Retrouvez tous les mugs de l'application.</p>
        </div>

        <?php
        include('./src/repositories/MugRepository.php');
        $mugRepository = new MugRepository();
        $allMugs = $mugRepository->index();
        ?>

        <div class="row">
            <?php if (count($allMugs) == 0) { ?>
                <div class="col-12">
                    <p>Il n'y a pas encore de mugs dans l'application.</p>
                </div>
            <?php } ?>

            <?php foreach ($allMugs as $mug) { ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card mb-3">
                        <img src="https://images.pexels.com/photos/1207918/pexels-photo-1207918.jpeg?auto=compress&q=10" class="card-img-top" alt="Image of a mug">
                        <div class="card-body">
                            <h5 class="card-title">Mug <?php echo ($mug->getColor()); ?></h5>
                            <p class="card-text">
                                Forme vue de dessus : <?php echo ($mug->getShape()); ?>
                                <br>
                                Prix estimé : <?php echo ($mug->getPrice()); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php include("./footer.php"); ?>
    </div>
    <script src="./scripts/jquery.slim.min.js"></script>
    <script src="./scripts/bootstrap.bundle.min.js"></script>
    <script src="./scripts/base.js"></script>
</body>

</html>