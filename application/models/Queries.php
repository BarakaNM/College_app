<?php
   class Queries extends CI_Model{

   	    public function getRoles()
        {
   	    	$roles = $this->db->get('tbl_roles');
   	    	if($roles->num_rows() > 0)
            {
   	    		return $roles->result();
   	    	}
   	    }

   	    public function registerAdmin($data)
        {
   	    	return $this->db->insert('tbl_users', $data);
   	    }

        public function chkAdminExist()
        {
            $chkAdmin = $this->db->where(['role_id' => '1' ])->get('tbl_users');
            if($chkAdmin->num_rows()>0)
            {
               return $chkAdmin->num_rows();
            }

          }

        public function adminExist($email, $password ){
            $chkAdmin = $this->db->where(['email'=>$email, 'password'=>$password])->get('tbl_users');        
            if($chkAdmin->num_rows() > 0){
                 return $chkAdmin->row();
            }
            
            }

        public function insCollege($data)
        {
          $check = $this->db->insert('tbl_colleges',$data);
          return $check;
        } 

        public function getCollege()
        {
            $colleges = $this->db->get('tbl_colleges');
            if($colleges->num_rows() > 0){
                return $colleges->result();
            }
        }

        public function insCoadmin($data)
        {
            $inscoad = $this->db->insert('tbl_users', $data);
            return $inscoad;
        }

        public function adStudent($data)
        {
            $insstu = $this->db->insert('tbl_students', $data);
            return $insstu;
        }

        public function viewColleges()
        {
            $this->db->select(['tbl_users.user_id', 'tbl_colleges.college_id','tbl_users.username','tbl_users.email','tbl_roles.role_id', 'tbl_users.gender', 'tbl_colleges.collegename','tbl_colleges.branch','tbl_roles.rolename']);
            $this->db->from('tbl_colleges');
            $this->db->join('tbl_users', 'tbl_users.college_id = tbl_colleges.college_id');
            $this->db->join('tbl_roles', 'tbl_roles.role_id = tbl_users.role_id');
            $users = $this->db->get();
            return $users->result();
        }

        public function fetchStudents($college_id)
        {
            $this->db->select(['tbl_colleges.college_id', 'tbl_students.studentname', 'tbl_students.course','tbl_students.gender','tbl_students.student_id','tbl_colleges.collegename']);
            $this->db->from('tbl_colleges');
            $this->db->join('tbl_students','tbl_students.college_id = tbl_colleges.college_id'
                );
            $this->db->where('tbl_students.college_id', $college_id);
            $studs = $this->db->get();
            return $studs->result();
        }

        public function getStudent($student_id)
        {
            $this->db->select(['tbl_students.studentname','tbl_students.course','tbl_students.gender','tbl_students.student_id','tbl_colleges.collegename','tbl_colleges.college_id']);
            $this->db->from('tbl_students');
            $this->db->join('tbl_colleges','tbl_students.college_id = tbl_colleges.college_id');
            $this->db->where('tbl_students.student_id',$student_id);
            $student=$this->db->get();
            return $student->row();       
        }

        public function updateStudent($id,$data)
        {
            return $this->db->where('student_id',$id)
                            -> update('tbl_students',$data);
                             
        }

        public function deleteData($id){
            return $this->db->delete('tbl_students',['student_id'=>$id]);

        }

        public function coColleges($userid)
        {
            $this->db->select(['tbl_colleges.collegename','tbl_colleges.college_id','tbl_colleges.branch','tbl_users.role_id']);
            $this->db->from('tbl_colleges');
            $this->db->join('tbl_users','tbl_colleges.college_id = tbl_users.college_id');
            $this->db->where('tbl_users.user_id',$userid);
            $cols =  $this->db->get();
            return $cols->result();
        }
     }
     
   

?>