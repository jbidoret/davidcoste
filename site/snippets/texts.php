<ul class="texts-list" >
  <?php
  $texts = page('textes')->children()->listed();
   ?>
  <?php foreach ($texts as $text): ?>
  <li <?php e($text->isOpen(), ' class="active"') ?> >
    <a href="<?= $text->url() ?>">
      <h1><?= $text->title()->smartypants() ?></h1>
      <?php if ($text->subtitle()->isNotEmpty()): ?>
        <h2>
          <?= $text->subtitle()->smartypants() ?>
        </h2>
      <?php endif; ?>
      <p class="text-date">
        <?= $text->author() ?><?php if ($text->author()->isNotEmpty() && $text->date()->isNotEmpty()): ?>,<?php endif; ?>
        <?= ucfirst($text->date()->toDate('%B %Y') ?? "") ?>
      </p>
    </a>
  </li>
  <?php endforeach ?>
</ul>
