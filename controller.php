<?php
namespace Concrete\Package\Rougemont;

use Package;
use PageTheme;

class Controller extends Package
{

	protected $pkgHandle = 'rougemont';
	protected $appVersionRequired = '5.7.5.2';
	protected $pkgVersion = '0.1';

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

}
