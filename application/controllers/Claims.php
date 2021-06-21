<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Claims
 *
 * @author Snosi
 */
class Claims extends CI_Controller {

    public $Clm;
    private $params = array(
        'Logo' => 'layout/Header/Logo',
        'Message' => 'layout/Header/Message',
        'Notifications' => 'layout/Header/Notifications',
        'Tasks' => 'layout/Header/Tasks',
        'UserAccount' => 'layout/Header/UserAccount',
        'ContentHeader' => 'layout/Bady/ContentHeader',
        //                    'MainContent'       =>      'layout/Bady/MainContent',
        'SearchForm' => 'layout/Bady/SearchForm',
        'SidebarMenu' => 'layout/Bady/SidebarMenu',
        'SidebarUserPanel' => 'layout/Bady/SidebarUserPanel'
    );

    public function index() {
        //var_dump($_POST);
        $this->Access->AccessUser();
        $this->load->model('Desg');

        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/ViewDataClaims', $this->params, FALSE);
    }

    public function AccountStatementInc() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/AccountStatementInc', $this->params, FALSE);
    }

    public function DataClaims() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/DataClaims', $this->params, FALSE);
    }

    public function DataClaimsClinic() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/DataClaimsClinic', $this->params, FALSE);
    }

    public function CreateClaims() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/CreateClaims', $this->params, FALSE);
    }
     public function ClaimsArchive() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/ClaimsArchive', $this->params, FALSE);
    }
    
    public function ClaimsDownload() {

        $this->Access->AccessUser();
        $pc_cond['ClaimID']= $this->input->post('ClaimID');
        $path=$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims_files', 'path_claim', $pc_cond);
        redirect(base_url() .$path);
    }
    

    public function ReviewClaim() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/ReviewClaim', $this->params, FALSE);
    }

    public function CreateBoxs() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/CreateBoxs', $this->params, FALSE);
    }
    
    public function UploadClaimFiles() {
        
           //var_dump($this->input->post('work_method_file'));
        $id = $this->session->userdata('user_id');
        //echo $id;

        if (is_dir('./uploads/') === false)
            mkdir('./uploads/');

        if (is_dir('./uploads/' . date('Ymd') . '/') === false)
            mkdir('./uploads/' . date('Ymd') . '/');

        if (is_dir('./uploads/' . date('Ymd') . '/' . $id) === false)
            mkdir('./uploads/' . date('Ymd') . '/' . $id);

        $files = glob('./uploads/' . date('Ymd') . '/' . $id . '/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                unlink($file); // delete file
            }
        }
        $config['upload_path'] = '/uploads/' . date('Ymd') . '/' . $id;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 300048;
        $new_name = time();
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Arc_Claim_file')) {
            redirect(base_url() . 'Claims/CreateClaims?filesupload=no');
        } else{
            $data['ClaimID']= $this->Tpa->ClaimIDVaild();
            $data['path_claim']=$config['upload_path'].'/'.$config['file_name'].'.pdf';
            $data['create_user']=$this->session->userdata('user_id');
            $data['edit_user']=$this->session->userdata('user_id');
//            $data[]=;
//            $data[]=;
            if($this->Processestransaction->InsertDB('arc_claims_files',$data)==false)
                    redirect(base_url() . 'Claims/CreateClaims?filesupload=no');
            redirect(base_url() . 'Claims/CreateClaims');
        }
    }
    
    public function ClaimNumbering() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/ClaimNumbering', $this->params, FALSE);
    }

    public function AssigningClaim() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/AssigningClaim', $this->params, FALSE);
    }

    public function AddServicesItmToClaims() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->load->view('Claims/AddServicesItmToClaims', $this->params, FALSE);
    }

    public function ListServicesItmClaims() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->load->view('Claims/ListServicesItmClaims', $this->params, FALSE);
    }

    public function Listrejected_servicesItm() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->load->view('Claims/Listrejected_servicesItm', $this->params, FALSE);
    }

    public function CreateClaimsForm() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
//        if( md5($this->input->get('ClaimID')) != $this->input->get('CodeClaim') )
//            $this->layouts->view("accessdenied",$this->params,FALSE);
//        else
        $this->layouts->view('Claims/CreateClaimsForm', $this->params, FALSE);
    }

    public function OpenClaims() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/OpenClaims', $this->params, FALSE);
    }

    public function OpenClaimsFromClinic() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/OpenClaimsFromClinic', $this->params, FALSE);
    }

    public function OpenClaimsFromClinicWithOutGUI() {

        $this->Access->AccessUser();
        $this->load->view('Claims/OpenClaimsFromClinic');
    }

    public function DataClaimsListInput() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/DataClaimsListInput', $this->params, FALSE);
    }

    public function DataClaimsListMultiInput() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/DataClaimsListMultiInput', $this->params, FALSE);
    }

    public function DataClaimsListInputApprovedServiceAmount() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/DataClaimsListInputApprovedServiceAmount', $this->params, FALSE);
    }

    public function DataClaimsListInputTPAReviewAmount() {

        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/DataClaimsListInputTPAReviewAmount', $this->params, FALSE);
    }

    public function ViewDataClaims() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/ViewDataClaims', $this->params, FALSE);
    }

    public function ViewDataClaimsByBeneficiaryID() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        //$this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->load->view('Claims/ViewDataClaimsByBeneficiaryID');
    }

    public function DataClaimsDetails() {

        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $claimsdetails = $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails', 'ClaimServiceID', $this->input->post('ClaimServiceID'));

        $this->layouts->view('Claims/DataClaimsDetails', $this->params, array(
            'claimsdetails' => $claimsdetails
                )
        );
    }

    public function DataClaimsDetailsEdit() {

        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $claimsdetails = $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails', 'ClaimServiceID', $this->input->post('ClaimServiceID'));

        $this->layouts->view('Claims/DataClaimsDetails', $this->params, array(
            'claimsdetails' => $claimsdetails
                )
        );
    }

    public function DataClaimsDetailsList() {

        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $claimsdetails = $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails', 'ClaimServiceID', $this->input->post('ClaimServiceID'));
        $this->layouts->view('Claims/DataClaimsDetailsList', $this->params, array(
            'claimsdetails' => $claimsdetails
                )
        );
    }

    public function DataClaimsDetailsListrejected() {

        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $claimsdetails = $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails', 'ClaimServiceID', $this->input->post('ClaimServiceID'));
        $this->layouts->view('Claims/DataClaimsDetailsListrejected', $this->params, array(
            'claimsdetails' => $claimsdetails
                )
        );
    }

    public function DataClaimsDetailsListByInvoiceNumber() {

        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $claimsdetails = $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails', 'ClaimServiceID', $this->input->post('ClaimServiceID'));
        $this->layouts->view('Claims/DataClaimsDetailsListByInvoiceNumber', $this->params, array(
            'claimsdetails' => $claimsdetails
                )
        );
    }

    public function DataClaimsDetailsListByInvoiceNumberMedical() {

        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $claimsdetails = $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails', 'ClaimServiceID', $this->input->post('ClaimServiceID'));
        $this->layouts->view('Claims/DataClaimsDetailsListByInvoiceNumberMedical', $this->params);
    }

    public function DataClaimsDetailsListservicerejected() {

        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $claimsdetails = $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails', 'ClaimServiceID', $this->input->post('ClaimServiceID'));
        $this->layouts->view('Claims/DataClaimsDetailsListservicerejected', $this->params, array(
            'claimsdetails' => $claimsdetails
                )
        );
    }

    public function DataClaimsDetailsListaccept() {

        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $claimsdetails = $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails', 'ClaimServiceID', $this->input->post('ClaimServiceID'));
        $this->layouts->view('Claims/DataClaimsDetailsListaccept', $this->params, array(
            'claimsdetails' => $claimsdetails
                )
        );
    }

    public function EnterDataClaimsDetails() {
        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/EnterDataClaimsDetails', $this->params, FALSE
        );
    }

    public function ReasonsForRejection() {
        $this->Access->AccessUser();
        $this->load->model('Pros');

        $this->load->model('Desg');
        $cond['RejectType'] = 1;
        $this->load->view('Claims/ReasonsForRejection', array(
            'ReasonsForRejection' => $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('reasonsforrejection', '*', $cond)
        ));

//        $this->load->library('Layouts');
//                $this->layouts->set_title('Home Page');
//                $this->layouts->view('Claims/ReasonsForRejection',$this->params,array(
//                    'ReasonsForRejection'     =>      $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('reasonsforrejection','*')
//                    )
//                );
    }

    public function ReasonsForMedicalRejection() {
        $this->Access->AccessUser();
        $this->load->model('Pros');
        $cond['RejectType'] = 2;
        $this->load->model('Desg');
        $this->load->view('Claims/ReasonsForRejection', array(
            'ReasonsForRejection' => $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('reasonsforrejection', '*', $cond)
        ));

//        $this->load->library('Layouts');
//                $this->layouts->set_title('Home Page');
//                $this->layouts->view('Claims/ReasonsForRejection',$this->params,array(
//                    'ReasonsForRejection'     =>      $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('reasonsforrejection','*')
//                    )
//                );
    }

    public function ClaimsServicesIssues() {
        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/ClaimsServicesIssues', $this->params, array(
            'claimsdetails' => $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails',
                    'ClaimServiceID',
                    $this->input->post('ClaimServiceID'))
                )
        );
    }

    public function TheListOfBeneficiaryVisits() {
        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/TheListOfBeneficiaryVisits', $this->params, array(
            'claimsdetails' => $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails',
                    'ClaimServiceID',
                    $this->input->post('ClaimServiceID'))
                )
        );
    }

    public function MedicalApprovalBy() {
        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/MedicalApprovalBy', $this->params, array(
            'claimsdetails' => $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails',
                    'ClaimServiceID',
                    $this->input->post('ClaimServiceID'))
                )
        );
    }

    public function AddClaimsWithServices() {
        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Claims/AddClaimsWithServices', $this->params, array(
            'claimsdetails' => $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails',
                    'ClaimServiceID',
                    $this->input->post('ClaimServiceID'))
                )
        );
    }

    public function AddClaimsWithServicesFromClinic() {
        $this->Access->AccessUser();
        $this->load->model('Pros');
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view(
                'Claims/AddClaimsWithServicesFromClinic',
                $this->params, array(
            'claimsdetails' => $this->Pros->GET_Data_From_Any_Table_As_Array('claimsdetails',
                    'ClaimServiceID',
                    $this->input->post('ClaimServiceID'))
                )
        );
    }

    public function AddClaims() {

        $Post = $this->input->post();

        $ClaimsArray = $this->Pros->Get_Ary_From_Table('claims');

        foreach ($Post as $key => $value) {

            if (isset($ClaimsArray[$key])) {

                $Clm['Claim'][$key] = $value;
            }
        }
        $Clm1['user'] = $Clm;
        $this->session->set_userdata($Clm1);

        var_dump($_SESSION);
        die();
        redirect('Claims/AddClaimsWithServices');
    }

    public function AddDiagnosisClaims() {


        //$Clm=$this->Clm;
        $Clm = $this->session->userdata('user');
        //var_dump($Clm);
        $Clm['Claim']['Diagnosis']["DiagnosisID"] = $this->input->post("DiagnosisID");
        $Clm1['user'] = $Clm;
        $this->session->set_userdata($Clm1);
        var_dump($Clm1);
        // var_dump($Clm1['user']['Claim']['Diagnosis']["DiagnosisID"]);
        die();
        redirect('Claims/AddClaimsWithServices');
    }

    public function AddDiagnosisServices() {
        var_dump($this->input->post());
    }

    public function FormAddServicesFromClinic() {
        $this->Access->AccessUser();

        $this->load->view('Claims/Forms/FormAddServicesFromClinic');
    }

    public function FormDataServices() {
        $this->Access->AccessUser();

        $this->load->view('Claims/Forms/FormDataServices');
    }

    public function Symptoms() {
        $this->Access->AccessUser();

        $this->load->view('Claims/Forms/Symptoms');
    }

    public function Diagnosis() {
        $this->Access->AccessUser();

        $this->load->view('Claims/Forms/Diagnosis');
    }
    
    

}
