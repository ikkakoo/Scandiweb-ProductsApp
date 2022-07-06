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

        public function add_product($product_data) {
            $this->db->query("INSERT INTO products (products.sku, products.name, products.price, products.type, products.attribute) VALUES (:sku, :name, :price, :type, :attribute);");

            $this->db->bind(':sku', $product_data['sku']);
            $this->db->bind(':name', $product_data['name']);
            $this->db->bind(':price', $product_data['price']);
            $this->db->bind(':type', $product_data['type']);
            $this->db->bind(':attribute', $product_data['attribute']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete($delete_skus) {
            $this->db->query("DELETE FROM products WHERE sku IN ($delete_skus)");

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>