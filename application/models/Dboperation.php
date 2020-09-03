<?php 

	
	class Dboperation extends CI_Model{
    	public function __construct() {
			parent::__construct();
	        //This will set the Indian time zone  
			date_default_timezone_set('Asia/Kolkata');
		}

		// this will store the details in the table
		public function add($table='', $data=''){
			$this->db->trans_start();
			$this->db->insert($table, $data);
			if ($this->db->trans_complete()) {
				return true;
			} else {
				return false;
			}
		}

		// this will get the all table details
		public function getTable($table=''){
			$query = $this->db->get($table);                                 
			return $query->result();
		}

		// this will get the table details with condition
		public function get($table='', $para=''){
			$query = $this->db->get_where($table, $para);                                 
			return $query->result();
		}

		// this will modify the table data
		public function modify($table='', $para='', $data='')
		{
			$this->db->trans_start();
			$this->db->where($para);
			$this->db->update($table, $data);
			if ($this->db->trans_complete()) {
				return true;
			} else {
				return false;
			}
		}

		// this will delete the record
		public function delete($table='', $para='')
		{
			$this->db->trans_start();
			$this->db->where('id', $para);
			$this->db->delete($table);
			if ($this->db->trans_complete()) {
				return true;
			} else {
				return false;
			}
		}

		// this will login the user
		public function userLogin($table='', $data='')
		 {
		 	$this->db->where($data);
		 	$query = $this->db->get($table);
		 	return $query->row();
		 } 

      	// this will gets post count of each category
      	public function getCategory_and_postDetails()
      	{
      		$this->db->select('count(tbl_posts.category_id) as post_count,tbl_posts.id,tbl_posts.category_id,tbl_category.id,tbl_category.category_name,tbl_category.status,tbl_category.created_at')
      				->join('tbl_category','tbl_posts.category_id = tbl_category.id','right')
      				->group_by('tbl_category.category_name');
      				// ->order_by('tbl_category.category_name');
      		$result = $this->db->get('tbl_posts');
      		return $result->result();
      	}

      	// this will get the details of post with category name and author(post author) name
      	public function getPostDetails()
      	{
      		$this->db->select('tbl_posts.id,tbl_posts.created_at,tbl_posts.post_title,tbl_posts.category_id,tbl_posts.user_id,tbl_posts.is_deleted,tbl_posts.status,tbl_category.category_name,tbl_users.first_name,tbl_users.last_name')
      				->join('tbl_category','tbl_posts.category_id = tbl_category.id')
      				->join('tbl_users','tbl_posts.user_id = tbl_users.id');
      				$result = $this->db->get('tbl_posts');
      				return $result->result();
      				
      	}
	}
	


 ?>