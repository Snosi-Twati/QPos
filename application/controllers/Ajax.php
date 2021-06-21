<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ajax
 *
 * @author Coder001
 */
class Ajax extends CI_Controller{
    
    public function MedicalApprovalBy() 
    {
        
        echo    '<script type=\"text/javascript\">
                    // Ajax post
                    $(document).ready(function() {
                        $(\".submit\").click(function(event) {
                            event.preventDefault();
                            var user_name = $(\"input#name\").val();
                            var password = $(\"input#pwd\").val();
                            jQuery.ajax({
                                type: \"POST\",
                                url: \"<?php echo base_url(); ?>\" + \"index.php/ajax_post_controller/user_data_submit\",
                                dataType: \'json\',
                                data: {name: user_name, pwd: password},
                                success: function(res) {
                                    if (res)
                                    {
                                        // Show Entered Value
                                        jQuery(\"div#result\").show();
                                        jQuery(\"div#value\").html(res.username);
                                        jQuery(\"div#value_pwd\").html(res.pwd);
                                    }
                                }
                            });
                        });
                    });
                </script>';
    }
}
