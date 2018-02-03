<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
    <h1>Singlton</h1>
<body>

<?php
class db {

    public $db;

    private static $_inst =null;

    public static function get_instance() {
        if(self::$_inst instanceof self) {
            return self::$_inst;
        }
        return self::$_inst =new self;
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
//db::get_instance();
//db::get_instance();
//db::get_instance();
echo "<pre>";
var_dump(db::get_instance());
echo "</pre>";

?>

</body>
</html>


