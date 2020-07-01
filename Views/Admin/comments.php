<h1 class="text-center">Liste de commentaire pour cet article</h1>

<div class="d-flex justify-content-center mb-3">
<a class="btn btn-info" href="<?php echo WEBROOT . 'news/article/' . $News[0]->getID() ?>"><span class='glyphicon glyphicon-edit'></span><b>&#9782</b> Article</a> 
</div>

<?php
if (isset($Comments[0])) {
foreach ($Comments as $com)
{
?>
	<div class="comCards card text-center" reports="<?php echo $com->getReports()?>">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-12">
                    <div class="text-secondary"><?php echo $com->getDatePosted() ?></div>
                        <p><strong><?php echo $com->getAuthor() ?></strong></p>
                        <p>
                        <div class=""><strong><?php echo $com->getReports() ?></strong> signalements</div>
                        </p>
                    <div class="clearfix"></div>
                    <p><?php echo $com->getContent() ?></p>
                    <button class="deleteComBtn float-right btn text-white btn-danger" comID="<?php echo $com->getID()?>"><b>&#x2718</b> Suprimer</button>
        	    </div>
	        </div>
	    </div>
	</div>
<?php
}} else
{
?>
<br>
<p class="text-center">Pas de commentaires à afficher</p>
<?php
}
?>