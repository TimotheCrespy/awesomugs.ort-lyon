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
            <h2>Ajouter un mug</h2>
            <p class="lead">Renseignez les informations pour ajouter un mugs.</p>
        </div>

        <?php
        $postedData = $_POST;
        if (isset($postedData['color']) && isset($postedData['shape']) && isset($postedData['price'])) {
            include('./src/repositories/MugRepository.php');
            $mugRepository = new MugRepository();
            include('./src/entities/Mug.php');
            $mug = new Mug($postedData['color'], $postedData['shape'], $postedData['price']);
            $mugRepository->store($mug);
        ?>
            <p class="alert alert-success">Le mug a bien été ajouté !</p>
        <?php
        }
        ?>

        <div class="row">
            <div class="col-12">
                <form class="needs-validation" novalidate action="mugs-create.php" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="color">Couleur</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                La couleur est requise.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="shape">Forme vue de dessus</label>
                            <input type="text" class="form-control" id="shape" name="shape" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                La forme est requise.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="price">Prix estimé</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">€</span>
                            </div>
                            <input type="text" class="form-control" id="price" name="price" placeholder="15" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Le prix estimé est requis.
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Pays d'origine</label>
                            <select class="custom-select d-block w-100" id="country" name="country" required>
                                <option value="">Choisir un pays d'origine</option>
                                <option value="FR">France</option>
                                <option value="DE">Allemagne</option>
                                <option value="SD">Soudan</option>
                            </select>
                            <div class="invalid-feedback">
                                Un pays d'origine valide est requis.
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Statut</label>
                            <select class="custom-select d-block w-100" id="status" name="status" required>
                                <option value="">Choisir un statut</option>
                                <option value="AVAI">Disponible</option>
                                <option value="SOLD">Vendu</option>
                            </select>
                            <div class="invalid-feedback">
                                Un statut valide est requis.
                            </div>
                        </div>
                    </div> -->

                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Ajouter le mug</button>
                </form>
            </div>
        </div>

        <?php include("./footer.php"); ?>
    </div>
    <script src="./scripts/base.js"></script>
</body>

</html>