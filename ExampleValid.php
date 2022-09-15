<?php
class ExampleValid
{
    private $result = [];
    
    public function __construct(ExampleFields $obj)
    {
        $this->field1($obj->field1);
        $this->field2($obj->field2);
        $this->field3($obj->field3);
    }

    private function field1($value)
    {
        if (empty($value)) {
            $this->result[] = "field 1 invalid";
        }
    }

    private function field2($value)
    {
        if (!is_numeric($value)) {
            $this->result[] = "field 2 invalid";
        }
    }
    
    private function field3($value)
    {
        if (!is_bool($value)) {
            $this->result[] = "field 3 invalid";
        }
    }    

    public function getResult()
    {
        return $this->result;
    }
}

class ExampleFields
{
    public $field1;
    public $field2;
    public $field3;

    public function __construct($field1, $field2, $field3)
    {
        $this->field1 = "";
        $this->field2 = "";
        $this->field3 = "";
    }
}

$fields = new ExampleFields("field 1", "field 2", "field 3");
$valid = new ExampleValid($fields);

echo implode(", ", $valid->getResult());