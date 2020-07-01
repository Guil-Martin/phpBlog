<h1 class="text-center mb-5">Commentaires les plus signalés</h1>

<div class="container-fluid text-center">
<?php
if (isset($Comments[0])) {
foreach ($Comments as $com)
{
?>
	<div class="comCards card" reports="<?php echo $com->getReports()?>">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-12">
                    <div class="text-secondary text-center"><?php echo $com->getDatePosted() ?></div>
                        <p><strong><?php echo $com->getAuthor() ?></strong></p>
                        <p>
                        <div class=""><strong><?php echo $com->getReports() ?></strong> signalement(s)</div>
                                                </p>
                    <div class="clearfix"></div>
                    <p><?php echo $com->getContent() ?></p>
                    <a class="deleteComBtn float-right btn text-white btn-danger" comID="<?php echo $com->getID()?>"><b>&#x2718</b> Suprimer</a>
                    <a class='btn btn-info float-left' href="<?php echo WEBROOT . 'news/article/' . $com->getNewsID() ?>"><span class='glyphicon glyphicon-edit'></span><b>&#9782</b> Article</a> 
                    <a class='btn btn-dark btn-xs float-left' href="<?php echo WEBROOT . 'admin/showComments/' . $com->getNewsID() ?>"><span class='glyphicon glyphicon-edit'></span><b>&#128172</b> Commentaires de cet article</a> 
        	    </div>
	        </div>
	    </div>
	</div>
<?php
}} else
{
?>
<br>
<p class="Centered">Pas de commentaires à afficher</p>
<?php
}
?>
</div>