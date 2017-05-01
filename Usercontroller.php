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
	* Function for login functionality of user
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
	* Function for user to view the quiz page
	* @param void
	* @return void
	*
	**/
	public function showQuestion()
	{
		$this->load->model('Usermodel');
		if($this->Usermodel->checkUserLoggedIn()){
			$totalQuestion=$this->Usermodel->getNumberOfQuestions();	
		    $quizno=$this->session->userdata('count');

		    if ($this->input->post()) {
			    $questionid = $this->input->post('questionId');
			    $answer = $this->input->post('options');
			    $email = $this->session->userdata['email'];
			    $details = array('id' => $questionid,
			                     'email'=> $email,
			                     'answer'=> $answer
			                    );
			    if($this->Usermodel->checkAnswer($details)){
			        $this->Usermodel->saveAnswer($details);
		        }
		        $quizno = $quizno+1;
		        if ($quizno <= $totalQuestion){
		    	    $question['result']=$this->Usermodel->getNextQuestion($quizno);
		            $this->session->set_userdata('count',$quizno);
		            $this->load->view('Quiz',$question);
		        }else{
		    	    $this->Usermodel->saveResult($email);	
		    	    redirect('result');
		        }
		    }else{
		        if((isset($quizno))&& !empty($quizno)){
		    	    if ($quizno==1) {
		    		    $question['result']=$this->Usermodel->getFirstQuestion();
		                $this->load->view('Quiz',$question);	
		    	    }	
		        }
		    } 

		    $this->Usermodel->changePassword(); 
	    }else{
	    	redirect('login');
	    }
	}
	
	/**
	* Function to submit user's answer
	* @param void
	* @return void
	**/
	public function showResult()
	{	
		$this->load->model('Usermodel');
		if ($this->Usermodel->checkUserLoggedIn()) {
		    $user=$this->session->userdata('email');
		    $data['result']=$this->Usermodel->getResult($user);
		    $value= $data['result'];
		    if($value[0]->marks==0){
			    $data['message']= "Sorry you have not answered any questions";
		    }
			    $this->load->view('Summary',$data);
	    }else{
	    	redirect('login');
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