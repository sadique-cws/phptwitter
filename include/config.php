<?php
session_start();


class Connection{
	
	private $host = "localhost";
	private $user = "root";
	private $pass ="";
	private $db ="twitter";
	protected $dbc;
	
	function __construct(){
		$this->dbc = new mysqli($this->host,$this->user,$this->pass,$this->db);
		
		
		//error handling
		
		if($this->dbc->connect_error){
			die("fail to connect to mysql:" .$this->dbc->connect_error);
		}
	}
	
}

//function
class Datawork extends Connection{
	public function insertData($table,$fields){
		
		$col = implode(",",array_keys($fields));
		$value = implode("','",array_values($fields));
		$query = "INSERT INTO $table ($col) value('$value')";
		
		
		
		if($this->dbc->query($query)){
			return true;
		}
		else{
			return false;
		}
	}
	
    public function redirect($page){
        echo "<script>window.open('$page.php','_self')</script>";
    }
    
	public function callingData($table,$cond=null){
		$array = array();
        
        if($cond!=null){
            $query = "SELECT * FROM $table where $cond";
        }
        else{
            $query = "SELECT * FROM $table";
        }
        
        while($row = $this->dbc->fetch_array($query)){
            $array[] = $row;
        }
        return $array;
	}
	
    public function CheckData($table,$cond){
        
        $query = "select * from $table where $cond";
        
        $data = $this->dbc->query($query);
        $count = $data->num_rows;
        
        if($count > 0){
            return true;
        }
        else{
            return false;
        }
        
    }
    
	public function deleteData($query){
		
	}
	
	public function updateData($query){
		
	}
	
}

// object creation
$data = new Datawork();


?>