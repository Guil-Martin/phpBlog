<div class="row fh5co-post-entry single-entry justify-content-md-center">
   
<article class="col-lg-8 col-xs-12">
    
    <figure class="animate-box">
        <?php if ($News[0]->getImage() == '') { ?>
            <img src="<?php echo WEBROOT . 'assets/images/news/default.jpg' ?>" alt="Image" class="img-fluid">
        <?php } else { ?>
            <img src="<?php echo WEBROOT . 'assets/images/news/articles/' . $News[0]->getImage() ?>" alt="<?php echo $News[0]->getTitle() ?>" class="img-fluid">
        <?php } ?>
    </figure>

    <span class="fh5co-meta animate-box"><a href="<?php echo WEBROOT . 'news/category/' . $News[0]->getCategory() ?>"><?php echo $News[0]->getCategory() ?></a></span>
    <h2 class="fh5co-article-title animate-box text-center"><a href="single.html"><?php echo $News[0]->getTitle() ?></a></h2>
    <span class="fh5co-meta fh5co-date animate-box"><?php echo 'Posté le ' . date("d-m-Y", strtotime($News[0]->getDatePosted())) ?></span>
    
    <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
        <div class="row">
            <div class="col-lg-12 cp-r animate-box">
                <?php echo $News[0]->getContent() ?>
            </div>
        </div>
    </div>

</article>

</div>


<div class="row">


<div class="col-md-11 col-xl-6 mx-auto">
    <h2 id="#commentForm" class="font-weight-bold text-center">Laisser un commentaire</h2>


        <form action="<?php echo WEBROOT . 'news/createComment/' . $News[0]->getID() ?>" method="POST">

            <!-- Name -->
            <label for="author">Votre nom</label>
            <input type="text" name="author" id="author" class="form-control" required>

            <!-- Comment -->
            <div class="form-group">
                <label for="content">Votre commentaire</label>
                <textarea class="form-control" name="content" id="content" rows="5" required></textarea>
            </div>

            <div class="text-center pt-2 pb-5">
                <button class="btn btn-info btn-md" type="submit">Poster</button>
            </div>

        </form>

</div>

</div>

<div class="row">

<div class="container-fluid">


<?php if (!empty($Comments)) {
foreach ($Comments as $com)
{
?>


<div class="card p-1 fadeIn col-md-11 col-xl-6 mx-auto mb-3">
    <div class="card-body p-0">

        <div class="border-bottom">
        <strong><?php echo $com->getAuthor() ?></strong>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo 'Posté le ' . date("d-m-Y", strtotime($com->getDatePosted())) ?></h6>
        </div>

        <p class="mt-4 ml-2"><?php echo $com->getContent() ?></p>
        <button class="reportBtn btn text-white btn-danger float-right" comID="<?php echo $com->getID()?>" comNewsID="<?php echo $com->getNewsID()?>">Signaler</button>
    </div>
</div>




<?php
}} else { ?> <p class="text-center">Pas de commentaires</p> <?php } ?>

</div>

</div>