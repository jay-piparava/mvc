<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
/**
 * 
 */
class Shiping extends Core\Table
{
 	const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;	
	public function __construct(){
		$this->setTablename('shiping');
		$this->setPrimaryKey('methodId');
	}
	public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED=>"Disable", //or use self::
            self::STATUS_ENABLE=>"Enable"
        ];
    }
}

?>