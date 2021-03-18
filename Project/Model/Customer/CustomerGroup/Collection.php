<?php
namespace Model\Customer\CustomerGroup;

/**
 *
 */
class Collection
{
    public $data = [];

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function counData()
    {
        return count($this->data);
    }
}
