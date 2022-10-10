<?php snippet('header') ?>

<main class="project" data-selected="1">




    <div class="meta slide" id="intro">
      <header>
        <h1><?= $page->title() ?></h1>
        <?php if ($page->subtitle()): ?>
          <h2><?php echo $page->subtitle()->widont() ?></h2>
        <?php endif; ?>
        <?php if ($page->date()): ?>
          <h2><?php echo $page->date()->toDate('%d·%m·%Y') ?></h2>
        <?php endif; ?>
        <h3><time class="project-year"><?= $page->year() ?></time></h3>        
      </header>
      <div class="intro">
        <?= $page->intro()->kt()->widont() ?>
        <?php if($page->text()->isNotEmpty()): ?>
          <button  class="readmore" id="readmore">En savoir plus</button>
          <button  class="close" id="close">Retour</button>
        <?php endif ?>
      </div>
      <?php if($page->text()->isNotEmpty()): ?>
      <div class="project-text underlink">
        <?= $page->text()->kt()->widont() ?>
      </div>
      <?php endif ?>

      
    </div>

    

    <?php 
      $idx=1;
      foreach ($gallery as $image): ?>
      <figure class="slide <?= e($image->isLandscape(), 'landscape') ?> size-huge" id='s-<?= $idx ?>'>
        <img
            data-flickity-lazyload-src="<?= $image->url() ?>"
            data-flickity-lazyload-srcset="<?php e($image->layout()=='huge', $image->srcset('default'), $image->srcset('default')) ?>"
            alt="<?php e($image->alt()->isNotEmpty(),$image->alt(), $page->title() ) ?>">
            <figcaption>
              <p><?php  e($image->caption()->isNotEmpty(),$image->caption(), $page->title() ) ?></p>
              <p>Photo <span class="copy">©</span>&#8239;<?php  e($image->credits()->isNotEmpty(),$image->credits(), "David Coste" ) ?></p>
            </figcaption>
      </figure>
    <?php $idx++; 
    endforeach ?>

    <div class="slide fluid  " id="s-<?= count($gallery) + 1 ?>" >
        <div class="back">
          <a href="#intro">Retour</a>  
        </div>
        <div class="voiraussi"><p>Voir aussi :</p></div>
      <div class="projects">
        
      <?php
        $session = $kirby->session();
        $vstd = $session->get('davidcoste.vstd', null);

        if($vstd){
          $vstd = array_unique($vstd);
        } else {
          $vstd = [];
        }

        echo('<!--' . count($vstd) . '/' . count($page->siblings(true)) . '-->' );
        if(count($page->siblings(true)) == count($vstd)){
          $session->remove('davidcoste.vstd');
          $vstd = [];
        }
        
        $vstd []= $page->id();
        $session->set('davidcoste.vstd', $vstd);
        $fluid = $page->siblings()->listed()->filter(function($child) use($vstd){
          return !in_array($child, $vstd);
        })->shuffle()->limit(2);

        foreach ($fluid as $project): ?>
        <li>
        <a href="<?= $project->url() ?>">
        <figure>
          <?php
            $cover = $project->cover()->toFile();
            if ($cover):
              $thumb = $cover->resize(450);
              ?>
              <img
                width="<?= $thumb->width() ?>"
                height="<?= $thumb->height() ?>"
                src="<?= $thumb->url() ?>"
                class="lazyload"
                srcset="<?= $cover->srcset("cover") ?>"

                alt="<?= e($cover->alt()->isNotEmpty(), $cover->alt(), $project->title()) ?>">
          <?php endif ?>
          <figcaption>
            <h1><?= $project->title() ?></h1>
            <p><?= $project->subtitle() ?> – <?= $project->year() ?></p>
          </figcaption>
        </figure>
      </a></li>
      <?php endforeach ?>
      </div>
    </div>
    

</main>

<?php snippet('footer') ?>
