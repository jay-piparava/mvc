<?php
namespace Model\Product;

\Mage::getController('Model\Core\Table');
/**
 *
 */
class Media extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTablename('media');
        $this->setPrimaryKey('mediaId');
    }
}
