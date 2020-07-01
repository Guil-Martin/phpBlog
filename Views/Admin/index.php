<h1 class="text-center">Liste des articles</h1>
<br>
<div class="row">

<div class="container">
    <div class="row">
        <div class="col-sm">
            <a href="<?php echo WEBROOT . 'admin/create/' ?>" class="btn btn-primary btn-xs pull-right col-sm"><b>&#9782</b> Créer un nouvel article</a>
        </div>

        <div class="col-sm d-flex justify-content-center">

            <ul class="pagination">
                <li class="page-item"><a class="page-link <?php echo ($CurrentPage - 1) < 1 ? 'd-none' : '' ?>" href="<?php echo WEBROOT . 'admin/index/'. ($CurrentPage - 1) ?>">❮</a></li>
                <?php 
                $startPoint = $CurrentPage - 3;
                $endPoint = $CurrentPage + 3;
                if (($CurrentPage - 3) < 1) { $startPoint = 0; }
                if (($CurrentPage + 3) > $NumPages) { $endPoint = $NumPages; }
                while ($startPoint < $endPoint) { $startPoint++; ?>
                <li class="page-item <?php echo $startPoint == $CurrentPage ? 'active' : '' ?>">
                <a class="pageBtn page-link d-none d-sm-block" href="<?php echo WEBROOT . 'admin/index/'. $startPoint ?>"><?php echo $startPoint ?></a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link <?php echo ($CurrentPage + 1) > $NumPages ? 'd-none' : '' ?>" href="<?php echo WEBROOT . 'admin/index/'. ($CurrentPage + 1) ?>">❯</a></li>
                <li class="page-item"><a class="page-link d-block d-sm-none"><?php echo 'Page ' . $CurrentPage . '/' . $NumPages ?></a></li>
            </ul>

        </div>
    </div>
    </div>

<div class="container-fluid text-center">

    <?php
    if (isset($News[0])) {
    foreach ($News as $new)
    {
    ?>


<div class="card col-sm">
    <div class="card-body">
    
    <h5 class="card-title"><?php echo $new->getTitle() . ' <span class="badge badge-warning">' . $new->getCategory() . '</span>' ?></h5>
	<div class="container">
		<div class="row">	
			<figure class="col-sm-6 offset-sm-3">
				<img src="<?php echo $new->getImage() == '' ? WEBROOT . 'assets/images/news/default.jpg' : WEBROOT . "assets/images/news/articles/" . $new->getImage(); ?>" alt="<?php echo $new->getTitle() ?>" class="img-fluid"></a>
			</figure>
		</div>
	</div>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo 'ID - '.$new->getID() ?></h6>
    <h6 class="card-subtitle mb-2 text-muted">Posté le : <?php echo $new->getDatePosted() ?></h6>
    <?php if (!empty($new->getDateEdited())) { ?>
    <h6 class="card-subtitle mb-2 text-muted">Edité le : <?php echo $new->getDateEdited() ?></h6>
    <?php } ?>
    <p><?php echo $new->getExcerpt() ?></p>

    <div class="container-fluid">
        <div class="row">
            <a class="btn btn-info col-sm-6" href="<?php echo WEBROOT . 'news/article/' . $new->getID() ?>"><span class='glyphicon glyphicon-edit'></span><b>&#9782</b> Article <?php $new->getID() ?></a> 
            <a class="btn btn-dark col-sm-6" href="<?php echo WEBROOT . 'admin/showComments/' . $new->getID() ?>"><span class='glyphicon glyphicon-edit'></span><b>&#128172</b> Commentaires<?php echo ' (' . $new->getNumComments() . ')' ?></a> 
        </div>
        <div class="row">
            <a class="btn btn-info btn-warning col-sm-6" href="<?php echo WEBROOT . 'admin/edit/' . $new->getID() ?>"><span class='glyphicon glyphicon-edit'></span><b>&#9782</b> Editer</a> 
            <button class="deleteNewsBtn btn btn-danger col-sm-6" newsID="<?php echo $new->getID() ?>"><span class='glyphicon glyphicon-remove'></span><b>&#x2718</b> Suprimer</button>
        </div>
    </div>

    </div>
</div>

<?php
}}
else
{ ?>
<br>
<p class="text-center">Pas d'articles à afficher</p>
<?php
}
?>
</div>