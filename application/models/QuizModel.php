<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizModel extends CI_Model {
	
	public $rules = array( 
			'question_id' => array(
				'field' => 'question_id',
				'label' => 'Número',
				'rules' => 'trim|required'
			),
			'question_text' => array(
				'field' => 'question_text',
				'label' => 'Pregunta',
				'rules' => 'trim|required'
			),
			'choices' => array(
				'field' => 'choices[]',
				'label' => 'Alternativa',
				'rules' => 'trim|required'
			),
			'is_correct' => array(
				'field' => 'is_correct',
				'label' => 'Respuesta',
				'rules' => 'trim|required'
			),
	      );
 	
 	public function get_count_questions()
 	{
 		return $this->db->count_all('questions');
 	}
 	
 	public function get_question($question_id)
 	{
 		$this->db->where('question_id', $question_id);
 		return $this->db->get('questions')->row();
 	}
 	
 	public function get_choices($question_id)
 	{
 		$this->db->where('question_id', $question_id);
 		return $this->db->get('choices')->result();
 	}
 	
 	public function get_correct_choice($question_id)
 	{
 		$this->db->where(['question_id' => $question_id, 'is_correct' => 1]);
 		return $this->db->get('choices')->row();
 	}
 	
 	public function save_question($data)
 	{
 		$result = $this->db->insert('questions', $data);
 		return $result ? TRUE : FALSE;
 	}
 	
 	public function save_choices($data)
 	{
 		$result = $this->db->insert('choices', $data);
 		return $result ? TRUE : FALSE;
 	}
 	
 	public function array_from_post($fields)
 	{
 		$data = [];
 		foreach ($fields as $value) {
 		 	 $data[$value] =  $this->input->post($value);
 		}
 		return $data;
 	}
 	
 	# $data = ['question_id' => $this->input->post('question_id'), 'question_text' => $this->input->post('question_text')];
}