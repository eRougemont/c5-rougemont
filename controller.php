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
  
  public function upgrade()
  {
    $pkg = Package::getByHandle($this->pkgHandle);
    parent::upgrade();
  }

}
