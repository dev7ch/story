<?php
/**
 * View file for block: GalleryItemBlock 
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-RC3. 
 *
 * @param $this->extraValue('image');
 * @param $this->varValue('caption');
 * @param $this->varValue('image');
 * @param $this->varValue('title');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$image = $this->extraValue('image')->source
?>



<article>
    <a href="images/gallery/fulls/12.jpg" class="image">
        <img src="images/gallery/thumbs/12.jpg" alt="" />
    </a>
    <div class="caption">
        <h3>Title</h3>
        <p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
        <ul class="actions">
            <li><span class="button small">Details</span></li>
        </ul>
    </div>
</article>
