<!DOCTYPE html>
<html lang="<?php echo $kirby->language() ?? 'fr' ?>"  class="no-js">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="cleartype" content="on">
  <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
  <?php snippet("header.metas") ?>

  <?php
    if ( option('environment') == 'local' ) :
      foreach ( option('basic-devkit.assets.styles', array()) as $style):
        echo css($style.'?version='.md5(uniqid(rand(), true)));
      endforeach;
    else:
      echo css('assets/production/all.min.css');
    endif
  ?>

</head>
<body
   data-login="<?php e($kirby->user(),'true', 'false') ?>"
   data-template="<?php echo $page->template() ?>"
   data-intended-template="<?php echo $page->intendedTemplate() ?>">


    <div class="page">

        <header class="header">
          <span class="logo"><a  href="<?= $site->url() ?>"><span><?= $site->title() ?></span></a></span>
          <button type="button" id="togglemenu" aria-haspopup="true" aria-expanded="false" aria-controls="menu" aria-label="Navigation">
            <div id="hamburger"><div></div><div></div><div></div></div>
          </button>
          <nav class="nav" id="menu">
            <ul>
              <?php foreach($site->children()->listed() as $item): ?>
              <li>
                <a <?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>">
                  <span><?= $item->title()->html() ?></span>
                </a>
                <?php if($page->depth() > 1 && $item->isOpen()) : ?>
                  <span class="current-project">
                  → <a href="<?= $page->url() ?>" class="active"><span><?= $page->title()->excerpt(38) ?></span></a>
                  </span>
                <?php endif ?>
                <?php if($page->id() == "travaux" && $item->isOpen()) : ?>
                  <ul class="subnav" >
                    <li><a class="filter" href="#expositions"><span>Expositions</span></a></li>
                    <li><a class="filter" href="#oeuvres"><span>Œuvres</span></a></li>
                    <li><a class="filter" href="#workshops"><span>Workshops</span></a></li>
                    <li><a class="filter" href="#editions"><span>Éditions</span></a></li>
                  </ul>
                <?php endif ?>
              </li>
              <?php endforeach ?>
            </ul>
          </nav>

        </header>
