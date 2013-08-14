<?php
Class Report_model extends CI_Model
{

function report_insert($data)
 {	
	$ret = $this->db->insert('report', $data); 
	 if($ret == true)
	{
		return true;
	}
	else
	{
		return false;
	}
 } 

function report_getall()
 {
	 $this->db->select('doc_log,doc_id,folder_id,division_id,user_id as user_action,doc_type,report_detail,report_act');
	$this->db->from('report');
	$this->db->order_by('doc_log','desc');
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

function report_getcreate()
 {
	 $this->db->select('doc_log,doc_id,folder_id,division_id,user_id as user_action,doc_type,report_detail,report_act');
	$this->db->from('report');
	$this->db->where('report_act','add');
	$this->db->order_by('doc_log','desc');
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

function report_getedit()
 {
	 $this->db->select('doc_log,doc_id,folder_id,division_id,user_id as user_action,doc_type,report_detail,report_act');
	$this->db->from('report');
	$this->db->where('report_act','edit');
	$this->db->order_by('doc_log','desc');
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

function report_getedit_search($user='',$division='',$from='',$to='')
 {
	$this->db->select('doc_log,doc_id,folder_id,division_id,user_id as user_action,doc_type,report_detail,report_act');
	$this->db->from('report');
	//$this->db->where('report_act','edit');
	$where = " report_act='edit'";
	if($from!=''){
		$where = $where." AND (doc_log >= '".$from."' AND doc_log <= '".$to."') ";
		//$this->db->where($where);
	}
	if($user!=''){
		$where = $where." AND user_id='".$user."'";
	}
	if($division!=''){
		$where = $where." AND division_id='".$division."'";
	}
	$this->db->where($where);
	$this->db->order_by('doc_log','desc');
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

function report_getedit_searchx($user,$division,$fromdate,$todate)
 {
	$this->db->select('doc_log,doc_id,folder_id,division_id,user_id as user_action,doc_type,report_detail,report_act');
	$this->db->from('report');
	$this->db->where('report_act','edit');
	if($fromdate!=''){
		$this->db->where('doc_log >=',$fromdate);
		$this->db->where('doc_log <=',$todate);
	}
	//$this->db->where('doc_log <=','2013-01-31 23:59:59');
	if($user!='')$this->db->where('user_id',$user);
	if($division!='')$this->db->where('division_id',$division);
	
	$this->db->order_by('doc_log','desc');
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

function report_getcreate_searchx($user,$division,$fromdate,$todate)
 {
	$this->db->select('doc_log,doc_id,folder_id,division_id,user_id as user_action,doc_type,report_detail,report_act');
	$this->db->from('report');
	$this->db->where('report_act','add');
	if($fromdate!=''){
		$this->db->where('doc_log >=',$fromdate);
		$this->db->where('doc_log <=',$todate);
	}
	//$this->db->where('doc_log <=','2013-01-31 23:59:59');
	if($user!='')$this->db->where('user_id',$user);
	if($division!='')$this->db->where('division_id',$division);
	
	$this->db->order_by('doc_log','desc');
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

function report_getdelete_searchx($user,$division,$fromdate,$todate)
 {
	$this->db->select('doc_log,doc_id,folder_id,division_id,user_id as user_action,doc_type,report_detail,report_act');
	$this->db->from('report');
	$this->db->where('report_act','delete');
	if($fromdate!=''){
		$this->db->where('doc_log >=',$fromdate);
		$this->db->where('doc_log <=',$todate);
	}
	//$this->db->where('doc_log <=','2013-01-31 23:59:59');
	if($user!='')$this->db->where('user_id',$user);
	if($division!='')$this->db->where('division_id',$division);
	
	$this->db->order_by('doc_log','desc');
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

function report_get_searchx($user,$division,$fromdate,$todate)
 {
	$this->db->select('doc_log,division_id,user_id as user_action,report_detail,report_act');
	$this->db->from('report');
	$this->db->where('report_act','login');
	$this->db->or_where('report_act','logout');
	if($fromdate!=''){
		$this->db->where('doc_log >=',$fromdate);
		$this->db->where('doc_log <=',$todate);
	}
	//$this->db->where('doc_log <=','2013-01-31 23:59:59');
	if($user!='')$this->db->where('user_id',$user);
	if($division!='')$this->db->where('division_id',$division);
	
	$this->db->order_by('doc_log','desc');
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

/*
function documentid_check($id)
 {
   $this -> db -> select('doc_id');
   $this -> db -> from('document');
   $this -> db -> where('doc_id = ' . "'" . $id . "'");
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

 function document_countid_dist()
 {
	$this->db->distinct();
	$this->db->select('document_id');
	$this->db->from('document');
	$query = $this -> db -> get();
	return $query -> num_rows();	    
 } 

function document_search($key)
 {
	 $this->db->select('doc_id,doc_name,doc_type,doc_detail,division_id,folder_id,timestamp,action,create_document,doc_path');
	$this->db->from('document');
	$this->db->like('doc_id', $key);
	$this->db->or_like('doc_name', $key); 
	$this->db->or_like('doc_type', $key); 
	$this->db->or_like('doc_detail', $key); 
	$this->db->order_by('doc_id');
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


function document_search_all()
 {
	 $this->db->select('doc_id,doc_name,doc_type,doc_detail,division_id,folder_id,timestamp,action,create_document,doc_path');
	$this->db->from('document');
	//$this->db->like('doc_id', $key);
	//$this->db->or_like('doc_name', $key); 
	//$this->db->or_like('doc_type', $key); 
	//$this->db->or_like('doc_detail', $key); 
	$this->db->order_by('doc_id');
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

 function document_docname_all()
 {
	 $this->db->select('doc_name');
	$this->db->from('document');
	//$this->db->like('doc_id', $key);
	//$this->db->or_like('doc_name', $key); 
	//$this->db->or_like('doc_type', $key); 
	//$this->db->or_like('doc_detail', $key); 
	//$this->db->order_by('doc_id');
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

function document_info($id)
 {
   $this -> db -> select('doc_id,doc_name,doc_type,doc_detail,division_id,folder_id,timestamp,action,create_document,doc_path');
   $this -> db -> from('document');
   $this -> db -> where('doc_id = ' .  $id );
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

function document_getid()
 {
   $this -> db -> select('doc_id');
   $this -> db -> from('document');
   //$this -> db -> where('doc_id = ' .  $id );
   $this -> db -> order_by('doc_id','desc');
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

 function document_info_del($id)
 {
	$this->db->where('doc_id', $id);
	$ret = $this->db->delete('document'); 
  
   if($ret == true)
   {
     return true;
   }
   else
   {
     return false;
   }
 }

 function document_info_update($id,$data)
 {
	$this->db->where('doc_id', $id);
	$ret = $this->db->update('document', $data); 
   
   if($ret == true)
   {
     return true;
   }
   else
   {
     return false;
   }
 } 
*/

}
?>