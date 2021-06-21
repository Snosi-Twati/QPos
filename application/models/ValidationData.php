<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidationData
 *
 * @author Coder001
 */
class ValidationData extends CI_Model{
    
    public function GetValidation($data) {
       $config = array(
            'cities' => array(
                    array(
                            'field' => 'CityID',
                            'label' => 'lang:CityID',
                            'rules' => 'required|alpha'
                    ),
                    array(
                            'field' => 'CountryID',
                            'label' => 'CountryID',
                            'rules' => 'required'
                    ),
                    array(
                            'field' => 'CityName',
                            'label' => 'CityName',
                            'rules' => 'required'
                    )
            ),
            'email' => array(
                    array(
                            'field' => 'emailaddress',
                            'label' => 'EmailAddress',
                            'rules' => 'required|valid_email'
                    ),
                    array(
                            'field' => 'name',
                            'label' => 'Name',
                            'rules' => 'required|alpha'
                    ),
                    array(
                            'field' => 'title',
                            'label' => 'Title',
                            'rules' => 'required'
                    ),
                    array(
                            'field' => 'message',
                            'label' => 'MessageBody',
                            'rules' => 'required'
                    )
            )
        );
        
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules($config['cities']);
        $Stuts = $this->form_validation->run();
        foreach ($config['cities'] as $key => $value) {
            
            var_dump($value['field']);
            var_dump( form_error($value['field']) );
        }
        //echo form_error('CityID');
        
        die();
        //return $this->form_validation->run();
    }
}

