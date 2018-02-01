<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
    <h1>Simple Factory</h1>
<body>

<?php
class db {

    public $db;

    private static $_instance =null;
    private static function get_instance() {
        if(self::$_instance instanceof self) {
            return self::$_instance;
        }
        return self::$_instance =new self;
    }
    private function __construct() {
        echo "<h1>Connect to data base</h1>";
        $this->db =new mysqli('localhost', 'root', 'sql123', 'testDB');
        if($this->db->connect_error) {
            throw new DbException("Error connecting: ");
        }

        $this->db->query("SET NAMES 'UTF8'");
    }

    private function get_data() {
        $query = "SELECT * FROM menu";
        $result = $this->db->query($query);
        for($i =0; $i<$result->num_rows; $i++) {
            $row[] =$result->fetch_assoc();
        }
        return$row;
    }
}
db::
//echo "<pre>";
//var_dump($cart);
//echo "</pre>";

?>

</body>
</html>


