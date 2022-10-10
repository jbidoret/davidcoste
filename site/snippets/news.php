<ul class="texts-list" >
  <?php
  $texts = page('actualites')->children()->listed();
   ?>
  <?php foreach ($texts as $text): ?>
  <li <?php e($text->isOpen(), ' class="active"') ?> >
    <a href="<?= $text->url() ?>">
      <h1><?= $text->title() ?></h1>
      <h2>
      <?php if ($text->subtitle()->isNotEmpty()): ?>
        <?= $text->subtitle() ?>
      <?php endif; ?>
      </h2>
      <p class="text-date">
        <?= $text->author() ?><?php if ($text->author()->isNotEmpty() && $text->date()->isNotEmpty()): ?>,<?php endif; ?>
        <?= ucfirst($text->date()->toDate('%B %Y') ?? "") ?>
      </p>
    </a>
  </li>
  <?php endforeach ?>
</ul>
