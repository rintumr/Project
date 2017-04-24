<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
* class in controller for user functionalities
* @param void
* @return void
*
**/
class Usercontroller extends CI_Controller 
{
	/**
	*
	* function for login functionality of user
	* @param void
	* @return void
	*
	**/
	public function loginUser()
	{   
		if($this->input->post()){

			$this->form_validation->set_rules('email', 'email','required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('password', 'password','required|min_length[4]|max_length[50]');
			
			$email= $this->input->post('email');
			$password = $this->input->post('password');
		
			$data =array( 'email'=> $email,
				          'password' => $password
				          );

			if ($this->form_validation->run()==FALSE){
					$this->load->view('UserLogin');
				}else{

				$this->load->model('Usermodel');
				if($this->Usermodel->checkUserExists($data)){
					$newdata = array('email' => $data['email'],
                                     'isloggedIn' => True, 
					                  'usertype'=>"user",
					                  'count'=> 1
					                );
                    $this->session->set_userdata($newdata);
					$this->load->view('UserInstructions');

			    }else{
                  
                    $msg['message']="Incorrect Email or Password!!";
                    $this->load->view('UserLogin',$msg);

			    }
			}
		}else{
			$this->load->view('UserLogin');
		}
	}

	/**
	*
	* function for user to view the quiz page
	* @param void
	* @return void
	*
	**/
	public function showQuestion()
	{
		if ($this->input->post()) {
			$id = $this->input->post('questionId');
			$answer = $this->input->post('options');
			$details = array('id' => $id,
			                  'answer'=> $answer
			                );
			$this->load->model('Usermodel');
			$this->Usermodel->checkAnswer($details);
			$this->Usermodel->saveResult($details);
			$this->Usermodel->getNextQuestion($quizno);
		}else{
		    $this->load->model('Usermodel');		
		// $data=$this->Usermodel->getNumberOfQuestions();
			$quizno=$this->session->userdata('count');
		    if((isset($quizno))&& !empty($quizno)){
		    	if ($quizno==1) {
		    		$question['result']=$this->Usermodel->getFirstQuestion();
		            $this->load->view('Quiz',$question);	
		    	}else{
		            $question['result']=$this->Usermodel->getNextQuestion($quizno);
		            $quizno = $quizno+1;
		            $this->session->set_userdata('count',$quizno);
		            $this->load->view('Quiz',$question);
		        }	
		    }
		}  
	}
	
	/**
	* Function to submit user's answer
	* @param void
	* @return void
	**/
	public function submitQuiz()
	{	
		if($this->input->post()){
			$id= $this->uri->segment(2);
			$email=$this->session->userdata['email'];
			$email=$this->session->userdata['email'];
			$ans = $this->input->post('options');
			$credentials = array('id' => $id,
			                     'email'=>$email 
			                    );
			if (!empty($ans)) {
			    $this->load->model('Usermodel');
			    $data['message']=$this->Usermodel->submitQuestion($credentials,$ans);
			}else{
				$this->load->model('Usermodel');
				$data['message']="Please choose an answer";
		    }
			    $this->load->view('Summary',$data); 
		}
	}

	/**
	*Function to Logout and unset session
	* @param void
	* @return void
	**/
	public function logoutUser()
	{
		$this->session->unset_userdata('email');
        $this->session->unset_userdata('loggedIn');
        $this->session->sess_destroy();
        $this->load->view('Exit');
	}
}