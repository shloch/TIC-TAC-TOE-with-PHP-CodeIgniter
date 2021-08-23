<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
       $this->load->model('Mscores', 'db_table');
       $this->load->helper('url_helper');
    }

	public function index()
	{
		$data['rows'] = $this->db_table->getPastScores();
		$this->load->view('game/welcome', $data);
	}

	public function saveScoresToDB()
	{
		$winner = $this->input->post('winner');
        $looser = $this->input->post('looser');
        $isDraw = $this->input->post('isDraw');
        if($isDraw == 'draw')
        {
        	$isDraw = true;
        	$this->db_table->save($winner, $looser, $isDraw);
        } else {
        	$this->db_table->save($winner, $looser);
        }
        redirect('/game/index', 'refresh');
	}
}
