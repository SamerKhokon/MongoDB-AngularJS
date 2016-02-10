<?php
	class CrudMongo 
	{
		private $m , $db,$collection;
	
		public function connection()
		{
			$this->m = new MongoClient();
			
			$this->db = $this->m->mydb;
			$this->collection =  $this->db->album;
			return $this->collection;
		}
	
		public function getAllRecords() 
		{
		    //  select all data 
			$col = $this->connection();	   
		    $cursor = $col->find();		   
			$result = array(); 
		    foreach($cursor as $document) 
		    {
			   $result[] = array("id"=>$document['_id'],
			   "name"=>$document['name'] ,
			   "profession"=>$document['profession'] ,
			   "mobile"=>$document['mobile']);
		    }			
            header("Content-type: application/json");			
			echo json_encode($result);
		}
	}	
	
	$c  = new CrudMongo();
	$c->getAllRecords();
?>