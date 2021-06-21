<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pros
 *
 * @author Snosi
 */
class Pros extends CI_Model{
    
    /*
    * This Function Get var Session and
     * 
     * pass to ...... 
     * 
     * Start Function :::::
    */
    public function SessionPassTo(&$Data)
    {
            $session_data = $this->session->userdata('logged_in');
            $Data['user_name'] = $session_data['user_name'];
            $Data['user_login'] = $session_data['user_login'];
            $Data['user_Management'] = $session_data['user_Management'];
            $Data['user_Section'] = $session_data['user_Section'];
            $Data['user_jod'] = $session_data['user_jod'];
            $Data['user_id'] = $session_data['user_id'];
    }// End Function:::::::::
    
    /*
    * This Function Convert POST To Arry 
     * 
     * Start Function :::::
    */
    public function convert_to_Arry()
    {
        
    }// End Function:::::::::
    
    /*
     * This Function Get Name Filed Of Table 
     * 
     */
    function Get_Data_where($tbl,$ary)
    {
//     echo $tbl;   
        if(!is_array($ary))
        {
            $this->db->where($ary);
            $query=$this->db->get($this->db->dbprefix($tbl));
        }
        
        if(is_array($ary))
            $query = $this->db->get_where($this->db->dbprefix($tbl),$ary );
        //var_dump($query->result_array());
        
        return $query->result_array();
    }// End Function:::::::::
    
    /*
     * This Function Get Name Filed Of Table 
     * 
     */
    
    function Get_Name_Filed($tbl)
    {
//        echo $tbl;
        $query=$this->db->query("DESC ".$this->db->dbprefix($tbl)."");
        return $query->result();
    }// End Function:::::::::
    
    /*
     * This Function  SHOW FULL COLUMNS Of Table 
     * 
     */
    
    function SHOW_FULL_COLUMNS($tbl)
    {
//        echo $tbl;
        $query=$this->db->query("SHOW FULL COLUMNS FROM ".$this->db->dbprefix($tbl)."");
        return $query->result();
    }// End Function:::::::::
    
     /*
     * This Function  SHOW FULL COLUMNS Of Table 
     * 
     */
    
    function SHOW_FULL_COLUMNS_For_Multi_Table($tbl)
    {
//        echo $tbl;
        $tbls="";
        foreach ($this->db->dbprefix($tbl) as $key => $value) {
             $tbls.=$value.",";   
        }
        $tbls=substr($tbls, 0, strlen($tbls)-1);
        $query=$this->db->query("SHOW FULL COLUMNS FROM ".$tbls."");
        return $query->result();
    }// End Function:::::::::
    
    /*
    * This Function GET Filed Name And Convert To Array 
     * 
     * Start Function :::::
    */
    public function Get_Ary_From_Table($tbl)
    {
       
//        echo $tbl;
       $ary_fld= $this->Get_Name_Filed($tbl);
            for($i=0;$i< sizeof($ary_fld);$i++){
                foreach ($ary_fld[$i] as $key => $value) {
                    if($key=="Field")
                    {
                        $Fld_Tbl[$value]=-1;
                    }
                }
            }
       return $Fld_Tbl;
    }// End Function:::::::::
    
    /*
    * This Function GET Filed Name And Convert To Array 
    * 
    * Start Function :::::
    */
    public function Set_In_Table($tbl)
    {
       //echo $tbl; 
       $Fld_Tbl= Get_Ary_From_Table($tbl);  
       return $Fld_Tbl;
    }// End Function::::::::: 
    
    
    /*
    * This Function GET CONSTRAINTS To GET NAME TABLE 
    * 
    * Start Function :::::
    */
    public function GET_Data_From_Any_Table($tbl){
//        echo $tbl;
        $query= $this->db->get($this->db->dbprefix($tbl));
        $Cls=$query->result_array();
        return $Cls;
    }// End Function::::::::: 
    
    /*
    * This Function GET DATA FROM TABLE AS ARRAY 
    * 
    * Start Function :::::
    */
    public function GET_Data_From_Any_Table_As_Array($tbl,$fld=NULL,$vld=NULL){
//        echo $tbl;
        if($fld!=NULL && $vld!=NULL)
            $this->db->where($fld,$vld);
        $query=$this->db->get($this->db->dbprefix($tbl));
        $Cls=$query->result_array();
        //var_dump($Cls);
        return $Cls;
    }// End Function::::::::: 
    
    /*
    * This Function GET DATA FROM TABLE AS ARRAY BY "IN" 
    * 
    * Start Function :::::
    */
    public function GET_Data_From_Any_Table_As_Array_BY_IN($tbl,$slct,$fld=NULL,$vld=NULL,$Not=NULL){
//        echo $tbl;
        //var_dump($vld);
        if($fld!=NULL && $vld!=NULL)
        {
            if($Not==NULL)
                $this->db->where_in($fld,$vld);
            else
                $this->db->where_not_in($fld,$vld);
        }
        $this->db->select($slct);    
        $query=$this->db->get($this->db->dbprefix($tbl));
        $Cls=$query->result_array();
        return $Cls;
    }// End Function:::::::::
    
    /*
    * This Function GET DATA FROM TABLE AS ARRAY 
    * 
    * Start Function :::::
    */
    public function Put_Data_IN_One_Array($data1,$data2,$Kf1,$Kfq1,$f2,$fq2,$f3,$fq3){
        
        foreach ($data1 as $key1 => $value1) 
        {
            foreach ($data2 as $key2 => $value2) 
            {
                if($value1[$Kf1]=$value2[$Kfq1])
                {
                    
                    
                }
            }    
        }
        return $Cls;
    }// End Function::::::::: 
    
    /*
    * This Function GET CONSTRAINTS To GET NAME TABLE 
    * 
    * Start Function :::::
    */
    public function GET_CONSTRAINTS($Fld,$tbl){
//        echo $tbl;
       //$query=$this->db->get();
       //var_dump($Fld);
        $query= $this->db->get_where('information_schema.COLUMNS', array('COLUMN_NAME' => $Fld));
        $Cls=$query->result();
        foreach ($Cls as $obj) {
            if($obj->COLUMN_KEY=='PRI' && $obj->TABLE_NAME!=$this->db->dbprefix($tbl))
            {
                $datatbl["Tbl"]=$obj->TABLE_NAME;
                $datatbl["Fld"]=$Fld; 
                return $datatbl;
            }
        }
        return 0;
    }// End Function::::::::: 
    
    /*
     * This Function Get Name Filed Of Table 
     * 
     * but SQL COSTOMZ
     * 
     */
    
    function Get_data_By_SQL($sql)
    {
        
        $query=$this->db->query($sql);
        return $query->result_array();
                
    }// End Function:::::::::
    
    /*
     * This Function Get Name Filed Of Table 
     * 
     * but SQL COSTOMZ
     * 
     */
    
    function Get_data_By_SQL_return_values($sql,$key)
    {
        
        $query=$this->db->query($sql);
        $row= $query->result_array();
        foreach ($row as $ky => $value) {
            return $value[$key];
        }
        return $row;   
    }// End Function:::::::::
    
    /*
     * This Function Create Username  
     * 
     * 
     * 
     */
    function CreateUserName($username){
        //var_dump($password);
        $i="";
        for(;;){
            $this -> db -> select('*');
            $this -> db -> from('creat_acount');
            $this -> db -> where('acount_name', $username."".$i);
            $query = $this -> db -> get();
            if($query -> num_rows() == 0 ){
               return $username."".$i;
            }
            $i++;
        }
    }
    
    /*
     * This Function Create Username  
     * 
     * 
     * 
     */
    function UserName($tbl,$Fld,$usrpscnd){
        //var_dump($password);
//        echo $tbl;
            $query =$this -> db -> select($Fld)
                                -> from($this->db->dbprefix($tbl))
                                -> where($usrpscnd)
                                -> get();
            if($query -> num_rows() > 0 ){
                $fldname=$query->result_array();
                return $fldname[0][$Fld];
            }
            return FALSE;
        
    }
     
    function Get_Value_Filed($tbl,$fld,$cfld,$cvlu)
    {
//        echo $tbl.'5555';
        $this -> db -> select($fld);
        $this -> db -> from($this->db->dbprefix($tbl));
        $this -> db -> like($cfld, $cvlu);
        $query = $this -> db -> get();
        return $query->result_array();
        //var_dump($query);
    }
    
    function Get_Value_Filed_AQ($tbl,$fld,$cfld,$cvlu)
    {
//        echo $tbl;
        $this -> db -> select($fld);
        $this -> db -> from($this->db->dbprefix($tbl));
        $this -> db -> where($cfld, $cvlu);
        $query = $this -> db -> get();
        $Ar=$query->result_array();
        if(sizeof($Ar)>0){
            return $Ar;
        }else {
            return FALSE;
        }

    }
    
    function Get_JustValue_Filed_AQ($tbl,$fld,$cfld,$cvlu)
    {
//        echo $tbl;
        $this -> db -> select($fld);
        $this -> db -> from($this->db->dbprefix($tbl));
        $this -> db -> where($cfld, $cvlu);
        $query = $this -> db -> get();
        $Ar=$query->result_array();
        if(sizeof($Ar)>0){
            return $Ar[0][$fld];
        }else {
            return FALSE;
        }

    }
    
    function Get_JustValue_Filed_AQ_Multi_Cond($tbl,$fld,$cflds=FALSE)
    {
        //echo $tbl.'555555555';
        $this -> db -> select($fld);
        $this -> db -> from($this->db->dbprefix($tbl));
         if($cflds)
        $this -> db -> where($cflds);
        $query = $this -> db -> get();
        $Ar=$query->result_array();
        
        if(sizeof($Ar)>0){
            
            return $Ar[0][$fld];
        }else {
            return FALSE;
        }

    }
    
    public function Get_Filed_AQ_Multi_Cond_Ary($tbl,$fld,$cflds=FALSE)
    {
       //echo $tbl;
        $this -> db -> select($fld);
        $this -> db -> from($this->db->dbprefix($tbl));
        if($cflds)
            $this -> db -> where($cflds);
        $query = $this -> db -> get();
        $Ar=$query->result_array();
        if(sizeof($Ar)>0){
            return $Ar;
        }else {
            return FALSE;
        }

    }
    
    function Extrat_From_Array($array,$fld)
    {
        $arr=array();
        foreach ($array as $value) {
            array_push($arr, $value[$fld]);
            //var_dump($value['dep_no']);
        }
        return $arr;
    }
    
    function Make_Value_in_SQL_IN($CCD,$FldName=FALSE)
    {
        $str="";
        if($CCD)
            foreach ($CCD as $key => $value) {
            
                if($FldName!=FALSE)
                    $str.="".$value[$FldName].",";
                else
                    $str.="".$value[$key].",";
                
            }
        if($str!=""){
            $CondCD                 =   " IN (".substr($str, 0, strlen($str)-1).")";
            return $CondCD;
        }else {
            return " IN (-1)";
        }
    }
    
    public function Messagealert($alertType,$Message='',$row='')
    {
        if($alertType!=FALSE){ 
        echo "<div class=\"alert alert-success alert-dismissable\" id=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h4>	<i class=\"icon fa fa-check\"></i> رسالة النظام!</h4>
                تمت العملية بنجاح ... <br>".$Message." :". $row ."
              </div>";
        } 
        if($alertType==FALSE){ 
        echo "<div class=\"alert alert-error alert-dismissable\"  id=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h4>	<i class=\"icon fa fa-info-circle\"></i> رسالة النظام!</h4>
                 العملية غير مكتملة الرجاء التاكد ... <br>".$Message." :". $row ." 
              </div>";
        } 
    }

}