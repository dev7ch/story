<?php 

use app\assets\ResourcesAsset;

ResourcesAsset::register($this);

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->composition->language; ?>">
    <head>
        <title><?= $this->title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="author" content="luya.io">
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <input id="menu-toggler" class="mainnav__toggler" type="checkbox" name="menu-toggler">
    <header id="nav" class="mainnav mainnav--up">
        <label for="menu-toggler">
            <div class="wrapper style1">
                    <div class="mainnav__burger" id="mainnav__burger-11">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>

                </div>
            </div>
        </label>
    </header>

    <ul class="mainnav__list actions vertical align-center">
        <div class="inner">
        <?php foreach (Yii::$app->menu->find()->where(['parent_nav_id' => 0, 'container' => 'default'])->all() as $item): ?>
            <li>
                <a class="mainnav__link button big wide smooth-scroll-middle<?php if (!$item->isActive): ?> special<?php endif;?><?php if ($item->hasChildren == true): ?> icon fa-chevron-down closed<? endif; ?>" href="<?= $item->link; ?>"><?= $item->title; ?></a>
                <? if ($item->hasChildren): ?>
                    <!-- Menu level 2 -->
                    <ul>
                        <? foreach ($item->children as $secondItem): ?>
                            <li class="link">
                                <a class="mainnav__link--sub button small <?php if (!$secondItem->isActive): ?> special<?php endif;?><?php if ($secondItem->hasChildren == true): ?> icon fa-chevron-down closed<? endif; ?>" href="<?= $secondItem->link; ?>"><?= $secondItem->title; ?></a>
                                <!-- Menu level 2 -->
                                <? if ($secondItem->hasChildren): ?>
                                    <ul>
                                        <? foreach ($secondItem->children  as $thirdItem): ?>
                                            <li class="mainnav__link--sub">
                                                <a href="<?= $thirdItem->link; ?>" class="mainnav__link--sub button small<?php if (!$thirdItem->isActive): ?> special<?php endif;?><?php if ($thirdItem->hasChildren == true): ?> icon fa-chevron-down closed<? endif; ?>"><?= $thirdItem->title; ?></a>
                                            </li>
                                        <? endforeach; ?>
                                    </ul>
                                <? endif; ?>
                            </li>
                        <? endforeach; ?>
                    </ul>
                <? endif; ?>
            </li>
        <?php endforeach; ?>
        </div>
    </ul>


    <!-- Wrapper -->
    <div id="wrapper" class="divided">

        <?= $content ?>

        <!-- Footer -->
        <footer class="wrapper style1 align-center">
            <div class="inner">
                <ul class="icons">
                    <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    <li><a href="#" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <p>&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                <img src="https://img.shields.io/badge/Powered%20by-LUYA-brightgreen.svg" />
            </div>
        </footer>

    </div>


    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
