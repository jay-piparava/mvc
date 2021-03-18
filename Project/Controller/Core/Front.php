<?php
namespace Controller\Core;

class Front
{
	public function init() {
		$request = \Mage::getController('Model\Core\Request');
		$controllerName = ucfirst($request->getControllerName());
		$actionName = $request->getActionName()."Action";
		$controllerName = self::prepareClassName($controllerName, "Controller");
		$controller = \Mage::getController($controllerName);
		$controller->$actionName();
	}

	public static function prepareClassName($key, $namespace)
	{
		$className = $namespace."_".$key;
		$className = str_replace("_"," ", $className);
		$className = ucwords($className);
		$className = str_replace(" ","\\", $className);
		return $className;
	}
}

?>