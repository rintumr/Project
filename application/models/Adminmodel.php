<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* class in model for admin functionalities
* @param void
* @return void
**/
class Adminmodel extends CI_Model {

	/**
	 * Function for admin to view the question list
	 * @param void
	 * @return array
	 **/
	public function getQuizList()
	{
		$query=$this->db->get('Quiz');
		return $query->result();
	}

	/**
	* Function for admin to view question details
	* @param variable
	* @return array
	**/
	public function getQuestion($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('Quiz');
		return $query->result();
	}
	/**
	* Function to delete a question
	* @param variable
	* @return bool
	**/
	public function deleteQuestion($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('Quiz')){
			return true;
		}else{
			return fALSE;
		}
	}
	/**
	* Function to edit a question
	* @param variable
	* @return bool
	**/
	public function editQuestion($data,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('Quiz',$data)){
			return true;
		}else{
			return false;
		}
	}

	/**
	* Function to save a question to the db
	* @param array
	* @return bool
	**/
	public function saveQuestion($credentials)
	{
		if($this->db->insert('Quiz',$credentials)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/**
	* Function to show the result
	* @param void
	* @return void
	**/
	public function getResult()
	{
		$query=$this->db->get('Results');
		return $query->result();
	}

	/**
	* Function to load the create password page
	* @param void
	* @return array
	**/
	public function viewUser()
	{
		$query=$this->db->get('Userdetails');
		return $query->result();
	}

	/**
	* Function to save the generated password
	* @param variable
	* @return bool
	**/
	public function savePassword($details, $id)
	{
		$this->db->where('Id',$id);
		if($this->db->update('Userdetails', $details)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/**
	* Function to check whether an user exists or not
	* @param array
	* @return bool
	**/
	public function checkIfUserExists($data)
	{
		$this->db->where('name', $data['name']);
		$this->db->where('email', $data['email']);
		$query=$this->db->get('Userdetails');
		
		if($query->num_rows() == 0){
			return false;
		}else{
			return true;
		}
	}

	/**
	* Function to add a user
	* @param array
	* @return bool
	**/
	public function addUserDetails($credentials)
	{
		if ($this->db->insert('Userdetails',$credentials)) {
			return true;
		}else{
			return false;
		}
	}
}
