<?php 
namespace Concrete\Package\Rougemont\Theme\Rougemont;

use Concrete\Core\Area\Layout\Preset\Provider\ThemeProviderInterface;

class PageTheme extends \Concrete\Core\Page\Theme\Theme implements ThemeProviderInterface
{
    public function registerAssets()
    {
        $this->providesAsset('javascript', 'jquery');
        $this->providesAsset('css', 'bootstrap');
        $this->providesAsset('css', 'bootstrap/*');
    }

    protected $pThemeGridFrameworkHandle = 'bootstrap3';

    public function getThemeName()
    {
        return t('Rougemont 2.0');
    }

    public function getThemeDescription()
    {
        return t('Le Thème Rougemont 2.0, dérivé de cloneamental');
    }

    public function getThemeBlockClasses()
    {
        return array(
         /*
            'feature' => array('feature-home-page'),
            'page_list' => array(
                'recent-blog-entry',
                'blog-entry-list',
                'page-list-with-buttons',
                'block-sidebar-wrapped',
            ),
            'next_previous' => array('block-sidebar-wrapped'),
            'share_this_page' => array('block-sidebar-wrapped'),
            'content' => array(
                'block-sidebar-wrapped',
                'block-sidebar-padded',
            ),
            'date_navigation' => array('block-sidebar-padded'),
            'topic_list' => array('block-sidebar-wrapped'),
            'testimonial' => array('testimonial-bio'),
            'image' => array(
                'image-right-tilt',
                'image-circle',
            ),
            */
        );
    }

    public function getThemeAreaClasses()
    {
        return array(
          // 'Page Footer' => array('area-content-accent'),
        );
    }

    public function getThemeDefaultBlockTemplates()
    {
        return array(
        );
    }

    public function getThemeResponsiveImageMap()
    {
        return array(
            'large' => '900px',
            'medium' => '768px',
            'small' => '0',
        );
    }

    public function getThemeEditorClasses()
    {
        return array(
          // array('title' => t('Title Thin'), 'menuClass' => 'title-thin', 'spanClass' => 'title-thin', 'forceBlock' => 1),
          // array('title' => t('Title Caps Bold'), 'menuClass' => 'title-caps-bold', 'spanClass' => 'title-caps-bold', 'forceBlock' => 1),
          // array('title' => t('Title Caps'), 'menuClass' => 'title-caps', 'spanClass' => 'title-caps', 'forceBlock' => 1),
          // array('title' => t('Image Caption'), 'menuClass' => 'image-caption', 'spanClass' => 'image-caption', 'forceBlock' => '-1'),
          // array('title' => t('Standard Button'), 'menuClass' => '', 'spanClass' => 'btn btn-default', 'forceBlock' => '-1'),
          // array('title' => t('Success Button'), 'menuClass' => '', 'spanClass' => 'btn btn-success', 'forceBlock' => '-1'),
          // array('title' => t('Primary Button'), 'menuClass' => '', 'spanClass' => 'btn btn-primary', 'forceBlock' => '-1'),
          array('title' => t('Petites capitales'), 'menuClass' => '', 'spanClass' => 'sc', 'forceBlock' => '-1'),
        );
    }

    public function getThemeAreaLayoutPresets()
    {
        $presets = array(
            array(
                'handle' => 'left_sidebar',
                'name' => 'Left Sidebar',
                'container' => '<div class="row"></div>',
                'columns' => array(
                    '<div class="col-sm-4"></div>',
                    '<div class="col-sm-8"></div>'
                ),
            ),
            array(
                'handle' => 'right_sidebar',
                'name' => 'Right Sidebar',
                'container' => '<div class="row"></div>',
                'columns' => array(
                    '<div class="col-sm-8"></div>',
                    '<div class="col-sm-4"></div>'
                ),
            )
        );
        return $presets;
    }
}
