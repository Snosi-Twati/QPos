function do_upload(){
 
    $this->load->library('upload');
 
    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);
    for($i=0; $i<$cpt; $i++){
        $_FILES['userfile']['name']		= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']		= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']	= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']	= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']		= $files['userfile']['size'][$i];    
 
	    $this->upload->initialize($this->set_upload_options());
	    $this->upload->do_upload();
 
	    $upload_data 	= $this->upload->data();
		    $file_name 	=   $upload_data['file_name'];
		    $file_type 	=   $upload_data['file_type'];
		    $file_size 	=   $upload_data['file_size'];
 
	    // Output control
			$data['getfiledata_file_name'] = $file_name;
			$data['getfiledata_file_type'] = $file_type;
			$data['getfiledata_file_size'] = $file_size;
        // Insert Data for current file
            $this->m_upload->insertNotices($form_input_Data);
 
        //Create a view containing just the text "Uploaded successfully"
		$this->load->view('upload_success', $data);
 
	}
 
}
private function set_upload_options(){   
	//  upload an image options
    $config = array();
    $config['upload_path'] = './fileselif/';
    $config['allowed_types'] = 'gif|jpg|png|pdf';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;
 
 
    return $config;
}