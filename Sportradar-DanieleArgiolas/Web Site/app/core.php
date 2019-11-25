<?php 
 /**
 * 
 */
class DB_actions {

    private $db_name = 'sportrad';
	private $db_user = 'root';
	private $db_pass = '';
	private $db_host = 'localhost';
    private $conn;

    public function connection() {
		$this->conn = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
		if ($this->conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}
	}
	public function read($table, $join='', $where='', $fields='*' ) {
        $this->connection();
        $sql = "SELECT ".$fields." FROM ".$table." ".$join." ".$where." ;";
        $result = $this->conn->query($sql);
        $this->conn->close();
        if($result->num_rows == 0){
           $res = "No result";
        }else{
           $res = $result->fetch_all(MYSQLI_ASSOC);
        }

        return $res;
    }

    public function create($table, $columns, $push){
        $this->connection();
    	$query = 'INSERT INTO '.$table.'('.$columns.') VALUES ('.$push.')';
    	 echo '<h3>'.$query.'</h3>';
        if ($this->conn->query($query)) {
            $res = 'success';
        } else {
            $res = 'fail';
            echo $mysqli->error;
        }
    	$this->conn->close();
        return $res;

    }

    public function delete($table, $condition){
        $this->connection();
    	$sql = "DELETE FROM ".$table." WHERE ".$condition;
        $this->conn->query($sql);
        $this->conn->close();
    }

}

$action = new DB_actions();
?>