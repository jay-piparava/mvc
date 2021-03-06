<?php
namespace Model;
/**
 * 
 */
class Product extends Core\Table
{
 	const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;	
	public function __construct(){
		$this->setPrimaryKey('productId');
		$this->setTableName('product');
	}
	public function getStatusOptions()
    {
        return [
            self::STATUS_ENABLE=>"Enable",
            self::STATUS_DESABLED=>"Disable" //or use self::
        ];
    }
}

?>