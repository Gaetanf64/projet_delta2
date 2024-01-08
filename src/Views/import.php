<?php $title = "Importer"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main class="container">
    
    <!--Import Section-->
    <section class="row haut">
        <h2 class="text-center name">Importer un fichier</h2>
            <form id="form" method="post" action="">
                <div class="col-md-12 col-sm-12 d-flex flex-column align-items-center justify-content-center">
                    <input required type="file" name="surname" class="input1" />
                    <button class="btn btn-primary haut">Envoyer</button>
                </div>
            </form>
      
    </section>
    
</main>

<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>
