<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia UTCB</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body id="root" class="bg" onload="">
    <nav class="navbar navbar-expand-lg navbar-success bg-success">
        <a class="navbar-brand">Farmacia UTCB</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="index.html">Acasa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="oferte.html">Oferte</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="nav-link dropdown-toggle text-dark btn" style="outline: none; box-shadow: none;"
                        id="infSanatate" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Informatii Sanatate
                    </button>
                    <div class="dropdown-menu bg-success mt-2" aria-labelledby="infSanatate">
                        <a class="dropdown-item text-dark" href="stiri.html">Stiri</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-dark" href="bolisiafectiuni.html">Boli si afectiuni</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-dark" href="traiestesanatos.html">Traieste sanatos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-dark" href="remediinaturiste.html">Remedii naturiste</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <button class="nav-link dropdown-toggle text-dark btn" style="outline: none; box-shadow: none;"
                        id="frum" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Frumusete
                    </button>
                    <div class="dropdown-menu bg-success mt-2" aria-labelledby="frum">
                        <a class="dropdown-item text-dark" href="makeup.html">Make-up</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-dark" href="cosmetica.html">Cosmetica</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <button class="nav-link dropdown-toggle text-dark btn" style="outline: none; box-shadow: none;"
                        id="loca" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contact
                    </button>
                    <div class="dropdown-menu bg-success mt-2" aria-labelledby="loca">
                        <a class="dropdown-item text-dark" href="locatii.html">Locatiile noastre</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-dark" href="contact.php">Contacteaza-ne</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div id="readpos" class="fixed-bottom bg-success">0%</div>
    <div class="container">
        <div class="row mt-5 pt-5 mb-3">
            <div class="col-8 mx-auto">
                <?php
                    $formNameErr = $formEmailErr = $formDetailsErr = "";
                    $formName = $formEmail = $formDetails = "";
                    $all = False;

                    function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["formName"])) {
                            $formNameErr = "Numele este necesar";
                            $all = False;
                        } else {
                            $formName = test_input($_POST["formName"]);
                            $all = True;

                            if (!preg_match("/^[a-zA-Z ]*$/",$formName)) {
                                $formNameErr = "Sunt permise doar litere si spatii";
                                $all = False;
                            }
                        }
                        
                        if (empty($_POST["formEmail"])) {
                            $formEmailErr = "Adresa de email este necesara";
                            $all = False;
                        } else {
                            $formEmail = test_input($_POST["formEmail"]);
                            $all = True;

                            if (!filter_var($formEmail, FILTER_VALIDATE_EMAIL)) {
                                $formEmailErr = "Formatul adresei de email este invalid";
                                $all = False;
                            }
                        }

                        if (empty($_POST["formDetails"])) {
                            $formDetailsErr = "Descrierea problemei/cerintei este necesara";
                            $all = False;
                        } else {
                            $all = True;
                        }
                    }
                ?>

                <div class="card mb-4">
                    <div class="card-body mt-n2 mb-n2">
                        <h2 class="card-title text-center">Contact</h2>
                        <p class="card-text">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="form-group">
                                    <label for="formName">Nume <span class="error">* <?php echo $formNameErr;?></span></label>
                                    <input type="text" class="form-control" id="formName" name="formName" placeholder="Numele tau complet aici" value="<?php echo $formName;?>">
                                </div>
                                <div class="form-group">
                                    <label for="formEmail">Adresa de email <span class="error">* <?php echo $formEmailErr;?></span></label>
                                    <input type="email" class="form-control" id="formEmail" name="formEmail" aria-describedby="emailHelp" placeholder="Adresa ta de email aici" value="<?php echo $formEmail;?>">
                                    <small id="emailHelp" class="form-text text-muted">Adresa ta de email nu va fi vanduta sau distruibita.</small>
                                </div>
                                <div class="form-group">
                                    <label for="formDetails">Detalii <span class="error">* <?php echo $formDetailsErr;?></span></label>
                                    <textarea class="form-control" id="formDetails" name="formDetails" rows="3" placeholder="Descrie problema ta aici"><?php echo $formDetails;?></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <p class="mt-1"><span class="error" style="font-size: 10px;">* required field</span></p>
                            </form>

                            <?php
                                if($all) {
                                    echo "<span class='mb-n3'>Multumim pentru mesajul trimis, $formName!\nO sa fiti contactact in curand la adresa de email $formEmail.</span>";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script>
        window.addEventListener('scroll', function (e) {
            try {
                let scroll = window.scrollY;
                let height = document.body.scrollHeight - window.innerHeight + 10;
                let percent = Math.round(100.0 * scroll / height);
                document.getElementById('readpos').innerText = percent + '%';
            } catch (err) {
                if(err) console.error(err);
            }
        })
    </script>
</body>

</html>