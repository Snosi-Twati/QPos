<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * 
 * 
 * Description of Desg
 *
 * @author Snosi
 */

class Desg extends CI_Model {
    /*
     * This Function Create Form To Any Table 
     * 
     * Start Function :::::
     */

    function Create_From_Tabels_Insrt($Tbl, $ActionTo = FALSE, $btn = FALSE, $FldFrg = FALSE, $ViewFld = FALSE) {


        $GetData = '';
        $this->load->model("Pros");
        $hidden ['Tbl'] = $Tbl;
        $hidden ['Url'] = uri_string();

        if ($ActionTo == "" || $ActionTo == FALSE)
            $ActionTo = "ProcessControlDatabases/ProConDBin";

        echo form_open($ActionTo, '', $hidden);
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        //var_dump($Creater);
        foreach ($Creater as $key) {

            if ($ViewFld != FALSE) {
                if (isset($ViewFld[$key->Field]) && $ViewFld[$key->Field] == $key->Field) {
                    if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {

                        if (isset($FldFrg[$key->Field]['type']) && $FldFrg[$key->Field]['type'] == "Search")
                            $this->CreateSelectDropdownRTS($key, $FldFrg, $GetData);
                        else
                            $this->CreateSelectDropdown($key, $FldFrg, $GetData);
                    } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                            $key->Field == $FldFrg[$key->Field]['TFld'] &&
                            $FldFrg[$key->Field]['type'] == 'dropdown' &&
                            sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                        $this->CreateDropdownFrmAry($key, $FldFrg);
                    } else {

                        $this->CreateInputField($key, $GetData);
                    }
                }
            } else {
                if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {
                    //var_dump($FldFrg[$key->Field]);

                    if (isset($FldFrg[$key->Field]['type']) && $FldFrg[$key->Field]['type'] == "Search")
                        $this->CreateSelectDropdownRTS($key, $FldFrg, $GetData);
                    else
                        $this->CreateSelectDropdown($key, $FldFrg, $GetData);
                } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                        $key->Field == $FldFrg[$key->Field]['TFld'] &&
                        $FldFrg[$key->Field]['type'] == 'dropdown' &&
                        sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                    $this->CreateDropdownFrmAry($key, $FldFrg);
                } else {

                    $this->CreateInputField($key);
                }
            }
        }

        if ($btn != FALSE) {
            $btndata = array(
                "type" => "submit",
                "class" => "btn btn-primary"
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn);
            echo "</div></div>";
            echo form_close();
        }
    }

// End Function:::::::::

    /*
     * This Function Create From Multi Tabels 
     * 
     * Start Function :::::
     */

    function Create_From_Buttons($Datas) {
        $btndata = array(
            "type" => "submit",
            "class" => "btn btn-primary",
            "style" => "width: 100%; "
        );
        foreach ($Datas as $Data) {

            echo form_open($Data['Url'] . "" . $Data['TID'] . "=" . $Data['ID']);
            echo "<div class=\"col-md-2\"   >";
            echo "<div class='input-group' style=\"margin: 4px;  width: 100%; \" >";
            echo form_button($btndata, $Data['Title']);
            echo "</div></div>";
            echo form_close();
        }
    }

    function Create_From_Multi_Tabels_Insrt($Tbls, $ActionTo = FALSE, $btn = FALSE, $FldFrg = FALSE) {
        $this->load->model("Pros");
        //$hidden ['Tbl']  = $Tbl ;
        $hidden ['Url'] = uri_string();
        if ($ActionTo != FALSE)
            echo form_open($ActionTo, '', $hidden);

        foreach ($Tbls as $key => $Tbl) {
            $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
            //var_dump($Creater);
            foreach ($Creater as $key) {
                if (isset($FldFrg[$key->Field]['TFld']) &&
                        $key->Field == $FldFrg[$key->Field]['TFld'] &&
                        $FldFrg[$key->Field]['type'] !== 'dropdown') {

                    if (isset($FldFrg[$key->Field]['type']) && $FldFrg[$key->Field]['type'] == "Search")
                        $this->CreateSelectDropdownRTS($key, $FldFrg, $GetData);
                    else
                        $this->CreateSelectDropdown($key, $FldFrg, $GetData);
                } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                        $key->Field == $FldFrg[$key->Field]['TFld'] &&
                        $FldFrg[$key->Field]['type'] == 'dropdown' &&
                        sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                    $this->CreateDropdownFrmAry($key, $FldFrg);
                } else {

                    $this->CreateInputField($key);
                }
            }
        }


        if ($btn != FALSE) {
            $btndata = array(
                "type" => "submit",
                "class" => "btn btn-primary"
            );

            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn);
            echo "</div></div>";
            echo form_close();
        }
    }

// End Function:::::::::

    /*
     * This Function Create Form To Any Table 
     * 
     * Start Function :::::
     */

    function Create_From_Tabels($Tbl,
            $TFld = FALSE, $TVld = FALSE, $ActionTo = FALSE,
            $btn = FALSE, $FldFrg = FALSE, $ViewFld = FALSE,
            $keepPOST = FALSE, $hiddenField = FALSE) {

        $hidden ['Tbl'] = $Tbl;
        $hidden ['Url'] = uri_string();
        $this->load->model("Pros");

        ////////////////////////////////////////////////////////////////////////

        if ($TFld) {

            if ($TVld)
                $DataTblCond[$TFld] = $TVld;
            else
                $DataTblCond = $TFld;

            $DataCreater = $this->Pros->Get_Data_where($Tbl, $DataTblCond);
        }

        ////////////////////////////////////////////////////////////////////////

        if ($ActionTo != FALSE) {
            if ($_POST && $keepPOST != FALSE)
                foreach ($_POST as $keykppst => $value) {
                    $hidden[$keykppst] = $value;
                }

            if ($hiddenField != FALSE)
                foreach ($hiddenField as $keyhf => $valuehf) {
                    $hidden[$keyhf] = $valuehf;
                }
            $AcTbl = array(
                "id" => $Tbl . "Data"
            );
            if (is_array($ActionTo)) {
                $AcTbl['method'] = $ActionTo['method'];
                $ActionTo = $ActionTo['action'];
            }

            echo form_open($ActionTo, $AcTbl, $hidden);
        }

        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);

        //is_array($Creater) 
        //$this->Pros->Get_Data_where($Tbl)

        foreach ($Creater as $key) {

            if (isset($DataCreater[0][$key->Field])) {
                $GetData = $DataCreater[0][$key->Field];
            } else {
                $GetData = '';
            }

            $this->InputFields($ViewFld, $key, $GetData, $FldFrg);
        }

        if ($btn != FALSE && !is_array($btn)) {
            $btndata = array(
                "type" => "submit",
                "id" => $Tbl . "Form",
                "class" => "btn btn-primary "
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn);
            echo "</div></div>";
            echo form_close();
        } elseif ($btn != FALSE && is_array($btn)) {
            $btndata = array(
                "type" => $btn["type"],
                "id" => $Tbl . "Form",
                "class" => "btn btn-primary "
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn["title"]);
            echo "</div></div>";
            echo form_close();
        }
    }

// End Function:::::::::

    /*
     * This Function Create Form To Any Table 
     * 
     * Start Function :::::
     */

    function InputFields($ViewFld, $key, $GetData, $FldFrg) {

        if ($ViewFld != FALSE) {
            if (isset($ViewFld[$key->Field]) && $ViewFld[$key->Field] == $key->Field) {
                if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {

                    if (isset($FldFrg[$key->Field]['type']) && $FldFrg[$key->Field]['type'] === "Search")
                        $this->CreateSelectDropdownRTS($key, $FldFrg, $GetData);
                    else
                        $this->CreateSelectDropdown($key, $FldFrg, $GetData);
                } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                        $key->Field == $FldFrg[$key->Field]['TFld'] &&
                        $FldFrg[$key->Field]['type'] == 'dropdown' &&
                        sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                    $this->CreateDropdownFrmAry($key, $FldFrg, $GetData);
                } else {

                    $this->CreateInputField($key, $GetData);
                }
            }
        } else {
            if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {

                if (isset($FldFrg[$key->Field]['type']) && $FldFrg[$key->Field]['type'] === "Search")
                    $this->CreateSelectDropdownRTS($key, $FldFrg, $GetData);
                else
                    $this->CreateSelectDropdown($key, $FldFrg, $GetData);
            } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                    $key->Field == $FldFrg[$key->Field]['TFld'] &&
                    $FldFrg[$key->Field]['type'] == 'dropdown' &&
                    sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                $this->CreateDropdownFrmAry($key, $FldFrg, $GetData);
            } else {

                $this->CreateInputField($key, $GetData);
            }
        }
    }

    function Create_From_Tabels_With_Ajax($Tbl,
            $TFld = FALSE, $TVld = FALSE, $ActionTo = FALSE,
            $btn = FALSE, $FldFrg = FALSE, $ViewFld = FALSE,
            $keepPOST = FALSE, $hiddenField = FALSE, $DivReload = FALSE) {

        
        $rndid = rand(1, 999999);
        $hidden ['Tbl'] = $Tbl;
        $hidden ['Url'] = uri_string();
        $varJS['Url'] = '[name="' . uri_string() . '"]';
        $varJS['Tbl'] = '[name="' . $Tbl . '"]';
        $this->load->model("Pros");

        if ($TFld) {

            if ($TVld)
                $DataTblCond[$TFld] = $TVld;
            else
                $DataTblCond = $TFld;

            $DataCreater = $this->Pros->Get_Data_where($Tbl, $DataTblCond);
        }
        if ($ActionTo != FALSE) {
            if ($_POST && $keepPOST != FALSE)
                foreach ($_POST as $keykppst => $value) {
                    $hidden[$keykppst] = $value;
                    //$varJS[$keykppst]=$value ;
                    $varJS[$keykppst] = '[name="' . $keykppst . '"]';
                }

            if ($hiddenField != FALSE)
                foreach ($hiddenField as $keyhf => $valuehf) {
                    $hidden[$keyhf] = $valuehf;
                    $varJS[$keyhf] = '[name="' . $keyhf . '"]';
                }
            $AcTbl = array(
                "id" => $Tbl . "Data" . $rndid
                    //"method" => "get"
            );
            $CreatervarJS = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
            foreach ($CreatervarJS as $keyvarJS) {

                if ($ViewFld != FALSE) {
                    if (isset($ViewFld[$keyvarJS->Field]))
                        $varJSsA[$keyvarJS->Field] = '[name="' . $keyvarJS->Field . '"]';
                } else {
                    if ($keyvarJS->Extra != 'auto_increment')
                        $varJS[$keyvarJS->Field] = '[name="' . $keyvarJS->Field . '"]';
                }
            }

            ////////////////////////////////////////////////////////////////////////
            $this->PostByAjax("#" . $Tbl . "Form" . $rndid, "#Form" . $Tbl . $rndid, 'Click', 'get', $ActionTo, "#" . $Tbl . "Data" . $rndid, $varJS, $DivReload);
            echo "<div id=\"Form" . $Tbl . $rndid . "\">";
            echo form_open($ActionTo, $AcTbl, $hidden);
        }

        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);

        //is_array($Creater) 
        //$this->Pros->Get_Data_where($Tbl)
        foreach ($Creater as $key) {

            if (isset($DataCreater[0][$key->Field])) {
                $GetData = $DataCreater[0][$key->Field];
            } else {
                $GetData = '';
            }
            $this->InputFields($ViewFld, $key, $GetData, $FldFrg);
        }

        if ($btn != FALSE && !is_array($btn)) {
            $btndata = array(
                "type" => "submit",
                "id" => $Tbl . "Form" . $rndid,
                "class" => "btn btn-primary "
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn);
            echo "</div></div>";
            echo form_close();
            echo "</div>";
            $this->CallPostDataToURL("#" . $Tbl . "Form" . $rndid, "#Form" . $Tbl . $rndid);
        } elseif ($btn != FALSE && is_array($btn)) {
            $btndata = array(
                "type" => $btn["type"],
                "id" => $Tbl . "Form" . $rndid,
                "class" => "btn btn-primary "
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn["title"]);
            echo "</div></div>";
            echo form_close();
            echo "</div>";
            $this->CallPostDataToURL("#" . $Tbl . "Form" . $rndid, "#Form" . $Tbl . $rndid);
        }
    }

// End Function:::::::::


    /*
     * This Function Create Form To Any Table 
     * 
     * Start Function :::::
     */

    function Create_From_Tabels_Ajax_PG($Tbl,
            $TFld = FALSE, $TVld = FALSE, $ActionTo = FALSE,
            $btn = FALSE, $FldFrg = FALSE, $ViewFld = FALSE,
            $keepPOST = FALSE, $hiddenField = FALSE) {

        $hidden ['Tbl'] = $Tbl;
        $hidden ['Url'] = uri_string();
        $this->load->model("Pros");

        ////////////////////////////////////////////////////////////////////////


        if ($TFld) {

            if ($TVld)
                $DataTblCond[$TFld] = $TVld;
            else
                $DataTblCond = $TFld;

            $DataCreater = $this->Pros->Get_Data_where($Tbl, $DataTblCond);
        }
        if ($ActionTo != FALSE) {
            if ($_POST && $keepPOST != FALSE)
                foreach ($_POST as $keykppst => $value) {
                    $hidden[$keykppst] = $value;
                }

            if ($hiddenField != FALSE)
                foreach ($hiddenField as $keyhf => $valuehf) {
                    $hidden[$keyhf] = $valuehf;
                }
        }

        $AcTbl = array(
            "id" => $Tbl . "Data",
            "method" => "post"
        );

        echo form_open($ActionTo, $AcTbl, $hidden);
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);

        //is_array($Creater) 
        //$this->Pros->Get_Data_where($Tbl)
        foreach ($Creater as $key) {

            if (isset($DataCreater[0][$key->Field])) {
                $GetData = $DataCreater[0][$key->Field];
            } else {
                $GetData = '';
            }

            if ($ViewFld != FALSE) {
                if (isset($ViewFld[$key->Field]) && $ViewFld[$key->Field] == $key->Field) {
                    if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {

                        if (isset($FldFrg[$key->Field]['type']) && $FldFrg[$key->Field]['type'] == "Search")
                            $this->CreateSelectDropdownRTS($key, $FldFrg, $GetData);
                        else
                            $this->CreateSelectDropdown($key, $FldFrg, $GetData);
                    } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                            $key->Field == $FldFrg[$key->Field]['TFld'] &&
                            $FldFrg[$key->Field]['type'] == 'dropdown' &&
                            sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                        $this->CreateDropdownFrmAry($key, $FldFrg, $GetData);
                    } else {

                        $this->CreateInputField($key, $GetData);
                    }
                }
            } else {
                if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {

                    if (isset($FldFrg[$key->Field]['type']) && $FldFrg[$key->Field]['type'] == "Search")
                        $this->CreateSelectDropdownRTS($key, $FldFrg, $GetData);
                    else
                        $this->CreateSelectDropdown($key, $FldFrg, $GetData);
                } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                        $key->Field == $FldFrg[$key->Field]['TFld'] &&
                        $FldFrg[$key->Field]['type'] == 'dropdown' &&
                        sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                    $this->CreateDropdownFrmAry($key, $FldFrg);
                } else {

                    $this->CreateInputField($key, $GetData);
                }
            }
        }

        if ($btn != FALSE && !is_array($btn)) {
            $btndata = array(
                "type" => "submit",
                "id" => $Tbl . "Form",
                "class" => "btn btn-primary "
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn);
            echo "</div></div>";
            echo form_close();
        } elseif ($btn != FALSE && is_array($btn)) {
            $btndata = array(
                "type" => $btn["type"],
                "id" => $Tbl . "Form",
                "class" => "btn btn-primary "
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn["title"]);
            echo "</div></div>";
            echo form_close();
        }
    }

// End Function:::::::::

    function Create_From_Tabels_Add_New_Filed($Tbl,
            $TFld = FALSE, $TVld = FALSE, $ActionTo = FALSE,
            $btn = FALSE, $FldFrg = FALSE, $ViewFld = FALSE,
            $keepPOST = FALSE, $hiddenField = FALSE) {

        $hidden ['Tbl' . '[]'] = $Tbl;
        $hidden ['Url' . '[]'] = uri_string();
        echo "<script type=\"text/javascript\">
                $(document).ready(function(){
                    $(\"#Newbutton\").click(function(){
                        $(\"#NewRow\").clone().appendTo(\"#New\");
                    });
                });
            </script>";
        $this->load->model("Pros");
        if ($TFld) {

            if ($TVld)
                $DataTblCond[$TFld] = $TVld;
            else
                $DataTblCond = $TFld;

            $DataCreater = $this->Pros->Get_Data_where($Tbl, $DataTblCond);
        }
        if ($ActionTo != FALSE) {
            if ($_POST && $keepPOST != FALSE)
                foreach ($_POST as $keykppst => $value) {
                    $hidden[$keykppst . '[]'] = $value;
                }
            if ($hiddenField != FALSE)
                foreach ($hiddenField as $keyhf => $valuehf) {
                    $hidden[$keyhf . '[]'] = $valuehf;
                }



            echo form_open($ActionTo, '', $hidden);
        }
        echo "<div id=\"New\"></div>";
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<div id=\"NewRow\"><div class=\"row\">";

        //is_array($Creater) 
        //$this->Pros->Get_Data_where($Tbl)
        foreach ($Creater as $key) {

            if (isset($DataCreater[0][$key->Field])) {
                $GetData = $DataCreater[0][$key->Field];
            } else {
                $GetData = '';
            }

            if ($ViewFld != FALSE) {
                if (isset($ViewFld[$key->Field]) && $ViewFld[$key->Field] == $key->Field) {
                    if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {

                        $this->CreateSelectDropdownMulti($key, $FldFrg, $GetData);
                    } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                            $key->Field == $FldFrg[$key->Field]['TFld'] &&
                            $FldFrg[$key->Field]['type'] == 'dropdown' &&
                            sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                        $this->CreateDropdownFrmAryMulti($key, $FldFrg, $GetData);
                    } else {

                        $this->CreateInputFieldMulti($key, $GetData);
                    }
                }
            } else {
                if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {

                    $this->CreateSelectDropdownMulti($key, $FldFrg, $GetData);
                } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                        $key->Field == $FldFrg[$key->Field]['TFld'] &&
                        $FldFrg[$key->Field]['type'] == 'dropdown' &&
                        sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                    $this->CreateDropdownFrmAryMulti($key, $FldFrg);
                } else {

                    $this->CreateInputFieldMulti($key, $GetData);
                }
            }
        }
        echo "</div></div>";

        $btndataAddNew = array(
            "type" => "button",
            "class" => "btn btn-primary",
            "id" => "Newbutton",
            "onclick" => "copyDiv()"
        );
        echo "<div class=\"col-md-4\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo form_button($btndataAddNew, 'اضافة سجل');
        echo "</div></div>";
        if ($btn != FALSE && !is_array($btn)) {
            $btndata = array(
                "type" => "submit",
                "id" => $Tbl . "Form",
                "class" => "btn btn-primary "
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn);
            echo "</div></div>";
            echo form_close();
        } elseif ($btn != FALSE && is_array($btn)) {
            $btndata = array(
                "type" => $btn["type"],
                "id" => $Tbl . "Form",
                "class" => "btn btn-primary "
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn["title"]);
            echo "</div></div>";
            echo form_close();
        }
    }

// End Function:::::::::

    function ListButton($btndata = FALSE) {

        $btndatav = array(
            "type" => "submit",
            "class" => "btn btn-primary",
            "style" => "width: 100%; "
        );
        $btndatax = array(
            "type" => "submit",
            "class" => "btn btn-primary",
            "style" => "width: 100%; background-color:red;"
        );
        if (sizeof($btndata) > 0)
            foreach ($btndata as $key => $value) {

                /////////////////////////////////////////////////////////////
                echo "<div class=\"col-md-1\"   >";
                //echo "<div class='input-group' style=\" width: 100%; \" >";
                echo form_button($btndatax, '×');
                //echo "</div>";
                echo "</div>";
                /////////////////////////////////////////////////////////////
                echo "<div class=\"col-md-2\"   >";
                //echo "<div class='input-group' style=\"; width: 100%;\" >";
                echo form_button($btndatav, $value['Title']);
                //echo "</div>";
                echo "</div>";
                ////////////////////////////////////////////////////////////
            }
    }

    function ModelCaller($CallModal) {

        if ($CallModal != FALSE)
            foreach ($CallModal as $CallModalvalue) {
                $hidden = array(
                    $CallModalvalue['TID'] => $CallModalvalue['ID'],
                    'TBL' => $CallModalvalue['TBL'],
                    'Url' => uri_string());
                echo "<div class=\"col-md-2\"   >";
                echo "<div class=\"input-group\" style=\"margin: 4px;  width: 100%; \" >";
                echo "<button href=\"" . base_url() . $CallModalvalue['Url'] . "?" . $CallModalvalue['ID'] . "=" . $CallModalvalue['TID'] . "\" data-target=\"#myModalMsg\" type=\"button\" class=\"btn btn-primary\"  data-toggle=\"modal\" style=\"color:  " . $CallModalvalue['Color'] . "; width: 100%; \"> <i class=\"fa " . $CallModalvalue['fa'] . " fa-lg\"></i>&nbsp;  " . $CallModalvalue['Title'] . "   </button>";
                echo "</div>";
                echo "</div>";
            }
    }

    /*
     * This Function Create Form To Any Table 
     * 
     * Start Function :::::
     */

    function Create_From_Tabels_GETPOST($Tbl,
            $TFld = FALSE, $TVld = FALSE, $ActionTo = FALSE,
            $btn = FALSE, $FldFrg = FALSE, $ViewFld = FALSE,
            $keepPOST = FALSE, $hiddenField = FALSE) {

        $hidden ['Tbl'] = $Tbl;
        $hidden ['Url'] = uri_string();
        $this->load->model("Pros");
//        if($TFld){
//            
//            if($TVld)
//                $DataTblCond[$TFld] =   $TVld;
//            else
//                $DataTblCond        =   $TFld;
//            
//            $DataCreater            =   $this->Pros->Get_Data_where($Tbl,$DataTblCond);
//        }
        $DataCreater = $this->input->post();
        if ($ActionTo != FALSE) {
            if ($_POST && $keepPOST != FALSE)
                foreach ($_POST as $keykppst => $value) {
                    $hidden[$keykppst] = $value;
                }
            if ($hiddenField != FALSE)
                foreach ($hiddenField as $keyhf => $valuehf) {
                    $hidden[$keyhf] = $valuehf;
                }



            echo form_open($ActionTo, '', $hidden);
        }

        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);

        //is_array($Creater) 
        //$this->Pros->Get_Data_where($Tbl)
        //var_dump($DataCreater);
        foreach ($Creater as $key) {

            if (isset($DataCreater[0][$key->Field])) {
                $GetData = $DataCreater[0][$key->Field];
            } else {
                $GetData = '';
            }

            if ($ViewFld != FALSE) {
                if (isset($ViewFld[$key->Field]) && $ViewFld[$key->Field] == $key->Field) {
                    if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {

                        if (isset($FldFrg[$key->Field]['type']) && $FldFrg[$key->Field]['type'] == "Search")
                            $this->CreateSelectDropdownRTS($key, $FldFrg, $GetData);
                        else
                            $this->CreateSelectDropdown($key, $FldFrg, $GetData);
                    } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                            $key->Field == $FldFrg[$key->Field]['TFld'] &&
                            $FldFrg[$key->Field]['type'] == 'dropdown' &&
                            sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                        $this->CreateDropdownFrmAry($key, $FldFrg, $GetData);
                    } else {

                        $this->CreateInputField($key, $GetData);
                    }
                }
            } else {
                if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld'] && isset($FldFrg[$key->Field]['Fld'])) {

                    if (isset($FldFrg[$key->Field]['type']) && $FldFrg[$key->Field]['type'] == "Search")
                        $this->CreateSelectDropdownRTS($key, $FldFrg, $GetData);
                    else
                        $this->CreateSelectDropdown($key, $FldFrg, $GetData);
                } elseif (isset($FldFrg[$key->Field]['TFld']) &&
                        $key->Field == $FldFrg[$key->Field]['TFld'] &&
                        $FldFrg[$key->Field]['type'] == 'dropdown' &&
                        sizeof($FldFrg[$key->Field]['Ary']) > 0) {

                    $this->CreateDropdownFrmAry($key, $FldFrg);
                } else {

                    $this->CreateInputField($key, $GetData);
                }
            }
        }

        if ($btn != FALSE) {
            $btndata = array(
                "type" => "submit",
                "class" => "btn btn-primary"
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn);
            echo "</div></div>";
            echo form_close();
        }
    }

// End Function:::::::::

    /*
     * This Function Create Form To Any Table 
     * 
     * Start Function :::::
     */

    function Create_From_Tabels_Update($Tbl, $ActionTo, $btn = FALSE, $FldFrg) {

        $this->load->model("Pros");
        $hidden = array(
            'Tbl' => $Tbl,
            'Url' => uri_string());
        echo form_open("ProcessControlDatabases/ProConDBin", '', $hidden);
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        //var_dump($Creater);
        foreach ($Creater as $key) {
            if (isset($FldFrg[$key->Field]['TFld']) && $key->Field == $FldFrg[$key->Field]['TFld']) {

                $data = array(
                    'name' => $key->Field,
                    'id' => $key->Field,
                    'class' => 'form-control'
                );
                echo "<div class=\"col-md-4\"  >";
                echo "<div class='input-group' style=\"margin: 4px;\">";
                echo "<span class='input-group-addon'   >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";
                echo "" . $this->Create_dropdown($key->Field, $FldFrg[$key->Field]['Tbl'], $FldFrg[$key->Field]['VFld'], $FldFrg[$key->Field]['Fld'], 'class="form-control"') . "<span class='input-group-addon'></span></div></div>";
            } else {

                if (strstr($key->Type, 'varchar') != FALSE) {
                    $typ = 'text';
                } elseif (strstr($key->Type, 'tinyint') != FALSE) {
                    $typ = 'checkbox';
                } elseif (strstr($key->Type, 'int') != FALSE) {
                    $typ = 'number';
                } elseif (strstr($key->Type, 'datetime') != FALSE) {
                    $typ = 'date';
                }

                if ($key->Field == $this->Get_Primary_Key($Tbl)) {

                    if (!$key->Extra == 'auto_increment') {
                        $data = array(
                            'name' => $key->Field,
                            'id' => $key->Field,
                            'type' => $typ,
                            'class' => 'form-control'
                        );
                        echo "<div class=\"col-md-4\"  >";
                        echo "<div class='input-group' style=\"margin: 4px;\">";
                        echo "<span class='input-group-addon'   >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";
                        echo "" . form_input($data) . "<span class='input-group-addon'></span></div></div>";
                    }
                } else {

                    $AryTbl = $this->Pros->GET_CONSTRAINTS($key->Field, $Tbl);

                    $data = array(
                        'name' => $key->Field,
                        'id' => $key->Field,
                        'type' => $typ,
                        'class' => 'form-control'
                    );
                    echo "<div class=\"col-md-4\"    >";
                    echo "<div class='input-group' style=\"margin: 4px;\" >";
                    echo "<span class='input-group-addon'  >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";
                    if ($typ == 'checkbox')
                        echo "" . $this->Create_checkbox($data) . "<span class='input-group-addon'>";
                    else
                        echo "" . form_input($data) . "<span class='input-group-addon'>";
                    echo "</span></div></div>";
                }
            }
        }

        if ($btn != FALSE) {
            $btndata = array(
                "type" => "submit",
                "class" => "btn btn-primary"
            );
            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn);
            echo "</div></div>";
            echo form_close();
        }
    }

// End Function:::::::::

    /*
     * This Function Create Form With DropDown 
     * 
     * Start Function :::::
     */

    function Create_Form_With_DropDown($name, $ActionTo, $btn = FALSE, $AryCond, $keepPOST = TRUE, $ClassName = "myselect") {
        $hidden = array(
            'Url' => uri_string());
        //var_dump($_POST);
        if ($_POST && $keepPOST)
            foreach ($_POST as $keykppst => $value) {
                $hidden[$keykppst] = $value;
            }
        $rn = rand(1000, 9999);
        if (!($ActionTo == '' || $ActionTo == false))
            echo form_open($ActionTo, '', $hidden);
        foreach ($name as $key => $value) {

            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo "<span class='input-group-addon'  >" . form_label($this->LebalName($value['LebalName']), $value['LebalName']) . "</span>";
            $this->Create_dropdown_With_Cond($value['Name'], $value['Tbl'], $value['FldName'], $value['VlName'], $AryCond, 'class="' . $ClassName . $rn . '  form-control" required="required"');
            echo "<span class='input-group-addon'>";
            echo "</span></div></div>";
        }

        $btndata = array(
            "type" => "submit",
            "class" => "btn btn-primary"
        );
        echo "<script type=\"text/javascript\">

            $(\"." . $ClassName . $rn . "\").select2(
                {
                    placeholder: \"Search And Select \",
                    allowClear: true
                }
            );

        </script>";
        echo "<div class=\"col-md-2\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        if ($btn != false)
            echo form_button($btndata, $btn);
        echo "</div></div>";
        if ($btn != false)
            echo form_close();
    }

// End Function:::::::::




    /*
     * This Function Create Form With DropDown 
     * 
     * Start Function :::::
     */

    function Create_Form_With_DropDownGet($name, $ActionTo, $btn = FALSE, $AryCond, $keepPOST = TRUE, $ButtonId = FALSE, $ClassName = "myselect") {
        $hidden = array(
            'Url' => uri_string());
        //var_dump($_POST);
        $rn = rand(1000, 9999);
        if ($_GET && $keepPOST)
            foreach ($_GET as $keykppst => $valueG) {
                if ($keykppst == 'ClaimID' || $keykppst == 'InvoiceNumber' || $keykppst == 'CompanyID' || $keykppst == 'Services')
                    $hidden[$keykppst] = $valueG;
            }

        $mthd['method'] = 'get';
        if ($ActionTo != FALSE)
            echo form_open($ActionTo, $mthd, $hidden);

        foreach ($name as $key => $value) {

            if ($this->input->get($value['Name']) != NULL)
                $selected = $this->input->get($value['Name']);
            else
                $selected = -1;

            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo "<span class='input-group-addon'  >" . form_label($this->LebalName($value['LebalName']), $value['LebalName']) . "</span>";
            $this->Create_dropdown_With_Cond($value['Name'], $value['Tbl'], $value['FldName'], $value['VlName'], $AryCond, 'class="form-control ' . $ClassName . $rn . '" required="required" id="' . $value['Name'] . '" ', $selected);
            echo "<span class='input-group-addon'>";
            echo "</span>"
            . "</div>"
            . "</div>";
        }

        $btndata = array(
            "type" => "submit",
            "class" => "btn btn-primary",
            "id" => $ButtonId
        );

        echo " <script type=\"text/javascript\">
        $(\"." . $ClassName . $rn . "\").select2({
        placeholder: \"Search And Select \",
        allowClear: true
	});
        </script>";

        echo "<div class=\"col-md-2\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo form_button($btndata, $btn);
        echo "</div></div>";
        if ($ActionTo != FALSE)
            echo form_close();
    }

// End Function:::::::::

    function Create_Form_With_DropDown_InputFrm($name, $ActionTo, $btn = FALSE, $AryCond, $keepPOST = TRUE, $data) {
        $hidden = array(
            'Url' => uri_string());
        //var_dump($_POST);
        $rn = rand(1000, 9999);
        if ($_POST && $keepPOST)
            foreach ($_POST as $keykppst => $value) {

                $hidden[$keykppst] = $value;
            }

        $datafld = array(
            'name' => $data,
            'id' => $data,
            'type' => 'text',
            'value' => $this->input->get($data),
            'required' => 'required',
            'class' => 'form-control'
        );
        echo form_open($ActionTo, 'get', $hidden);
        foreach ($name as $key => $value) {

            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo "<span class='input-group-addon'  >" . form_label($this->LebalName($value['LebalName']), $value['LebalName']) . "</span>";
            $this->Create_dropdown_With_Cond($value['Name'], $value['Tbl'], $value['FldName'], $value['VlName'], $AryCond, 'class="form-control myselect " required="required" ');
            echo "<span class='input-group-addon'>";
            echo "</span></div></div>";
        }
        echo "<div class=\"col-md-4\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo "<span class='input-group-addon'  >" . form_label($this->LebalName($datafld['name']), $datafld['name']) . "</span>";
        echo "" . form_input($datafld) . "<span class='input-group-addon'>";
        echo "</span></div></div>";
        $btndata = array(
            "type" => "submit",
            "class" => "btn btn-primary"
        );
        echo " <script type=\"text/javascript\">

      $(\".myselect\").select2({
	   placeholder: \"Search And Select \",
       allowClear: true
	});

</script>";
        echo "<div class=\"col-md-2\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo form_button($btndata, $btn);
        echo "</div></div>";
        echo form_close();
    }

// End Function:::::::::

    function Create_Form_InputFrmGet($data, $ActionTo, $btn = FALSE, $keepPOST = TRUE) {
        $hidden = array(
            'Url' => uri_string());
        //var_dump($_POST);
        if ($_GET && $keepPOST)
            foreach ($_GET as $keykppst => $value) {
                if ($keykppst != 'Do')
                    $hidden[$keykppst] = $value;
            }
        $datafld = array(
            'name' => $data,
            'id' => $data,
            'type' => 'text',
            'value' => $this->input->get($data),
            'required' => 'required',
            'class' => 'form-control'
        );
        $ary['method'] = 'get';
        echo form_open($ActionTo, $ary, $hidden);
        echo "<div class=\"col-md-4\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo "<span class='input-group-addon'  >" . form_label($this->LebalName($datafld['name']), $datafld['name']) . "</span>";
        echo "" . form_input($datafld) . "<span class='input-group-addon'>";
        echo "</span></div></div>";
        $btndata = array(
            "type" => "submit",
            "class" => "btn btn-primary"
        );

        echo "<div class=\"col-md-2\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo form_button($btndata, $btn);
        echo "</div></div>";
        echo form_close();
    }

// End Function:::::::::

    function Create_Form_InputFrm($data, $ActionTo, $btn = FALSE, $keepPOST = TRUE) {
        $hidden = array(
            'Url' => uri_string());
        //var_dump($_POST);
        if ($_POST && $keepPOST)
            foreach ($_POST as $keykppst => $value) {
                $hidden[$keykppst] = $value;
            }
        $datafld = array(
            'name' => $data,
            'id' => $data,
            'type' => 'text',
            'value' => $this->input->get($data),
            'required' => 'required',
            'class' => 'form-control'
        );
        $ary['method'] = 'get';
        echo form_open($ActionTo, $ary, $hidden);
        echo "<div class=\"col-md-4\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo "<span class='input-group-addon'  >" . form_label($this->LebalName($datafld['name']), $datafld['name']) . "</span>";
        echo "" . form_input($datafld) . "<span class='input-group-addon'>";
        echo "</span></div></div>";
        $btndata = array(
            "type" => "submit",
            "class" => "btn btn-primary"
        );

        echo "<div class=\"col-md-2\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo form_button($btndata, $btn);
        echo "</div></div>";
        echo form_close();
    }

// End Function:::::::::

    function Create_Form_InputFrm_Ajax($data, $ActionTo, $btn = FALSE, $keepPOST = TRUE, $FileInDiv, $URL) {
        $hidden = array(
            'Url' => uri_string());
        //var_dump($_POST);
        if ($_GET && $keepPOST)
            foreach ($_GET as $keykppst => $value) {
                $hidden[$keykppst] = $value;
                $varJS["" . $keykppst . ""] = '[name="' . $keykppst . '"]';
            }

        $datafld = array(
            'name' => $data,
            'id' => $data,
            'type' => 'text',
            //'value'         => $this->input->get($data),
            'required' => 'required',
            'class' => 'form-control'
        );

        $rn = rand(10000, 99999);
        $varJS["" . $data . ""] = '[name="' . $data . '"]';
        $varJS['MC_token'] = '[name="MC_token"]';
        $this->Desg->CallFileInDiv("#Btn" . $rn, "#" . $FileInDiv, $varJS, $URL);

        //$ary['method']='get';
        $ary['id'] = "Fr" . $rn;
        echo form_open($ActionTo, $ary, $hidden);
        echo "<div class=\"col-md-4\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo "<span class='input-group-addon'  >" . form_label($this->LebalName($datafld['name']), $datafld['name']) . "</span>";
        echo "" . form_input($datafld) . "<span class='input-group-addon'>";
        echo "</span></div></div>";
        $btndata = array(
            "type" => "button",
            "class" => "btn btn-primary",
            "id" => "Btn" . $rn
        );

        echo "<div class=\"col-md-2\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo form_button($btndata, $btn);
        echo "</div></div>";
        echo form_close();
    }

// End Function:::::::::

    function Create_Form_AddByArray_InputFrm_Ajax($data = FALSE, $ActionTo = FALSE, $btn = FALSE, $keepPOST = TRUE, $FileInDiv = FALSE, $URL = FALSE) {

        $hidden = array(
            'Url' => uri_string());
        //var_dump($_POST);

        if ($_GET && $keepPOST)
            foreach ($_GET as $keykppst => $value) {
                $hidden[$keykppst] = $value;
                $varJS["" . $keykppst . ""] = '[name="' . $keykppst . '"]';
            }
        foreach ($data as $key => $value) {

            $varJS["" . $key . ""] = '[name="' . $key . '"]';
        }
        $rn = rand(10000, 99999);
        //$varJS["".$data.""]      =   '[name="'.$data.'"]';
        $varJS['MC_token'] = '[name="MC_token"]';
        $this->Desg->CallFileInDiv("#Btn" . $rn, "#" . $FileInDiv, $varJS, $URL);

        //$ary['method']='get';
        $ary['id'] = "Fr" . $rn;
        echo form_open($ActionTo, $ary, $hidden);

        foreach ($data as $key => $value) {
            //var_dump();
            $datafld = array(
                'name' => $key,
                'value' => $_GET ? $_GET[$key] : '',
                'id' => $key,
                'type' => $value['type'],
                'class' => 'form-control'
            );
            if (isset($value['required'])) {
                $datafld['required'] = 'required';
            }
            echo "<div class=\"col-md-3\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo "<span class='input-group-addon'  >" . form_label($this->LebalName($value['label']), $value['name']) . "</span>";

            if ($value['type'] == 'checkbox') {

                $this->Create_checkbox($datafld);
            } else {
                echo "" . form_input($datafld) . "<span class='input-group-addon'>";
            }
            echo "</span></div></div>";
        }



        $btndata = array(
            "type" => "button",
            "class" => "btn btn-primary",
            "id" => "Btn" . $rn
        );

        echo "<div class=\"col-md-2\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo form_button($btndata, $btn);
        echo "</div></div>";
        echo form_close();
    }

// End Function:::::::::

    function Create_Form_AddByArray_InputFrm($data = FALSE, $ActionTo = FALSE, $btn = FALSE, $keepPOST = TRUE, $FileInDiv = FALSE, $URL = FALSE) {

        $hidden = array(
            'Url' => uri_string(),
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash());
        //var_dump($_POST);
//            if($_GET&&$keepPOST)
//                foreach ($_GET as $keykppst => $value) {
//                    $hidden[$keykppst]=$value ;
//                    $varJS["".$keykppst.""]      =   '[name="'.$keykppst.'"]';
//                }
//            foreach ($data as $key => $value) {
//
//                $varJS["".$key.""]      =   '[name="'.$key.'"]';
//            }
        $rn = rand(10000, 99999);
        //$varJS["".$data.""]      =   '[name="'.$data.'"]';
        //$varJS['MC_token']                    =   '[name="MC_token"]';
        //$this->Desg->CallFileInDiv("#Btn".$rn,"#".$FileInDiv,$varJS,$URL);

        if ($ActionTo != FALSE) {
            //var_dump($ActionTo);
            $ary['method'] = 'get';
            $ary['id'] = "Fr" . $rn;
            echo form_open($ActionTo, $ary, $hidden);
        }


        if ($data != FALSE)
            foreach ($data as $key => $value) {
                //var_dump();
                $datafld = array(
                    'name' => $key,
                    'value' => $_GET ? $_GET[$key] : '',
                    'id' => $key,
                    'type' => $value['type'],
                    'class' => 'form-control'
                );
                echo "<div class=\"col-md-3\"   >";
                echo "<div class='input-group' style=\"margin: 4px;\" >";
                echo "<span class='input-group-addon'  >" . form_label($this->LebalName($value['label']), $value['name']) . "</span>";
                if ($value['type'] == 'checkbox') {

                    $this->Create_checkbox($datafld);
                } else {
                    echo "" . form_input($datafld) . "<span class='input-group-addon'>";
                }
                echo "</span></div></div>";
            }


        if ($btn != FALSE) {
            $btndata = array(
                "type" => "submet",
                "class" => "btn btn-primary",
                "id" => "Btn" . $rn
            );

            echo "<div class=\"col-md-2\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo form_button($btndata, $btn);
            echo "</div></div>";
            echo form_close();
        }
    }

// End Function:::::::::

    function Create_Form_With_DropDown_Ajax($name, $ActionTo, $btn = FALSE, $AryCond, $keepPOST = TRUE, $ClassName = "myselect", $FileInDiv, $URL) {
        $hidden = array(
            'Url' => uri_string());
        //var_dump($_POST);
        if ($_GET && $keepPOST)
            foreach ($_GET as $keykppst => $value) {
                $hidden[$keykppst] = $value;
                $varJS["" . $keykppst . ""] = '[name="' . $keykppst . '"]';
            }
        $rna = rand(10000, 99999);
        foreach ($name as $key => $value) {

            $varJS["" . $value['Name'] . ""] = '[name="' . $value['Name'] . '"]';
        }

        $varJS['MC_token'] = '[name="MC_token"]';
        $this->Desg->CallFileInDiv("#Btn" . $rna, "#" . $FileInDiv, $varJS, $URL);
        $rn = rand(1000, 9999);
        $AryAc['id'] = 'Fr' . $rna;
        echo form_open($ActionTo, $AryAc, $hidden);

        foreach ($name as $key => $value) {

            echo "<div class=\"col-md-4\"   >";
            echo "<div class='input-group' style=\"margin: 4px;\" >";
            echo "<span class='input-group-addon'  >" . form_label($this->LebalName($value['LebalName']), $value['LebalName']) . "</span>";
            $this->Create_dropdown_With_Cond($value['Name'], $value['Tbl'], $value['FldName'], $value['VlName'], $AryCond, 'class="' . $ClassName . $rn . '  form-control" required="required"');
            echo "<span class='input-group-addon'>";
            echo "</span></div></div>";
        }

        $btndata = array(
            "type" => "button",
            "class" => "btn btn-primary",
            "id" => "Btn" . $rna
        );

        echo "<script type=\"text/javascript\">

                $(\"." . $ClassName . $rn . "\").select2(
                    {
                        placeholder: \"Search And Select \",
                        allowClear: true
                    }
                );

            </script>";

        echo "<div class=\"col-md-2\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo form_button($btndata, $btn);
        echo "</div></div>";
        echo form_close();
    }

// End Function:::::::::

    function Create_Form_With_DropDown_From_Array_Ajax($name, $ActionTo, $btn = FALSE, $keepPOST = TRUE, $FileInDiv, $URL) {
        $hidden = array(
            'Url' => uri_string());
        //var_dump($_POST);
        if ($_GET && $keepPOST)
            foreach ($_GET as $keykppst => $value) {
                $hidden[$keykppst] = $value;
                $varJS["" . $keykppst . ""] = '[name="' . $keykppst . '"]';
            }
        $rna = rand(10000, 99999);
        foreach ($name as $key => $value) {

            $varJS["" . $value['TFld'] . ""] = '[name="' . $value['TFld'] . '"]';
        }

        $varJS['MC_token'] = '[name="MC_token"]';

        $this->Desg->CallFileInDiv("#Btn" . $rna, "#" . $FileInDiv, $varJS, $URL);

        $rn = rand(1000, 9999);

        $AryAc['id'] = 'Fr' . $rna;

        echo form_open($ActionTo, $AryAc, $hidden);

        foreach ($name as $key => $value) {

            $this->CreateDropdownFrmAryWithOutDB($value['TFld'], $name);
        }

        $btndata = array(
            "type" => "button",
            "class" => "btn btn-primary",
            "id" => "Btn" . $rna
        );

        echo "<div class=\"col-md-2\"   >";
        echo "<div class='input-group' style=\"margin: 4px;\" >";
        echo form_button($btndata, $btn);
        echo "</div></div>";
        echo form_close();
    }

// End Function:::::::::

    /*
     * This Function Create dropdown For Any Table 
     * 
     * Start Function :::::
     */

    function Create_dropdownMulti($name, $Tbl, $VFld, $Fld, $class, $selected = -1) {

        $this->load->model("Pros");
        $GDATA = $this->Pros->GET_Data_From_Any_Table($Tbl);
        $options[""] = "";
        foreach ($GDATA as $value) {
            $options[$this->LebalName($value[$Fld])] = $value[$VFld];
        }
        //$shirts_on_sale = array('small', 'large');
        echo form_dropdown($name . '[]', $options, $selected, $class . " id = '" . $name . "'");
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    function Create_dropdown($name, $Tbl, $VFld, $Fld, $class, $selected = -1) {

        //echo $Tbl;
        $this->load->model("Pros");
        $GDATA = $this->Pros->GET_Data_From_Any_Table($Tbl);
        $options[""] = "";
        foreach ($GDATA as $value) {
            $options[$this->LebalName($value[$Fld])] = $value[$VFld];
        }
        //$shirts_on_sale = array('small', 'large');
        echo form_dropdown($name, $options, $selected, $class . " id = '" . $name . "'");
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    /*
     * This Function Create dropdown For Any Table 
     *
     * With Condtion 
     * 
     * Start Function :::::
     */

    function Create_dropdown_With_Cond($name, $Tbl, $VFld, $Fld, $Cond = '', $class = '', $selected = -1) {

        //echo $Tbl;
        $this->load->model("Pros");
        $GDATA = $this->Pros->Get_Data_where($Tbl, $Cond);

        $options[""] = "";
        foreach ($GDATA as $value) {
            //var_dump($value[$Fld]);
            $options[$value[$Fld]] = $value[$VFld];
        }
        //var_dump($options);
        //$shirts_on_sale = array('small', 'large');
        echo form_dropdown($name, $options, $selected, $class . " id = '" . $name . "' ");
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    /*
     * This Function Create dropdown For Any Table 
     * 
     * Start Function :::::
     */

    function Create_dropdown_With_Cond_Multi($name, $Tbl, $VFld, $Fld, $Cond = '', $class = '', $selected = -1) {

        $this->load->model("Pros");
        $GDATA = $this->Pros->Get_Data_where($Tbl, $Cond);
        //var_dump($GDATA);
        $options[""] = "";
        foreach ($GDATA as $value) {
            $options[$value[$Fld]] = $value[$VFld];
        }
        //$shirts_on_sale = array('small', 'large');
        echo form_dropdown($name . '[]', $options, 0, $class . " id = '" . $name . "'");
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    /*
     * This Function Create dropdown For Any Table 
     * 
     * Start Function :::::
     */

    function Create_dropdown_FrmAry($name, $GetData = '', $GDATA, $class) {


        $options[""] = "";
        foreach ($GDATA as $key => $value) {

            $options[$key] = $value;
        }
        //$shirts_on_sale = array('small', 'large');
        echo form_dropdown($name, $options, $GetData, $class . " id = '" . $name . "'");
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    function Create_dropdown_FrmAry_Multi($name, $GetData = '', $GDATA, $class) {


        $options[""] = "";
        foreach ($GDATA as $key => $value) {

            $options[$key] = $value;
        }
        //$shirts_on_sale = array('small', 'large');
        echo form_dropdown($name . '[]', $options, $GetData, $class . " id = '" . $name . "'");
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    /*
     * This Function Create Menu List For Any Table 
     * 
     * but two field
     * 
     * Start Function :::::
     */

    function Create_MenuList_Multi($Tbl, $Fld, $sFld) {

        $this->load->model("Pros");
        $GDATA = $this->Pros->GET_Data_From_Any_Table($Tbl);
        foreach ($GDATA as $value) {
            $options[$value[$Fld]] = "" . $value[$Fld] . "-" . $value[$sFld];
        }
        return form_multiselect($Fld . '[]', $options);
    }

// End Function:::::::::

    /*
     * This Function Create Menu List For Any Table 
     * 
     * but two field
     * 
     * Start Function :::::
     */

    function Create_MenuList_Multi_Costomz($FldName, $Fld, $sFld, $id, $sct) {
        $sql = "SELECT * FROM `subj` 
                WHERE Subj_NO in(
                                    select Subj_NO From subj_tree 
                                        where (Root_Subj_NO 
                                            in( select Subj_NO 
                                                from stu_sub
                                                where Subj_Stut like '1'
                                                and Stu_ID like '" . $id . "')
                                            or(Root_Subj_NO = 0)
                                            or(Subj_NO 
                                                in( select Subj_NO 
                                                    from stu_sub
                                                    where Subj_Stut like '-1'
                                                    and Stu_ID like '" . $id . "'))
                                            )and 
                                            Depar like '" . $sct . "'  
                                )";
        $strChBx = "";
        $count = 1;
        $this->load->model("Pros");
        $GDATA = $this->Pros->Get_data_By_SQL($sql);
        foreach ($GDATA as $value) {
            $options[$value[$Fld]] = "" . $value[$Fld] . "-" . $value[$sFld];
            $strChBx .= '<Div class="stylChBox" >' . $value[$sFld] . ' " ' . $value[$Fld] . ' "-"' . $value["subj_unit"] . '" ' . form_checkbox($value[$Fld], $value[$Fld] . '') . '</Div>';
        }
        if (sizeof($GDATA) > 0)
            return $strChBx; //form_multiselect($FldName, $options);
    }

// End Function:::::::::

    /*
     * This Function Create Menu List For Any Table 
     * 
     * but two field
     * 
     * Start Function :::::
     */

    function Create_MenuList_Multi_Gnrl($FldName, $Fld, $sFld, $sql) {
        $strChBx = "";
        $count = 1;
        $this->load->model("Pros");
        $GDATA = $this->Pros->Get_data_By_SQL($sql);
        foreach ($GDATA as $value) {
            $options[$value[$Fld]] = "" . $value[$Fld] . "-" . $value[$sFld];
            $strChBx .= '<Div class="stylChBox" >' . $value[$sFld] . ' " ' . $value[$Fld] . ' "-"' . $value["subj_unit"] . '" ' . form_checkbox($value[$Fld], $value[$Fld] . '') . '</Div>';
        }
        if (sizeof($GDATA) > 0)
            return $strChBx; //form_multiselect($FldName, $options);
    }

// End Function:::::::::  

    /*
     * This Function Create Menu List For Any Table 
     * 
     * 
     * Start Function :::::
     */

    function Create_MenuList($Tbl, $Fld) {

        $this->load->model("Pros");
        $GDATA = $this->Pros->GET_Data_From_Any_Table($Tbl);
        foreach ($GDATA as $value) {
            $options[] = $value[$Fld];
        }
        return form_multiselect($Fld, $options);
    }

// End Function:::::::::


    /*
     * This Function Create Validation For Any Table 
     * 
     * Start Function :::::
     */

    function Create_Validation($Tbl) {

        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed($Tbl);
        foreach ($ary_fld as $key) {
            if ($key->Null == 'NO') {
                $V[] = array(
                    'field' => $key->Field,
                    'label' => $key->Field,
                    'rules' => 'required'
                );
            } else {
                $V[] = array(
                    'field' => $key->Field,
                    'label' => $key->Field
                );
            }
        }
        return $V;
    }

// End Function:::::::::

    /*
     * This Function Get Primary Key 
     * 
     * Start Function :::::
     */

    function Get_Primary_Key($Tbl) {
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed($Tbl);
        foreach ($ary_fld as $key) {
            if ($key->Key == 'PRI') {
                return $key->Field;
            }
        }
    }

// End Function:::::::::

    /*
     * This Function Get Auto Increment Primary Key 
     * 
     * Start Function :::::
     */

    function Get_Auto_Increment($Tbl) {
        $this->load->model("Pros");
        $ary_fld = $this->Pros->Get_Name_Filed($Tbl);
        foreach ($ary_fld as $key) {
            if ($key->Key == 'PRI' && $key->Extra == 'auto_increment') {
                return TRUE;
            }
        }
        return FALSE;
    }

// End Function:::::::::

    /*
     * This Function Check POST ERORR (NULL,EMPTY,NUBMER,VARCHAR) 
     * 
     * 
     * Start Function :::::
     * 
     * 
     */

    function Chek_POST_Err($ary, $Tbl) {
        $str = "";
        $cont_err = 0;
        $this->load->model("Pros");
        $Titles = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        foreach ($ary as $key => $value) {
            foreach ($Titles as $valueT) {
                if ($valueT->Field == $key) {
                    if (!$value) {
                        $str .= "<div class='ErrFrm'> Please Enter " . $valueT->Comment . "</div>";
                        $cont_err++;
                    }
                }
            }
        }
        if ($cont_err > 0) {
            echo "<div class='ErrFrm'> Count Erorr " . $cont_err . "</div>";
            echo $str;
        }

        return $cont_err;
    }

// End Function:::::::::

    public function ViewDataWithComlixCond($Tbl, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE, $order = false) {
        $Rc = rand(23, 100);
        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }

        echo "</tr>"
        . "</thead>"
        . "<tbody>";
        //var_dump($Cond) ;
        $Str = FALSE;
        if (is_array($Cond)) {
            if ($Cond != FALSE)
                foreach ($Cond as $key => $value) {
                    $Str .= "" . $key . " '" . $value . "' AND ";
                }
            $Str = substr($Str, 0, strlen($Str) - 4);
        } else {
            $Str = $Cond;
        }
        //var_dump($Str);
        //echo $Str;
        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Str, $order);

        foreach ($AryData as $key => $value) {
            echo "<tr>";
            $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
            foreach ($Creater as $keyCreater) {
                if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                    if (isset($RlFlds[$keyCreater->Field])) {
                        echo "<td>" . $this->Pros->Get_JustValue_Filed_AQ(
                                $RlFlds[$keyCreater->Field]['Tbl'],
                                $RlFlds[$keyCreater->Field]['Fld'],
                                $RlFlds[$keyCreater->Field]['CFld'],
                                $value[$keyCreater->Field]) . "</td>";
                    } else {
                        echo "<td>" . $value[$keyCreater->Field] . "</td>";
                    }
                } elseif ($Flds == FALSE) {
                    if (isset($RlFlds[$keyCreater->Field])) {
                        echo "<td>" . $this->Pros->Get_JustValue_Filed_AQ(
                                $RlFlds[$keyCreater->Field]['Tbl'],
                                $RlFlds[$keyCreater->Field]['Fld'],
                                $RlFlds[$keyCreater->Field]['CFld'],
                                $value[$keyCreater->Field]) . "</td>";
                    } else {
                        echo "<td>" . $value[$keyCreater->Field] . "</td>";
                    }
                }
            }
            echo "</tr>";
        }
        echo "</tbody>";
        /* echo "<tfoot>"
          . "<tr>";
          foreach ($Creater as $key) {
          if($Flds!=FALSE&&(isset($Flds[$key->Field])&&$Flds[$key->Field]==$key->Field))
          echo "<th>".$this->LebalName($key->Field)."</th>";
          elseif($Flds==FALSE)
          echo "<th>".$this->LebalName($key->Field)."</th>";
          }
          echo    "</tr>"
          . "</tfoot>"; */
        echo "</table>" . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewData($Tbl, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE) {
        $Rc = rand(23, 100);
        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }

        echo "</tr>"
        . "</thead>"
        . "<tbody>";
        //var_dump($Cond) ;       
        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);
        //var_dump($AryData);
        if ($AryData)
            foreach ($AryData as $key => $value) {
                echo "<tr>";
                $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
                foreach ($Creater as $keyCreater) {
                    if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            echo "<td>" . $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]) . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    } elseif ($Flds == FALSE) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            echo "<td>" . $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]) . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    }
                }
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";
        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>" . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewDataAjax($Tbl, $Flds = FALSE, $Cond = FALSE, $Export = false) {
        $Rc = rand(23, 100);
        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        //include 'ssp.class.php'; 
        $Str = "";
        if ($Cond != FALSE)
            foreach ($Cond as $key => $value) {
                $Str .= " " . $key . " '" . $value . "' AND ";
            }
        $Str = substr($Str, 0, strlen($Str) - 4);
        //echo $Str;
        echo "<script type=\"text/javascript\" language=\"javascript\" >";
        if (strtolower($Export) == 'excel')
            echo "function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement(\"a\");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}";

        echo "$(document).ready(function() {
                $('#table$Rc').DataTable( {
                   \"processing\": true,
                   \"serverSide\": true,";

        if (isset($_GET['lengthMenu']))
            echo ""
            . "\"searching\": false,"
            . "\"ordering\": false,"
            . " \"lengthMenu\": [[-1], [\"All\"]],";


        echo "\"ajax\": \"" . base_url() . "Call/server_side_processing?table=" . $Tbl . "&" . $this->security->get_csrf_token_name() . "=" . $this->security->get_csrf_hash() . "&" . http_build_query(array('Fields' => $Flds)) . "&where=" . $Str . "\"
                } );
        } );
        

        </script>";
        $Tbl = "";
        foreach ($Flds as $key => $value) {
            if (isset($_GET[$key]) && $_GET[$key] != '')
                $Tbl .= $key . "_" . $_GET[$key] . "__";
        }

        if (strtolower($Export) == 'excel')
            echo ""
            . "<button onclick=\"exportTableToExcel('table$Rc','Tabel_" . $Tbl . "')\">Export Table Data To Excel File</button>";



        echo ""
        . "<table id=\"table$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";
        //var_dump($Creater);


        foreach ($Flds as $key) {
            //if(isset($Flds[$key->Field]))
            echo "<th>" . $this->LebalName($key) . "</th>";
        }
        echo "</tr>"
        . "</thead>";

        echo ""
        . "<tfoot>"
        . "<tr>";

        foreach ($Flds as $key) {
            //if(isset($Flds[$key->Field]))
            echo "<th>" . $this->LebalName($key) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>";
    }

    public function functionName($table, $primaryKey, $columns, $where = null) {

        /*
         * DataTables example server-side processing script.
         *
         * Please note that this script is intentionally extremely simply to show how
         * server-side processing can be implemented, and probably shouldn't be used as
         * the basis for a large complex system. It is suitable for simple use cases as
         * for learning.
         *
         * See http://datatables.net/usage/server-side for full details on the server-
         * side processing requirements of DataTables.
         *
         * @license MIT - http://datatables.net/license_mit
         */

        /*         * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * Easy set variables
         */

        // DB table to use
        $table = 'merchant_portal_trn';

        // Table's primary key
        $primaryKey = 'TRANSACTION_CODE';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array('db' => 'MERCHANT_NUMBER', 'dt' => 0),
            array('db' => 'OUTLET_NUMBER', 'dt' => 1),
            array('db' => 'TERMINAL_ID', 'dt' => 2),
            array('db' => 'MERCHANT_ACRONYM', 'dt' => 3),
            array('db' => 'MERCHANT_ACCOUNT_NUMBER', 'dt' => 4),
            array('db' => 'MERCHANT_PROFILE_CODE', 'dt' => 5),
            array('db' => 'ISSUER_BANK_CODE', 'dt' => 6),
            array('db' => 'CARD_NUMBER', 'dt' => 7),
            array('db' => 'TRANSACTION_CODE', 'dt' => 8)
        );

        // SQL server connection information

        $sql_details = array(
            'user' => $db['default']['username'],
            'pass' => $db['default']['password'],
            'db' => $db['default']['database'],
            'host' => $db['default']['hostname']
        );

        /*         * * * * * * * * * * * * * * * * 
         * * * * * * * * * * * * * * * * * 
         * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP
         * server-side, there is no need to edit below this line.
         */

        require( 'ssp.class.php' );

        echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)
        );
    }

    public function ViewDataClaimsDetailsList($Tbl, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE) {
        $Rc = rand(23, 100);
        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }

        echo "</tr>"
        . "</thead>"
        . "<tbody>";

        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);
        //var_dump($AryData);
        foreach ($AryData as $key => $value) {
            echo "<tr>";
            $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
            foreach ($Creater as $keyCreater) {
                if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                    if (isset($RlFlds[$keyCreater->Field])) {
                        echo "<td>" . $this->Pros->Get_JustValue_Filed_AQ(
                                $RlFlds[$keyCreater->Field]['Tbl'],
                                $RlFlds[$keyCreater->Field]['Fld'],
                                $RlFlds[$keyCreater->Field]['CFld'],
                                $value[$keyCreater->Field]) . "</td>";
                    } else {
                        echo "<td>" . $value[$keyCreater->Field] . "</td>";
                    }
                } elseif ($Flds == FALSE) {
                    if (isset($RlFlds[$keyCreater->Field])) {
                        echo "<td>" . $this->Pros->Get_JustValue_Filed_AQ(
                                $RlFlds[$keyCreater->Field]['Tbl'],
                                $RlFlds[$keyCreater->Field]['Fld'],
                                $RlFlds[$keyCreater->Field]['CFld'],
                                $value[$keyCreater->Field]) . "</td>";
                    } else {
                        echo "<td>" . $value[$keyCreater->Field] . "</td>";
                    }
                }
            }
            echo "</tr>";
        }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";
        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>" . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewDataWithExRow($Tbl, $Col = FALSE, $Flds = FALSE, $RlFlds = FALSE) {
        $Rc = rand(23, 100);
        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        if ($Col != FALSE)
            foreach ($Col as $Colvalue) {
                echo "<th>" . $this->LebalName($Colvalue['Title']) . "</th>";
            }
        echo "</tr>"
        . "</thead>"
        . "<tbody>";
        if (isset($_POST['TBL'])) {

            foreach ($_POST as $keypst => $value) {

                foreach ($Creater as $pstCreater) {
                    if ($pstCreater->Field == $keypst) {

                        $AryData = $this->Pros->GET_Data_From_Any_Table_As_Array($Tbl, $pstCreater->Field, $this->input->post($pstCreater->Field));
                        break;
                    }
                }
            }
        } else {
            $AryData = $this->Pros->GET_Data_From_Any_Table_As_Array($Tbl);
        }
        if (sizeof($AryData) > 0)
            foreach ($AryData as $key => $value) {
                echo "<tr>";
                //$Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
                foreach ($Creater as $keyCreater) {
                    if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);
                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    } elseif ($Flds == FALSE) {
                        if (isset($RlFlds[$keyCreater->Field])) {

                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);

                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    }
                }
                if ($Col != FALSE)
                    foreach ($Col as $Colvalue) {
                        $hidden = array(
                            $Colvalue['TID'] => $value[$Colvalue['ID']],
                            'TBL' => $Colvalue['TBL'],
                            'Url' => uri_string());
                        echo "<th>";
                        echo form_open($Colvalue['Url'], '', $hidden);
                        echo "<div class=\"input-group\">";
                        echo "<button type=\"submit\" class=\"btn btn-primary fa " . $Colvalue['fa'] . " \" style=\"color:  " . $Colvalue['Color'] . "; \"></button>";
                        echo "</div>";
                        echo form_close();
                        echo "</th>";
                    }
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";
        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>" . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewDataWithExRowWithMultiCond($Tbl, $Col = FALSE, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE, $ButtonAction = FALSE, $Checkbox = FALSE, $CallModal = false, $Chartjs = FALSE) {

        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);

        $Rc = rand(23, 1000);

        if ($Chartjs)
            $this->Chartjs($AryData, $Rc, $Chartjs);

        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);

        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }

        if ($Col != FALSE)
            foreach ($Col as $Colvalue) {
                echo "<th>" . $this->LebalName($Colvalue['Title']) . "</th>";
            }

        if ($ButtonAction != FALSE)
            foreach ($ButtonAction as $BAvalue) {
                echo "<th>" . $this->LebalName($BAvalue['Title']) . "</th>";
            }

        if ($Checkbox != FALSE)
            foreach ($Checkbox as $Checkboxvalue) {
                echo "<th>" . $this->LebalName($Checkboxvalue['Title']) . "</th>";
            }

        if ($CallModal != FALSE)
            foreach ($CallModal as $CallModalvalue) {
                echo "<th>" . $this->LebalName($CallModalvalue['Title']) . "</th>";
            }

        echo "</tr>"
        . "</thead>"
        . "<tbody>";

        //var_dump($AryData)  ;   
        if ($AryData)
            foreach ($AryData as $key => $value) {
                echo "<tr>";
                $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
                foreach ($Creater as $keyCreater) {
                    if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);
                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    } elseif ($Flds == FALSE) {
                        if (isset($RlFlds[$keyCreater->Field])) {

                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);

                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    }
                }

                if ($Col != FALSE)
                    foreach ($Col as $Colvalue) {
                        if (!$Colvalue['ajax']) {
                            $hidden = array(
                                $Colvalue['TID'] => $value[$Colvalue['ID']],
                                'TBL' => $Colvalue['TBL'],
                                'Url' => uri_string());
                            echo "<td>";
                            echo form_open($Colvalue['Url'] . "?" . $Colvalue['TID'] . "=" . $value[$Colvalue['ID']] . "", '', $hidden);

                            echo "<div class=\"input-group\">";
                            echo "<button type=\"submit\" class=\"btn btn-primary fa " . $Colvalue['fa'] . " \" style=\"color:  " . $Colvalue['Color'] . "; \"></button>";
                            echo "</div>";
                            //echo    "<a data-toggle=\"modal\" href=\"http://localhost/TPA/Claims/ReasonsForRejection.aspx?ClaimServiceID=".$value[$Colvalue['ID']]."\" data-target=\"#myModal\">Click me !</a>";
                            echo form_close();

                            echo "</td>";
                        }
                    }

                if ($Col != FALSE)
                    foreach ($Col as $Colvalue) {
                        if ($Colvalue['ajax']) {
                            $idrn = rand(11111, 99999);
                            $AcTbl = array(
                                "id" => $Tbl . "Data" . $Colvalue['do'] . $idrn
                                    //"method" => "get"
                            );

                            $hidden = array(
                                $Colvalue['TID'] => $value[$Colvalue['ID']],
                                'TBL' => $Colvalue['TBL'],
                                'Url' => uri_string());
                            echo "<td>";
                            //echo form_open($Colvalue['Url'] . "?" . $Colvalue['TID'] . "=" . $value[$Colvalue['ID']] . "", '', $hidden);
                            //var_dump($Colvalue['load']);
                            $varJS[$Colvalue['TID']] = $Colvalue['ID'];
                            $ActionTo = $Colvalue['Url'];
                            $this->PostByAjax("#" . $Tbl . "Form" . $Colvalue['do'] . $idrn, "#Form" . $Tbl . $Colvalue['do'] . $idrn, 'Click', 'get', $ActionTo, "#" . $Tbl . "Data" . $Colvalue['do'] . $idrn, $varJS, $Colvalue['load']);
                            echo "<div id=\"Form" . $Tbl . $Colvalue['do'] . $idrn . "\">";
                            echo form_open($ActionTo, $AcTbl, $hidden);
                            echo "<div class=\"input-group\">";

                            $btndata = array(
                                //"type" => "submit",
                                "id" => $Tbl . "Form" . $Colvalue['do'] . $idrn,
                                "style" => "background-color :" . $Colvalue['Color'] . "",
                                "class" => "btn btn-primary "
                            );

                            echo form_button($btndata, $Colvalue['Title']);

                            echo "</div>";
                            echo form_close();
                            $this->CallPostDataToURL("#" . $Tbl . "Form" . $Colvalue['do'] . $idrn, "#Form" . $Tbl . $Colvalue['do'] . $idrn);
                            echo "</td>";
                        }
                    }

                if ($CallModal != FALSE)
                    foreach ($CallModal as $CallModalvalue) {
                        $Rcm = rand(23, 1000);
                        $hidden = array(
                            $CallModalvalue['TID'] => $value[$CallModalvalue['ID']],
                            'TBL' => $CallModalvalue['TBL'],
                            'Url' => uri_string());
                        echo "<td>";
                        echo "<div class=\"input-group\">";
                        echo "<button id=\"btnm" . $Rcm . "\" href=\"" . base_url() . $CallModalvalue['Url'] . "?" . $CallModalvalue['TID'] . "=" . $value[$CallModalvalue['ID']] . "\" data-target=\"#myModalMsg\" type=\"button\" class=\"btn btn-primary fa " . $CallModalvalue['fa'] . " \"  data-toggle=\"modal\" style=\"color:  " . $CallModalvalue['Color'] . "; \"></button>";
                        echo "</div>";

                        echo "</td>";
                    }

                if ($ButtonAction != FALSE)
                //foreach ($ButtonAction as $Indx){
                    foreach ($ButtonAction as $BAvalue) {
                        $hidden = array(
                            $BAvalue['TID'] => $value[$BAvalue['ID']],
                            'TBL' => $BAvalue['TBL'],
                            'Url' => uri_string());
                        echo "<th>";
                        $Cnd[$BAvalue['TID']] = $value[$BAvalue['ID']];

                        if (isset($BAvalue['CID']) && $BAvalue['CID'] != FALSE)
                            $Cnd[$BAvalue['CID']] = $BAvalue['CVL'];
                        if (isset($BAvalue['SCID']) && $BAvalue['SCID'] != FALSE)
                            $Cnd[$BAvalue['SCID']] = $BAvalue['SCVL'];

                        if ($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond($BAvalue['TBL'], $BAvalue['TID'], $Cnd) != FALSE) {
                            if ($BAvalue['Url'] != FALSE)
                                echo form_open($BAvalue['Url'], '', $hidden);
                            echo "<div class=\"input-group\">";
                            if (isset($BAvalue['TitleBtn']))
                                echo "<button type=\"submit\" class=\"btn btn-primary fa " . $BAvalue['fa'] . " \" style=\"color:  " . $BAvalue['Color'] . "; \">" . $BAvalue['TitleBtn'] . "</button>";
                            else
                                echo "<button type=\"submit\" class=\"btn btn-primary fa " . $BAvalue['fa'] . " \" style=\"color:  " . $BAvalue['Color'] . "; \"></button>";
                            echo "</div>";
                            if ($BAvalue['Url'] != FALSE)
                                echo form_close();
                        }
                        unset($Cnd);
                        echo "</th>";
                    }

                //foreach ($ButtonAction as $Indx){
                //}
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";
        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>"
        . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewDataWithExRowWithSQL($SQL, $Col = FALSE, $Flds = FALSE, $ButtonAction = FALSE, $Checkbox = FALSE, $CallModal = FALSE) {

        //$AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl,'*',$Cond);
        $AryData = $this->Pros->Get_data_By_SQL($SQL);

        $Rc = rand(23, 1000);

        $this->load->model("Pros");

        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Flds as $key) {
            echo "<th>" . $this->LebalName($key) . "</th>";
        }

        if ($Col != FALSE)
            foreach ($Col as $Colvalue) {
                echo "<th>" . $this->LebalName($Colvalue['Title']) . "</th>";
            }

        if ($ButtonAction != FALSE)
            foreach ($ButtonAction as $BAvalue) {
                echo "<th>" . $this->LebalName($BAvalue['Title']) . "</th>";
            }

        if ($Checkbox != FALSE)
            foreach ($Checkbox as $Checkboxvalue) {
                echo "<th>" . $this->LebalName($Checkboxvalue['Title']) . "</th>";
            }

        if ($CallModal != FALSE)
            foreach ($CallModal as $CallModalvalue) {
                echo "<th>" . $this->LebalName($CallModalvalue['Title']) . "</th>";
            }

        echo "</tr>"
        . "</thead>"
        . "<tbody>";

        if ($AryData)
            foreach ($AryData as $key => $value) {
                //var_dump($value)  ;
                echo "<tr>";

                foreach ($Flds as $valueF) {

                    echo "<td>" . $value[$valueF] . "</td>";
                }

                if ($Col != FALSE)
                    foreach ($Col as $Colvalue) {
                        $hidden = array(
                            $Colvalue['TID'] => $value[$Colvalue['ID']],
                            'TBL' => $Colvalue['TBL'],
                            'Url' => uri_string());
                        echo "<td>";
                        echo form_open($Colvalue['Url'] . "?" . $Colvalue['TID'] . "=" . $value[$Colvalue['ID']] . "", '', $hidden);
                        echo "<div class=\"input-group\">";
                        echo "<button type=\"submit\" class=\"btn btn-primary fa " . $Colvalue['fa'] . " \" style=\"color:  " . $Colvalue['Color'] . "; \"></button>";
                        echo "</div>";
                        //echo    "<a data-toggle=\"modal\" href=\"http://localhost/TPA/Claims/ReasonsForRejection.aspx?ClaimServiceID=".$value[$Colvalue['ID']]."\" data-target=\"#myModal\">Click me !</a>";
                        echo form_close();
                        echo "</td>";
                    }

                if ($CallModal != FALSE)
                    foreach ($CallModal as $CallModalvalue) {
                        $hidden = array(
                            $CallModalvalue['TID'] => $value[$CallModalvalue['ID']],
                            'TBL' => $CallModalvalue['TBL'],
                            'Url' => uri_string());
                        echo "<td>";
                        echo "<div class=\"input-group\">";
                        echo "<button href=\"" . base_url() . $CallModalvalue['Url'] . "?" . $CallModalvalue['TID'] . "=" . $value[$CallModalvalue['ID']] . "\" data-target=\"#myModalMsg\" type=\"button\" class=\"btn btn-primary fa " . $CallModalvalue['fa'] . " \"  data-toggle=\"modal\" style=\"color:  " . $CallModalvalue['Color'] . "; \"></button>";
                        echo "</div>";

                        echo "</td>";
                    }

                if ($ButtonAction != FALSE)
                //foreach ($ButtonAction as $Indx){
                    foreach ($ButtonAction as $BAvalue) {
                        $hidden = array(
                            $BAvalue['TID'] => $value[$BAvalue['ID']],
                            'TBL' => $BAvalue['TBL'],
                            'Url' => uri_string());
                        echo "<th>";
                        $Cnd[$BAvalue['TID']] = $value[$BAvalue['ID']];

                        if (isset($BAvalue['CID']) && $BAvalue['CID'] != FALSE)
                            $Cnd[$BAvalue['CID']] = $BAvalue['CVL'];
                        if (isset($BAvalue['SCID']) && $BAvalue['SCID'] != FALSE)
                            $Cnd[$BAvalue['SCID']] = $BAvalue['SCVL'];

                        if ($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond($BAvalue['TBL'], $BAvalue['TID'], $Cnd) != FALSE) {
                            if ($BAvalue['Url'] != FALSE)
                                echo form_open($BAvalue['Url'], '', $hidden);
                            echo "<div class=\"input-group\">";
                            if (isset($BAvalue['TitleBtn']))
                                echo "<button type=\"submit\" class=\"btn btn-primary fa " . $BAvalue['fa'] . " \" style=\"color:  " . $BAvalue['Color'] . "; \">" . $BAvalue['TitleBtn'] . "</button>";
                            else
                                echo "<button type=\"submit\" class=\"btn btn-primary fa " . $BAvalue['fa'] . " \" style=\"color:  " . $BAvalue['Color'] . "; \"></button>";
                            echo "</div>";
                            if ($BAvalue['Url'] != FALSE)
                                echo form_close();
                        }
                        unset($Cnd);
                        echo "</th>";
                    }

                //foreach ($ButtonAction as $Indx){
                //}
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";
        foreach ($Flds as $key) {

            echo "<th>" . $this->LebalName($key) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>"
        . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewDataWithExRowWithMultiCondEnterData($Tbl, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE, $DataKey = FALSE, $hidden = FALSE) {
        $Rc = rand(23, 100);
        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "<th>" . $this->LebalName("القيمة المستهلة من السقف") . "</th>";
        echo "<th>" . $this->LebalName("قيمة العيادة") . "</th>";
        echo "<th>" . $this->LebalName("----") . "</th>";
        echo "</tr>"
        . "</thead>"
        . "<tbody>";

        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);
        //var_dump($AryData)  ;   
        if ($AryData)
            foreach ($AryData as $key => $value) {
                echo "<tr>";
                $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
                foreach ($Creater as $keyCreater) {
                    if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);
                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    } elseif ($Flds == FALSE) {
                        if (isset($RlFlds[$keyCreater->Field])) {

                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);

                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    }
                }

                if ($keyCreater->Field = 'ServiceID') {
                    if ($this->session->userdata('ClaimID')) {
                        $SumCond['ServiceID'] = $value[$keyCreater->Field];
                        $ClimID['ClaimID'] = $this->session->userdata('ClaimID');
                        $SumCond['BeneficiaryID'] = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims', 'BeneficiaryID', $ClimID);
                    } elseif ($this->input->post('BeneficiaryID')) {
                        //echo $this->input->post('BeneficiaryID');
                        $SumCond['BeneficiaryID'] = $this->input->post('BeneficiaryID');
                    } elseif ($this->session->userdata('ContactID')) {
                        $SumCond['BeneficiaryID'] = $this->session->userdata('ContactID');
                    }
                    //echo $this->input->post('BeneficiaryID');
                    echo "<td>"
                    . "" . $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('listofservice', 'ClinicServiceAmountSum', $SumCond) . ""
                    . "</td>";
                }

                $parameters = '';
                //var_dump($this->input->get());
                foreach ($this->input->get() as $keyG => $valueG) {
                    if ($keyG === 'InvoiceNumber')
                        if ($this->input->post('InvoiceNumber'))
                            $parameters .= $keyG . "=" . $this->input->post('InvoiceNumber') . "&";
                        else
                            $parameters .= $keyG . "=" . $this->input->get('InvoiceNumber') . "&";
                    else
                        $parameters .= $keyG . "=" . $valueG . "&";
                }
                //var_dump($this->input->get('InvoiceNumber'));
                if ($DataKey != FALSE) {
                    $ActionTo = 'ProcessControlDatabases/ProConDBinService';
                    $hidden ['Tbl'] = 'claimsdetails';
                    $hidden ['Url'] = uri_string() . '?' . $parameters;
                    $hidden['ServiceDate'] = date('Y-m-d');
                    $hidden['ServiceTime'] = date('H:i:s');
                    $hidden['ServiceID'] = $value[$keyCreater->Field];
//                var_dump($DataKey);
//                var_dump($value['ServicePrice']);
                    $DataKey['type'] = 'number';
                    $DataKey['min'] = 1;
                    @$DataKey['max'] = $value['ServicePrice'];

                    echo form_open($ActionTo, '', $hidden);
                    echo "<td>"
                    . "" . form_input($DataKey) . ""
                    . "</td>";

                    echo "<td>";
                    $btndata = array(
                        "type" => "submit",
                        "class" => "btn btn-primary"
                    );
                    echo "<div class=\"col-md-4\"   >";
                    echo "<div class='input-group' style=\"margin: 4px;\" >";
                    echo form_button($btndata, "اضافة خدمة");
                    echo "</div></div>";
                    echo form_close();
                }

                echo "</td>";
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";
        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>" . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewDataWithExRowWithMultiCondEnterDataTPAServiceReviewAmount($Tbl, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE, $DataKey = FALSE, $hidden = FALSE) {
        $Rc = rand(23, 100);
        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "<th>" . $this->LebalName("قيمة بعد المراجعة") . "</th>";
        //echo "<th>".$this->LebalName("قيمة العيادة")."</th>";
        echo "<th>" . $this->LebalName("----") . "</th>";
        echo "</tr>"
        . "</thead>"
        . "<tbody>";

        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);
        //var_dump($AryData)  ;   
        if ($AryData)
            foreach ($AryData as $key => $value) {
                echo "<tr>";
                $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
                foreach ($Creater as $keyCreater) {
                    if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);
                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    } elseif ($Flds == FALSE) {
                        if (isset($RlFlds[$keyCreater->Field])) {

                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);

                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    }
                }

//            if($keyCreater->Field='ServiceID')
//            { 
//                if($this->session->userdata('ClaimID')){
//                    $SumCond['ServiceID']       =   $value[$keyCreater->Field];
//                    $ClimID['ClaimID']          =   $this->session->userdata('ClaimID');
//                    $SumCond['BeneficiaryID']   =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims','BeneficiaryID',$ClimID);
//                }elseif($this->input->post('BeneficiaryID')){
//                    echo $this->input->post('BeneficiaryID');
//                    $SumCond['BeneficiaryID']   =   $this->input->post('BeneficiaryID');
//                }elseif($this->session->userdata('ContactID')){
//                    $SumCond['BeneficiaryID']   =   $this->session->userdata('ContactID');
//                }
//                //echo $this->input->post('BeneficiaryID');
//                echo "<td>"
//                . "".$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('listofservice','ClinicServiceAmountSum',$SumCond).""
//                . "</td>";
//            }

                $parameters = '';
                foreach ($this->input->get() as $keyG => $valueG) {
                    //if($this->input->get('Do'))
                    $parameters .= $keyG . "=" . $valueG . "&";
                }
                //var_dump($this->input->get('InvoiceNumber'));
                if ($DataKey != FALSE) {
                    $ActionTo = 'ProcessControlDatabases/ProConDBinService';
                    $hidden ['Tbl'] = 'claimsdetails';
                    $hidden ['Url'] = uri_string() . '?' . $parameters;
                    $hidden['ServiceDate'] = date('Y-m-d');
                    $hidden['ServiceTime'] = date('H:i:s');
                    $hidden['ClaimServiceID'] = $value['ClaimServiceID'];
//                var_dump($DataKey);
//                var_dump($value['ServicePrice']);
                    $DataKey['type'] = 'number';

                    echo form_open($ActionTo, '', $hidden);
                    echo "<td>"
                    . "" . form_input($DataKey) . ""
                    . "</td>";

                    echo "<td>";
                    $btndata = array(
                        "type" => "submit",
                        "class" => "btn btn-primary"
                    );
                    echo "<div class=\"col-md-4\"   >";
                    echo "<div class='input-group' style=\"margin: 4px;\" >";
                    echo form_button($btndata, "اضافة خدمة");
                    echo "</div></div>";
                    echo form_close();
                }

                echo "</td>";
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";
        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>" . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewDataWithExRowWithMultiCondEnterDataApprovedServiceAmount($Tbl, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE, $DataKey = FALSE, $hidden = FALSE) {
        $Rc = rand(23, 100);
        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "<th>" . $this->LebalName("قيمة معتمدة") . "</th>";
        //echo "<th>".$this->LebalName("قيمة العيادة")."</th>";
        echo "<th>" . $this->LebalName("----") . "</th>";
        echo "</tr>"
        . "</thead>"
        . "<tbody>";

        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);
        //var_dump($AryData)  ;   
        if ($AryData)
            foreach ($AryData as $key => $value) {
                echo "<tr>";
                $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
                foreach ($Creater as $keyCreater) {
                    if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);
                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    } elseif ($Flds == FALSE) {
                        if (isset($RlFlds[$keyCreater->Field])) {

                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);

                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    }
                }

//            if($keyCreater->Field='ServiceID')
//            { 
//                if($this->session->userdata('ClaimID')){
//                    $SumCond['ServiceID']       =   $value[$keyCreater->Field];
//                    $ClimID['ClaimID']          =   $this->session->userdata('ClaimID');
//                    $SumCond['BeneficiaryID']   =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims','BeneficiaryID',$ClimID);
//                }elseif($this->input->post('BeneficiaryID')){
//                    echo $this->input->post('BeneficiaryID');
//                    $SumCond['BeneficiaryID']   =   $this->input->post('BeneficiaryID');
//                }elseif($this->session->userdata('ContactID')){
//                    $SumCond['BeneficiaryID']   =   $this->session->userdata('ContactID');
//                }
//                //echo $this->input->post('BeneficiaryID');
//                echo "<td>"
//                . "".$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('listofservice','ClinicServiceAmountSum',$SumCond).""
//                . "</td>";
//            }

                $parameters = '';
                foreach ($this->input->get() as $keyG => $valueG) {
                    //if($this->input->get('Do'))
                    $parameters .= $keyG . "=" . $valueG . "&";
                }
                //var_dump($this->input->get('InvoiceNumber'));
                if ($DataKey != FALSE) {
                    $ActionTo = 'ProcessControlDatabases/ProConDBinService';
                    $hidden ['Tbl'] = 'claimsdetails';
                    $hidden ['Url'] = uri_string() . '?' . $parameters;
                    $hidden['ServiceDate'] = date('Y-m-d');
                    $hidden['ServiceTime'] = date('H:i:s');
                    $hidden['ClaimServiceID'] = $value['ClaimServiceID'];
//                var_dump($DataKey);
//                var_dump($value['ServicePrice']);
                    $DataKey['type'] = 'number';
                    $DataKey['min'] = 1;
                    @$DataKey['max'] = $value['ServicePrice'];

                    echo form_open($ActionTo, '', $hidden);
                    echo "<td>"
                    . "" . form_input($DataKey) . ""
                    . "</td>";

                    echo "<td>";
                    $btndata = array(
                        "type" => "submit",
                        "class" => "btn btn-primary"
                    );
                    echo "<div class=\"col-md-4\"   >";
                    echo "<div class='input-group' style=\"margin: 4px;\" >";
                    echo form_button($btndata, "اعتماد القيمة");
                    echo "</div></div>";
                    echo form_close();
                }

                echo "</td>";
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";
        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>" . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewDataLineTime($Creater, $Date = FALSE, $Time = FALSE, $SentFrom = FALSE, $SentBy = FALSE, $Status = FALSE, $bady = FALSE) {
        if ($Creater) {
            echo "<div class=\"row\">
                <div class=\"col-md-12\">";
            echo "<ul class=\"timeline\">";
            //var_dump($Creater);

            foreach ($Creater as $key => $value) {

                if ($Time)
                    echo "<li>
                        <i class=\"fa fa-envelope bg-blue\"></i>
                        <div class=\"timeline-item\">
                        <span class=\"time\"><i class=\"fa fa-clock-o\"></i> " . $value[$Time] . " " . $value[$Date] . "</span>  ";

                if ($SentFrom)
                    echo
                    " <h3 class=\"timeline-header\">"
                    . "<a href=\"#\">"
                    . "" . $value[$SentFrom] . ""
                    . "</a> " . $value[$Status] . ""
                    . "</h3>";

                if ($bady)
                    echo
                    "<div class=\"timeline-body\">
                " . $value[$bady] . "
                </div>";

                if ($Status)
                    echo
                    "<div class=\"timeline-footer\">
                <a class=\"btn btn-primary btn-xs\">$value[$Status]</a> 
                </div>
                </li>";
            }
            echo "</ul>";
            echo "</div>
           </div>";
        }
    }

    public function LookUps(&$Ary, $tfld, $vfld, $fld, $tbl, $typ) {
        $Ary[$tfld] = array(
            'Fld' => $fld,
            'TFld' => $tfld,
            'VFld' => $vfld,
            'Tbl' => $tbl,
            'type' => $typ,
        );
    }

    public function LookUpsWithCond(&$Ary, $tfld, $vfld, $fld, $tbl, $cond, $typ = 0) {
        $Ary[$tfld] = array(
            'Fld' => $fld,
            'TFld' => $tfld,
            'VFld' => $vfld,
            'Tbl' => $tbl,
            'cond' => $cond,
            'type' => $typ
        );
    }

    public function LookUpsWithCondFAndV(&$Ary, $tfld, $vfld, $fld, $tbl, $Fcond, $Vcond, $typ = 0) {
        $Ary[$tfld] = array(
            'Fld' => $fld,
            'TFld' => $tfld,
            'VFld' => $vfld,
            'Tbl' => $tbl,
            'Fcond' => $Fcond,
            'Vcond' => $Vcond,
            'type' => $typ
        );
    }

    public function LookUpsWithCond2nd(&$Ary, $tfld, $vfld, $fld, $tbl, $Fcond, $Vcond, $Fcond2nd, $Vcond2nd, $typ = 0) {
        $Ary[$tfld] = array(
            'Fld' => $fld,
            'TFld' => $tfld,
            'VFld' => $vfld,
            'Tbl' => $tbl,
            'Fcond' => $Fcond,
            'Vcond' => $Vcond,
            'Fcond2nd' => $Fcond2nd,
            '$Vcond2nd' => $Vcond2nd,
            'type' => $typ,
        );
    }

    public function LookUps_Form_With_DropDown(&$Ary, $Tbl, $Name, $FldName, $VlName, $LebalName) {

        $Ary[$Name] = array(
            'Tbl' => $Tbl,
            'Name' => $Name,
            'id' => $Name,
            'FldName' => $FldName,
            'VlName' => $VlName,
            'LebalName' => $LebalName
        );
    }

    public function SwitchDataTo(&$Ary, $tfld, $tbl, $fld, $Cfld) {
        $Ary[$tfld] = array(
            'Fld' => $fld,
            'CFld' => $Cfld,
            'Tbl' => $tbl
        );
    }

    public function LookUpsWithCn(&$Ary, $tfld, $vfld, $fld, $tbl, $typ, $Cfld, $CVl) {
        $Ary[$tfld] = array(
            'Fld' => $fld,
            'TFld' => $tfld,
            'VFld' => $vfld,
            'Tbl' => $tbl,
            'type' => $typ,
            'CFld' => $Cfld,
            'CVl' => $CVl,
        );
    }

    public function LookUpsFrmAry(&$Ary, $tfld, $typ, $Arry) {
        $Ary[$tfld] = array(
            'TFld' => $tfld,
            'type' => $typ,
            'Ary' => $Arry
        );
    }

    public function ExCol(&$Ary, $Title, $TBL, $ID, $TID, $Url, $fa, $Color, $ajax = false, $do = false, $load = false) {
        $Ary[] = array(
            'Title' => $Title,
            'ID' => $ID,
            'TID' => $TID,
            'TBL' => $TBL,
            'Url' => $Url,
            'fa' => $fa,
            'ajax' => $ajax,
            'do' => $do,
            'load' => $load,
            'Color' => $Color
        );
    }

    public function ExColWithValue(&$Ary, $TitleBtn, $Title, $TBL, $ID, $TID, $CID, $CVL, $SCID, $SCVL, $Url, $fa, $Color) {

        $Ary[] = array(
            'Title' => $Title,
            'TitleBtn' => $TitleBtn,
            'ID' => $ID,
            'TID' => $TID,
            'CID' => $CID,
            'CVL' => $CVL,
            'SCID' => $SCID,
            'SCVL' => $SCVL,
            'TBL' => $TBL,
            'Url' => $Url,
            'fa' => $fa,
            'Color' => $Color
        );
    }

    public function LebalName($fldnm) {
        $lang = $this->lang->language;
        if (isset($lang[$fldnm]))
            return $lang[$fldnm];
        else
            return $fldnm;
    }

    /*
     * This Function Create dropdown For Any Table 
     * 
     * Start Function :::::
     */

    function Create_checkbox($name, $selected = -1) {

        $options[0] = "لا";
        $options[1] = "نعم";
        echo form_dropdown($name, $options, $selected, 'class="form-control" required="required"');
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    function Create_checkboxMulti($name, $selected = -1) {

        $options[0] = "لا";
        $options[1] = "نعم";
        echo form_dropdown($name, $options, $selected, 'class="form-control" required="required"');
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    function Create_DropdownSex($name, $selected = -1) {

        $options[""] = "";
        $options[1] = "ذكر";
        $options[2] = "أنثى";
        echo form_dropdown($name, $options, $selected, 'class="form-control" required="required"');
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    function Create_DropdownSexMulti($name, $selected = -1) {

        $options[""] = "";
        $options[1] = "ذكر";
        $options[2] = "أنثى";
        echo form_dropdown($name, $options, $selected, 'class="form-control" required="required"');
        // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }

// End Function:::::::::

    public function FunctionList() {
        ;
        $this->load->library('ControllerList');

        $FunctionList = $this->controllerlist->getControllers();
        return $FunctionList;
    }

    public function CreateSelectDropdown($key, $FldFrg, $GetData = '', $AddClassName = 'myselect') {
        $data = $this->GetDataInputField($key);
        $rn = rand(1000, 9999);
        echo "<div class=\"col-md-4\"  >";
        echo "<div class='input-group' style=\"margin: 4px;\">";
        echo form_error($key->Field);
        echo "<span class='input-group-addon'   >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";
        if (isset($FldFrg[$key->Field]['cond'])) {

            echo "" . $this->Create_dropdown_With_Cond($key->Field,
                    $FldFrg[$key->Field]['Tbl'],
                    $FldFrg[$key->Field]['VFld'],
                    $FldFrg[$key->Field]['Fld'],
                    $FldFrg[$key->Field]['cond'], 'class="form-control ' . $AddClassName . $rn . '  " required="required"', $GetData) . "<span class='input-group-addon'></span>";
        } else {

            echo "" . $this->Create_dropdown($key->Field,
                    $FldFrg[$key->Field]['Tbl'],
                    $FldFrg[$key->Field]['VFld'],
                    $FldFrg[$key->Field]['Fld'],
                    'class="form-control ' . $AddClassName . $rn . '  " required="required"', $GetData) . "<span class='input-group-addon'></span>";
        }

        echo " <script type=\"text/javascript\">

      $(\"." . $AddClassName . $rn . "\").select2({
	   placeholder: \"Search And Select \",
       allowClear: true
	});

</script>";
        echo '</div></div>';
    }

    public function CreateSelectDropdownRTS($key, $FldFrg, $GetData = '', $AddClassName = 'searchingBook') {

        //echo $FldFrg[$key->Field]['Tbl'];
        $rn = rand(1000, 9999);
        $AddClassName .= $rn;
        if (!isset($FldFrg[$key->Field]['Fcond'])) {
            $this->JSSearchForSelect($FldFrg[$key->Field]['Tbl'], $FldFrg[$key->Field]['Fld'], $FldFrg[$key->Field]['VFld'], $AddClassName);
        }
        if ((isset($FldFrg[$key->Field]['Fcond'])) && (isset($FldFrg[$key->Field]['Fcond2nd']))) {
            $this->JSSearchForSelectWithCond2nd($FldFrg[$key->Field]['Tbl'], $FldFrg[$key->Field]['Fld'], $FldFrg[$key->Field]['VFld'], $FldFrg[$key->Field]['Fcond'], $FldFrg[$key->Field]['Vcond'], $FldFrg[$key->Field]['Fcond2nd'], $FldFrg[$key->Field]['$Vcond2nd'], $AddClassName);
        }
        if ((isset($FldFrg[$key->Field]['Fcond'])) && (!isset($FldFrg[$key->Field]['Fcond2nd']))) {
            $this->JSSearchForSelectWithCond($FldFrg[$key->Field]['Tbl'], $FldFrg[$key->Field]['Fld'], $FldFrg[$key->Field]['VFld'], $FldFrg[$key->Field]['Fcond'], $FldFrg[$key->Field]['Vcond'], $AddClassName);
        }
        $data = $this->GetDataInputField($key);

        echo "<div class=\"col-md-4\"  >";
        echo "<div class='input-group' style=\"margin: 4px;\">";
        echo form_error($key->Field);
        echo "<span class='input-group-addon'   >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";
        $options[""] = "";

        echo "<select name=\"" . $key->Field . "\" id=\"" . $key->Field . "\" class=\"" . $AddClassName . " select2 \" style=\"width: 100%\" >
                    <option></option>
                </select>";

        echo "<span class='input-group-addon'></span></div></div>";

//        echo " <script type=\"text/javascript\">
//
//      $(\".".$AddClassName."\").select2({
//            placeholder: \"Search And Select \",
//            minimumInputLength: 1,
//            allowClear: true
//	});
//
//</script>";
    }

    Public function JSSearchForSelect($Tbl, $Fld, $VFld, $ClassName) {

        //".$Tbl."/".$Fld."/".$VFld."\"
        echo "<script type=\"text/javascript\">
        $(document).ready(function(){
        
            $('." . $ClassName . "').select2({
                
                placeholder: \"Search And Select \",
                minimumInputLength: 1,
                allowClear: true,
                //alert(\"I am an alert box!\");
                ajax:{
                    url: \"" . base_url() . "AjaxActionCon/SearchSelectDB/" . $Tbl . "/" . $Fld . "/" . $VFld . "\",
                    dataType: \"json\",
                    delay: 250,
                    data: function(params){
                        return{
                            q: params.term
                        };
                    },
                    
                    processResults: function(data){
                        var results = [];
                        $.each(data, function(index, item){
                            results.push({
                                id: item.ID,
                                text: item.text,
                            });
                        });
                        return{
                            results: results
                        };
                    }
                }
            });
        });
    </script>";
    }

    Public function JSSearchForSelectWithCond($Tbl, $Fld, $VFld, $FCond, $VCond, $ClassName) {

        //".$Tbl."/".$Fld."/".$VFld."\"
        echo "<script type=\"text/javascript\">
        $(document).ready(function(){
        
            $('." . $ClassName . "').select2({
                
                placeholder: \"Search And Select \",
                minimumInputLength: 1,
                allowClear: true,
                //alert(\"I am an alert box!\");
                ajax:{
                    url: \"" . base_url() . "AjaxActionCon/SearchSelectDB/" . $Tbl . "/" . $Fld . "/" . $VFld . "/" . $FCond . "/" . $VCond . "\",
                    dataType: \"json\",
                    delay: 250,
                    data: function(params){
                        return{
                            q: params.term
                        };
                    },
                    
                    processResults: function(data){
                        var results = [];
                        $.each(data, function(index, item){
                            results.push({
                                id: item.ID,
                                text: item.text,
                            });
                        });
                        return{
                            results: results
                        };
                    }
                }
            });
        });
    </script>";
    }

    Public function JSSearchForSelectWithCond2nd($Tbl, $Fld, $VFld, $FCond, $VCond, $FCond2nd, $Vcond2nd, $ClassName) {

        //".$Tbl."/".$Fld."/".$VFld."\"
        echo "<script type=\"text/javascript\">
        $(document).ready(function(){
        
            $('." . $ClassName . "').select2({
                
                placeholder: \"Search And Select \",
                minimumInputLength: 1,
                allowClear: true,
                //alert(\"I am an alert box!\");
                ajax:{
                    url: \"" . base_url() . "AjaxActionCon/SearchSelectWhitCon2nd/" . $Tbl . "/" . $Fld . "/" . $VFld . "/" . $FCond . "/" . $VCond . "/" . $FCond2nd . "/" . $Vcond2nd . "\",
                    dataType: \"json\",
                    delay: 250,
                    data: function(params){
                        return{
                            q: params.term
                        };
                    },
                    
                    processResults: function(data){
                        var results = [];
                        $.each(data, function(index, item){
                            results.push({
                                id: item.ID,
                                text: item.text,
                            });
                        });
                        return{
                            results: results
                        };
                    }
                }
            });
        });
    </script>";
    }

    public function CreateSelectDropdownMulti($key, $FldFrg, $GetData = '', $AddClassName = 'myselect') {
        $data = $this->GetDataInputField($key);
        $rn = rand(1000, 9999);
        echo "<div class=\"col-md-4\"  >";
        echo "<div class='input-group' style=\"margin: 4px;\">";
        echo form_error($key->Field);
        echo "<span class='input-group-addon'   >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";
        if (isset($FldFrg[$key->Field]['cond'])) {

            echo "" . $this->Create_dropdown_With_Cond_Multi($key->Field,
                    $FldFrg[$key->Field]['Tbl'],
                    $FldFrg[$key->Field]['VFld'],
                    $FldFrg[$key->Field]['Fld'],
                    $FldFrg[$key->Field]['cond'], 'class="form-control ' . $AddClassName . $rn . '" required="required"', $GetData) . "<span class='input-group-addon'></span>";
        } else {

            echo "" . $this->Create_dropdownMulti($key->Field,
                    $FldFrg[$key->Field]['Tbl'],
                    $FldFrg[$key->Field]['VFld'],
                    $FldFrg[$key->Field]['Fld'],
                    'class="form-control ' . $AddClassName . $rn . '" required="required"', $GetData) . "<span class='input-group-addon'></span>";
        }

        echo " </script><script type=\"text/javascript\">

      $(\"." . $AddClassName . $rn . "\").select2({
	   placeholder: \"Search And Select \",
       allowClear: true
	});

</script>";
        echo '</div></div>';
    }

    public function CreateSelectDropdownZeroOrOneMulti($key, $FldFrg, $GetData = '', $AddClassName = 'myselect') {
        $rn = rand(1000, 9999);
        $data = $this->GetDataInputField($key);
        echo "<div class=\"col-md-4\"  >";
        echo "<div class='input-group' style=\"margin: 4px;\">";
        echo "<span class='input-group-addon'   >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";
        echo "" . $this->Create_dropdown($key->Field,
                $FldFrg[$key->Field]['Tbl'],
                $FldFrg[$key->Field]['VFld'],
                $FldFrg[$key->Field]['Fld'],
                'class="form-control ' . $AddClassName . $rn . '" required="required"') . "<span class='input-group-addon'></span></div></div>";
        echo "<script type=\"text/javascript\">

      $(\"." . $AddClassName . $rn . "\").select2({
	   placeholder: \"Search And Select \",
       allowClear: true
	});

</script>";
    }

    public function getType($Type) {
        if (strstr($Type, 'varchar') != FALSE) {
            $typ = 'text';
        } elseif (strstr($Type, 'tinyint') != FALSE) {
            $typ = 'checkbox';
        } elseif (strstr($Type, 'int') != FALSE) {
            $typ = 'number';
        } elseif (strstr($Type, 'decimal') != FALSE) {
            $typ = 'decimal';
        } elseif (strstr($Type, 'datetime') != FALSE) {
            $typ = 'datetime-local';
        } elseif (strstr($Type, 'time') != FALSE) {
            $typ = 'time';
        } elseif (strstr($Type, 'date') != FALSE) {
            $typ = 'date';
        } elseif (strstr($Type, 'longtext') != FALSE) {
            $typ = 'textarea';
        } else {
            $typ = '';
        }

        return $typ;
    }

    public function GetDataInputFieldMulti($key, $GetData = '') {
        $typ = $this->getType($key->Type);
        if ($GetData != '') {
            if (strtolower($key->Field) == 'password') {
                $data = array(
                    'name' => $key->Field . '[]',
                    'id' => $key->Field,
                    'type' => 'password',
                    'required' => 'required',
                    'class' => 'form-control'
                );
            } else {
                if ($key->Null !== 'NO') {
                    $data = array(
                        'name' => $key->Field . '[]',
                        'id' => $key->Field,
                        'type' => $typ,
                        'value' => $GetData,
                        'class' => 'form-control'
                    );
                } else {
                    $data = array(
                        'name' => $key->Field . '[]',
                        'id' => $key->Field,
                        'type' => $typ,
                        'value' => $GetData,
                        'required' => 'required',
                        'class' => 'form-control'
                    );
                }
            }
        } else {
            if (strtolower($key->Field) == 'password') {
                $data = array(
                    'name' => $key->Field . '[]',
                    'id' => $key->Field,
                    'type' => 'password',
                    'required' => 'required',
                    'value' => set_value($key->Field),
                    'class' => 'form-control'
                );
            } else {
                if ($key->Null !== 'NO') {
                    $data = array(
                        'name' => $key->Field . '[]',
                        'id' => $key->Field,
                        'type' => $typ,
                        'value' => set_value($key->Field),
                        'class' => 'form-control'
                    );
                } else {
                    $data = array(
                        'name' => $key->Field . '[]',
                        'id' => $key->Field,
                        'type' => $typ,
                        'value' => set_value($key->Field),
                        'required' => 'required',
                        'class' => 'form-control'
                    );
                }
            }
        }

        if (strtolower($key->Field) == 'email') {
            $data = array(
                'name' => $key->Field . '[]',
                'id' => $key->Field,
                'type' => 'email',
                'required' => 'required',
                'value' => $GetData,
                'class' => 'form-control'
            );
        }
        return $data;
    }

    public function GetDataInputField($key, $GetData = '') {
        $typ = $this->getType($key->Type);
        if ($GetData != '') {
            if (strtolower($key->Field) == 'password') {
                $data = array(
                    'name' => $key->Field,
                    'id' => $key->Field,
                    'type' => 'password',
                    'required' => 'required',
                    'class' => 'form-control'
                );
            } else {
                if ($key->Null !== 'NO') {
                    if ($typ != 'decimal') {
                        $data = array(
                            'name' => $key->Field,
                            'id' => $key->Field,
                            'type' => $typ,
                            'value' => $GetData,
                            'dir' => "ltr",
                            'class' => 'form-control'
                        );
                    } else {
                        $data = array(
                            'name' => $key->Field,
                            'id' => $key->Field,
                            'type' => 'number',
                            'step' => 'any',
                            'dir' => "ltr",
                            'value' => $GetData,
                            'class' => 'form-control'
                        );
                    }
                } else {
                    if ($typ != 'decimal') {
                        $data = array(
                            'name' => $key->Field,
                            'id' => $key->Field,
                            'type' => $typ,
                            'value' => $GetData,
                            'dir' => "ltr",
                            'required' => 'required',
                            'class' => 'form-control'
                        );
                    } else {
                        $data = array(
                            'name' => $key->Field,
                            'id' => $key->Field,
                            'type' => 'number',
                            'step' => 'any',
                            'dir' => "ltr",
                            'value' => $GetData,
                            'required' => 'required',
                            'class' => 'form-control'
                        );
                    }
                }
            }
        } else {
            if (strtolower($key->Field) == 'password') {
                $data = array(
                    'name' => $key->Field,
                    'id' => $key->Field,
                    'type' => 'password',
                    'required' => 'required',
                    'class' => 'form-control'
                );
            } else {
                if ($key->Null !== 'NO') {
                    if ($typ != 'decimal') {
                        $data = array(
                            'name' => $key->Field,
                            'id' => $key->Field,
                            'type' => $typ,
                            //'value'         => $GetData,
                            'dir' => "ltr",
                            'class' => 'form-control'
                        );
                    } else {
                        $data = array(
                            'name' => $key->Field,
                            'id' => $key->Field,
                            'type' => 'number',
                            'step' => 'any',
                            'dir' => "ltr",
                            //'value'         =>  $GetData,
                            'class' => 'form-control'
                        );
                    }
                } else {
                    if ($typ != 'decimal') {
                        $data = array(
                            'name' => $key->Field,
                            'id' => $key->Field,
                            'type' => $typ,
                            //'value'         => $GetData,
                            'dir' => "ltr",
                            //'pattern'=>"[0-9]{3}-[0-9]{3}-[0-9]{4}",
                            'required' => 'required',
                            'class' => 'form-control'
                        );
                    } else {
                        $data = array(
                            'name' => $key->Field,
                            'id' => $key->Field,
                            'type' => 'number',
                            'step' => 'any',
                            'dir' => "ltr",
                            //'value'         =>  $GetData,
                            'required' => 'required',
                            'class' => 'form-control'
                        );
                    }
                }
            }
        }
        return $data;
    }

    public function CreateDropdownFrmAry($key, $FldFrg, $GetData = '', $myselect = 'myselect') {
        $rn = rand(1000, 9999);
        echo "<div class=\"col-md-4\"  >";
        echo "<div class='input-group' style=\"margin: 4px;\">";
        echo form_error($key->Field);
        echo "<span class='input-group-addon'   >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";
        echo "" . $this->Create_dropdown_FrmAry($key->Field, $GetData,
                $FldFrg[$key->Field]['Ary'],
                'class="form-control ' . $myselect . $rn . '" required="required"') . ""
        . "<span class='input-group-addon'></span></div></div>";
        echo "<script type=\"text/javascript\">

      $(\"." . $myselect . $rn . "\").select2({
	   placeholder: \"Search And Select \",
       allowClear: true
	});

</script>";
    }

    public function CreateDropdownFrmAryWithOutDB($key, $FldFrg, $GetData = '', $myselect = 'myselect') {
        $rn = rand(1000, 9999);
        echo "<div class=\"col-md-4\"  >";
        echo "<div class='input-group' style=\"margin: 4px;\">";
        echo form_error($key);
        echo "<span class='input-group-addon'   >" . form_label($this->LebalName($key), $key) . "</span>";
        ///var_dump($FldFrg[$key]['Ary']);
        echo "" . $this->Create_dropdown_FrmAry($key, $GetData,
                $FldFrg[$key]['Ary'],
                'class="form-control ' . $myselect . $rn . '" required="required"') . ""
        . "<span class='input-group-addon'></span></div></div>";
        echo "<script type=\"text/javascript\">

      $(\"." . $myselect . $rn . "\").select2({
	   placeholder: \"Search And Select \",
       allowClear: true
	});

</script>";
    }

    public function CreateDropdownFrmAryMulti($key, $FldFrg, $GetData = '', $myselect = 'myselect') {
        $rn = rand(1000, 9999);
        echo "<div class=\"col-md-4\"  >";
        echo "<div class='input-group' style=\"margin: 4px;\">";
        echo form_error($key->Field);
        echo "<span class='input-group-addon'   >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";
        echo "" . $this->Create_dropdown_FrmAry_Multi($key->Field, $GetData,
                $FldFrg[$key->Field]['Ary'],
                'class="form-control ' . $myselect . $rn . ' " required="required"') . ""
        . "<span class='input-group-addon'></span></div></div>";
    }

    public function CreateInputField($key, $GetData = '') {

        if ($key->Extra == 'auto_increment') {
            return '';
        }
        $typ = $this->getType($key->Type);
        $data = $this->GetDataInputField($key, $GetData);
        if ($typ == 'textarea') {

            echo "<div class=\"col-md-12\"    >";
            echo "<div class=\"box box-primary collapsed-box\">
                    <div class=\"box-header with-border\">
                            <h3 class=\"box-title\"> " . form_label($this->LebalName($key->Field), $key->Field) . "</h3>
                            <div class=\"box-tools pull-right\">
                                    <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-plus\"></i></button>
                                    <!--<button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>-->
                            </div>
                    </div><!-- /.box-header -->
                    <div class=\"box-body no-padding\">";
        } else
            echo "<div class=\"col-md-4\"    >";

        echo "<div class='input-group' style=\"margin: 4px;\" >";

        echo "<span class='input-group-addon'  >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";

        if ($typ == 'checkbox') {
            if ($key->Field == 'sex')
                echo "" . $this->Create_DropdownSex($data, $GetData) . "<span class='input-group-addon'>";
            else
                echo "" . $this->Create_checkbox($data, $GetData) . "<span class='input-group-addon'>";
        } elseif ($typ == 'textarea') {
            $data['id'] = 'EDTPA';
            echo "" . form_textarea($data) . "<span class='input-group-addon'>";
            echo "<!-- /.row -->
                            </div><!-- /.box-body -->
                    </div><!-- /.box -->";
        } elseif ($typ == 'date')
            echo "" . form_input($data, date('Y-m-d')) . "<span class='input-group-addon'>";
        elseif ($typ == 'time')
            echo "" . form_input($data, date('H:i:s')) . "<span class='input-group-addon'>";
        else
            echo "" . form_input($data) . "<span class='input-group-addon'>";
        echo "</span></div></div>";
    }

    public function CreateInputFieldMulti($key, $GetData = '') {

        if ($key->Extra == 'auto_increment') {
            return '';
        }
        $typ = $this->getType($key->Type);
        $data = $this->GetDataInputFieldMulti($key, $GetData);
        if ($typ == 'textarea') {

            echo "<div class=\"col-md-12\"    >";
            echo "<div class=\"box box-primary collapsed-box\">
                    <div class=\"box-header with-border\">
                            <h3 class=\"box-title\"> " . form_label($this->LebalName($key->Field), $key->Field) . "</h3>
                            <div class=\"box-tools pull-right\">
                                    <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-plus\"></i></button>
                                    <!--<button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>-->
                            </div>
                    </div><!-- /.box-header -->
                    <div class=\"box-body no-padding\">";
        } else
            echo "<div class=\"col-md-4\"    >";

        echo "<div class='input-group' style=\"margin: 4px;\" >";

        echo "<span class='input-group-addon'  >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";

        if ($typ == 'checkbox') {
            if ($key->Field == 'sex')
                echo "" . $this->Create_DropdownSex($data, $GetData) . "<span class='input-group-addon'>";
            else
                echo "" . $this->Create_checkbox($data, $GetData) . "<span class='input-group-addon'>";
        } elseif ($typ == 'textarea') {
            $data['id'] = 'EDTPA';
            echo "" . form_textarea($data) . "<span class='input-group-addon'>";
            echo "<!-- /.row -->
                            </div><!-- /.box-body -->
                    </div><!-- /.box -->";
        } elseif ($typ == 'date')
            echo "" . form_input($data, date('Y-m-d')) . "<span class='input-group-addon'>";
        elseif ($typ == 'time')
            echo "" . form_input($data, date('H:i:s')) . "<span class='input-group-addon'>";
        else
            echo "" . form_input($data) . "<span class='input-group-addon'>";
        echo "</span></div></div>";
    }

    public function CreateInputFieldUseingArray($key, $GetData = '') {

        if ($key->Extra == 'auto_increment') {
            return '';
        }
        $typ = $this->getType($key['Type']);
        $data = $this->GetDataInputField($key, $GetData);
        if ($typ == 'textarea') {

            echo "<div class=\"col-md-12\"    >";
            echo "<div class=\"box box-primary collapsed-box\">
                    <div class=\"box-header with-border\">
                            <h3 class=\"box-title\"> " . form_label($this->LebalName($key->Field), $key->Field) . "</h3>
                            <div class=\"box-tools pull-right\">
                                    <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-plus\"></i></button>
                                    <!--<button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>-->
                            </div>
                    </div><!-- /.box-header -->
                    <div class=\"box-body no-padding\">";
        } else
            echo "<div class=\"col-md-4\"    >";

        echo "<div class='input-group' style=\"margin: 4px;\" >";

        echo "<span class='input-group-addon'  >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";

        if ($typ == 'checkbox') {
            if ($key->Field == 'sex')
                echo "" . $this->Create_DropdownSex($data, $GetData) . "<span class='input-group-addon'>";
            else
                echo "" . $this->Create_checkbox($data, $GetData) . "<span class='input-group-addon'>";
        } elseif ($typ == 'textarea') {
            $data['id'] = 'EDTPA';
            echo "" . form_textarea($data) . "<span class='input-group-addon'>";
            echo "<!-- /.row -->
                            </div><!-- /.box-body -->
                    </div><!-- /.box -->";
        } elseif ($typ == 'date')
            echo "" . form_input($data, date('Y-m-d')) . "<span class='input-group-addon'>";
        elseif ($typ == 'time')
            echo "" . form_input($data, date('H:i:s')) . "<span class='input-group-addon'>";
        else
            echo "" . form_input($data) . "<span class='input-group-addon'>";
        echo "</span></div></div>";
    }

    public function CreateInputFieldUseingArrayMulti($key, $GetData = '') {

        if ($key->Extra == 'auto_increment') {
            return '';
        }
        $typ = $this->getType($key['Type']);
        $data = $this->GetDataInputField($key, $GetData);
        if ($typ == 'textarea') {

            echo "<div class=\"col-md-12\"    >";
            echo "<div class=\"box box-primary collapsed-box\">
                    <div class=\"box-header with-border\">
                            <h3 class=\"box-title\"> " . form_label($this->LebalName($key->Field), $key->Field) . "</h3>
                            <div class=\"box-tools pull-right\">
                                    <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-plus\"></i></button>
                                    <!--<button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>-->
                            </div>
                    </div><!-- /.box-header -->
                    <div class=\"box-body no-padding\">";
        } else
            echo "<div class=\"col-md-4\"    >";

        echo "<div class='input-group' style=\"margin: 4px;\" >";

        echo "<span class='input-group-addon'  >" . form_label($this->LebalName($key->Field), $key->Field) . "</span>";

        if ($typ == 'checkbox') {
            if ($key->Field == 'sex')
                echo "" . $this->Create_DropdownSex($data, $GetData) . "<span class='input-group-addon'>";
            else
                echo "" . $this->Create_checkbox($data, $GetData) . "<span class='input-group-addon'>";
        } elseif ($typ == 'textarea') {
            $data['id'] = 'EDTPA';
            echo "" . form_textarea($data) . "<span class='input-group-addon'>";
            echo "<!-- /.row -->
                            </div><!-- /.box-body -->
                    </div><!-- /.box -->";
        } elseif ($typ == 'date')
            echo "" . form_input($data, date('Y-m-d')) . "<span class='input-group-addon'>";
        elseif ($typ == 'time')
            echo "" . form_input($data, date('H:i:s')) . "<span class='input-group-addon'>";
        else
            echo "" . form_input($data) . "<span class='input-group-addon'>";
        echo "</span></div></div>";
    }

    public function Chartjs($Arycharts = False, $Rc = FALSE, $AryDataView = FALSE) {
        //echo 'rrrrrrrrrrrrrrr';
        $AryDataTable = "";
        if ($Arycharts == FALSE)
            return "";
        $c = 0;
        foreach ($Arycharts as $keycharts => $valuecharts) {
            if ($AryDataView['Switch']['SwitchToTable'] == FALSE) {

                if ($AryDataView['ItemType'])
                    $AryDataTable .= "['" . $this->isnull($valuecharts[$AryDataView['ItemName']]) . "-" . $this->isnull($valuecharts[$AryDataView['ItemType']]) . "', 0" . $this->isnull($valuecharts[$AryDataView['ItemValue']]) . "],";
                else
                    $AryDataTable .= "['" . $this->isnull($valuecharts[$AryDataView['ItemName']]) . "',0" . $this->isnull($valuecharts[$AryDataView['ItemValue']]) . "],";
            } else {

                if ($this->Pros->Get_JustValue_Filed_AQ(
                                $AryDataView['Switch']['SwitchToTable'],
                                $AryDataView['Switch']['SwitchToName'],
                                $AryDataView['Switch']['SwitchToID'],
                                $valuecharts[$AryDataView['ItemName']])) {

                    $AryDataTable .= "['" . $this->isnull($this->Pros->Get_JustValue_Filed_AQ(
                                            $AryDataView['Switch']['SwitchToTable'],
                                            $AryDataView['Switch']['SwitchToName'],
                                            $AryDataView['Switch']['SwitchToID'],
                                            $valuecharts[$AryDataView['ItemName']])) . "" . $this->isnull($valuecharts[$AryDataView['ItemType']]) . "', 0" . $this->isnull($valuecharts[$AryDataView['ItemValue']]) . "],";
                }
            }
        }


        //var_dump($AryDataTable); 
        if ($AryDataTable == NULL || $AryDataTable == FALSE) {
            $AryDataTable = "";
        }
        $AryDataTable = substr_replace($AryDataTable, '', strlen($AryDataTable) - 1, 5);
        //echo $AryDataTable1;
        echo "  <script type=\"text/javascript\" src=\"http://www.gstatic.com/charts/loader.js\"></script>
                <script type=\"text/javascript\">
                    google.charts.load(\"current\", {packages:[\"corechart\"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([

                            ['Task', ' ']," . $AryDataTable . "
                        ]);

                        var options = {
                            title: ' ',
                            pieHole: 0.5,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart" . $Rc . "'));
                        chart.draw(data, options);
                    }
                </script>
                <div id=\"piechart" . $Rc . "\" style=\"width: 900px; height: 500px;\" >
                </div>";
    }

    public function ChartjsByColumn($Arycharts = False, $Rc = FALSE, $AryDataView = FALSE) {

        $AryDataTable = "";
        if ($Arycharts == FALSE)
            return "";
        $c = 0;
        //var_dump($AryDataView);
        foreach ($Arycharts[0] as $keycharts => $valuecharts) {
            if (isset($AryDataView[$keycharts]))
                $AryDataTable .= "['" . $this->isnull($keycharts) . "', 0" . $this->isnull($valuecharts) . "],";
        }

        if ($AryDataTable == NULL || $AryDataTable == FALSE) {
            $AryDataTable = "";
        }

        $AryDataTable = substr_replace($AryDataTable, '', strlen($AryDataTable) - 1, 5);

        echo "  <script type=\"text/javascript\" src=\"http://www.gstatic.com/charts/loader.js\"></script>
                <script type=\"text/javascript\">
                    google.charts.load(\"current\", {packages:[\"corechart\"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([

                            ['Task', ' ']," . $AryDataTable . "
                        ]);

                        var options = {
                            title: ' ',
                            pieHole: 0.5,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart" . $Rc . "'));
                        chart.draw(data, options);
                    }
                </script>
                <div id=\"piechart" . $Rc . "\" style=\"width: 900px; height: 500px;\" ></div>";
    }

    function PassToChartjs(&$Chartjs, $ItemName, $ItemType = false, $ItemValue, $SwitchToTable = false, $SwitchToName = false, $SwitchToID = false) {

        $Chartjs['ItemName'] = $ItemName;
        $Chartjs['ItemType'] = $ItemType;
        $Chartjs['ItemValue'] = $ItemValue;
        $Chartjs['Switch']['SwitchToName'] = $SwitchToName;
        $Chartjs['Switch']['SwitchToID'] = $SwitchToID;
        $Chartjs['Switch']['SwitchToTable'] = $SwitchToTable;
    }

    function PassToChartjsByColmun(&$Chartjs, $ItemName) {

        $Chartjs[$ItemName] = $ItemName;
    }

    function isnull($var) {
        if ($var == NULL || !isset($var))
            return "";
        else
            return $var;
    }

    function CallFileInDiv($TagStartAction, $TagPageTarget, $varJS = FALSE, $URL = FALSE) {
        $VarStr = "";
        $VarStrUrl = "";

        foreach ($varJS as $key => $valuevarJS) {
            //var_dump($key);
            $VarStr .= " var " . $key . " = $('" . $valuevarJS . "').val();\n";
            $VarStrUrl .= "" . $key . "='+" . $key . "+'&";
        }



        echo"<script type=\"text/javascript\">
                
                    $(document).ready(function(){
					
                       $(\"" . $TagStartAction . "\").click(function(){
                           
                            " . $VarStr . " 
                               // alert($(\"" . $TagPageTarget . "\").length);
                                if($(\"" . $TagPageTarget . "\").length>1){
                                    $(\"" . $TagPageTarget . "\" ).remove()
                                 }
                               $(\"" . $TagPageTarget . "\").load('" . base_url() . $URL . "?" . substr($VarStrUrl, 0, -1) . "') ; 

                        });
                         
                    });
                    
                </script>";
    }

    function ReloadDiv($TagStartAction, $Scnd, $varJS = FALSE, $URL = FALSE) {

        $VarStr = "";

        $VarStrUrl = "";

        foreach ($varJS as $key => $valuevarJS) {

            $VarStr .= " var " . $key . " = $('" . $valuevarJS . "').val();\n";

            $VarStrUrl .= "" . $key . "='+" . $key . "+'&";
        }

        echo "<script type=\"text/javascript\">
                
                    $(document).ready(function(){
                    
" . $VarStr . "
                        setInterval(function() {
                        
                            $(\"" . $TagStartAction . "\").load('" . base_url() . $URL . "?" . substr($VarStrUrl, 0, -1) . "');
                                
                        }," . $Scnd . "000);
                            
                    });
    
            </script>";
    }

    function PostByAjax($TagPageTarget, $DivAction, $Event, $method, $URL, $FormID, $varJS, $DivReload = FALSE) {

        $VarStr = "";
        $VarStrUrl = "";

        if (strtolower($method) == 'get')
            foreach ($varJS as $key => $valuevarJS) {

                $VarStr .= " var " . $key . " = $('" . $valuevarJS . "').val();\n";

                $VarStrUrl .= "" . $key . "='+" . $key . "+'&";
            }

        echo "<script type=\"text/javascript\">       
 
    function PostDataToURL(event){
        $(\"#alertValidation\").hide();
        " . $VarStr . "
    
        $.ajax({ 
            dataType: 'json',
            type: '" . $method . "',
            url: '" . base_url() . "" . $URL . "?" . substr($VarStrUrl, 0, -1) . "', 
            data: $(\"" . $FormID . "\").serialize(),
            cache:false, 
           
            success: 
            
                function(data){
                data.msg;

                   //$('input[name=\"MC_token\"]').remove(); 
                   /*$('#form' ).append( \"" . form_open() . "\" );*/
                    if(data.msg === 1){
                   
                        $(\"" . $FormID . "\")[0].reset();
                        $(\"#alertDialogscs\").show();
                        $(\"#alert\").show();
                        $(\"#alertDialogscs\").hide();

                        $(\"#alertDialogscs\").fadeTo(1000, 500).slideUp(500, function(){
                        $(\"#alertDialogscs\").slideUp(500);
                        });
                        //$( \"#FormService\" ).append( \"<div class=\\\"alert alert-success alert-dismissable\\\" id=\\\"alert\\\"><button type=\\\"button\\\" class=\\\"close\\\" data-dismiss=\\\"alert\\\" aria-hidden=\\\"true\\\">×</button><h4>	<i class=\\\"icon fa fa-check\\\"></i> رسالة النظام!</h4>      تمت العملية بنجاح... <br></div>\");
                        ";
        if ($DivReload)
            echo "$(\"" . $DivReload['id'] . "\").load('" . base_url() . $DivReload['url'] . "?" . substr($VarStrUrl, 0, -1) . "')";

        echo "
                    }
                   
                    if(data.msg === 0){
                    $('[name=\"MC_token\"]').remove('" . $FormID . "');
                        $(\"#alertDialogree\").show();
                        $(\"#alertDialogree\").hide();

                        $(\"#alertDialogree\").fadeTo(1000, 500).slideUp(500, function(){
                        $(\"#alertDialogree\").slideUp(500);
                        });
                        //$( \"#FormService\" ).append( \"<div class=\\\"alert alert-error alert-dismissable\\\"  id=\\\"alert\\\">\<button type=\\\"button\\\" class=\\\"close\\\" data-dismiss=\\\"alert\\\" aria-hidden=\\\"true\\\">×</button><h4>	<i class=\\\"icon fa fa-info-circle\\\"></i> رسالة النظام!</h4>         العملية غير مكتملة الرجاء التاكد ... <br> </div>\" );
                        
                    }
                    
                    if(data.msg!= 0 && data.msg!= 1){
                    //$('[name=\"MC_token\"]').remove('" . $FormID . "');
                        $(\"#alertValidation\").show();
                        	
                        $( \"#alertValidationErr\").empty();
                        $( \"#alertValidationErr\" ).append(data.msg)
                        //alert(data.msg);
                    
                    }
                    
                    
                }
            });// you have missed this bracket
            
            return false;
        
    };
    //alert(1);
      //$(\"" . $DivAction . "\").on('click',\"" . $TagPageTarget . "\" ,PostDataToURL );
    </script>";
    }

    public function CallPostDataToURL($TagPageTarget, $DivAction) {
        echo "<script type=\"text/javascript\"> 
                    $(\"" . $DivAction . "\").on('click',\"" . $TagPageTarget . "\" ,PostDataToURL );
                </script>";
    }

    public function Graphs($Tbl, $Cond = FALSE, $Chartjs = FALSE, $ChartjsByCol = FALSE) {

        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);

        $Rc = rand(23, 100);

        if ($Chartjs != FALSE)
            $this->Chartjs($AryData, $Rc, $Chartjs);

        if ($ChartjsByCol != FALSE)
            $this->ChartjsByColumn($AryData, $Rc, $ChartjsByCol);
    }

    function CheckNoContract() {
        //var_dump(22);
        $Cond['EmployeeID'] = $this->session->userdata('ContactID');

        $CondAry = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesemployees', 'CompanyID', $Cond);

        //  var_dump($CondAry);

        $CondVl = $this->Pros->Make_Value_in_SQL_IN($CondAry, 'CompanyID');

        //var_dump($CondVl);

        $AryCond4contracts = "BeneficiaryCompanyID " . $CondVl . " ";

        $CondAry = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts', '*', $AryCond4contracts);

        return $CondAry;
    }

    //this function to show total Row Have to be edited to become dynamic
    public function ViewDataWithTotalFooter($Tbl, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE, $column1, $column2) {

        $Rc = rand(23, 100);
        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }

        echo "</tr>"
        . "</thead>"
        . "<tbody>";

        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);
        //var_dump($AryData);
        if ($AryData)
            foreach ($AryData as $key => $value) {
                echo "<tr>";
                $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
                foreach ($Creater as $keyCreater) {
                    if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            echo "<td>" . $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]) . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    } elseif ($Flds == FALSE) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            echo "<td>" . $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]) . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    }
                }
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th></th>";
            elseif ($Flds == FALSE)
                echo "<th></th>";
        }

        echo "</tr>"
        . "</tfoot>"
        . "</table>" . "<script type=\"text/javascript\">
      $(function () {
      
        $(\"#example$Rc\").DataTable({
            
        \"footerCallback\": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column($column1)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
              total1 = api
                .column($column2)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );   
 
            // Total over this page
            pageTotal = api
                .column($column1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                

             // Total over this page
            pageTotal1 = api
                .column($column2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            // Update footer
            $( api.column($column1).footer() ).html(
            'المجموع للصفحة :'+pageTotal  + ' ( الإجمالي:'+ total +' ) ' 
            );
//           $(\"#sum\").html(
//            'المجموع للصفحة :'+pageTotal  + ' ( الإجمالي:'+ total +' ) ' 
//            );
            
$( api.column($column2).footer() ).html(
            'المجموع للصفحة :'+pageTotal1  + ' ( الإجمالي:'+ total1 +' ) ' 
            );
//           $(\"#sum\").html(
//            'المجموع للصفحة :'+pageTotal  + ' ( الإجمالي:'+ total +' ) ' 
//            );
        }
        
    } );
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    function CheckParty2CompanyIDinContract() {
        //var_dump(22);
        $Cond['EmployeeID'] = $this->session->userdata('ContactID');

        $CondAry = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesemployees', 'CompanyID', $Cond);

        // var_dump($CondAry);

        $CondVl = $this->Pros->Make_Value_in_SQL_IN($CondAry, 'CompanyID');

        //var_dump($CondVl);

        $AryCond4contracts = "Party2CompanyID " . $CondVl . " ";

        $CondAry = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts', '*', $AryCond4contracts);

        return $CondAry;
    }

    //swich data and column name
    public function SwitchDataAndNameTo(&$Ary, $tfld, $tbl, $fld, $Cfld, $Name) {
        $Ary[$tfld] = array(
            'Fld' => $fld,
            'CFld' => $Cfld,
            'Tbl' => $tbl,
            'Name' => $Name
        );
    }

    //to add hove text
    public function ExColHover(&$Ary, $Title, $TBL, $ID, $TID, $Url, $fa, $Color, $Hover = "") {
        $Ary[] = array(
            'Title' => $Title,
            'ID' => $ID,
            'TID' => $TID,
            'TBL' => $TBL,
            'Url' => $Url,
            'fa' => $fa,
            'Color' => $Color,
            'HoverText' => $Hover,
        );
    }

    //added Hove Text
    public function ExColWithValueHover(&$Ary, $TitleBtn, $Title, $TBL, $ID, $TID, $CID, $CVL, $SCID, $SCVL, $Url, $fa, $Color, $Hover = "") {

        $Ary[] = array(
            'Title' => $Title,
            'TitleBtn' => $TitleBtn,
            'ID' => $ID,
            'TID' => $TID,
            'CID' => $CID,
            'CVL' => $CVL,
            'SCID' => $SCID,
            'SCVL' => $SCVL,
            'TBL' => $TBL,
            'Url' => $Url,
            'fa' => $fa,
            'Color' => $Color,
            'HoverText' => $Hover
        );
    }

    //added the condition if column header name needed to be swiched and Hover over column button

    public function ViewDataWithExRowWithMultiCondEdited1($Tbl, $Col = FALSE, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE, $ButtonAction = FALSE, $Checkbox = FALSE, $CallModal = false, $Chartjs = FALSE, $ColHover = FALSE, $ButtonActionHover = False) {

        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);

        //var_dump($AryData);

        $Rc = rand(23, 100);

        if ($Chartjs)
            $this->Chartjs($AryData, $Rc, $Chartjs);

        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field)) {
                if (isset($RlFlds[$key->Field])) {
                    if (isset($RlFlds[$key->Field]['Name'])) {
                        echo "<th>" . $this->LebalName($RlFlds[$key->Field]['Name']) . "</th>";
                    } else
                        echo "<th>" . $this->LebalName($key->Field) . "</th>";
                } else
                    echo "<th>" . $this->LebalName($key->Field) . "</th>";
            } elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }

        if ($Col != FALSE)
            foreach ($Col as $Colvalue) {
                echo "<th>" . $this->LebalName($Colvalue['Title']) . "</th>";
            }

        if ($ColHover != FALSE)
            foreach ($ColHover as $Colvalue) {
                echo "<th>" . $this->LebalName($Colvalue['Title']) . "</th>";
            }

        if ($ButtonAction != FALSE)
        // echo $ButtonAction;
            foreach ($ButtonAction as $BAvalue) {
                echo "<th>" . $this->LebalName($BAvalue['Title']) . "</th>";
            }

        if ($ButtonActionHover != FALSE)
            foreach ($ButtonActionHover as $BAvalue1) {
                echo "<th>" . $this->LebalName($BAvalue1['Title']) . "</th>";
            }
        if ($Checkbox != FALSE)
            foreach ($Checkbox as $Checkboxvalue) {
                echo "<th>" . $this->LebalName($Checkboxvalue['Title']) . "</th>";
            }

        if ($CallModal != FALSE)
            foreach ($CallModal as $CallModalvalue) {
                echo "<th>" . $this->LebalName($CallModalvalue['Title']) . "</th>";
            }

        echo "</tr>"
        . "</thead>"
        . "<tbody>";

        //var_dump($AryData)  ;   
        if ($AryData)
            foreach ($AryData as $key => $value) {
                echo "<tr>";
                $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
                foreach ($Creater as $keyCreater) {
                    if ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);
                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    } elseif ($Flds == FALSE) {
                        if (isset($RlFlds[$keyCreater->Field])) {

                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);

                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    }
                }

                if ($Col != FALSE)
                    foreach ($Col as $Colvalue) {
                        $hidden = array(
                            $Colvalue['TID'] => $value[$Colvalue['ID']],
                            'TBL' => $Colvalue['TBL'],
                            'Url' => uri_string());
                        echo "<td>";
                        echo form_open($Colvalue['Url'] . "?" . $Colvalue['TID'] . "=" . $value[$Colvalue['ID']] . "", '', $hidden);
                        echo "<div class=\"input-group\">";

                        echo "<button type=\"submit\" class=\"btn btn-primary fa " . $Colvalue['fa'] . " \" style=\"color:  " . $Colvalue['Color'] . "; \"></button>";
                        echo "</div>";

                        //echo    "<a data-toggle=\"modal\" href=\"http://localhost/TPA/Claims/ReasonsForRejection.aspx?ClaimServiceID=".$value[$Colvalue['ID']]."\" data-target=\"#myModal\">Click me !</a>";
                        echo form_close();
                        echo "</td>";
                    }

                if ($ColHover != FALSE)
                    foreach ($ColHover as $Colvalue) {
                        $hidden = array(
                            $Colvalue['TID'] => $value[$Colvalue['ID']],
                            'TBL' => $Colvalue['TBL'],
                            'Url' => uri_string());
                        echo "<td>";
                        echo form_open($Colvalue['Url'] . "?" . $Colvalue['TID'] . "=" . $value[$Colvalue['ID']] . "", '', $hidden);
                        echo "<div class=\"input-group\">";
                        if (isset($Colvalue['HoverText']))
                            echo "<button type=\"submit\" class=\"btn btn-primary fa  " . $Colvalue['fa'] . " id=\"myTooltip" . $Rc . "\"\" style=\"color:  " . $Colvalue['Color'] . "; data-toggle=\"tooltip\" title='" . $Colvalue["HoverText"] . "' \"></button>";
                        else
                            echo "<button type=\"submit\" class=\"btn btn-primary fa " . $Colvalue['fa'] . " \" style=\"color:  " . $Colvalue['Color'] . "; \"></button>";
                        echo "</div>";

                        //echo    "<a data-toggle=\"modal\" href=\"http://localhost/TPA/Claims/ReasonsForRejection.aspx?ClaimServiceID=".$value[$Colvalue['ID']]."\" data-target=\"#myModal\">Click me !</a>";
                        echo form_close();
                        echo "</td>";
                    }

                if ($CallModal != FALSE)
                    foreach ($CallModal as $CallModalvalue) {
                        $hidden = array(
                            $CallModalvalue['TID'] => $value[$CallModalvalue['ID']],
                            'TBL' => $CallModalvalue['TBL'],
                            'Url' => uri_string());
                        echo "<td>";
                        echo "<div class=\"input-group\">";
                        echo "<button href=\"" . base_url() . $CallModalvalue['Url'] . "?" . $CallModalvalue['TID'] . "=" . $value[$Colvalue['ID']] . "\" data-target=\"#myModalMsg\" type=\"button\" class=\"btn btn-primary fa " . $CallModalvalue['fa'] . " \"  data-toggle=\"modal\" style=\"color:  " . $CallModalvalue['Color'] . "; \"></button>";
                        echo "</div>";

                        echo "</td>";
                    }
                if ($ButtonAction != FALSE)
                //foreach ($ButtonAction as $Indx){
                    foreach ($ButtonAction as $BAvalue) {
                        // echo var_dump($BAvalue); 
                        $i = 0;
                        $hidden = array(
                            $BAvalue['TID'] => $value[$BAvalue['ID']],
                            'TBL' => $BAvalue['TBL'],
                            'Url' => uri_string());
                        echo "<th>";
                        $Cnd[$BAvalue['TID']] = $value[$BAvalue['ID']];

                        if (isset($BAvalue['CID']) && $BAvalue['CID'] != FALSE)
                            $Cnd[$BAvalue['CID']] = $BAvalue['CVL'];
                        if (isset($BAvalue['SCID']) && $BAvalue['SCID'] != FALSE)
                            $Cnd[$BAvalue['SCID']] = $BAvalue['SCVL'];

                        if ($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond($BAvalue['TBL'], $BAvalue['TID'], $Cnd) != FALSE) {
                            if ($BAvalue['Url'] != FALSE)
                                echo form_open($BAvalue['Url'], '', $hidden);
                            echo "<div class=\"input-group\">";

                            echo "<button type=\"submit\" class=\"btn btn-primary fa " . $BAvalue['fa'] . " \" style=\"color:  " . $BAvalue['Color'] . "; \">" . $BAvalue['TitleBtn'] .
                            "</button>";

                            echo "</div>";
                            if ($BAvalue['Url'] != FALSE)
                                echo form_close();
                        }
                        unset($Cnd);
                        echo "</th>";
                        $i++;
                    }

                if ($ButtonActionHover != FALSE)
                //foreach ($ButtonAction as $Indx){
                    foreach ($ButtonActionHover as $BAvalue) {
                        // echo var_dump($BAvalue); 
                        $i = 0;
                        $hidden = array(
                            $BAvalue['TID'] => $value[$BAvalue['ID']],
                            'TBL' => $BAvalue['TBL'],
                            'Url' => uri_string());
                        echo "<th>";
                        $Cnd[$BAvalue['TID']] = $value[$BAvalue['ID']];

                        if (isset($BAvalue['CID']) && $BAvalue['CID'] != FALSE)
                            $Cnd[$BAvalue['CID']] = $BAvalue['CVL'];
                        if (isset($BAvalue['SCID']) && $BAvalue['SCID'] != FALSE)
                            $Cnd[$BAvalue['SCID']] = $BAvalue['SCVL'];

                        if ($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond($BAvalue['TBL'], $BAvalue['TID'], $Cnd) != FALSE) {
                            if ($BAvalue['Url'] != FALSE)
                                echo form_open($BAvalue['Url'], '', $hidden);
                            echo "<div class=\"input-group\">";
                            if (isset($BAvalue['HoverText'])) {
                                echo "<button type=\"submit\" id=\"myTooltip" . $Rc . $Rc . $i . "\"\" class=\"btn btn-primary fa " . $BAvalue['fa'] . " \" style=\"color:  " . $BAvalue['Color'] . ";data-toggle=\"tooltip\" title='" . $BAvalue['HoverText'] . "' \">" . $BAvalue['TitleBtn']
                                . "</button>";
                            } else {
                                "<button type=\"submit\" class=\"btn btn-primary fa " . $BAvalue['fa'] . " \" style=\"color:  " . $BAvalue['Color'] . "; \">" . $BAvalue['TitleBtn'] .
                                        "</button>";
                            }

                            echo "</div>";
                            if ($BAvalue['Url'] != FALSE)
                                echo form_close();
                        }
                        unset($Cnd);
                        echo "</th>";
                        $i++;
                    }

                //foreach ($ButtonAction as $Indx){
                //}
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";
        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field))
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            elseif ($Flds == FALSE)
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
        }
        echo "</tr>"
        . "</tfoot>"
        . "</table>"
        . "<script>
                    
        $(document).ready(function(){
            $('#myTooltip$Rc').tooltip(); 
                 $('#myTooltip$Rc$Rc').tooltip(); 
        });

        $(function () {
            $(\"#example$Rc\").DataTable();
            $(\"#example2\").DataTable({
                \"paging\": true,
                \"lengthChange\": false,
                \"searching\": false,
                \"ordering\": true,
                \"info\": true,
                \"autoWidth\": false
            });
        });
    </script>";
    }

    public function ViewDataWithExRowWithMultiCondWithFormat_mony($Tbl, $Format_mony = FALSE, $Col = FALSE, $Flds = FALSE, $RlFlds = FALSE, $Cond = FALSE, $ButtonAction = FALSE, $Checkbox = FALSE, $CallModal = false, $Chartjs = FALSE) {

        $AryData = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary($Tbl, '*', $Cond);

        //var_dump($AryData);

        $Rc = rand(23, 100);

        if ($Chartjs)
            $this->Chartjs($AryData, $Rc, $Chartjs);

        $this->load->model("Pros");
        $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
        echo "<table id=\"example$Rc\" class=\"table table-bordered table-striped\">"
        . "<thead>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field)) {
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            } elseif ($Format_mony != FALSE && (isset($Format_mony[$key->Field]) && $Format_mony[$key->Field] == $key->Field)) {
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            }
        }

        if ($Col != FALSE)
            foreach ($Col as $Colvalue) {
                echo "<th>" . $this->LebalName($Colvalue['Title']) . "</th>";
            }

        if ($ButtonAction != FALSE)
            foreach ($ButtonAction as $BAvalue) {
                echo "<th>" . $this->LebalName($BAvalue['Title']) . "</th>";
            }

        if ($Checkbox != FALSE)
            foreach ($Checkbox as $Checkboxvalue) {
                echo "<th>" . $this->LebalName($Checkboxvalue['Title']) . "</th>";
            }


        if ($CallModal != FALSE)
            foreach ($CallModal as $CallModalvalue) {
                echo "<th>" . $this->LebalName($CallModalvalue['Title']) . "</th>";
            }

        echo "</tr>"
        . "</thead>"
        . "<tbody>";

        //var_dump($AryData)  ;   
        if ($AryData)
            foreach ($AryData as $key => $value) {
                echo "<tr>";
                $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
                foreach ($Creater as $keyCreater) {
                    if ($Format_mony != FALSE && (isset($Format_mony[$keyCreater->Field]) && $Format_mony[$keyCreater->Field] == $keyCreater->Field)) {
                        $VData = $this->Pros->Format_mony($value[$keyCreater->Field], 2);
                        // var_dump($VData);
                        echo "<td>" . $VData . "</td>";
                    } elseif ($Flds != FALSE && (isset($Flds[$keyCreater->Field]) && $Flds[$keyCreater->Field] == $keyCreater->Field)) {
                        if (isset($RlFlds[$keyCreater->Field])) {
                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);
                            echo "<td>" . $VData . "</td>";
                        } else {
                            echo "<td>" . $value[$keyCreater->Field] . "</td>";
                        }
                    } elseif ($Flds == FALSE && $Format_mony != FALSE) {

                        if (isset($RlFlds[$keyCreater->Field])) {

                            $VData = $this->Pros->Get_JustValue_Filed_AQ(
                                    $RlFlds[$keyCreater->Field]['Tbl'],
                                    $RlFlds[$keyCreater->Field]['Fld'],
                                    $RlFlds[$keyCreater->Field]['CFld'],
                                    $value[$keyCreater->Field]);

                            echo "<td>" . $VData . "</td>";
                        }
//                    else{
//                        echo "<td>".$value[$keyCreater->Field]."</td>";
//                    }
                    }
                }


                if ($Col != FALSE)
                    foreach ($Col as $Colvalue) {
                        $hidden = array(
                            $Colvalue['TID'] => $value[$Colvalue['ID']],
                            'TBL' => $Colvalue['TBL'],
                            'Url' => uri_string());
                        echo "<td>";
                        echo form_open($Colvalue['Url'] . "?" . $Colvalue['TID'] . "=" . $value[$Colvalue['ID']] . "", '', $hidden);
                        echo "<div class=\"input-group\">";
                        echo "<button type=\"submit\" class=\"btn btn-primary fa " . $Colvalue['fa'] . " \" style=\"color:  " . $Colvalue['Color'] . "; \"></button>";
                        echo "</div>";
                        //echo    "<a data-toggle=\"modal\" href=\"http://localhost/TPA/Claims/ReasonsForRejection.aspx?ClaimServiceID=".$value[$Colvalue['ID']]."\" data-target=\"#myModal\">Click me !</a>";
                        echo form_close();
                        echo "</td>";
                    }

                if ($CallModal != FALSE)
                    foreach ($CallModal as $CallModalvalue) {
                        $hidden = array(
                            $CallModalvalue['TID'] => $value[$CallModalvalue['ID']],
                            'TBL' => $CallModalvalue['TBL'],
                            'Url' => uri_string());
                        echo "<td>";
                        echo "<div class=\"input-group\">";
                        echo "<button href=\"" . base_url() . $CallModalvalue['Url'] . "?" . $CallModalvalue['TID'] . "=" . $value[$CallModalvalue['ID']] . "\" data-target=\"#myModalMsg\" type=\"button\" class=\"btn btn-primary fa " . $CallModalvalue['fa'] . " \"  data-toggle=\"modal\" style=\"color:  " . $CallModalvalue['Color'] . "; \"></button>";

                        echo "</div>";

                        echo "</td>";
                    }
                if ($ButtonAction != FALSE)
                //foreach ($ButtonAction as $Indx){
                    foreach ($ButtonAction as $BAvalue) {
                        $hidden = array(
                            $BAvalue['TID'] => $value[$BAvalue['ID']],
                            'TBL' => $BAvalue['TBL'],
                            'Url' => uri_string());
                        echo "<th>";
                        $Cnd[$BAvalue['TID']] = $value[$BAvalue['ID']];

                        if (isset($BAvalue['CID']) && $BAvalue['CID'] != FALSE)
                            $Cnd[$BAvalue['CID']] = $BAvalue['CVL'];
                        if (isset($BAvalue['SCID']) && $BAvalue['SCID'] != FALSE)
                            $Cnd[$BAvalue['SCID']] = $BAvalue['SCVL'];

                        if ($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond($BAvalue['TBL'], $BAvalue['TID'], $Cnd) != FALSE) {
                            if ($BAvalue['Url'] != FALSE)
                                echo form_open($BAvalue['Url'], '', $hidden);
                            echo "<div class=\"input-group\">";
                            echo "<button type=\"submit\" class=\"btn btn-primary fa " . $BAvalue['fa'] . " \" style=\"color:  " . $BAvalue['Color'] . "; \">" . $BAvalue['TitleBtn'] . "</button>";
                            echo "</div>";
                            if ($BAvalue['Url'] != FALSE)
                                echo form_close();
                        }
                        unset($Cnd);
                        echo "</th>";
                    }

                //foreach ($ButtonAction as $Indx){
                //}
                echo "</tr>";
            }
        echo "</tbody>"
        . "<tfoot>"
        . "<tr>";

        foreach ($Creater as $key) {
            if ($Flds != FALSE && (isset($Flds[$key->Field]) && $Flds[$key->Field] == $key->Field)) {
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            } elseif ($Format_mony != FALSE && (isset($Format_mony[$key->Field]) && $Format_mony[$key->Field] == $key->Field)) {
                echo "<th>" . $this->LebalName($key->Field) . "</th>";
            }
        }

        echo "</tr>"
        . "</tfoot>"
        . "</table>"
        . "<script>
      $(function () {
        $(\"#example$Rc\").DataTable();
        $(\"#example2\").DataTable({
          \"paging\": true,
          \"lengthChange\": false,
          \"searching\": false,
          \"ordering\": true,
          \"info\": true,
          \"autoWidth\": false
        });
      });
    </script>";
    }

    public function ViewDataClaimClinicWithStatusID($StatusID) {

        $CompanyIDAry = $this->Pros->Get_Value_Filed_AQ('companiesemployees',
                'CompanyID',
                'EmployeeID', $this->session->userdata('ContactID'));

        $CondCD = $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry, 'CompanyID');
        $CondCD = "ClinicID " . $CondCD . "and  StatusID='$StatusID'";
        return $CondCD;
    }

    public function ViewDataClaimInsurerWithStatusID($StatusID) {

        if (isset($CompanyIDAry))
            unset($CompanyIDAry);
        $CompanyIDAry = $this->Pros->Get_Value_Filed_AQ(
                'companiesemployees',
                'CompanyID',
                'EmployeeID',
                $this->session->userdata('ContactID'));

        if (isset($CondCD))
            unset($CondCD);

        $CondCD = $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry, 'CompanyID');
        $CondCD = "Party2CompanyID " . $CondCD;

        $InsurerCompanyCondCD = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts', 'ContractID', $CondCD);
        $CondCD = $this->Pros->Make_Value_in_SQL_IN($InsurerCompanyCondCD, 'ContractID');
        $CondCD = "ContractID" . $CondCD . "and  StatusID='$StatusID'";
        //var_dump($CondCD);
        return $CondCD;
    }

    public function ViewDataClaimEmployeeWithStatusID($StatusID) {

        if (isset($CompanyIDAry))
            unset($CompanyIDAry);
        $CompanyIDAry = $this->Pros->Get_Value_Filed_AQ(
                'companiesemployees',
                'CompanyID',
                'EmployeeID',
                $this->session->userdata('ContactID'));
        var_dump($CompanyIDAry);

        if (isset($CondCD))
            unset($CondCD);

        $CondCD = $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry, 'CompanyID');
        $CondCD = "Party2CompanyID " . $CondCD;

        $EmployeeCompanyCondCD = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts', 'ContractID', $CondCD);
        $CondCD = $this->Pros->Make_Value_in_SQL_IN($EmployeeCompanyCondCD, 'ContractID');
        $CondCD = "ContractID" . $CondCD . "and  StatusID='$StatusID'";
        //var_dump($CondCD);
        return $CondCD;
    }

    public function ViewDataClaimCustomerandSalesAgentWithStatusID($StatusID) {
        if (isset($CompanyIDAry))
            unset($CompanyIDAry);

        $CompanyIDAry = $this->Pros->Get_Value_Filed_AQ(
                'companiesemployees',
                'CompanyID',
                'EmployeeID',
                $this->session->userdata('ContactID'));

        if (isset($CondCD))
            unset($CondCD);

        $CondCD = $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry, 'CompanyID');
        $CondCD = "BeneficiaryCompanyID " . $CondCD;

        $CompanyCondCD = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts', 'ContractID', $CondCD);
        $CondCD = $this->Pros->Make_Value_in_SQL_IN($CompanyCondCD, 'ContractID');
        $CondCD = "ContractID" . $CondCD . "and   StatusID='$StatusID'";

        return $CondCD;
    }

    public function ViewDataClaimBeneficiaryWithStatusID($StatusID) {


        unset($CondCD);
        $CondCD = $this->session->userdata('ContactID');

        //var_dump($CondCD);

        $CondCD = "BeneficiaryID=$CondCD and StatusID=$StatusID ";

        return $CondCD;
    }

}
