<?php 
// create product validator class to handle validation
// constructor which takes in _$POST data from form
// check if required fields are present in the $_POST data
// create methods to validate each field
// return error array once all checks are done


class Validator {
    private $data;
    private $errors = [];
    private static $input_fields = ['sku', 'name', 'price'];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate_form() {
        foreach (self::$input_fields as $field) {
            if(!array_key_exists($field, $this->data)) {
                trigger_error("$field does not exist");
                return;
            }
        }
        $this->validate_sku();
        $this->validate_name();
        $this->validate_price();

        return $this->errors;
    }

    public function validate_sku() {
        $value = trim($this->data['sku']);
        $product = new Product;
        $exists = $product->get_row_count($value);
        if (empty($value)) {
            $this->push_error('sku', 'SKU can not be empty');
        } elseif ($product->get_row_count($value) > 0) {
            $this->push_error('sku', 'Product with the given SKU already exists in the database');
        } else {
            if (strlen($value) < 5) {
                $this->push_error('sku', 'SKU must be at least 5 chars');
            }
        }   
    }

    public function validate_name() {
        $value = trim($this->data['name']);

        if (empty($value)) {
            $this->push_error('name', 'Name can not be empty');
        } else{
            if (strlen($value) < 5) {
                $this->push_error('name', 'Name at least 5 chars');
            }
        }
    }    

    public function validate_price() {
        $value = $this->data['price'];

        if (empty($value)) {
            $this->push_error('price', 'Price can not be empty');
        } else{
            if (!is_numeric($value)){
                $this->push_error('price', 'Price must be numeric');
            }
        } 
    }

    private function push_error($key, $value) {
        $this->errors[$key] = $value;
    }
}   