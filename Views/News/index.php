<div class="row">
    <div class="col-sm-12 d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item"><a class="page-link <?php echo ($CurrentPage - 1) < 1 ? 'd-none' : '' ?>" href="<?php echo WEBROOT . 'news/index/'. ($CurrentPage - 1) ?>">❮</a></li>
            <?php 
            $startPoint = $CurrentPage - 3;
            $endPoint = $CurrentPage + 3;
            if (($CurrentPage - 3) < 1) { $startPoint = 0; }
            if (($CurrentPage + 3) > $NumPages) { $endPoint = $NumPages; }            
            while ($startPoint < $endPoint) { $startPoint++; ?>
            <li class="page-item <?php echo $startPoint == $CurrentPage ? 'active' : '' ?> d-none d-sm-block">
            <a class="page-link" href="<?php echo WEBROOT . 'news/index/'. $startPoint ?>"><?php echo $startPoint ?></a></li>
            <?php } ?>
            <li class="page-item"><a class="page-link <?php echo ($CurrentPage + 1) > $NumPages ? 'd-none' : '' ?>" href="<?php echo WEBROOT . 'news/index/'. ($CurrentPage + 1) ?>">❯</a></li>
            <li class="page-item"><a class="page-link d-block d-sm-none"><?php echo 'Page ' . $CurrentPage . '/' . $NumPages ?></a></li>
        </ul>
    </div>
</div>

<?php

if (!empty($News[0])) :

    foreach (array_chunk($News, 2, true) as $array)
    {

        echo '<div class="row fh5co-post-entry">';

        foreach ($array as $new)
        {
        ?>

            <div class="col-sm-6 col-xs-12 animate-box">
                <figure>
                    <a href="<?php echo WEBROOT . 'news/article/' . $new->getID() ?>"><img src="<?php echo $new->getImage() == '' ? WEBROOT . 'assets/images/news/default.jpg' : WEBROOT . "assets/images/news/articles/" . $new->getImage(); ?>" alt="<?php echo $new->getTitle() ?>" class="img-fluid"></a>
                </figure>
                <span class="fh5co-meta"><a href="<?php echo WEBROOT . 'news/category/' . preg_replace('/é/', 'e', $new->getCategory(), 1) ?>"><?php echo $new->getCategory() ?></a></span>
                <h2 class="fh5co-article-title"><a href="<?php echo WEBROOT . 'news/article/' . $new->getID() ?>"><?php echo $new->getTitle() ?></a></h2>
                <span class="fh5co-meta fh5co-date"><?php echo 'Publié le ' . date("d-m-Y", strtotime($new->getDatePosted())) . '   <b>&#128172;</b>' . $new->getNumComments()?></span>
            </div>

        <?php
        }

        echo '</div>';

    }


else :
?>

<p class="text-center pt-4">Pas d'articles à afficher</p>

<?php
endif;
?>