<div class="row">
	<div class="col-sm-8">
		<!-- AFFICHER LES ARTICLES  -->
		<?php
		    //Lister les articles et les stocker dans une variable post
		    foreach ($posts as $post) :
		?>
		        <!-- Afficher les articles -->
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







