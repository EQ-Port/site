<?php
class FormModel extends CFormModel
{
    protected $_columns;

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
}