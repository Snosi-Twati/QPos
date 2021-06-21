<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Access
 *
 * @author Coder001
 */
class Access extends CI_Model {

    function AccessUser() {

        $class=$this->router->fetch_class();
        $method=$this->router->fetch_method();
        //var_dump($_SESSION);
        //die;
        if(1>2) {
            if ($this->session->userdata('ContactID') == NULL) {

                //die;
                redirect(base_url() . 'Login.aspx');
            }
            if ($class . $method != 'Mainindex' && 1 == 2) {

                $Cond['UserID'] = $this->session->userdata('ContactID');
                $Cond['Active'] = '1';
                $GroupID = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('linkingusergroup', 'GroupID', $Cond);

                unset($Cond);
                $Cond = $this->Pros->Make_Value_in_SQL_IN($GroupID, 'GroupID');
                $Cond = "GroupsID $Cond and PermissionsID like '" . $class . $method . "'";
                $AccessUser = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('permissionsgroups', 'PermissionsID', $Cond);

                if ($this->session->userdata('ContactID') != '10000013')
                    if (!$AccessUser) {
                        //redirect('AccessDenied');
                    }
            }

            if (isset($_POST[$this->security->get_csrf_token_name()]) && $_POST[$this->security->get_csrf_token_name()] != $this->security->get_csrf_hash()) {
                //redirect('AccessDenied');
            }
        }
    }

}
