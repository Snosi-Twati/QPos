<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Country_model
 *
 * @author Snosi
 */
class Country_model extends CI_Model {
    public function __construct() {
        $this -> load -> database();
    } 
    
    function get_countries() {
        $this -> db -> select('NO_city, Name_city');
        $query = $this -> db -> get('regst_city_s');

        $countries = array();
 
        if ($query -> result()) {
            foreach ($query->result() as $country) {
                $countries[$country -> NO_city] = $country -> Name_city;
            }
            return $countries;
        } else {
            return FALSE;
        }
    }
}
