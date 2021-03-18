<?php

class Peoples_model extends CI_Model {
    public function getAllPeoples() {
        return $this->db->get('peoples')->result_Array();
    }

    public function getPeoples($limit, $start, $keyword = null) {
        if($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('address', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('peoples', $limit, $start)->result_Array();
    }

    public function countAllPeoples() {
        return $this->db->get('peoples')->num_rows();
    }
}