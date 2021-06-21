<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Form_validation
 *
 * @author Coder001
 */
class MY_Form_validation extends CI_Form_validation
{
    public function getErrorsArray()
    {
        return $this->_error_array;
    }
}
