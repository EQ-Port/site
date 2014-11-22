<?php
class ActiveRecord extends CActiveRecord
{
    protected $_columns = array();

    function __get($name)
    {
        if (isset($this->_columns[$name])) {
            $name = $this->_columns[$name];
        }

        return parent::__get($name);
    }

    function __set($name, $value)
    {
        if (isset($this->_columns[$name])) {
            $name = $this->_columns[$name];
        }

        return parent::__set($name, $value);
    }

    public function getAttributesByScenario()
    {
        $scenarioAttributes = $this->{'_' . strtolower($this->scenario) . 'Attributes'};

        foreach ($scenarioAttributes as &$attribute) {
            if (isset($this->_columns[$attribute])) {
                $attribute = $this->_columns[$attribute];
            }
        }
        unset($attribute);

        return $scenarioAttributes;
    }

    public static function model($className = null)
    {
        if (empty($className)) {
            $className = get_called_class();
        }
        return parent::model($className);
    }
}