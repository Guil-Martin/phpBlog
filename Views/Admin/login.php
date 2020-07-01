<div class="container">
<h2 class="text-center">Connexion</h2>
<p class="text-center">
	<?php
	if (isset($Errors[0])) {	// Displays errors if there are some
	foreach ($Errors as $err) {
	?>
		<p class="text-danger"><?php echo $err ?></p>
	<?php
	}}
	?>
</p>

<form method='post' action='#'>
    <div class="form-group">
        <label for="Nom">Nom</label>
        <input type="text" class="form-control" id="name" placeholder="Nom" name="name">
    </div>
	<div class="form-group">
        <label for="Mot de passe">Mot de passe</label>
        <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
	</div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
</div>