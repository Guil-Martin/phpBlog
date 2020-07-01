<!DOCTYPE html>
<html lang="fr">

    <head>
        <!-- <meta charset="utf-8"> -->

        <title>Jean Forteroche</title>

        <?php /*
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">
        */ ?>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo WEBROOT ?>assets/favicon/favicon.png">
        
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="<?php echo WEBROOT ?>assets/css/bootstrap.css">
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <style>
            body {
                padding-top: 5rem;
            }
        </style>
    
    </head>

    <body>

        <header>
        </header>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="/phpBlog/">Accès au site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo WEBROOT . 'admin' ?>"><b>&#9782</b> Liste des articles <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo WEBROOT . 'admin/showMostReported' ?>"><b>&#128172</b> Commentaires signalés <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="container-fluid">

            <?php
            echo $content_for_layout;
            ?>
            
        </main>

        <footer>
        </footer>

        <!-- jQuery -->
        <script src="<?php echo WEBROOT ?>assets/js/jquery.min.js"></script>
        <!-- AdminMain -->
        <script src="<?php echo WEBROOT ?>assets/js/AdminMain.js"></script>

        <script src="https://cdn.tiny.cloud/1/174jf85zpov9rbn2319xj4d1df7zegfj9wfg3g1ecfmdkq1h/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            tinymce.init({
            selector: '#editTextArea'
            });
        </script>

	    <!-- Bootstrap -->
	    <script src="<?php echo WEBROOT ?>assets/js/bootstrap.min.js"></script>
    </body>
</html>