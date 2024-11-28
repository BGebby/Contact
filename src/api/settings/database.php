<?php
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $servername = "db";
        $username = "user";
        $password = "userpassword";
        $dbname = "mydatabase";

        try {
            // Crear la conexión con PDO
            $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
            $this->connection = new PDO($dsn, $username, $password);
            
            // Configurar el modo de error de PDO
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>