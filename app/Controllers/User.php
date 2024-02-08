<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index(){
		$data['user_info'] = $this->curd_model->get_all('*', 'user', array(),'id','DESC');
				
        return view('user',$data);
      
    }
	

    public function action_update($action = null)
    {
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost();
        if($action == 'add_user')
        {
			$check = $this->validate([
                'full_name' => ['rules' =>  'required','errors' =>  ['required' => 'FullName is required']],
                'phone' => ['rules' =>  'required','errors' =>  ['required' => 'Phone is required']],
                'email' => ['rules' =>  'required','errors' =>  ['required' => 'Email is required']],
				'dob' => ['rules' =>  'required','errors' =>  ['required' => 'DOB is required']],
				'gender' => ['rules' =>  'required','errors' =>  ['required' => 'Gender is required']],
				'address' => ['rules' =>  'required','errors' =>  ['required' => 'Address is required']],
                
			   ]);
			if($check)
			{
				$doc1 = $this->request->getFile('user_image');
				if($doc1->isValid())
				{
					
					$doc1validationRule = [
					'user_image' => [
						'label' => 'Image File',
						'rules' => 'uploaded[user_image]'
						. '|mime_in[user_image, image/png, image/jpg,image/jpeg]'
						. '|max_size[user_image,2000]'
					],
					];
					if ($this->validate($doc1validationRule)) {
						if (! $doc1->hasMoved()) {
							$file1 = $doc1->getRandomName();
							$doc1->move(ROOTPATH . 'public/images', $file1);
							
							$data = array(
								'full_name' => $frmdata['full_name'],
								'phone' => $frmdata['phone'],
								'email' => $frmdata['email'],
								'dob' => $frmdata['dob'],
								'gender' => $frmdata['gender'],
								'address' => $frmdata['address'],
								'image' => $file1,
							);
							$sql = $this->curd_model->insert('user', $data);
							if($sql){
								$error['success'] = true;
							}else{
								$error['message']['refrence'] = '<p>Error in User create please try again.</p>';
							}
						}
					}
					else
					{
						$error['val']=true;
						$error['message'] = $this->validator->getErrors();
					}
				}else{
					    $error['success']  = false;
						$error['message']['refrence'] = 'Please Upload Image';
				}
						
			}else{
				$error['val']=true; 
				foreach($_POST as $key =>$value)
                {
                    if ($this->validation->hasError($key)) {

						
                        $error['message'][$key] = $this->validation->getError($key);
                    }
                }
			}
		}
		else if($action == 'update_user'){
			$check = $this->validate([
                'edt_id' => ['rules' =>  'required','errors' =>  ['required' => 'Id is required']],
                'edt_full_name' => ['rules' =>  'required','errors' =>  ['required' => 'FullName is required']],
                'edt_phone' => ['rules' =>  'required','errors' =>  ['required' => 'Phone is required']],
                'edt_email' => ['rules' =>  'required','errors' =>  ['required' => 'Email is required']],
				'edt_dob' => ['rules' =>  'required','errors' =>  ['required' => 'DOB is required']],
				'edt_gender' => ['rules' =>  'required','errors' =>  ['required' => 'Gender is required']],
				'edt_address' => ['rules' =>  'required','errors' =>  ['required' => 'Address is required']],
			   ]);
			if($check)
			{
				$doc1 = $this->request->getFile('user_image');
				if($doc1->isValid())
				{
					
					$doc1validationRule = [
					'user_image' => [
						'label' => 'Image File',
						'rules' => 'uploaded[user_image]'
						. '|mime_in[user_image, image/png, image/jpg,image/jpeg]'
						. '|max_size[user_image,2000]'
					],
					];
					if ($this->validate($doc1validationRule)) {
						if (! $doc1->hasMoved()) {
							$file1 = $doc1->getRandomName();
							$doc1->move(ROOTPATH . 'public/images', $file1);
							
						}
					}
					else
					{
						$error['val']=true;
						$error['message'] = $this->validator->getErrors();
					}
				}else if($frmdata['edt_old_user_image']){
                    	$file1 = $frmdata['edt_old_user_image'];
				}else{
					    $error['success']  = false;
						$error['message']['refrence'] = 'Please Upload Image';
				}

				if(!empty($file1)){
					$data = array(
						'full_name' => $frmdata['edt_full_name'],
						'phone' => $frmdata['edt_phone'],
						'email' => $frmdata['edt_email'],
						'dob' => $frmdata['edt_dob'],
						'gender' => $frmdata['edt_gender'],
						'address' => $frmdata['edt_address'],
						'image' => $file1
						);
						$sql = $this->curd_model->update_table('user', $data, array('id'=>$frmdata['edt_id']));
						if($sql){
							$error['success'] = true;
						}else{
							$error['message']['refrence'] = '<p>Error in User update please try again.</p>';
						}
				}else{
					$error['success']  = false;
						$error['message']['refrence'] = 'Please Upload Image';
				}
				
			}else{
				foreach($_POST as $key =>$value)
                {
                    if ($this->validation->hasError($key)) {
                        $error['message'][$key] = $this->validation->getError($key);
                    }
                }
			}
	
		}
		else if($action == 'delUser'){

			$check = $this->validate([
                'del_id' => ['rules' =>  'required','errors' =>  ['required' => 'Id is required']],
                   
			   ]);
			if($check)
			{
				$data = array(
					'id' => $frmdata['del_id'],
				);
				$sql = $this->curd_model->customquery("delete from user where id ='".$data['id']."'");
				if($sql){
					$error['success'] = true;
				}else{
					$error['message']['refrence'] = '<p>Error in User Delete please try again.</p>';
				}
			}else{
				foreach($_POST as $key =>$value)
                {
                    if ($this->validation->hasError($key)) {
                        $error['message'][$key] = $this->validation->getError($key);
                    }
                }
			}
		}
		echo json_encode($error);
	}
}
