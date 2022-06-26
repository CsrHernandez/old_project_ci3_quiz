<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('QuizModel');
		$this->load->library('session');
		$this->load->library('form_validation');
		
	}
	
	/*
	 * @return string
	 */
 	public function index()
 	{
 		$data['subview'] = 'index';
 		$data['count_p'] = $this->QuizModel->get_count_questions();
 		$this->load->view('_quiz_layout', $data);
 	}
 	
 	public function question($question_id)
 	{
 		$data['subview'] = 'question';
 		$data['count_p'] = $this->QuizModel->get_count_questions();
 		$data['choices'] = $this->QuizModel->get_choices($question_id);
 		$data['question'] = $this->QuizModel->get_question($question_id);
 		$this->load->view('_quiz_layout', $data);
 	}
 	
 	public function final()
 	{
 		$data['subview'] = 'final';
 		$this->load->view('_quiz_layout', $data);
 		$this->session->sess_destroy();
 	}
 	
 	public function add()
 	{
 		$rules = $this->QuizModel->rules;
 		$this->form_validation->set_rules($rules);
 		
 		if($this->form_validation->run() == TRUE){
 			$question_data = $this->QuizModel->array_from_post(['question_id', 'question_text']);
 			if($this->QuizModel->save_question($question_data)){
 				foreach ($this->input->post('choices') as $key => $value) {
 				 	 if($this->input->post('is_correct') == $key + 1) $is_correct = 1;
 				 	 else $is_correct = 0;
 				 	 
 				 	 $choices_data = ['question_id' => $this->input->post('question_id'),
 				 	 				'is_correct' => $is_correct,
 				 	 				'choice_text' => $value
 				 	 ];
 				 	 
 				 	 if($this->QuizModel->save_choices($choices_data)) continue;
 				}
 				$this->session->flashdata('msg', 'Pregunta insertada correctamente');
 				redirect('quiz/add', 'refresh');
 			}
 		}
 		
 		
 		$data['subview'] = 'add';
 		$data['count_p'] = $this->QuizModel->get_count_questions();
 		$this->load->view('_quiz_layout', $data);
 	}
 	
 	public function process()
 	{
 		if( !$this->session->userdata('score')){
 			$this->session->userdata('score', 0);
 		}
 		
 		$question_id = $this->input->post('question_id');
 		$next_question = $question_id + 1;
 		$selected_choice = $this->input->post('choice_text');
 		
 		$row = $this->QuizModel->get_correct_choice($question_id);
 		$correct_chice = $row->id;
 		
 		if($selected_choice == $correct_chice){
 			$this->session->score++;
 		}
 		
 		$total_question = $this->QuizModel->get_count_questions();
 		
 		if($total_question-1 == $question_id){
 			redirect('quiz/final');
 		} else {
 		 	redirect('quiz/question/'.$next_question);
 		}
 	}
}