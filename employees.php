<?php
    class Employee{
        // Connection
        private $conn;
        // Table
        private $db_table = "esp32_table_dht11_leds_record";
        // Columns
        public $id;
        public $board;
        public $temperature;
        public $humidity;
        public $status_read_sensor_dht11;
        public $LED_01;
		public $LED_02;
        public $time;
        public $date;
		
		
		
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getEmployees(){
            $sqlQuery = "SELECT id, board, temperature, humidity, status_read_sensor_dht11, LED_01, LED_02, time, date FROM esp32_table_dht11_leds_record";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        
        
    }
?>