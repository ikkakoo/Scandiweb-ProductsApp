<?php 
    class Product {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        // fetch all products
        public function get_all_products() {
            $this->db->query('SELECT * FROM products ORDER BY sku DESC');

            $results = $this->db->result_set();
            return $results;
        }
        
        public function get_categories() {
            $this->db->query('SELECT DISTINCT products.type FROM products');

            $results = $this->db->result_set();
            return $results;
        }

        public function get_by_category($category) {
            $this->db->query("SELECT * FROM products WHERE products.type = '$category'");

            $results = $this->db->result_set();
            return $results;
        }
    }
?>