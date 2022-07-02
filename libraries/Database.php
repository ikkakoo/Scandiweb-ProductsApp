<?php 
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASS;
        private $db_name = DB_NAME;

        private $db_handler;
        private $statement;
        private $error;

        public function __construct()
        {
            // set dsn
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

            // set options
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            // create PDO instance
            try {
                $this->db_handler = new PDO($dsn, $this->user, $this->password, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        }

        // prepare statement
        public function query($query) {
            $this->statement = $this->db_handler->prepare($query);
        }

        // bind values
        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default :
                        $type = PDO::PARAM_STR;        
                }
            }
            $this->statement->bindValue($param, $value, $type);
        }

        // execute statement
        public function execute() {
            return $this->statement->execute();
        }

        // return result set
        public function result_set() {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        // return single
        public function single() {
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }
    
    }
?>