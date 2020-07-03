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
        
        $result = $this->dbc->query($query);
        
        while($row = $result->fetch_array()){
            $array[] = $row;
        }
        return $array;
	}
    
    
    public function callingDataJoin($table1,$table2,$on,$cond=null){
		$array = array();
        
        if($cond!=null){
            $query = "SELECT * FROM $table1 JOIN $table2 ON $on where $cond";
        }
        else{
            $query = "SELECT * FROM $table1 JOIN $table2 ON $on";
        }
        
        $result = $this->dbc->query($query);
        
        while($row = $result->fetch_array()){
            $array[] = $row;
        }
        return $array;
	}
    
    
    public function GetUserId(){
        if(isset($_SESSION['user'])){
            $log = $_SESSION['user'];
            $userid = $this->callingData("accounts","email='$log'");
            
            return $userid;
            
        }
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
    
	public function deleteData($table,$cond){
		$data  = $this->dbc->query("DELETE FROM $table where $cond");
        
        if($data){
            return true;
        }
        else{
            return false;
        }
	}
	
	public function updateData($table,$fields,$where){
		$query = "update $table SET $fields WHERE $where";
        $result = $this->dbc->query($query);
        
        return $result;
	}
    
    public function alert($redirect){
        if($_SESSION['msg']!=""){
            $msg = addslashes($_SESSION['msg']);
            echo "<script type='text/javascript'>toastr.success('$msg')</script>";
            unset($_SESSION['msg']);
            
            //$this->redirect($redirect);
        }
        
    }
    
   
}

// object creation
$data = new Datawork();


?>