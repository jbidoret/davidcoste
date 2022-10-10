<?php snippet('header') ?>

<main class="works">
 
  <ul class="projects"<?= attr(['data-even' => $page->children()->listed()->isEven()], ' ') ?>>
    <?php foreach ($page->children()->listed() as $project): ?>
    <li class="filtrable <?php e($project->superimportant()->bool(), "superimportant") ?> <?= $project->category() ?>">
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
                loading="lazy"
                srcset="<?= $cover->srcset("listitem") ?>"
                <?php if ($project->superimportant()->bool()): ?>
                  sizes="(max-width: 700px) 100vw, (max-width: 900px) 66vw, (max-width: 1400px) 45vw, 36vw"
                <?php else: ?>
                    sizes="(max-width: 500px) 100vw, (max-width: 700px) 66vw, (max-width: 900px) 33vw, (max-width: 1400px) 20vw, 18vw"
                <?php endif; ?>

                alt="<?= e($cover->alt()->isNotEmpty(), $cover->alt(), $project->title()) ?>">
          <?php endif ?>
          <figcaption>
            <h1><?= $project->title() ?></h1>
            <p><?= r($project->subtitle()->isNotEmpty(), $project->subtitle() . " – ", "") ?><?= $project->year() ?></p>
          </figcaption>
        </figure>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</main>

<?php snippet('footer') ?>
