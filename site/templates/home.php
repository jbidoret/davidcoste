<?php snippet('header') ?>

<main class="home">

    <?php if ($page->featured_type() == "news"): ?>
        <div class="splash news">
            <?php $news = page($page->news()); ?>
            <a href="<?php echo $news->url() ?>" class="splash-text">
                <h1><?php echo $news->title() ?></h1>
                <?php if ($news->subtitle()): ?>
                    <h2><?php echo $news->subtitle() ?></h2>
                <?php endif; ?>
                <?php if ($news->date()): ?>
                    <h2><?php echo $news->date()->toDate('%d·%m·%Y') ?></h2>
                <?php endif; ?>
              </a>
                <?php if ($news->cover()->isNotEmpty()):
                    $image = $news->cover()->toFile();
                    ?>
                    <figure>
                        <img
                            src="<?= $image->url() ?>"
                            sizes="(min-width: 460px) calc(99.02vw - 62px), calc(100vw - 34px)"
                            srcset="<?= $image->srcset("cover") ?>"
                            alt="<?php echo $news->title() ?>">
                    </figure>
                <?php endif; ?>

        </div>
    <?php elseif ($page->featured_type() == "project"): ?>
        <div class="splash news">
            <?php $project = page($page->project()); ?>

                <a href="<?php echo $project->url() ?>" class="splash-text">
                <h1><?php echo $project->title() ?></h1>
                <?php if ($project->subtitle()): ?>
                    <h2><?php echo $project->subtitle() ?></h2>
                <?php endif; ?>
                <?php if ($project->year()): ?>
                    <h2><?php echo $project->year() ?></h2>
                <?php endif; ?>
                </a>
                <?php if ($project->cover()->isNotEmpty()):
                    $image = $project->cover()->toFile();
                    ?>
                    <figure>
                        <img
                            src="<?= $image->url() ?>"
                            sizes="(min-width: 460px) calc(99.02vw - 62px), calc(100vw - 34px)"
                            srcset="<?= $image->srcset("cover") ?>"
                            alt="<?php echo $project->title() ?>">
                    </figure>
                <?php endif; ?>

        </div>
    <?php else: ?>
        <div class="splash random">

        </div>
    <?php endif; ?>
</main>

<?php snippet('footer') ?>
