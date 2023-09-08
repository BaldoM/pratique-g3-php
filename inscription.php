<?php include_once 'inc/entete.php'; ?>

<?php

    if (!empty($_POST)) {

        $nom = $_POST['nom'];
        $postnom = $_POST['postnom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $adresse = $_POST['adresse'];

        //$req = $con->exec("INSERT INTO clients (nom, postnom, prenom, sexe, adresse) VALUES ('" . $nom ."', '" . $postnom . "', '" . $prenom . "', '" . $sexe . "', '" . $adresse . "')");

        //N°27, Av. Kindu, Q. 53, C. Sobongo, V. Kamina

        $erreur = [];

        if (empty($nom) or strlen($nom) < 3) {
            $erreur['nom'] = 'Erreur sur le champs Nom du client';
        }

        if (empty($postnom) or strlen($postnom) < 3) {
            $erreur['postnom'] = 'Erreur sur le champs Postnom du client';
        }

        if (empty($prenom) or strlen($prenom) < 3) {
            $erreur['prenom'] = 'Erreur sur le champs Prenom du client';
        }

        if (empty($sexe)) {
            $erreur['sexe'] = 'Erreur sur le champs Sexe du client';
        }

        if (empty($adresse)) {
            $erreur['adresse'] = 'Erreur sur le champs Adresse du client';
        }


        if (empty($erreur)) {
            $req = $con->prepare("INSERT INTO clients (nom, postnom, prenom, sexe, adresse) VALUES (:nom, :postnom, :prenom, :sexe, :adresse)");
            $req->execute(compact('nom', 'postnom', 'prenom', 'sexe', 'adresse'));
            header('Location: index.php');
        }

    }


?>

    <div class="col-md-12">
        <legend class="text-warning">Inscrivez-vous Ici</legend>


        <form method="post" action="" class="form-horizontal" autocomplete="off">
            <fieldset>
                <div class="form-group <?= isset($erreur['nom']) ? 'has-error' : ''; ?>">
                    <label for="nom" class="col-lg-2 control-label">Nom Client</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="nom" placeholder="Nom Client" name="nom" minlength="3" required>
                        <span class="help-block"><?= isset($erreur['nom']) ? $erreur['nom'] : ''; ?></span>
                    </div>
                </div>

                <div class="form-group <?= isset($erreur['postnom']) ? 'has-error' : ''; ?>">
                    <label for="postnom" class="col-lg-2 control-label">Postnom Client</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="postnom" placeholder="Postnom Client" name="postnom" required>
                        <span class="help-block"><?= isset($erreur['postnom']) ? $erreur['postnom'] : ''; ?></span>
                    </div>
                </div>

                <div class="form-group <?= isset($erreur['prenom']) ? 'has-error' : ''; ?>">
                    <label for="prenom" class="col-lg-2 control-label">Prenom Client</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="prenom" placeholder="Prenom Client" name="prenom" required>
                        <span class="help-block"><?= isset($erreur['prenom']) ? $erreur['prenom'] : ''; ?></span>
                    </div>
                </div>

                <div class="form-group <?= isset($erreur['sexe']) ? 'has-error' : ''; ?>">
                    <label for="sexe" class="col-lg-2 control-label">Sexe Client</label>
                    <div class="col-lg-10">
                        <select name="sexe" class="form-control" id="sexe" required>
                            <option value="Masculin">Masculin</option>
                            <option value="Féminin">Féminin</option>
                        </select>
                        <span class="help-block"><?= isset($erreur['sexe']) ? $erreur['sexe'] : ''; ?></span>
                    </div>
                </div>

                <div class="form-group <?= isset($erreur['adresse']) ? 'has-error' : ''; ?>">
                    <label for="adresse" class="col-lg-2 control-label">Adresse Client</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="adresse" name="adresse" required></textarea>
                        <span class="help-block"><?= isset($erreur['adresse']) ? $erreur['adresse'] : ''; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Restaurer</button>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>

<?php include_once 'inc/pied.php'; ?>
