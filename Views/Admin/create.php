<h2 class="text-center">Ajouter un article</h2>

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

<form enctype="multipart/form-data" class="text-center" method="post" action="">

    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" placeholder="Titre de l'article" name="title" value="<?php echo isset($POST['title']) ? $POST['title'] : '' ?>" required>
    </div>

    <div class="form-group">
		<label>Categorie</label><br>
		<div class="btn-group btn-group-toggle" data-toggle="buttons" required>
			<?php
			foreach ($Category as $cat)
			{
			?>
			<label class="btn btn-secondary btn-sm  
			<?php echo isset($POST['category']) ? $POST['category'] == $cat->getName() ? 'active' : '' : $cat->getName() == 'Roman' ? 'active' : '' ?>">
				<input type="radio" name="category" id="<?php echo $cat->getName() ?>" value="<?php echo $cat->getName() ?>" autocomplete="off" <?php echo isset($POST['category']) ? $POST['category'] == $cat->getName() ? 'checked' : '' : $cat->getName() == 'Roman' ? 'checked' : '' ?>> <?php echo $cat->getName() ?>
			</label>
			<?php
			}
			?>
		</div>
	</div>

    <div class="form-group">
		<label for="image">Optionnel - Image</label>
		<input type="file" class="form-control-file" name="image">
    </div>

	<div class="form-group">
		<label for="excerpt">Optionnel - Résumé</label>
		<textarea id="excerpt" class="form-control" rows="3" name="excerpt" placeholder="Optionnel - Résumé de l'article"></textarea>
	</div>

	<div class="form-group">
		<label for="content">Contenu</label>
		<textarea id="editTextArea" name="content" rows='50' placeholder="Contenu de l'article"><?php echo isset($POST['content']) ? $POST['content'] : '' ?></textarea>
	</div>
	
    <button type="submit" class="btn btn-primary">Poster</button>

</form>