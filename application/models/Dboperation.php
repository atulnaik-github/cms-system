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

         // this will get the total post details with author and coategory name
         public function totalPostDetails()
         {
               $this->db->select('tbl_posts.id,tbl_posts.created_at,tbl_posts.post_title,tbl_posts.category_id,tbl_posts.user_id,tbl_posts.is_deleted,tbl_posts.status,tbl_category.category_name,tbl_users.first_name,tbl_users.last_name')
                           ->join('tbl_category','tbl_posts.category_id = tbl_category.id')
                           ->join('tbl_users','tbl_posts.user_id = tbl_users.id')
                           ->order_by('tbl_posts.id','desc');
                           // ->where('tbl_posts.is_deleted !=','0');
                           $result = $this->db->get('tbl_posts');
                           return $result->result();
                           
         }

      	// this will get the details of post with category name and author(post author) name
      	public function getPostDetails($para)
      	{
      		$this->db->select('tbl_posts.id,tbl_posts.created_at,tbl_posts.post_title,tbl_posts.category_id,tbl_posts.user_id,tbl_posts.is_deleted,tbl_posts.status,tbl_category.category_name,tbl_users.first_name,tbl_users.last_name')
      				->join('tbl_category','tbl_posts.category_id = tbl_category.id')
      				->join('tbl_users','tbl_posts.user_id = tbl_users.id')
                              ->where('user_id',$para);
      				$result = $this->db->get('tbl_posts');
      				return $result->result();
      				
      	}

      	// this will get the details of user post with category name and author(post author) name
      	public function getUserPostDetails($para)
      	{
      		$this->db->select('tbl_posts.id,tbl_posts.created_at,tbl_posts.post_title,tbl_posts.category_id,tbl_posts.user_id,tbl_posts.is_deleted,tbl_posts.status,tbl_category.category_name,tbl_users.first_name,tbl_users.last_name')
      				->join('tbl_category','tbl_posts.category_id = tbl_category.id')
      				->join('tbl_users','tbl_posts.user_id = tbl_users.id')
      				->where('user_id',$para)
                              ->where('is_deleted','1');
      				$result = $this->db->get('tbl_posts');
      				return $result->result();
      				
      	}

      	// this will getst the post count of user and userdetails
      	public function getPostCount_and_userDetails()
      	{
      		$this->db->select('count(tbl_posts.user_id) as post_count,
      			tbl_users.id as user_id,
      			tbl_users.first_name as fname,
      			tbl_users.last_name as lname,
      			tbl_users.mobile_number as mobile,
      			tbl_users.dob as date_of_birth,
      			tbl_users.user_status as status');
      		$this->db->where('user_role','0');
      		$this->db->join('tbl_posts', 'tbl_posts.user_id = tbl_users.id','left');
      		$this->db->group_by('tbl_users.id');
      		$result = $this->db->get('tbl_users');
      		return $result->result();
      	}

      	// this will get the total number of users
      	public function totalUsers()
      	{
      		$this->db->select('count(tbl_users.id) as total_users');
      		$this->db->where('user_role','0');
      		$result = $this->db->get('tbl_users');
      		return $result->result();
      	}

      	// this will get the total number of posts
      	public function totalPost()
      	{
      		$this->db->select('count(tbl_posts.id) as total_posts');
                  $this->db->where('is_deleted', '1');
      		$result = $this->db->get('tbl_posts');
      		return $result->result();
      	}

            // this will get the user wise total posts 
            public function postCount($para)
            {
                  $this->db->select('count(tbl_posts.id) as total_posts');
                  $this->db->where('user_id', $para);
                  $this->db->where('is_deleted', '1');
                  $query = $this->db->get('tbl_posts');
                  return $query->result();
            }

            // this will get the total active posts user wise
            public function totalActivePost($para)
            {
                  $this->db->select('count(tbl_posts.id) as total_active_posts');
                  $this->db->where('user_id', $para);
                  $this->db->where('status', '1');
                  $this->db->where('is_deleted', '1');
                  $query = $this->db->get('tbl_posts');
                  return $query->result();
            }

            // this will get the total in-active posts user wise
            public function total_InactivePost($para)
            {
                  $this->db->select('count(tbl_posts.id) as total_inactive_posts');
                  $this->db->where('user_id', $para);
                  $this->db->where('status', '0');
                  $query = $this->db->get('tbl_posts');
                  return $query->result();
            }

             // this will get the total active posts 
            public function total_Active_Post()
            {
                  $this->db->select('count(tbl_posts.id) as total_active_posts');
                  $this->db->where('status', '1');
                  $this->db->where('is_deleted', '1');
                  $query = $this->db->get('tbl_posts');
                  return $query->result();
            }

            // this will get the total in-active posts 
            public function total_Inactive_Post()
            {
                  $this->db->select('count(tbl_posts.id) as total_inactive_posts');
                  $this->db->where('status', '0');
                  $this->db->where('is_deleted', '1');
                  $query = $this->db->get('tbl_posts');
                  return $query->result();
            }

            // this will get the total deleted posts 
            public function deletedPosts()
            {
                  $this->db->select('count(tbl_posts.id) as total_deleted_posts');
                  $this->db->where('is_deleted', '0');
                  $query = $this->db->get('tbl_posts');
                  return $query->result();
            }

            // this will get the last login time of the users
            public function getLastLoginTime($para = '',$table = '')
            {
                  $this->db->where($para);
                  $this->db->order_by('id', 'desc');
                  $this->db->limit(1);
                  $query = $this->db->get($table);                                 
                  return $query->result();
            }

	}
	


 ?>