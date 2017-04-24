<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* class in controller for Admin functionalities
* @param void
* @return void
**/
class Admincontroller extends CI_Controller {
	/**
    * function for admin login
    * @param void
    * @return void
    **/
    public function loginAdmin()
    {
    	if($this->input->post()){

			$this->form_validation->set_rules('email', 'email','required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('password', 'password','required|min_length[4]|max_length[50]');
			
			$email= $this->input->post('email');
			$password = $this->input->post('password');

            if(($email=="admin@gmail.com")&&($password=="aaaaa"))
            {
                $newdata = array('email' => $email,
                                     'isloggedIn' => True, 
                                      'usertype'=>"admin");
                $this->session->set_userdata($newdata);
                $this->load->view('Home');
            }else{
                $data['message']="Invalid Email or Password";
                $this->load->view('AdminLogin',$data);
            }
		}else{
            $this->load->view('AdminLogin');
        }
    }

    /**
    * Function to access the quiz menu
    * @param void
    * @return void
    **/
    public function showQuizMenu()
    {
        $this->load->model('Adminmodel');
        $data['result']=$this->Adminmodel->getQuizList();
        $this->load->view('QuizMenu',$data);

    }

    /**
    * Function to view a question
    * @param void
    * @return void
    **/
    public function showQuestion()
    {
        $id=$this->uri->segment(2);
        $this->load->model('Adminmodel');
        $data['result']=$this->Adminmodel->getQuestion($id);
        $this->load->view('ShowQuestion',$data);

    }
    
    /**
    * Function to delete a question
    * @param void
    * @return void
    **/
    public function deleteQuiz()
    {
        $id=$this->uri->segment(2);
        $this->load->model('Adminmodel');
        if($this->Adminmodel->deleteQuestion($id)){
            $data['message']="Question deleted!!";
        }else{
            $data['message']="Unable to perform the action";
        }
            $data['result']=$this->Adminmodel->getQuizList();
            $this->load->view('QuizMenu',$data);
    }

    /**
    * Function to edit a question
    * @param void
    * @return void
    **/
    public function editQuiz()
    {
        $id=$this->uri->segment(2);
        if($this->input->post()){
            $question = $this->input->post('question');
            $opt1= $this->input->post('opt1');
            $opt2= $this->input->post('opt2');
            $opt3= $this->input->post('opt3');
            $opt4= $this->input->post('opt4');
            $ans= $this->input->post('correct');

            $credentials= array('question' => $question ,
                                 'option1' => $opt1,
                                 'option2' => $opt2,
                                 'option3' => $opt3,
                                 'option4' => $opt4,
                                 'correct' => $ans
                                 );
            $this->load->model('Adminmodel');
            if($this->Adminmodel->editQuestion($credentials,$id)){
                $data['message']="Saved the changes!!!";
            }else{
                $data['message']="Unable to perform the action";
            }
            $data['result']=$this->Adminmodel->getQuizList();
            $this->load->view('QuizMenu',$data);
        }else{
            $this->load->model('Adminmodel');
            $data['result']=$this->Adminmodel->getQuestion($id);
            $this->load->view('EditQuestion',$data);
        }
    }

    /**
    * Function to get the new question
    * @param void
    * @return void
    **/
    public function addQuestion()
    {
        $this->load->view('AddQuestion');

    }

    /**
    * Function to save a question to the db
    * @param void
    * @return void
    **/
    public function saveQuiz()
    {
        if($this->input->post()){
            $this->form_validation->set_rules('question', 'question','required|min_length[1]|max_length[500]');
            $this->form_validation->set_rules('opt1', 'opt1','required|min_length[1]|max_length[150]');
            $this->form_validation->set_rules('opt2', 'opt2','required|min_length[1]|max_length[150]');
            $this->form_validation->set_rules('opt3', 'opt3','required|min_length[1]|max_length[150]');
            $this->form_validation->set_rules('opt4', 'opt4','required|min_length[1]|max_length[150]');
            $this->form_validation->set_rules('correct', 'correct','required|min_length[1]|max_length[150]');
            
            if($this->form_validation->run()==FALSE){
                $msg['message']="All fields are required";
                $this->load->view('AddQuestion',$msg);
            }else{
                $question = $this->input->post('question');
                $opt1= $this->input->post('opt1');
                $opt2= $this->input->post('opt2');
                $opt3= $this->input->post('opt3');
                $opt4= $this->input->post('opt4');
                $ans= $this->input->post('correct');

                $credentials= array('question' => $question ,
                                    'option1' => $opt1,
                                    'option2' => $opt2,
                                    'option3' => $opt3,
                                    'option4' => $opt4,
                                    'correct' => $ans
                                   );
                $this->load->model('Adminmodel');
                if($this->Adminmodel->saveQuestion($credentials)){
                    $msg['message']="Question added successfully";
                }else{
                    $msg['message']="Unable to perform the action";
                }
                $msg['result']=$this->Adminmodel->getQuizList();
                $this->load->view('QuizMenu',$msg);
            }
        }
    }    

    /**
    *Function to view the result
    * @param void
    * @return void
    **/
    public function showResult()
    {
        $this->load->model('Adminmodel');
        $data['result']=$this->Adminmodel->getResult();
        $this->load->view('ResultPage', $data);
    }

    /**
    * Function to load page to create password
    * @param void
    * @return void
    **/
    public function createPassword()
    {
        $this->load->model('Adminmodel');
        $data['result']=$this->Adminmodel->viewUser();
        $this->load->view('CreatePassword',$data);
    }
    
    /**
    * Function to generate password
    * @param void
    * @return void
    **/
    public function generatePassword()
    {
        $id=$this->uri->segment(2);
        $length=12;
        $characterSet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $characterSet ), 0, $length);
        $details = array('password' => $password );
        $this->load->model('Adminmodel');
        if($this->Adminmodel->savePassword($details, $id))
        {
            $data['message']="Password sent to user!!";
        }else{
            $data['message']="Failed to send the password!!!";
        }
        $data['result']=$this->Adminmodel->viewUser();
        $this->load->view('CreatePassword',$data);
    }
    
    /**
    * Function to load home page
    * @param void
    * @return void
    **/
    public function home()
    {
        $this->load->view('Home');
    }

    /**
    * Function to load about page
    * @param void
    * @return void
    **/
    public function about()
    {
        $this->load->view('About');
    }

    /**
    * Function to load conact page
    * @param void
    * @return void
    **/
    public function contact()
    {
        $this->load->view('Contact');
    }

    /**
    * Function to logout
    * @param void
    * @return void
    **/
    public function logoutAdmin()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('isloggedIn');
        $this->session->unset_userdata('usertype');
        $this->session->sess_destroy();
        $this->load->view('AdminLogin');
    }
}