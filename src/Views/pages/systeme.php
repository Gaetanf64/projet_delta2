<?php $title = "Etat du systeme"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main class="container">
    <!-- Section Systeme -->
    <div class="row haut">
        <h2 class="text-center name">Etat du systeme</h2>
        <div class="col-md-12 col-sm-12">
            <div class="haut">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>Exigence</th>
                            <th>Description</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($systemes as $systeme) : ?>
                        <tr>
                            <td><?= $systeme->getExigence() ?></td>
                            <td><?= $systeme->getDescription() ?></td>
                            <td><a href=<?= local . "exigence/liste/" ?><?= $systeme->getExigence() ?> class="btn btn-primary">Liste</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
		</div>
    </div>
    <div class="row haut">
        <div class="col-md-4 col-sm-12 d-grid gap-2 mx-auto haut">
            <a href=<?= local . "exigence/perimetre" ?> class="btn btn-success">Voir Perimetre du Systeme</a>
        </div>
        <div class="col-md-4 col-sm-12 d-grid gap-2 mx-auto haut">
            <a href=<?= local . "exigence/fonctionnel" ?> class="btn btn-success">Voir Exigences Fonctionnelles</a>
        </div>
        <div class="col-md-4 col-sm-12 d-grid gap-2 mx-auto haut">
            <a href=<?= local . "exigence/notfonctionnel" ?> class="btn btn-success">Voir Exigences Non Fonctionnelles</a>
        </div>
    </div>
</main>

<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>