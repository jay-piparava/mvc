<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
/**
 * 
 */
class Customer extends Core\Table
{
	const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
	public function __construct(){
		$this->setTablename('customer');
		$this->setPrimaryKey('customerId');
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