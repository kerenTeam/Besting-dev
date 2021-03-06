<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*    微信端广告管理
*/
class wx_advert extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('advert_model');
		$this->load->library('upload');
	}

	//广告列表
	public function index(){
		$data['adverts'] = $this->advert_model->listadvert();
		$this->load->view('wx_advert',$data);
		$this->load->view('footer');
	}


	#新增广告
	public function addadvert(){
		
		if($_POST){
   			$this->form_validation->set_rules('linkurl','链接地址','required');
   			$this->form_validation->set_rules('merchantname','商家名称','required');
   			if ($this->form_validation->run() == false) {
				# 未通过验证
				$data['message'] = validation_errors();
				$data['wait'] = 3;
				$data['url'] = site_url('wx_advert/addadvert');
				$this->load->view('message.php',$data);
			} else {
				if(!empty($_FILES['imgfile']['tmp_name'])){
					if ($this->upload->do_upload('imgfile')) {
						# 上传成功，获取文件路径
						$fileinfo = $this->upload->data();
						
						$data['advertpic'] = 'upload/' . $fileinfo['file_name'];
					}else{
						#上传失败
						$data['message'] = $this->upload->display_errors();
						$data['wait'] = 3;
						$data['url'] = site_url('wx_advert/addadvert');
						$this->load->view('message.php',$data);
					}
				}

				$data['merchantname'] = $this->input->post('merchantname');
				$data['linkurl'] = $this->input->post('linkurl');
				$data['pid'] = $this->input->post('pid');

				#调用模型完成修改动作
				if ($this->advert_model->addadvert($data)) {
					$data['message'] = '新增成功';
					$data['wait'] = 3;
					$data['url'] = site_url('wx_advert/index');
					$this->load->view('message.php',$data);
				} else {
					$data['message'] = '新增失败';
					$data['wait'] = 3;
					$data['url'] = site_url('wx_advert/addadvert');
					$this->load->view('message.php',$data);
				}
			}
		}else{
		    $data['pid'] = $_GET['id'];

		    $this->load->view('wx_bankadadd',$data);
		    $this->load->view('footer');
		}
	}

	public function updata(){
		if($_POST){
			$this->form_validation->set_rules('linkurl','链接地址','required');
   			$this->form_validation->set_rules('merchantname','商家名称','required');
   			if ($this->form_validation->run() == false) {
				# 未通过验证
				$data['message'] = validation_errors();
				$data['wait'] = 3;
				$data['url'] = site_url('wx_advert/updata');
				$this->load->view('message.php',$data);
			} else {
				if(!empty($_FILES['imgfile']['tmp_name'])){
					if ($this->upload->do_upload('imgfile')) {
						# 上传成功，获取文件路径
						$fileinfo = $this->upload->data();
						
						$data['advertpic'] ='upload/' . $fileinfo['file_name'];
					}else{
						#上传失败
						$data['message'] = $this->upload->display_errors();
						$data['wait'] = 3;
						$data['url'] = site_url('wx_advert/updata');
						$this->load->view('message.php',$data);
					}
				}else{
					$data['advertpic'] = $this->input->post('advertpic');
				}	

				$data['merchantname'] = $this->input->post('merchantname');
				$data['linkurl'] = $this->input->post('linkurl');
				$data['pid'] = $this->input->post('pid');
				$id = $this->input->post('id');
				// var_dump($data);exit;
				
				#调用模型完成修改动作
				if ($this->advert_model->upadvert($data,$id)) {
					$data['message'] = '修改成功';
					$data['wait'] = 3;
					$data['url'] = site_url('wx_advert/index');
					$this->load->view('message.php',$data);
				} else {
					$data['message'] = '修改失败';
					$data['wait'] = 3;
					$data['url'] = site_url('wx_advert/updata');
					$this->load->view('message.php',$data);
				}
			}
		}else{
			$id = $_GET['id'];
			$data['advert'] = (array)$this->advert_model->listade($id);
			$this->load->view('wx_bankadup',$data);
			$this->load->view('footer');
		}
	}

	#删除广告
	public function del(){
		$id = $_GET['id'];
		$list = (array)$this->advert_model->listade($id);
		$a = './weixin/'.$list['advertpic'];
		$result = @unlink ($a);
		
		if($this->advert_model->deladvert($id)){
			$data['message'] = '删除成功';
			$data['wait'] = 3;
			$data['url'] = site_url('wx_advert/index');
			$this->load->view('message.php',$data);
		} else {
			$data['message'] = '删除失败';
			$data['wait'] = 3;
			$data['url'] = site_url('wx_advert/updata');
			$this->load->view('message.php',$data);
		}

	}
		
}

?>