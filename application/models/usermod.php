<?php defined('BASEPATH') or exit('No direct script access allowed');
	class Usermod extends CI_Model
	{
		private $_table = 'userakses';
		
		public function rules(){
			return[
				['field' => 'users',
				 'label' => 'users',
				 'rules' => 'required'],
				['field' => 'passwords',
				 'label' => 'passw',
				 'rules' => 'required']
			];
		}
		
		public function simpanuser(){
			$post = $this->input->post();
			$this-> username    		= $post["users"];
			$this-> password			= password_hash($post["passw"],PASSWORD_DEFAULT);
			$this-> nama	 		= $post["nama"];
			$this->	section 			= (empty($post["ck1"]) ? "0" : "1").(empty($post["ck2"]) ? "0" : "1").(empty($post["ck3"]) ? "0" : "1").(empty($post["ck4"]) ? "0" : "1").(empty($post["ck5"]) ? "0" : "1").(empty($post["ck6"]) ? "0" : "1").(empty($post["ck7"]) ? "0" : "1").(empty($post["ck8"]) ? "0" : "1");
			$this-> singkatan			= 1;
			$this->	leveluser			= $post["avatr"];
			
			$this->db->insert($this->_table, $this);
			return $this->db->insert_id();
		}
		
		
		public function getusers(){
			$this->db->select('users, nama, akses,objectid, status');
			$this->db->from('userakses');
			$rows=$this->db->get();
			return $rows->result();
			
		}
		
		public function getbyid($id){
			return $this->db->get_where($this->_table,["objectid" =>$id])->result();
		}
		
		public function getrow($id){
			return $this->db->get_where($this->_table,["objectid" =>$id])->num_rows();
		}
		
		public function nonaktifuser($id){
			$post = $this->input->post();
			$this-> status	 	= 0;
			$this->db->update($this->_table, $this, array('objectid' => $id));
		
		}
		
		public function reaktifuser($id){
			$post = $this->input->post();
			$this-> status	 	= 1;
			$this->db->update($this->_table, $this, array('objectid' => $id));
		
		}
		
		public function edituser(){
			$post = $this->input->post();
			$this-> objectid	 	= $post["oida"];
			$this-> users			= $post["users"];
			//$this->	passwords		= password_hash($post["passw"],PASSWORD_DEFAULT);
			$this->	avatar			= $post["avatr"];
			$this-> akses			= (empty($post["ck1"]) ? "0" : "1").(empty($post["ck2"]) ? "0" : "1").(empty($post["ck3"]) ? "0" : "1").(empty($post["ck4"]) ? "0" : "1").(empty($post["ck5"]) ? "0" : "1").(empty($post["ck6"]) ? "0" : "1").(empty($post["ck7"]) ? "0" : "1").(empty($post["ck8"]) ? "0" : "1");
			$this-> nama			= $post["nama"];

			
			$this->db->update($this->_table, $this, array('objectid' => $post['oida']));
			return $post["oida"];
			
		}
		
		public function gantipass(){
			$post = $this->input->post();
			if($post["passw"]!=""){
				$this->	passwords		= password_hash($post["passw"],PASSWORD_DEFAULT);
			}
			$this->	avatar			= $post["avatr"];
			$this->db->update($this->_table, $this, array('objectid' => $post['oida']));
			return $post["oida"];
			
		}
		
		public function cariusers($user){
			$this->db->select('username , nama, section,singkatan, email, aktif, dev');
			$this->db->from('userakses');
			$this->db->where('username',$user);
			$rows=$this->db->get();
			return $rows->result();
			
		}
		public function doLogin(){
			$post = $this->input->post();

			// cari user berdasarkan email dan username
			$this->db->where('username', $post["txtusername"]);
			$user = $this->db->get($this->_table)->row();

			// jika user terdaftar
			if($user){
				// periksa password-nya
				
				

				// jika password benar dan dia admin
				if($user->password == md5($post["txtpassword"])){ 
					// login sukses yay!
					
					//$this->_updateLastLogin($user->user_id);
					/*$ps1 = password_hash($post["passw"], PASSWORD_DEFAULT);
					$ps2 = $use->passwords; 
					$cek = $ps1."-".$ps2;*/
					return true;
				}
			}
			
			// login gagal
			return false;
		}
		
		
	}
?>