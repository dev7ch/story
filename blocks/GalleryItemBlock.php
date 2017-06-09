<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Gallery Item Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-RC3. 
 */
class GalleryItemBlock extends PhpBlock
{
    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;
    
    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Gallery Item';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'image'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'title', 'label' => 'Title', 'type' => self::TYPE_TEXT],
                 ['var' => 'caption', 'label' => 'Caption', 'type' => self::TYPE_TEXTAREA],
                 ['var' => 'image', 'label' => 'Image', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                 ['var' => 'btnLabel', 'label' => 'Button Label', 'type' => self::TYPE_TEXT],
                 ['var' => 'link', 'label' => 'Link', 'type' => self::TYPE_LINK],
            ],
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
            'imageAdmin' => BlockHelper::imageUpload($this->getVarValue('image'), 'small-thumbnail', true),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{extras.image}}
     * @param {{vars.caption}}
     * @param {{vars.image}}
     * @param {{vars.title}}
    */
    public function admin()
    {
        return '<p>Gallery Item Block Admin View</p>';
    }
}