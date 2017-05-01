<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
* class in model for user functionalities
* @param void
* @return void
*
**/
class Usermodel extends CI_Model 
{
	/**
	*
	* Function for user to login
	* @param array
	* @return bool
	*
	**/
	public function checkUserExists($data)
	{
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		$query=$this->db->get('Userdetails');
		
		if($query->num_rows() == 0){
			return false;
		}else{
			return true;
		}
	}

	/**
	*
	* function to get the number of questions in the db
	* @param void
	* @return variable
	*
	**/
	public function getNumberOfQuestions()
	{
		$query=$this->db->get('Quiz');
		$number=($query->num_rows());
		return $number;
	}

	/**
	*Function to load the first question
	* @param void
	* @return array
	**/
	public function getFirstQuestion()
	{
		$this->db->limit(1);
		$query=$this->db->get('Quiz');
		return $query->result();
	}
	
	/**
	*
	* Function to load quiz page
	* @param variable
	* @return result
	*
	**/
	public function getNextQuestion($quizno)
	{
		$this->db->limit(1,$quizno-1);
		if ($query=$this->db->get('Quiz')){
		   return $query->result();
		}else{
			return false;
		}

	}

	/**
	* Function to check the answer and save it into db
	* @param array
	* @return bool
	**/
	public function checkAnswer($details)
	{
		$this->db->where('id',$details['id']);
		$query=$this->db->get('Quiz');
		$correct= $query->result();
		if(($correct[0]->correct)==$details['answer']){
			return true;
		}else{
			return false;
		}
	}

	/**
	* Function to save the result
	* @param array
	* @return void
	**/
	public function saveAnswer($details)
	{
		$this->db->insert('Answer',$details);
	}


	/**
	*
	* Function to save the result
	* @param variable
	* @return variable
	*
	**/
	public function saveResult($email)
	{
		$this->db->where('email', $email);
		$query=$this->db->get('Answer');
		$data=$query->num_rows();
		$details = array('email' => $email,
						 'marks' => $data*10
						);
		$this->db->insert('Results',$details);
	}


	/**
	* Function to get the result
	* @param variable
	* @return array
	**/
	public function getResult($user)
	{
		$this->db->where('email', $user);
		$query=$this->db->get('Results');
		return $query->result();
	}

	/**
	* Function to change the password of user
	* @param void
	* @return void
	**/
	public function changePassword()
	{
		$email= $this->session->userdata('email');
		$this->db->where('email', $email);
		$query=$this->db->get('Userdetails');
		$value=$query->result();
        $id=$value[0]->Id;
		$length=8;
        $characterSet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $characterSet ), 0, $length);
        $details = array('password' => $password );
        $this->load->model('Adminmodel');
        $this->Adminmodel->savePassword($details, $id);
	}

	/**
	* Function to check whether user is logged in or not
	* @param void
	* @return bool
	**/
	public function checkUserLoggedIn()
	{
		$usertype = $this->session->userdata('usertype');
		$loggedIn = $this->session->userdata('isloggedIn');
		if (!empty($loggedIn) && $usertype=="user") {
			return true;
		}else{
			return false;
		}
	}
}