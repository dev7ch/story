<?php
/**
 * View file for block: DynamicContentBlock 
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-RC3. 
 *
 * @param $this->cfgValue('color');
 * @param $this->cfgValue('contentAlign');
 * @param $this->cfgValue('imagePosition');
 * @param $this->cfgValue('orientation');
 * @param $this->cfgValue('scheme');
 * @param $this->cfgValue('size');
 * @param $this->cfgValue('style');
 * @param $this->cfgValue('transitionContent');
 * @param $this->cfgValue('transitionImage');
 * @param $this->extraValue('image');
 * @param $this->varValue('blockType');
 * @param $this->varValue('btnLabel');
 * @param $this->varValue('btnLink');
 * @param $this->varValue('image');
 * @param $this->varValue('text');
 * @param $this->varValue('title');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */


$title = $this->varValue('title') ? $this->varValue('title') : 'Explore modularity';

$textMajor = $this->varValue('textMajor') ? $this->varValue('textMajor') : 'A (modular, highly tweakable) responsive one-page template designed by <a href="https://html5up.net">HTML5 UP</a> and released for free under the <a href="https://html5up.net/license">Creative Commons</a>.';
$text = $this->varValue('text') ? $this->varValue('text') : 'This is a <strong>Banner</strong> element, and it\'s generally used as an introduction or opening statement. You can customize its <span class="demo-controls">appearance with a number of modifiers</span>, as well as assign it an optional <code>onload</code> or <code>onscroll</code> transition modifier (<a href="#reference-banner">details</a>).';

$type = $this->varValue('blockType') ? $this->varValue('blockType') . ' ' : 'banner ' ;

$color = $this->cfgValue('color') ? $this->cfgValue('color') . ' ' : '' ;
$style = $this->cfgValue('style') ? $this->cfgValue('style') . ' ' : 'style1 ' ;
$scheme = $this->cfgValue('scheme') ? $this->cfgValue('scheme') . ' ' : '' ;
$orient = $this->cfgValue('orientation') ? $this->cfgValue('orientation') . ' ' : 'orient-left ' ;
$contentAlign = $this->cfgValue('contentAlign') ? $this->cfgValue('contentAlign') . ' ' : 'content-align-left ' ;
$imagePosition = $this->cfgValue('imagePosition') ? $this->cfgValue('imagePosition') . ' ' : 'image-position-right ' ;
$size = $this->cfgValue('size') ? 'fullscreen ' : '' ;

$transContent = $this->cfgValue('transitionContent') ? $this->cfgValue('transitionContent') . ' ' : 'onload-content-fade-left ';
$transImage = $this->cfgValue('transitionImage') ? $this->cfgValue('transitionImage') . ' ' : 'onload-image-fade-right ';

$image = $this->extraValue('image') ? $this->extraValue('image')->source : 'images/banner.jpg' ;
?>

<section class="<?= $type ?><?= $style ?><?= $orient ?><?= $contentAlign ?><?= $imagePosition ?><?= $size ?><?= $scheme ?><?= $color ?><?= $transImage ?><?= $transContent ?>">
    <div class="content">
        <? if (!empty($title)): ?>
        <h1><?= $title ?></h1>
        <? endif; ?>
        <? if (!empty($textMajor)): ?>
        <p class="major"><?= $textMajor ?></p>
        <? endif; ?>
        <? if (!empty($text)): ?>
            <p><?= $text ?></p>
        <? endif; ?>

        <? if (!empty($this->varValue('btnLabel'))): ?>
        <ul class="actions vertical">
            <li><a href="<?= $this->varValue('btnLink')['value'] ?>" class="button big wide smooth-scroll-middle"><?= $this->varValue('btnLabel') ?></a></li>
        </ul>
        <? endif; ?>
    </div>
    <div class="image">
        <img src="<?= $image ?>" alt="" />
    </div>
</section>
