<?php
$title = get_field('title');
$subtitle = get_field('subtitle');
$personal_info = get_field('personal_information');
$form_title = get_field('form_title');
$form_subtitle = get_field('form_subtitle');


?>

<section class="contact">
    <div class="title-container">
        <?php if ($title) { ?>
            <div class="title-block">
                <?php $title_parts = explode(' ', $title, 2); ?>
                <h2>
                    <span class="black-text"><?php echo esc_html($title_parts[0]); ?></span> <span class="coloured-text"><?php echo esc_html($title_parts[1]); ?></span>
                </h2>
            </div>
        <?php } ?>
    </div>
    <div class="contact-container">
        <div class="info">
            <?php if ($subtitle) { ?>
                <div class="container-top">
                    <h3><?php echo esc_html($subtitle); ?></h3>
                </div>
            <?php } ?>
            <?php if ($personal_info) { ?>
                <div class="container-bot">
                    <?php echo ($personal_info); ?>
                </div>
            <?php } ?>
        </div>
        <div class="form">
            <?php if ($form_title) { ?>
                <div class="container-top">
                    <h3><?php echo esc_html($form_title); ?></h3>
                </div>
            <?php } ?>
            <?php if ($form_subtitle) { ?>
                <div class="container-bot">
                    <?php echo ($form_subtitle); ?>
                </div>
            <?php } ?>
            [contact-form-7 id="e6ed534" title="Pickled Form"]
        </div>

</section>