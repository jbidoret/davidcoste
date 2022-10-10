<?php snippet('header') ?>

<main class="texts">

  <header class="text-header">
    <?php if ($page->title()->isNotEmpty()): ?>
      <h1><?= $page->title() ?></h1>
    <?php endif; ?>
    <?php if ($page->subtitle()->isNotEmpty()): ?>
      <h2><?= $page->subtitle() ?></h2>
    <?php endif; ?>
    <?php if ($page->authors()->isNotEmpty()): ?>
      <h3><?= $page->authors() ?></h3>
    <?php endif; ?>
    <?php if ($page->date()->isNotEmpty()): ?>
      <p><?= $page->date()->toDate('%B %Y') ?></p>
    <?php endif; ?>
  </header>


  <div class="text-content">
    <?php if ($page->intro()->isNotEmpty()): ?>
      <?= $page->intro()->kt()->smartypants() ?>
    <?php endif; ?>
    <?php if ($page->text()->isNotEmpty()): ?>
      <?= $page->text()->kt()->smartypants()?>
    <?php endif; ?>
  </div>

  <?php snippet('news') ?>

</main>

<?php snippet('footer') ?>
