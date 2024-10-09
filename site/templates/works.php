<?php snippet('header') ?>

<main class="works">
 
  <ul class="projects"<?= attr(['data-even' => $page->children()->listed()->isEven()], ' ') ?>>
    <?php foreach ($page->children()->listed() as $project): ?>
    <li class="filtrable <?php e($project->superimportant()->bool(), "superimportant") ?> <?= $project->category() ?>">
      <a href="<?= $project->url() ?>">
        
        <?php 
          $image = $project->cover()->toFile();
          if($image):
          $thumb = $image->thumb("crop");
          $important = $project->superimportant()->bool();
          $srcset = $important ? "full" : "small";
          $sizes = $important ? "(min-width: 1420px) calc(40vw - 65px), (min-width: 1220px) calc(50vw - 69px), (min-width: 860px) 60.59vw, (min-width: 460px) calc(100vw - 67px), calc(100vw - 34px)" : "(min-width: 1420px) calc(20vw - 55px), (min-width: 1220px) calc(25vw - 58px), (min-width: 860px) 28.24vw, (min-width: 620px) calc(50vw - 50px), (min-width: 460px) calc(100vw - 67px), calc(100vw - 34px)";
        ?>
          <figure>
          <picture>    
            <source
              srcset="<?= $image->srcset($srcset . 'webp') ?>"
              data-srcset="<?= $srcset . "webp" ?>"
              sizes="<?= $sizes ?>"
              type="image/webp"
              >
            <img
                alt="<?= $image->alt() ?>"
                src="<?= $thumb->url() ?>"
                data-srcset="<?= $srcset . "default" ?>"
                srcset="<?= $image->srcset($srcset . "default") ?>"
                sizes="<?= $sizes ?>"
                loading="lazy"
                width="<?= $image->resize(300)->width() ?>"
                height="<?= $image->resize(300)->height() ?>"
            >
          </picture>  
          <figcaption>
            <h1><?= $project->title() ?></h1>
            <p><?= r($project->subtitle()->isNotEmpty(), $project->subtitle() . " – ", "") ?><?= $project->year() ?></p>
          </figcaption>
        </figure>
        <?php endif ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</main>

<?php snippet('footer') ?>
