<?php
namespace Model; 
/**
 * 
 */
class Payment extends Core\Table
{
 	const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;	
	public function __construct(){
		$this->setTablename('payment');
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