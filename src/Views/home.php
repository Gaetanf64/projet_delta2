<?php $title = "Accueil"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>



<!--Section Home Banniere-->
<section class="banniere">
    <div class="row">
        <div class="col-md-6 col-sm-6 d-flex flex-column align-items-center justify-content-center">
            <h1>Delta2</h1>
            <p class="description">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>             
        </div>
        <div class="col-md-6 col-sm-6">
            <p class="fond"></p>
        </div>
    </div>
</section>

<main class="container">

    <!--Section Home Presentation-->
    <section class="row haut">
        <div class="col-md-12 col-sm-12 d-flex flex-column align-items-center justify-content-center">
            <h2>Presentation</h2>
            <article>
                <p>Nesciunt possimus molestias doloribus modi ducimus saepe, nulla itaque illo quod, enim sunt. Laudantium sint, a    explicabo voluptate aperiam ullam natus ipsa, est ipsam doloribus soluta? Fuga, ullam. Nam, amet.
                Enim, fugiat aperiam perferendis magni fugit molestiae explicabo quisquam, culpa voluptatem illo impedit voluptas alias architecto placeat nihil id non quaerat atque? Amet excepturi voluptatum id quod ex distinctio deleniti?</p>
            </article>
        </div>
    </section>

    <!--Section Home Contenu-->
    <section class="contenu haut">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <p class="info4"></p>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 d-flex flex-column">
                <h2 class="dview d-flex  justify-content-center">Data View</h2>
                <article class="gboite d-flex justify-content-between">
                    <a href=<?= local . "exigence/systeme" ?> class="boite b1 d-flex align-items-center justify-content-center">Etat du systeme</a>     
                    <a href=<?= local . "exigence/perimetre" ?> class="boite b2 d-flex align-items-center justify-content-center">Perimetre du systeme</a>
                </article>
                <article class="gboite d-flex justify-content-between">   
                    <a href=<?= local . "exigence/fonctionnel" ?> class="boite b3 d-flex align-items-center justify-content-center">Exigences Fonctionnelles</a>    
                    <a href=<?= local . "exigence/notfonctionnel" ?> class="boite b4 d-flex align-items-center justify-content-center">Exigences Non Fonctionnelles</a>
                </article>
            </div>
        </div>
    </section>


</main>

<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>