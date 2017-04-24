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
    * Function to check if user is logged in
    * @param void
    * @return bool
    **/
    // public function checkIfLoggedIn()
    // {
    //    if ($this->session->) {
    //         # code...
    //     } 
    // }

    /**
	*
	* function for user to login
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
    public function getNumberofQuestions()
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
        $this->db->limit($quizno,1);
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
        if($correct[0]->correct)==$details['answer']){
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
        $this->db->insert('Quiz',$details);
    }


    /**
    *
    * Function to display the result
    * @param variable
    * @return variable
    *
    **/
    public function submitQuestion($credentials,$ans)
    {
        $this->db->where('id',$credentials['id']);
        $query=$this->db->get('Quiz');
        $data=$query->result();
        if (($data[0]->correct)== $ans) {
           $correct=$correct+1;
    }else{
            $wrong=$wrong+1;
        }
        $details = array('email' => $email,
                          'correct'=>$correct,
                          'wrong'=> $wrong );
        $this->db->insert('Summary');
    }
}