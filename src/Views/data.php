<?php $title = "Data view"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main class="container">
    <!-- Section Data -->
    <div class="row haut">
        <h2 class="text-center name">Data View</h2>
        <div class="col-lg-6 col-md-12">
            <div class="haut">
                <table class="table">
                    <h4 class="text-center">Exigences Fonctionnelles</h4>
                    <thead class="table-primary">
                        <tr>
                            <th>Exigence</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($fonctionnelles as $fonctionnelle) : ?>
                        <tr>
                            <th><?= $fonctionnelle->getExigence() ?></th>
                            <td><?= $fonctionnelle->getDescription() ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="text-center"><a href=<?= local . "exigence/fonctionnel" ?> class="btn btn-primary">Plus</a></p>
                <table class="table">
                    <h4 class="text-center">Perimetre du systeme</h4>
                    <thead class="table-primary">
                        <tr>
                            <th>Exigence</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($perimetres as $perimetre) : ?>
                        <tr>
                            <th><?= $perimetre->getExigence() ?></th>
                            <td><?= $perimetre->getDescription() ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="text-center"><a href=<?= local . "exigence/perimetre" ?> class="btn btn-primary">Plus</a></p>
            </div>
		</div>
        <div class="col-lg-6 col-md-12">
            <div class="haut">
                <table class="table">
                    <h4 class="text-center">Etat du systeme</h4>
                    <thead class="table-primary">
                        <tr>
                            <th>Exigence</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($systemes as $systeme) : ?>
                        <tr>
                            <th><?= $systeme->getExigence() ?></th>
                            <td><?= $systeme->getDescription() ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="text-center"><a href=<?= local . "exigence/systeme" ?> class="btn btn-primary">Plus</a></p>
                <table class="table">
                    <h4 class="text-center">Exigences Non Fonctionnelles</h4>
                    <thead class="table-primary">
                        <tr>
                            <th>Exigence</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($notfonctionnelles as $notfonctionnelle) : ?>
                        <tr>
                            <th><?= $notfonctionnelle->getExigence() ?></th>
                            <td><?= $notfonctionnelle->getDescription() ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="text-center"><a href=<?= local . "exigence/notfonctionnel" ?> class="btn btn-primary">Plus</a></p>
            </div>
		</div>
    </div>
</main>

<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>