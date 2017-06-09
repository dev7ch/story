<?php
/**
 * View file for block: GalleryBlock 
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-RC3. 
 *
 * @param $this->cfgValue('galleryStyle');
 * @param $this->cfgValue('lightbox');
 * @param $this->cfgValue('size');
 * @param $this->cfgValue('transition');
 * @param $this->placeholderValue('galleryItem');
 * @param $this->varValue('align');
 * @param $this->varValue('style');
 * @param $this->varValue('text');
 * @param $this->varValue('title');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$title = $this->varValue('title') ? $this->varValue('title') : 'Gallery';
$text = $this->varValue('text') ? $this->varValue('text') : 'This is a <strong>Gallery</strong> element. It can behave as a lightbox (when given the <code>lightbox</code> class), and you can customize its <span class="demo-controls">appearance with a number of modifiers</span>, as well as assign it an optional <code>onload</code> or <code>onscroll</code> transition modifier.';
$align = $this->varValue('align') ? $this->varValue('align') . ' ' : 'align-center ';
$galleryStyle = $this->cfgValue('galleryStyle') ? $this->cfgValue('galleryStyle') . ' ' : 'style2 ';
$size = $this->cfgValue('size') ? $this->cfgValue('size') . ' ' : 'medium ';
$color = $this->cfgValue('color') ? $this->cfgValue('color') . ' ' : '';
$scheme = $this->cfgValue('scheme') ? $this->cfgValue('scheme') . ' ' : '';
$lightbox = $this->cfgValue('lightbox') ? '' : 'lightbox ';
$transition = $this->cfgValue('transition') ? $this->cfgValue('transition') . ' ' : 'onscroll-fade-in ';

?>

<!-- Gallery Wrapper -->
<section class="wrapper style1 <?= $align ?><?= $color ?><?= $scheme ?>">
    <? if ($title || $text ): ?>
    <div class="inner">
        <h2><?= $title ?></h2>
        <p><?= $text ?></p>
    </div>
    <? endif; ?>

    <!-- Gallery -->
    <? if ($this->placeholderValue('galleryItem')): ?>
    <div class="gallery <?= $galleryStyle ?><?= $size ?><?= $lightbox ?><?= $transition ?><?= $color ?>">
        <?= $this->placeholderValue('galleryItem'); ?>
    </div>
    <? endif; ?>

</section>

