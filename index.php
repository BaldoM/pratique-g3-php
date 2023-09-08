<?php include_once 'inc/entete.php'; ?>

<?php

    if (isset($_GET['id']) and !empty($_GET['id'])){

        $id = $_GET['id'];
        $req = $con->prepare("DELETE FROM clients WHERE id = :id");
        $req->execute(compact('id'));
    }

?>

    <div class="col-md-12">
        <legend class="text-warning">Gestion des Clients</legend>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th width="5%">#</th>
                <th>Nom</th>
                <th>Postnom</th>
                <th>Prenom</th>
                <th>Sexe</th>
                <th>Adresse</th>
                <th width="10%">Modifier</th>
                <th width="10%">Supprimer</th>
            </tr>
            </thead>

            <tbody>

            <?php

                $req = $con->prepare("SELECT * FROM clients");
                $req->execute();

                $compt = 1;
                while ($client = $req->fetch()) :

            ?>

                    <tr>
                        <td class="text-center"><?= $compt++; ?></td>
                        <td><?= $client['nom']; ?></td>
                        <td><?= $client['postnom']; ?></td>
                        <td><?= $client['prenom']; ?></td>
                        <td><?= $client['sexe']; ?></td>
                        <td><?= $client['adresse']; ?></td>
                        <td><a href="modification.php?id=<?= $client['id']; ?>" class="btn btn-block btn-sm btn-warning">Modifier</a></td>
                        <td><a onclick="return confirm('Voulez-vous vraiment supprimer ce client ?')" href="index.php?id=<?= $client['id']; ?>" class="btn btn-block btn-sm btn-danger">Supprimer</a></td>
                    </tr>

                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

<?php include_once "inc/pied.php"; ?>