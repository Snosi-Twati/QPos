<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * Description of ProcessControlDatabases
 *
 * @author Snosi Twati
 */

class ProcessControlDatabases extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->library('session');
    }

    public function ProConDBin() {
        $this->Access->AccessUser();
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed($this->input->post('Tbl'));

        foreach ($ary_fld as $key => $value) {

            $data[$value->Field] = $this->input->post($value->Field);
        }

        //redirect($this->input->post('Url'));

        $this->load->model("Processestransaction");

        if ($this->Processestransaction->InsertDB($this->input->post('Tbl'), $data)) {

            redirect($this->input->post('Url') . "?Do=Yes");
        } else {
            redirect($this->input->post('Url') . "?Do=No");
        }
    }

    public function AddClaim() {
        $this->Access->AccessUser();
        $this->load->model("Pros");
        //var_dump($this->session->userdata);
        $this->load->model("Processestransaction");
        $data['create_by'] = $this->session->userdata('user_id');
        $data['update_by'] = $this->session->userdata('user_id');
        $data['CurrencyID'] = $this->session->userdata('user_id');
        //$data['update_date'] = 'CURRENT_TIMESTAMP';
        //$data['createdate'] = 'CURRENT_TIMESTAMP';

        $this->PassDataToValidationAndInsert($this->input->get('Tbl'), $this->input->get(), false, $data);
    }

    function ClaimIDVaild() {
        //$this->load->library('session');
        //var_dump($this->session->userdata);
        $pc_cond['assigned_to'] = $this->session->userdata('user_id');
        $pc_cond['state'] = 1;
        //var_dump($pc_cond);
        ///die;
        $ProductionCode = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('arc_productioncode_serial', 'ProductionCode', $pc_cond);
        //echo $ProductionCode;
        unset($pc_cond);
        $pc_cond['ProductionCode like'] = $ProductionCode;
        $ClaimID = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('arc_claims', 'ClaimID', $pc_cond);
        //echo $ClaimID;
        return $ClaimID;
    }

    public function AddDiagnostics() {
        $this->Access->AccessUser();
        $this->load->model("Pros");

        $this->load->model("Processestransaction");

        $data['ClaimID'] = $this->Tpa->ClaimIDVaild();
        $this->PassDataToValidationAndInsert($this->input->get('Tbl'), $this->input->get(), $data, $data);
    }

    public function AddClaimDetails() {
        $this->Access->AccessUser();
        $this->load->model("Pros");

        $this->load->model("Processestransaction");

        //$data['ClaimID'] = $this->ClaimIDVaild();
        $this->PassDataToValidationAndInsert($this->input->get('Tbl'), $this->input->get());
    }

    public function CloseClaimID() {
        $this->Access->AccessUser();
        $this->load->model("Pros");

        $this->load->model("Processestransaction");

        $cond['ProductionCode'] = $this->Tpa->ProductionCodeVaild();
        $data['state'] = 2;
        $this->PassDataToValidationAndUpDate('arc_productioncode_serial', $data, $cond);
    }

    public function AssigningClaim() {
        $this->Access->AccessUser();
        $this->load->model("Pros");

        $this->load->model("Processestransaction");

        $cond['batch'] = $this->input->get('batch');
        $cond['box'] = $this->input->get('box');

        $data['state'] = $this->input->get('state');
        $data['assigned_to'] = $this->input->get('assigned_to');
        $data['update_by'] = $this->session->userdata('user_id');
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->PassDataToValidationAndUpDate('arc_productioncode_serial', $data, $cond);
    }

    public function ProConDBinUserMerchant() {
        $this->Access->AccessUser();
        $this->load->model("Pros");
        //$data['date']=date('Y-m-d H:i:s');
        $this->load->model("Processestransaction");
        $var = $this->PassDataToValidationAndMultiInsert($this->input->get('Tbl'), $this->input->get(), FALSE, FALSE);

        if (!is_string($var) && $var > 0) {
            //unset($data);
            $Cod['user_name'] = $this->input->get('user_name');
            $data['user_id'] = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('users', 'user_id', $Cod);
            $data['GroupID'] = 2;
            $var = $this->PassDataToValidationAndMultiInsert('linkingusergroup', $data, FALSE);
            if (!is_string($var) && $var > 0) {
                echo json_encode(array('msg' => $var));
                unset($data);
                $data['outlet_number'] = $this->input->get('user_name');
                $data['user_name'] = $this->input->get('user_name');
                $data['terminal_ids'] = $this->input->get('user_name');
                $this->Processestransaction->InsertDB('user_terminal_id', $data);
            } elseif (!is_string($var) && $var < 1) {
                echo json_encode(array('msg' => $var));
            } elseif (is_string($var)) {
                echo json_encode(array('msg' => $var));
            }
        } elseif (is_string($var) && $var < 1) {
            echo json_encode(array('msg' => $var));
        } elseif (is_string($var)) {
            echo json_encode(array('msg' => $var));
        }
    }

    public function ProConDBinUser() {
        $this->Access->AccessUser();
        $this->load->model("Pros");
        //$data['date']=date('Y-m-d H:i:s');
        $this->load->model("Processestransaction");
        $var = $this->PassDataToValidationAndMultiInsert($this->input->get('Tbl'), $this->input->get(), FALSE, FALSE);

        if (!is_string($var) && $var > 0) {
            //unset($data);
            $Cod['user_name'] = $this->input->get('user_name');
            $data['user_id'] = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('users', 'user_id', $Cod);
            $data['GroupID'] = 3;
            $var = $this->PassDataToValidationAndMultiInsert('linkingusergroup', $data, FALSE);
            if (!is_string($var) && $var > 0) {
                echo json_encode(array('msg' => $var));
            } elseif (!is_string($var) && $var < 1) {
                echo json_encode(array('msg' => $var));
            } elseif (is_string($var)) {
                echo json_encode(array('msg' => $var));
            }
        } elseif (is_string($var) && $var < 1) {
            echo json_encode(array('msg' => $var));
        } elseif (is_string($var)) {
            echo json_encode(array('msg' => $var));
        }
    }

    public function ActiveCode() {
        $this->Access->AccessUser();
        $ga = new GoogleAuthenticator();
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed('users');

        foreach ($ary_fld as $key => $value) {
            if ($this->input->post($value->Field) != "")
                $data[$value->Field] = $this->input->post($value->Field);
        }
        $data['GoogleCode'] = $this->session->userdata('secret');
        $cond['user_name'] = $this->session->userdata('user_name');
        $cond['GoogleCode'] = NULL;
        $data['stat'] = 1;
        //var_dump($ga->getCode($this->session->userdata('secret')));
        //die;
        $this->load->model("Processestransaction");
        if ($this->Processestransaction->UpDateDBMultiCond('users', $data, $cond) && $ga->getCode($this->session->userdata('secret')) == $this->input->post('GoogleCode')) {
            //$this->InsertReasons();
            redirect("?Do=Yes");
        } else {
            redirect("QR/QRView?Do=No");
        }
    }

    public function QRCode() {
        $this->Access->AccessUser();
        $ga = new GoogleAuthenticator();
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed('users');

        foreach ($ary_fld as $key => $value) {
            if ($this->input->post($value->Field) != "")
                $data[$value->Field] = $this->input->post($value->Field);
        }
        //$data['GoogleCode']=$this->session->userdata('secret');
        $cond['user_name'] = $this->session->userdata('user_name');
//        var_dump($ga->getCode($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('users', 'GoogleCode', $cond)));
//        die;
        //$this->load->model("Processestransaction");
        //var_dump($cond);
        // die();
        if ($ga->getCode($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('users', 'GoogleCode', $cond)) == $this->input->post('GoogleCode')) {
            $DSC['GoogleCode'] = $this->encryption->encrypt($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('users', 'GoogleCode', $cond));

            $this->session->set_userdata($DSC);
//            usset($_SESSION['IsCode']);
            redirect(base_url());
        } else {
            redirect("QR/Code?Do=No");
        }
    }

    public function PassDataToValidationAndInsert($Tbl, $Array, $data = FALSE, $DataPass = FALSE, $Foreign = FALSE) {

        $ary_fld = $this->Pros->Get_Name_Filed($Tbl);

        foreach ($ary_fld as $key => $value) {
            if (isset($Array[$value->Field]))
                $data[$value->Field] = $Array[$value->Field];
        }
        //var_dump($DataPass);
        if ($DataPass != FALSE && is_array($DataPass)) {

            foreach ($DataPass as $keyD => $valueD) {
                //echo $keyD;
                if (strtolower($keyD) === "password")
                    $data[$keyD] = md5($valueD);
                else
                    $data[$keyD] = $valueD;
            }
        }


        if ($Array != FALSE && is_array($data)) {

            foreach ($Array as $keyD => $valueD) {
                //echo $keyD;
                if (strtolower($keyD) === "password")
                    $data[$keyD] = md5($valueD);
            }
        }
        //var_dump($data);
        $IsValid = $this->IsValid($Tbl, $Array, $Foreign);
        $this->load->model("Processestransaction");
        if ($IsValid === "0") {
            if ($this->Processestransaction->InsertDB($Tbl, $data)) {
                $pros = 1;
                echo json_encode(array('msg' => $pros));
            } else {
                $pros = 0;
                echo json_encode(array('msg' => $pros));
            }
        } else {
            echo json_encode(array('msg' => $IsValid));
        }
    }

    public function PassDataToValidationAndUpDate($Tbl, $Array, $Cond, $data = FALSE, $DataPass = FALSE, $Foreign = FALSE) {

        $ary_fld = $this->Pros->Get_Name_Filed($Tbl);
        // var_dump($ary_fld);
        $IsValid = $this->IsValid($Tbl, $Array, $Foreign);
        foreach ($ary_fld as $key => $value) {
            if (isset($Array[$value->Field]))
                $data[$value->Field] = $Array[$value->Field];
        }
        if ($DataPass != FALSE && is_array($DataPass)) {
            foreach ($DataPass as $keyD => $valueD) {
                if (strtolower($keyD) === "password")
                    $data[$keyD] = md5($valueD);
                else
                    $data[$keyD] = md5($valueD);
            }
        }
        $this->load->model("Processestransaction");
        if ($IsValid === "0") {
            if ($this->Processestransaction->UpDateDBMultiCond($Tbl, $data, $Cond)) {
                $pros = 1;
                echo json_encode(array('msg' => $pros));
            } else {
                $pros = 0;
                echo json_encode(array('msg' => $pros));
            }
        } else {
            echo json_encode(array('msg' => $IsValid));
        }
    }

    public function PassDataToValidationAndMultiInsert($Tbl, $Array, $data = FALSE, $DataPass = FALSE, $Foreign = FALSE) {

        $ary_fld = $this->Pros->Get_Name_Filed($Tbl);
        // var_dump($ary_fld);
        $IsValid = $this->IsValid($Tbl, $Array, $Foreign);
        foreach ($ary_fld as $key => $value) {
            if (isset($Array[$value->Field]))
                $data[$value->Field] = $Array[$value->Field];
        }
        if ($DataPass != FALSE && is_array($DataPass)) {
            foreach ($DataPass as $keyD => $valueD) {

                if (strtolower($keyD) === "password")
                    $data[$keyD] = md5($valueD);
                else
                    $data[$keyD] = md5($valueD);
            }
        }
        $this->load->model("Processestransaction");
        if ($IsValid === "0") {
            if ($this->Processestransaction->InsertDB($Tbl, $data)) {
                $pros = 1;
                return $pros;
            } else {
                $pros = 0;
                return $pros;
            }
        } else {
            //echo json_encode(array('msg'=>$IsValid));
            return $IsValid;
        }
    }

    public function PassDataToCheck($Tbl, $Fld, $Array, $data = FALSE, $DataPass = FALSE, $Foreign = "") {
        //var_dump($Array);
        $ary_fld = $this->Pros->Get_Name_Filed($Tbl);
        foreach ($ary_fld as $key => $value) {
            //if()
            if (strtolower($value->Field) != 'password') {
                if (isset($Array[$value->Field]))
                    $data[$value->Field] = $Array[$value->Field];
            } else {
                $data[$value->Field] = md5($Array[$value->Field]);
            }
        }

        $this->load->model("Processestransaction");

        if ($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond($Tbl, $Fld, $data) != FALSE) {
            $pros = 1;
            echo json_encode(array('msg' => $pros));
        } else {
            $pros = 0;
            echo json_encode(array('msg' => $pros));
        }
    }

    public function ProConDBinByAjax() {
        $this->Access->AccessUser();
        $this->load->model("Pros");

        $this->load->model("Processestransaction");

        $this->PassDataToValidationAndInsert($this->input->get('Tbl'), $this->input->get());
    }

    public function ClaimNumbering() {
        $this->Access->AccessUser();
        $this->load->model("Pros");
        $this->load->model("Processestransaction");
        //$this->PassDataToValidationAndInsert($this->input->get('Tbl'), $this->input->get());

        $box = $this->input->get('box');
        $CompanyID = $this->input->get('CompanyID');
        $box_cond['id'] = $box;
        $box_count = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('arc_boxs', 'box_count', $box_cond);
        $box_no = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('arc_boxs', 'box_no', $box_cond);
        for ($index = 1; $index <= $box_count; $index++) {
            //echo $index;
            $claims_sn = $index;
            $data['box'] = $box_no;
            $data['create_by'] = $this->session->userdata('user_id');
            $data['create_date'] = date('Y-m-d H:i:s');
            $data['update_date'] = date('Y-m-d H:i:s');
            $data['update_by'] = $this->session->userdata('user_id');
            $data['CompanyID'] = $CompanyID;
            $data['batch'] = $this->batchCreater($claims_sn);
            $data['claims_sn'] = $claims_sn;
            $data['ProductionCode'] = $this->ProductionCodeCreater($data);
            //echo $data['ProductionCode'].'<br>';
            //var_dump($data);
            $this->Processestransaction->InsertDB($this->input->get('Tbl'), $data);
        }
        $pros = 1;
        echo json_encode(array('msg' => $pros));
    }

    function ProductionCodeCreater($data) {
        $ComCode['CompanyID'] = $data['CompanyID'];
        $ComCode = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('arc_companies', 'ComCode', $ComCode);
        return $ComCode . '-' . str_pad($data['box'], 5, "0", STR_PAD_LEFT) . '-' . str_pad($data['batch'], 2, "0", STR_PAD_LEFT) . '-' . str_pad($data['claims_sn'], 4, "0", STR_PAD_LEFT);
    }

    function batchCreater($claims_sn) {
        /*

         * @ Parameters: 
         *  $claims_sn : ffgfd
         * 
         *          */
        if ($claims_sn <= 100) {
            return 1;
        } elseif ($claims_sn <= 200) {
            return 2;
        } elseif ($claims_sn <= 300) {
            return 3;
        } elseif ($claims_sn <= 400) {
            return 4;
        } elseif ($claims_sn <= 500) {
            return 5;
        } elseif ($claims_sn <= 600) {
            return 6;
        } elseif ($claims_sn <= 700) {
            return 7;
        } elseif ($claims_sn <= 800) {
            return 8;
        } elseif ($claims_sn <= 900) {
            return 9;
        } elseif ($claims_sn <= 1000) {
            return 10;
        } elseif ($claims_sn <= 1100) {
            return 11;
        } elseif ($claims_sn <= 1200) {
            return 12;
        } elseif ($claims_sn <= 1300) {
            return 13;
        } elseif ($claims_sn <= 1400) {
            return 14;
        } elseif ($claims_sn <= 1500) {
            return 15;
        } elseif ($claims_sn <= 1600) {
            return 16;
        } elseif ($claims_sn <= 1700) {
            return 17;
        } elseif ($claims_sn <= 1800) {
            return 18;
        } elseif ($claims_sn <= 1900) {
            return 19;
        } elseif ($claims_sn <= 2000) {
            return 20;
        } elseif ($claims_sn <= 2100) {
            return 21;
        } elseif ($claims_sn <= 2200) {
            return 22;
        } elseif ($claims_sn <= 2300) {
            return 23;
        } elseif ($claims_sn <= 2400) {
            return 24;
        } elseif ($claims_sn <= 2500) {
            return 25;
        } elseif ($claims_sn <= 2600) {
            return 26;
        } elseif ($claims_sn <= 2700) {
            return 26;
        } elseif ($claims_sn <= 2800) {
            return 28;
        } elseif ($claims_sn <= 2900) {
            return 29;
        } elseif ($claims_sn <= 3000) {
            return 30;
        }
    }

    public function ProConDBEditByAjax() {
        $this->Access->AccessUser();
        $this->load->model("Pros");

        $this->load->model("Processestransaction");
        //$Cond[jjjj]=hhhhh; //تضع الشروط هنا
        $this->PassDataToValidationAndUpDate($this->input->get('Tbl'), $this->input->get(), $Cond);
    }

    public function MAXValueFromAcount($str) {

        if ($this->input->get('pro_value') <= 500)
            return true;
        else
            return FALSE;
    }

    public function CheckCard() {

        $this->Access->AccessUser();
        $this->load->model("Pros");
        $this->load->model("Processestransaction");
        $this->PassDataToCheck($this->input->get('Tbl'), 'card_id', $this->input->get());
    }

    public function ProConDBinCompany() {
        $this->Access->AccessUser();
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed($this->input->post('Tbl'));

        foreach ($ary_fld as $key => $value) {

            $data[$value->Field] = $this->input->post($value->Field);
        }

        //redirect($this->input->post('Url'));
        $array = $this->db->select_max('AccountNumber')->get('accounts');
        $ID = $array->result_array();
        $this->load->model("Processestransaction");
        $IDC = $ID[0]['AccountNumber'] + 1;
        $data['CompanyID'] = $IDC;
        if ($this->Processestransaction->InsertDB('companies', $data)) {

            $DataAccounts['AccountNumber'] = $IDC;
            if ($data['CompanyType'] == '3')
                $DataAccounts['AccountParentNumber'] = 45;
            if ($data['CompanyType'] == '4')
                $DataAccounts['AccountParentNumber'] = 44;
            if ($data['CompanyType'] == '2')
                $DataAccounts['AccountParentNumber'] = 48;
            if ($data['CompanyType'] == '1')
                $DataAccounts['AccountParentNumber'] = 47;

            $DataAccounts['AccountName'] = $data['CompanyArabicName'] . '-' . $data['CompanyEnglishName'];
            $DataAccounts['AcceptTransactions'] = '1';
            if ($this->Processestransaction->InsertDB('accounts', $DataAccounts)) {

                $DataAccountsS['AccountNumber'] = $IDC + 1;
                if ($data['CompanyType'] == '3')
                    $DataAccountsS['AccountParentNumber'] = 52;
                if ($data['CompanyType'] == '4')
                    $DataAccountsS['AccountParentNumber'] = 51;
                if ($data['CompanyType'] == '2')
                    $DataAccountsS['AccountParentNumber'] = 1000;
                if ($data['CompanyType'] == '1')
                    $DataAccountsS['AccountParentNumber'] = 54;

                $DataAccountsS['AccountName'] = $data['CompanyArabicName'] . '-' . $data['CompanyEnglishName'];
                $DataAccountsS['AcceptTransactions'] = '1';
                if ($this->Processestransaction->InsertDB('accounts', $DataAccountsS))
                    redirect($this->input->post('Url') . "?Do=Yes");
            }
        } else {

            redirect($this->input->post('Url') . "?Do=No");
        }
    }

    public function ProConDBinMultiRow() {
        var_dump($this->input->post());
        die();
        $this->Access->AccessUser();
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed($this->input->post('Tbl'));

        foreach ($ary_fld as $key => $value) {

            $data[$value->Field] = $this->input->post($value->Field);
        }

        //redirect($this->input->post('Url'));

        $this->load->model("Processestransaction");
        if ($this->Processestransaction->InsertDB($this->input->post('Tbl'), $data)) {

            redirect($this->input->post('Url') . "?Do=Yes");
        } else {
            redirect($this->input->post('Url') . "?Do=No");
        }
    }

    public function ProConDBinService() {
        $this->Access->AccessUser();
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed($this->input->post('Tbl'));

        foreach ($ary_fld as $key => $value) {

            $data[$value->Field] = $this->input->post($value->Field);
        }



        //redirect($this->input->post('Url'));
        //$C=$this->input->get();

        $this->load->model("Processestransaction");
        if ($this->Processestransaction->InsertDB($this->input->post('Tbl'), $data)) {

            redirect($this->input->post('Url') . "Do=Yes");
        } else {

            redirect($this->input->post('Url') . "Do=No");
        }
    }

    public function UpDateRowUserMrchPassword() {
        $this->Access->AccessUser();
        $this->load->model("Pros");

        $data['password'] = md5('123456@@');

        $Cond['user_name'] = $this->input->get('user_name');

        $this->load->model("Processestransaction");

        if ($this->Processestransaction->UpDateDBMultiCond('users', $data, $Cond)) {
            redirect("Users/MerchantUpdate?Do=Yes");
        } else {
            redirect("Users/MerchantUpdate?Do=No");
        }
    }

    public function CardsOrderForAll() {

        $this->Access->AccessUser();
        $this->load->model('MedicateMdl');
        $this->MedicateMdl->GenerateCard($this->input->post('CompanyID'));
    }

    ////////////////////////////////////////////////
    //ccccccbrckfhlghlitnduhtduurvvkhckvlnuhnenliv//
    //ccccccbrckfhjiutnivfhnblfhhhfcuikjufgrcjfvlh//
    //ccccccbrckfhlgggredelgcflcnvrjvnerdctejnvrcd//
    //ccccccbrckfhrveujjtcrrfncltndkjcdnekfvhcucbl//
    //ccccccbrckfhnejejrbjktjjhrlednunninhfgtgjhkg//
    ////////////////////////////////////////////////
    //ccccccbrckfhbcciffttbdfbgknfhuilfclbjficjbgd//
    //ccccccbrckfhfddveftbngrhfrlhtckjlkbdcgjgrjgd//
    //ccccccbrckfhcitlvhujcbfddubidjtdirnvhlugengh//
    //ccccccbrckfhucghctufrikhuriiklfbicifnefcjufj//
    //ccccccbrckfhuhflltvbblhfijghcdliftvjktiddefb//
    ////////////////////////////////////////////////

    public function UpDateRow() {
        $this->Access->AccessUser();
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed($this->input->post('Tbl'));

        foreach ($ary_fld as $key => $value) {
            $data[$value->Field] = $this->input->post($value->Field);
        }

        $this->load->model("Processestransaction");

        if ($this->Processestransaction->UpDateDBMultiCond($this->input->post('Tbl'), $data)) {
            redirect($this->input->post('Url') . "?Do=Yes");
        } else {
            redirect($this->input->post('Url') . "?Do=No");
        }
    }

    public function UpDateUserPassword() {
        $this->Access->AccessUser();
        $this->load->model("Processestransaction");
        $cond['user_id'] = $this->session->userdata('user_id');
        $data['password'] = md5($this->input->post('password'));
        if ($this->Processestransaction->UpDateDBMultiCond('users', $data, $cond)) {
            redirect($this->input->post('Url') . "?Do=Yes");
        } else {
            redirect($this->input->post('Url') . "?Do=No");
        }
    }

    public function IsValid($Tbl, $AryFld, $Foreign = FALSE) {

        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);

        $this->form_validation->set_data($AryFld);

        foreach ($Creater as $key) {

            if (isset($AryFld[$key->Field])) {
                if (strstr($key->Type, 'varchar') != FALSE && strstr($key->Field, 'email')) {
                    //$StrValidation='|alpha_numeric_spaces';
                    $StrValidation = "|max_length[" . $this->get_string_between($key->Type, "(", ")") . "]|min_length[3]|valid_email";
//                }elseif(strstr($key->Type , 'tinyint')!=FALSE){
//                    $StrValidation="|max_length[".$this->get_string_between($key->Type,"(",")")."]|min_length[3]|callback_alphaAr_numeric";
                } elseif (strstr($key->Type, 'tinyint') != FALSE) {
                    $StrValidation = '|numeric|max_length[1]';
                } elseif (strstr($key->Type, 'bigint') != FALSE) {
                    $StrValidation = '|numeric|less_than[9223372036854775807]';
                } elseif (strstr($key->Type, 'int') != FALSE) {
                    $StrValidation = '|numeric|less_than[2147483647]';
                } elseif (strstr($key->Type, 'decimal') != FALSE) {
                    $StrValidation = '|callback_numeric_wcomma';
//                }elseif(strstr($key->Type , 'date')!=FALSE){
//                    $StrValidation='date';    
//                }elseif(strstr( $key->Type, 'longtext')!=FALSE){
//                    $StrValidation='textarea';    
                } else {
                    $StrValidation = '';
                }

                if ($key->Null != "YES") {
                    $required = "|required";
                } else {
                    $required = "";
                }
                if ($Foreign) {
                    $Foreigntxt = '';
                    if (isset($Foreign[$key->Field]))
                        foreach ($Foreign[$key->Field] as $keyForeign => $valueForeign) {
                            $Foreigntxt .= "|" . $valueForeign;
                        }
                } else
                    $Foreigntxt = '';
                $this->form_validation->set_rules($key->Field, $this->LebalName($key->Field), 'trim|xss_clean' . $required . $StrValidation . $Foreigntxt);
            }
        }

        if ($this->form_validation->run() === FALSE) {

            return validation_errors();
        } else {

            return "0";
        }
    }

    function get_string_between($string, $start, $end) {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0)
            return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function LebalName($fldnm) {
        $lang = $this->lang->language;
        if (isset($lang[$fldnm]))
            return $lang[$fldnm];
        else
            return $fldnm;
    }

    public function alphaAr($str) {
        $this->form_validation->set_message('callback_alphaAr');
        return (!preg_match("/^([ذضصثقفغعهخحجدشسيبلاتنمكطئءؤرلاىةوزظ~ْلآآألأإqwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM])+$/i", $str)) ? FALSE : TRUE;
    }

    public function alphaAr_numeric($str) {
        //var_dump($str);
        $this->form_validation->set_message('callback_alphaAr_numeric');
//        $str = (strtolower($this->config->item('charset')) != 'utf-8') ? utf8_encode($str) : $str;
//        
//
//        return ( ! preg_match("%^[\بيس\s*.\'/,()|& \x{0621}-\x{06FF}\x{FB50}-\x{FDFB}\x{FE70}-\x{FEFC}-]*$%iu", $str)) ? FALSE : TRUE;
//        return ( ! preg_match("/^([-a-z0-9_ ])+$/i", $str)) ? FALSE : TRUE;
//        var_dump($this->config->item('charset'));
        $str = (strtolower($this->config->item('charset')) != 'utf-8') ? utf8_encode($str) : $str;
//      var_dump( (! preg_match("/^([%D8%B0%D8%B6%D8%B5%D8%AB%D9%82%D9%81%D8%BA%D8%B9%D9%87%D8%AE%D8%AD%D8%AC%D8%AF%D8%B4%D8%B3%D9%8A%D8%A8%D9%84%D8%A7%D8%AA%D9%86%D9%85%D9%83%D8%B7%D8%A6%D8%A1%D8%A4%D8%B1%D9%84%D8%A7%D9%89%D8%A9%D9%88%D8%B2%D8%B8%D9%84%D8%A5%D8%A5%D9%84%D8%A3%D8%A3%D8%A2%D9%84%D8%A2])+$/i", $str)) ? FALSE : TRUE);;
        //$expression
        return (!preg_match("/^([-:%D8%B0%D8%B6%D8%B5%D8%AB%D9%82%D9%81%D8%BA%D8%B9%D9%87%D8%AE%D8%AD%D8%AC%D8%AF%D8%B4%D8%B3%D9%8A%D8%A8%D9%84%D8%A7%D8%AA%D9%86%D9%85%D9%83%D8%B7%D8%A6%D8%A1%D8%A4%D8%B1%D9%84%D8%A7%D9%89%D8%A9%D9%88%D8%B2%D8%B8%D9%84%D8%A5%D8%A5%D9%84%D8%A3%D8%A3%D8%A2%D9%84%D8%A2qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNMذضصثقفغعهخحجدشسيبلاتنمكطئءؤرلاىةوزظ ])+$/i", $str)) ? FALSE : TRUE;
        //return (! preg_match("/^([ذضصثقفغعهخحجدشسيبلاتنمكطئءؤرلاىةوزظ~ْلآآألأإqwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM])+$/i", $str)) ? FALSE : TRUE;
    }

    public function numeric_wcomma($str) {
        //echo $str;
        $this->form_validation->set_message('callback_numeric_wcomma');
        return (bool) preg_match('/^[0-9]+(\.[0-9]{0,6})?$/', $str);
    }

    public function EngCharCard($str) {
        //echo $str;
        $this->form_validation->set_message('callback_EngCharCard');
        return (!preg_match("/^([QWERTYUIOPASDFGHJKLZXCVBNM1234567890])+$/i", $str)) ? FALSE : TRUE;
    }

    public function MaxValue($str) {

        $this->form_validation->set_message('callback_MaxValue');
        if ($str > 50)
            return FALSE;
        else
            return true;
    }

    public function ValueInCard($str) {

        $this->form_validation->set_message('callback_ValueInCard');
        $billdata['card_id'] = $this->input->get('card_id');
        $crdtdata['card_id'] = $this->input->get('card_id');
        if ($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('billcardprosedur', 'pro_value', $billdata) < $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('cridtcardprosedur', 'pro_value', $crdtdata))
            return true;
        else
            return FALSE;
    }

    public function CharCard($str) {

        $this->form_validation->set_message('callback_CharCard');

        if (strlen($this->input->get('card_id')) === 20)
            return true;
        else
            return FALSE;
    }

    public function ProConDBinEnterContract() {
        $this->Access->AccessUser();
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed($this->input->post('Tbl'));

        foreach ($ary_fld as $key => $value) {

            $data[$value->Field] = $this->input->post($value->Field);
        }

        //redirect($this->input->post('Url'));

        $this->load->model("Processestransaction");

        if ($this->Processestransaction->InsertDB($this->input->post('Tbl'), $data)) {
            $array = $this->db->select_max('ContractID')->get('contracts');
            //  echo var_dump($array);exit();

            $ID = $array->result_array();
            //echo var_dump($ID[0]['ContractID']);EXIT();
            // echo var_dump($this->input->post('Url')."?ContractID=".$ID."&Do=Yes");exit();
            redirect($this->input->post('Url') . "?ContractID=" . $ID[0]['ContractID'] . "&Do=Yes");
        } else {
            redirect($this->input->post('Url') . "?Do=No");
        }
    }

}
