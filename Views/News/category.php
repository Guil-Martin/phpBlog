
<h2 class="text-center mb-4"><?php echo isset($News[0]) ? $News[0]->getCategory() : '' ?></h2>

<?php foreach ($News as $new) { ?>

    <div class="row">

        <div class="col-sm mb-5">

            <h2><a href="<?php echo WEBROOT . 'news/article/' . $new->getID() ?>"><?php echo $new->getTitle() ?></a></h2>
            <span><?php echo 'Posté le ' . date("d-m-Y", strtotime($new->getDatePosted())) ?></span>

        </div>

    </div>

<?php } ?>