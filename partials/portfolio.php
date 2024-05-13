<?php

$projects = get_data('projects');


// usort($projects['projects'], function ($a, $b) {
//     return strcmp($a["title"], $b["title"]);
// });

// usort($projects['projects'], function ($a, $b) {
//     if ($a['menu_order'] == 0 && $b['menu_order'] == 0) return 1;
//     return $b['menu_order'] +    $a['menu_order'];
// });

// usort($projects['projects'], function ($a, $b) {
//     if ($a['year'] == '' || $b['year'] == '') return 1;
//     return $b['year'] - $a['year'];
// });

usort($projects['projects'], function($a, $b) {
    // Compare by year (descending)
    if ($b['year'] != $a['year']) {
        return $b['year'] - $a['year'];
    }

    // Compare by menu_order (ascending)
    if ($a['menu_order'] != $b['menu_order']) {
        return $a['menu_order'] - $b['menu_order'];
    }

    // Compare by title (a to z)
    return strcmp($a['title'], $b['title']);
});


$portfolio = $blocks['portfolio'];
?>

<section class="portfolio">
    <a class="anchor" id="portfolio"></a>
    <div class="container">
        <div class="content">
            <img class="art" src="/<?= HOME_DIR; ?>assets/img/web-net.svg" alt="">
            <p class="pre-title"><?php echo $portfolio['subtitle']; ?></p>
            <h2 class="title"><?php echo $portfolio['title']; ?></h2>
            <p class="desc">
                <?php echo $portfolio['desc']; ?>
            </p>
        </div>
        <div class="projects">
            <div class="row row-cols-1 row-cols-lg-2 g-4">
                <?php foreach ($projects['projects'] as $project) :
                    $dir = $project['filepath']['dir'];
                    $title = $project['title'];
                    $year = $project['year'];
                    $thumbnail_src = $project['thumbnail'];
                    if (!$title) continue;

                ?>
                    <div class="col">
                        <div class="project" data-project-dir="<?php echo $dir; ?>" data-project-year="<?php echo $year; ?>">
                            <img class="thumbnail" src="<?php echo $thumbnail_src; ?>" alt="">
                            <div class="overlay">
                                <div class="inner">
                                    <h3 class="title">
                                        <?php echo $title; ?>
                                    </h3>

                                    <div class="year">
                                        <?php echo $year; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="action">
            <?php if ($portfolio['final_action']) :
                $caption = $portfolio['final_action']['caption'];
                $text = $portfolio['final_action']['text'];
                $link = $portfolio['final_action']['link'];
            ?>
                <div class="caption"><?php echo $caption; ?></div>
                <a href="<?php echo $link; ?>" class="btn btn-primary"><?php echo $text; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="project-modal" id="projectModal">
    <div class="close" id="closeModal" aria-controls="#projectModal" aria-label="Close">
        <span class="bi-x"></span>
    </div>
    <div class="content">
        <div class="container-fluid">
            <img class="art" src="/<?= HOME_DIR; ?>assets/img/web-net.svg" alt="">
            <h2 class="title"></h2>
            <div class="attr">
                <span class="year"></span>
                <span class="tech"></span>
            </div>
            <div class="desc"></div>
            <a class="link" target="_blank">View website <span class="bi-box-arrow-up-right"></span></a>
            <div class="images"></div>

            <div class="action">
                <div class="caption">Did you get inspired?</div>
                <a href="#contact" class="btn btn-primary">start your project</a>
            </div>
        </div>
    </div>
</div>