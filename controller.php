<?php
namespace Concrete\Package\Rougemont;

use Package;
use PageTheme;
use Route;
use Concrete\Core\Page\Single as SinglePage;
use Concrete\Core\Backup\ContentImporter;


class Controller extends Package
{

  protected $pkgHandle = 'rougemont';
  protected $appVersionRequired = '8.0';
  protected $pkgVersion = '0.0.2';

  public function getPackageDescription()
  {
    return t('Thème visuel Rougemont 2.0.');
  }

  public function getPackageName()
  {
    return t('Rougemont 2.0');
  }

  public function install()
  {
    $pkg = parent::install();
    PageTheme::add('rougemont', $pkg);
  }
  
  public function on_start()
  {
    // les routes ne permettent pas de surcharger les header
    // Route::register('/hwsimpletestimonials/sortorder', '\Concrete\Package\HwSimpleTestimonials\Controller\SinglePage\Dashboard\SortTestimonialOrder::SortOrder');
    // Au cas où
    // $al = AssetList::getInstance();
    // $al->register('css', 'hw_testimonials', 'css/hw_testimonials.css', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
  }

    public function upgrade()
    {
      $pkg = Package::getByHandle($this->pkgHandle);
      parent::upgrade();
      /* Détruire les pages 
      $p1 = Page::getByPath('/dashboard/hw_simple_testimonials/addtestimonials');
      if (is_object($p1)) {
          $deletePage1 = \Page::getByPath('/dashboard/hw_simple_testimonials/addtestimonials', 'APPROVED');
          $deletePage1->delete();
      }
      */
      $ci = new ContentImporter();
      $ci->importContentFile($pkg->getPackagePath() . '/install.xml');

    }

}
