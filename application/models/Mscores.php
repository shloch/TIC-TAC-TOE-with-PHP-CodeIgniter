<?php

class Mscores extends CI_Model {

    var $table = 'scores';

    public function __construct() {
        $this->load->database();
    }

    public function save($winner, $looser, $isDraw = false) {
        $data = array(
            'winner' => $winner,
            'looser' => $looser,
            'isDraw' => $isDraw
        );
        return $this->db->insert($this->table, $data);
    }

    public function getPastScores() {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            $rows = $query->result();
            return $rows;
        } else {
            return FALSE;
        }
    }
    
}

/* End of file mstudent.php */
/* Location: ./system/application/models/mstudent.php */