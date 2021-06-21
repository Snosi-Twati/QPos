<?php
if (!defined ('BASEPATH')) exit ('No direct access allowed');
    class User_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
 
    public function add_data($data_user,$tbl)
    {
        $this->load->database(); 
        //die("Snosi");
//        $this->db->where('id_stay',$data_user['id_stay']);
        $qry=$this->db->get($tbl);
        //$row=$qry->resulte_array();
        if($qry -> num_rows() == 0)
            $this->db->insert($tbl,$data_user);
        //;
        //return $this->db->insert_id();
    }
}

