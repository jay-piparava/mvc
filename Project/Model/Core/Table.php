<?php
namespace Model\Core;

class Table
{

    public function __construct()
    {

    }
    protected $tableName = null;
    protected $primaryKey = null;
    public $data = [];
    protected $adapter = null;
    protected $arrayData = [];

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }
    public function getTableName()
    {
        return $this->tableName;
    }

    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
    }
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }
    public function __get($value)
    {
        if (!array_key_exists($value, $this->data)) {
            return null;
        }
        return $this->data[$value];
    }

    public function setData(array $data)
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }
    public function getData($key)
    {
        return $this->data;
    }

    public function setAdapter()
    {
        $this->adapter = \Mage::getModel('Model\Core\Adapter');
    }
    public function getAdapter()
    {
        if (!$this->adapter) {
            $this->setAdapter();
        }
        return $this->adapter;
    }

    //save() for save data in database
    public function save()
    {
        if (array_key_exists($this->getPrimaryKey(), $this->data)) {
            $filed = array_keys($this->data);
            $value = array_values($this->data);
            $final = null;
            $id = '';
            for ($i = 0; $i < count($filed); $i++) {
                if ($filed[$i] == $this->getPrimaryKey()) {
                    $id = $value[$i];
                    continue;
                }
                $final = $final . "`" . $filed[$i] . "`='" . $value[$i] . "',";
            }
            $final = rtrim($final, ",");
            $query = "UPDATE `{$this->getTableName()}` SET {$final} WHERE `{$this->getPrimaryKey()}` = '{$id}'";
            $adapter = $this->getAdapter();
            $adapter->update($query);
            // if($adapter->update($query)){
            //     return true;
            // }
            // return false;
        } else {
            $values = null;
            $filedName = null;
            foreach (array_keys($this->data) as $value) {
                $filedName = $filedName . "`$value`,";
            }
            foreach (array_values($this->data) as $value) {
                $values = $values . "'$value',";
            }
            $filedName = rtrim($filedName, ",");
            $values = rtrim($values, ",");
            $query = "INSERT INTO `{$this->getTableName()}`({$filedName}) VALUES ({$values})";
            $adapter = $this->getAdapter();
            $id = $adapter->insert($query);
            // if($id = $adapter->insert($query)){
            //     return $id;
            // }
            // return false;
        }
        $this->load($id);
        return $this;
    }
    //for fatch specific row
    public function load($value = null, $query = null)
    {
        if (!$query) {
            $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = '$value'";
        }
        $row = $this->getAdapter()->fetchRow($query);

        if (!$row) {
            return false;
        }
        $this->data = $row;
        return $this;
    }
    //for fatch a all records
    public function all($query = null)
    {
        if (!$query) {
            $query = "SELECT * FROM `{$this->getTableName()}`";
        }
        $rows = $this->getAdapter()->fetchAll($query);
        if (!$rows) {
            return false;
        }
        foreach ($rows as $key => $value) {
            $key = new $this;
            $key->setData($value);
            $rowArray[] = $key;
        }
        $className = get_class($this) . '\Collection';
        $collection = \Mage::getController($className);
        $collection->setData($rowArray);
        unset($rowArray);
        return $collection;

    }
    //for delete the data from database
    public function delete($value)
    {
        $query = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = '$value'";
        if ($this->getAdapter()->delete($query)) {
            return true;
        }
        return false;
    }
    public function deleteByQuery($query)
    {
        if ($this->getAdapter()->delete($query)) {
            return true;
        }
        return false;
    }
    public function update($query)
    {
        $adapter = $this->getAdapter();
        if ($adapter->update($query)) {
            return true;
        }
        return false;
    }

    public function setArrayData(array $key, array $value)
    {
        $this->arrayData = array_combine($key, $value);
        return $this;
    }
    public function getArrayData(Type $var = null)
    {
        return $this->arrayData;
    }
    public function arrayUpdate($id)
    {
        $data = $this->getArrayData();
        foreach ($data as $key => $value) {
            $row = implode(',', $value);
            $query = "UPDATE `{$this->getTableName()}` SET $key = '$row' WhERE `{$this->getPrimaryKey()}` = '$id'";
            $this->getAdapter()->update($query);
        }
        return $this;
    }
}
