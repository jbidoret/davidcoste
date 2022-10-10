<?php snippet('header') ?>

<main class="about ">

  <div class="social">
    <ul>
      <li><a href="mailto:<?= $page->email() ?>">E-mail</a></li>
      <?php foreach ($page->social()->toStructure() as $social): ?>
      <li><?= html::a($social->url(), $social->platform()) ?></li>
      <?php endforeach ?>
    </ul>
  </div>

  <div class="text underlink">
    <?= $page->text()->kt()->smartypants()?>
    <p class="credits">
      Tous droits réservés, David Coste <span class="copy">©</span> 2020<br>
      Hébergement&nbsp;: <a href="https://alwaysdata.com">Alwaysdata</a><br>
      Design et développement&nbsp;: <a href="https://accentgrave.net/">Julien Bidoret</a><br>
      → <a href="https://getkirby.com/">Kirby</a> * <a href="https://ohnotype.co/">Degular</a>
    </p>
  </div>
 

</main>

<?php snippet('footer') ?>
