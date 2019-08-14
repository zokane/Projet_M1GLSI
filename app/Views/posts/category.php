<!-- AFFICHER LA CATEGORIE EN COURS -->
<h1><?= $categorie->titre; ?></H1>



<div class="row">
    <div class="col-sm-8">
        <!-- AFFICHER LES ARTICLES DE LA CATEGORIE -->
        <?php
            //parcourir tous les articles de la catégorie correspondante
            foreach ($articles as $post) :
        ?>

            <!-- Afficher les articles et leurs catégories correspondantes -->
            <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
            <p><em><?= $post->categorie; ?></em></p>
            <p><?= $post->extrait; ?></p>

        <?php endforeach; ?>
    </div>


    <div class="col-sm-4">
        <ul>
            <!-- AFFICHER TOUTES LES CATEGORIES -->
            <?php foreach ($categories as $categorie) : ?>
                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

