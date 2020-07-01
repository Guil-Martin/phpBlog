<h2 class="text-center">Editer un article</h2>

<p class="text-center">
	<?php
	// Displays errors if there are some
	if (isset($Errors[0])) {
	foreach ($Errors as $err) {
	?>
		<p class="text-danger"><?php echo $err ?></p>
	<?php
	}}
	?>
</p>

<form enctype="multipart/form-data" method="post" class="text-center" action="">

    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $News[0]->getTitle() ?>" required>
    </div>

    <div class="form-group">
		<label>Categorie</label><br>
		<div class="btn-group btn-group-toggle" data-toggle="buttons" required>
			<?php
            foreach ($Category as $cat)
			{
			?>
			<label class="btn btn-secondary btn-sm <?php echo $News[0]->getCategory() == $cat->getName() ? 'active' : '' ?>">
				<input type="radio" name="category" id="<?php echo $cat->getName() ?>" value="<?php echo $cat->getName() ?>" <?php echo $News[0]->getCategory() == $cat->getName() ? 'checked' : '' ?> autocomplete="off"><?php echo $cat->getName() ?>
			</label>
			<?php
            }
			?>
		</div>
	</div>

	<div class="container">
		<div class="row">	
			<figure class="col-sm-6 offset-sm-3">
				<img src="<?php echo $News[0]->getImage() == '' ? WEBROOT . 'assets/images/news/default.jpg' : WEBROOT . "assets/images/news/articles/" . $News[0]->getImage(); ?>" alt="<?php echo $News[0]->getTitle() ?>" class="img-fluid"></a>
			</figure>
		</div>
	</div>

    <div class="form-group">
		<label for="image">Optionnel - Image</label>
		<input type="file" class="form-control-file" name="image">
    </div>

	<div class="form-group">
		<label for="excerpt">Optionnel - Résumé</label>
		<textarea id="excerpt" class="form-control" rows="3" name="excerpt"><?php echo isset($Edited['Excerpt']) && !empty($Edited['Excerpt']) ? $Edited['Excerpt'] : $News[0]->getExcerpt() ?></textarea>
	</div>

	<div class="form-group">
		<label for="content">Contenu</label>
		<textarea id="editTextArea" name="content" rows='50'><?php echo $News[0]->getContent() ?></textarea>
	</div>
	
    <button type="submit" class="btn btn-primary">Mettre à jour</button>

</form>