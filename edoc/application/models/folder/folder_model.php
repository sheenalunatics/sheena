<?php
Class Folder_model extends CI_Model
{

function folder_info_insert($data)
 {	
	$ret = $this->db->insert('folder', $data); 
	 if($ret == true)
	{
		return true;
	}
	else
	{
		return false;
	}
 } 


function folderid_check($id)
 {
   $this -> db -> select('folder_id');
   $this -> db -> from('folder');
   $this -> db -> where('folder_id = ' . "'" . $id . "'");
   $this -> db -> limit(1);
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return true;
   }
   else
   {
     return false;
   }
 }

function folder_getall2($num, $offset)
{
	$this->db->select('folder_id,folder_name,division_id,t1.timestamp,t1.action,create_folder');
	//$this->db->order_by("edit_date", "desc");
	//$this->db->distinct();
	$query = $this->db->get('folder', $num, $offset);	
	
    if($query -> num_rows() > 0)
   {
     return $query->result_array();
   }
   else
   {
     return false;
   }
} 

function folder_getall3($num, $offset)
{
	if(empty($offset))$offset = 0;
	$sql = 'select t1.folder_id,t1.folder_name,t1.division_id,t1.timestamp,t1.action,t1.create_folder from folder t1 JOIN (select folder_id, MAX(id) id FROM folder GROUP BY folder_id) t2 ON t1.id = t2.id AND t1.folder_id = t2.folder_id LIMIT '.$offset.','.$num;	
	$query = $this->db->query($sql);

	//SELECT t1. * FROM folder t1 LEFT JOIN folder t2 ON t1.id < t2.id AND t1.folder_id = t2.folder_id WHERE t2.id IS NULL LIMIT 0 , 30;
	
	//$this->db->select('t1.folder_id,max(t1.folder_name) as folder_name,max(t1.division_id) as division_id,max(t1.timestamp) as timestamp,max(t1.action) as action,max(t1.create_folder) as create_folder');
	//$this->db->from('folder t1');
	//$this->db->join('folder t2', 't1.folder_id = t2.folder_id','left');
	////$this->db->where('t1.id > t2.id');
	//$this->db->group_by('t1.folder_id'); 
	//$this->db->order_by("t1.id", "desc");
	//$this->db->distinct();
	//$query = $this->db->get('folder', $num, $offset);	
	
    if($query -> num_rows() > 0)
   {
     return $query->result_array();
   }
   else
   {
     return false;
   }
} 


function folder_getrowbyid($id)
{
	$this->db->select('folder_id,folder_name,division_id,timestamp,action,create_folder');
	$this->db->from('folder');
	$this->db->where('folder_id',$id);
	//$this->db->where_in('username', $names);
	$this->db->order_by("id", "desc");
	//$this->db->distinct();
	//$query = $this->db->get('folder', $num, $offset);	
	$query = $this->db->get();	
	
    if($query -> num_rows() > 0)
   {
     return $query->result_array();
   }
   else
   {
     return false;
   }
} 

function folder_getdistall()
{
   // $this->db->select('folder_id, folder_name');
	//$this->db->from('folder');
	//$this->db->where('action !=','delete');
	//$query = $this->db->get();
	$query = $this->db->query('SELECT t1.folder_id FROM folder t1 LEFT JOIN folder t2 ON t1.id < t2.id AND t1.folder_id = t2.folder_id WHERE t2.id IS NULL and t1.action != "delete" ');
	$ret = array();
	if($query -> num_rows() > 0)
   {
		foreach($query->result_array() as $row){
            $ret[$row['folder_id']] = $row['folder_id'];
        }
   }
  	
   return $ret;
} 

 function folder_getid_dist()
 {
	$this->db->distinct();
	$this->db->select('folder_id');
	$this->db->from('folder');
	
	$query = $this->db->get();
		if($query->num_rows() > 0)
	   {
		 return $query->result_array(); 
	   }
	   else
	   {
		 return false;
	   }
 } 

function folder_countid_dist()
 {
	$this->db->distinct();
	$this->db->select('folder_id');
	$this->db->from('folder');
	$query = $this -> db -> get();
	return $query -> num_rows();	    
 } 


 function folder_info($id)
 {
   $this -> db -> select('folder_id,folder_name,division_id,timestamp,action,create_folder');
   $this -> db -> from('folder');
   $this -> db -> where('folder_id = ' .  $id );
   $this -> db -> order_by('id' , 'desc' );
   $this -> db -> limit(1);
	
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result_array();
   }
   else
   {
     return false;
   }
 } 

 function folder_info2($id)
 {
   $this -> db -> select('folder_id,folder_name,division_id,timestamp,action,create_folder');
   $this -> db -> from('folder');
   $this -> db -> where('folder_id = ' .  $id );
   $this -> db -> order_by('id' , 'desc' );
   $this -> db -> limit(1);
	
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result_array();
   }
   else
   {
     return false;
   }
 } 


 function folder_info_update($id,$data)
 {
	$this->db->where('folder_id', $id);
	$ret = $this->db->update('folder', $data); 
   
   if($ret == true)
   {
     return true;
   }
   else
   {
     return false;
   }
 } 

 function folder_info_del($id)
 {
	$this->db->where('folder_id', $id);
	$ret = $this->db->delete('folder'); 
  
   if($ret == true)
   {
     return true;
   }
   else
   {
     return false;
   }
 }


}
?>