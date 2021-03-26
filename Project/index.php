	<?php
	spl_autoload_register(__NAMESPACE__ .'\Mage::loadFileByClassName');
	class Mage
	{
		public function init()
		{
			self::loadFileByClassName('Controller\Core\front');
			\Controller\Core\Front::init();
		}
		public static function getController($className)
		{
			$className = str_replace('\\', ' ', $className);
			$className = ucwords($className);
			$className = str_replace(' ', '\\', $className);
			return new $className;
		}
		public static function loadFileByClassName($className)
		{
			$className = str_replace('\\', ' ', $className);
			$className = ucwords($className);
			$className = str_replace(' ', '/', $className);
			$className = $className . '.php';
			
			require_once $className;
		}

		public static function getModel($className)
		{
			$className = str_replace('\\', ' ', $className);
			$className = ucwords($className);
			$className = str_replace(' ', '\\', $className);
			return new $className;
		}

		public static function getBlock($className)
		{
			$className = str_replace('\\', ' ', $className);
			$className = ucwords($className);
			$className = str_replace(' ', '\\', $className);
			return new $className;
		}
	}
	Mage::init();


	?>