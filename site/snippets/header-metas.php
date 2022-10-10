<title><?= r($page !== $site->homePage(), $page->title()->html() . ' — ') . $site->title()->html() ?></title>

<?php 
    $description = "";
    if ($page->subtitle()->isNotEmpty()):
        $description .= $page->subtitle()->text() . " — ";
    endif;
    if ($page->year()->isNotEmpty()): 
        $description .= $page->year() . " — ";
    endif; 
    if( $page->intro()->isNotEmpty() ): 
        $description .= $page->intro()->text();      
    endif;
    if($description == "" && $page->text()->isNotEmpty()) :
        $description = $page->text()->excerpt(150)->text();
    endif ?>
    
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $site->keywords()->text() ?>">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= url('assets/favicons/apple-touch-icon.png')?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= url('assets/favicons/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= url('assets/favicons/favicon-16x16.png')?>">
    <link rel="manifest" href="<?= url('assets/favicons/site.webmanifest')?>">
    <link rel="mask-icon" color="#5bbad5" href="<?= url('assets/favicons/safari-pinned-tab.svg')?>">
    <link rel="shortcut icon" href="<?= url('assets/favicons/favicon.ico')?>">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-config" content="<?= url('assets/favicons/browserconfig.xml')?>">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:url" content="<?= $site->url() ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= r($page !== $site->homePage(), $page->title()->html() . ' — ') . $site->title()->html() ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:site_name" content="<?= $site->title() ?>">
    <meta property="og:locale" content="FR_FR">

    <?php
        if ($page->cover()->isNotEmpty()) :
            $cover = $page->cover()->toFile();
        else:
            $home = page('home');
            if ($home->featured_type() == "news"): 
                $news = $home->news()->toPage(); 
                if ($news->cover()->isNotEmpty()):
                    $cover = $news->cover()->toFile();
                endif;
            elseif ($home->featured_type() == "project"): 
                $project = $home->project()->toPage();
                if ($project->cover()->isNotEmpty()):
                    $cover = $project->cover()->toFile();
                endif;
            endif;
        endif;
        $og_cover = $cover->thumb(['width' => 1200, 'height' => 630, 'crop' => true]);

    ?>

    <meta property="og:image" content="<?= $og_cover->url() ?>">
    <meta property="og:image:width" content="<?= $og_cover->width() ?>">
    <meta property="og:image:height" content="<?= $og_cover->height() ?>">
