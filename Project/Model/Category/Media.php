<?php
namespace Model\Category;

\Mage::getController('Model\Core\Table');
/**
 *
 */
class Media extends \Model\Core\Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
    public function __construct()
    {
        $this->setTablename('category_media');
        $this->setPrimaryKey('imageId');
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED => "Disable", //or use self::
            self::STATUS_ENABLE => "Enable",
        ];
    }
}
