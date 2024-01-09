<?php $title = "Detail d'une exigence"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main class="container">
    <!-- Section Detail -->
    <div class="row haut">
        <h2 class="text-center name">Details de l'Exigence <?= $fonctionnelle->getExigence() ?></h2>
        <table class="table">
            <tbody>
                <div class="col-md-12 col-sm-12 haut">
                    <tr>
                        <th class="table-primary">Perimetre du système</th>
                        <td><?= $perimetre->getDescription() ?></td>
                        <td class="table-primary">Nom</td>
                        <td><?= $perimetre->getExigence() ?></td>
                    </tr>
                </div>
                <tr>
                    <th class="table-primary">Etat du système</th>
                    <td><?= $systeme->getDescription() ?></td>
                    <td class="table-primary">Nom</td>
                    <td><?= $systeme->getExigence() ?></td>
                </tr>
                <tr>
                    <th class="table-primary">Exigence Non Fonctionnelle</th>
                    <td><?= $notfonctionnelle->getDescription() ?><br/>Flexibilité : <?= $notfonctionnelle->getFlexibilite() ?></td>
                    <td class="table-primary">Nom</td>
                    <td><?= $notfonctionnelle->getExigence() ?></td>
                </tr>
            </tbody>
        </table>
        <h4 class="text-center">Exigence <?= $fonctionnelle->getExigence() ?></h4>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th>Priorite</th>
                    <th>Flexibilite</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $fonctionnelle->getPriorite() ?></td>
                    <td><?= $fonctionnelle->getFlexibilite() ?></td>
                    <td><?= $fonctionnelle->getDescription() ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row haut">
        <div class="col-md-3 col-sm-12 d-grid gap-2 mx-auto haut">
            <a href=<?= local . "exigence/perimetre" ?> class="btn btn-success">Voir Perimetre du Systeme</a>
        </div>
        <div class="col-md-3 col-sm-12 d-grid gap-2 mx-auto haut">
            <a href=<?= local . "exigence/systeme" ?> class="btn btn-success">Voir Etat du systeme</a>
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