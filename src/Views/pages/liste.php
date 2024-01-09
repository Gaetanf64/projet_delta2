<?php $title = "Liste des dependances"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main class="container">
    <!-- Section Perimetre -->
    <div class="row haut">
        <h2 class="text-center name">Liste des dépendances</h2>
        <div class="col-md-12 col-sm-12">
            <div class="haut">
                <table class="table">
                    <h4 class="text-center">Exigences Fonctionnelles</h4>
                    <thead class="table-primary">
                        <tr>
                            <th>Exigence</th>
                            <th>Description</th>
                            <th>Priorite</th>
                            <th>Flexibilite</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($fonctionnelles as $fonctionnelle) : ?>
                        <tr>
                            <td><?= $fonctionnelle->getExigence() ?></td>
                            <td><?= $fonctionnelle->getDescription() ?></td>
                            <td><?= $fonctionnelle->getPriorite() ?></td>
                            <td><?= $fonctionnelle->getFlexibilite() ?></td>
                            <td><a href=<?= local . "exigence/detail/" ?><?= $fonctionnelle->getExigence() ?> class="btn btn-primary">Selectionner</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
		</div>
    </div>
    <div class="row haut">
        <div class="col-md-3 col-sm-12 d-grid gap-2 mx-auto haut">
            <a href=<?= local . "exigence/perimetre" ?> class="btn btn-success">Voir Perimetre du Systeme</a>
        </div>
        <div class="col-md-3 col-sm-12 d-grid gap-2 mx-auto haut">
            <a href=<?= local . "exigence/systeme" ?> class="btn btn-success">Voir Etat du Systeme</a>
        </div>
        <div class="col-md-3 col-sm-12 d-grid gap-2 mx-auto haut">
            <a href=<?= local . "exigence/fonctionnel" ?> class="btn btn-success">Voir Exigences Fonctionnelles</a>
        </div>
        <div class="col-md-3 col-sm-12 d-grid gap-2 mx-auto haut">
            <a href=<?= local . "exigence/notfonctionnel" ?> class="btn btn-success">Voir Exigences Non Fonctionnelles</a>
        </div>
    </div>
</main>

<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>