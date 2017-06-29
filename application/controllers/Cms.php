<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller 
	{
		public $data;
		public function __construct()
			{
				parent::__construct();
	            $this->data['title']='Elections 2017';
	            $this->load->model('cms_model','cmodel');
	            $this->data['post']=$this->cmodel->getposts();
			}
		public function index()
			{
				$this->data['region']='country';
	            $this->data['sub_region']='county';
	            $this->data['region_code']='ken';
	            $this->data['center']='{"lat":0.3088736326050645,"lon":37.90851092974151}';
	            $this->data['length']=2;
	            $this->data['area']=1.3;
			   	$this->data['page_title']='Elections';
			   	$this->data['page_subtitle']='Dashboard';
	           	$this->data['view']='home';
	           	$this->load->view('structure',$this->data);
			}
		public function candidates($region)
			{
				$this->data['page_title']=ucfirst($region);
			   	$this->data['page_subtitle']='Candidates';
           		$this->data['view']='candidates';
	           	$this->load->view('structure',$this->data);
			}
		public function results($region)
			{

				$this->data['regions']=$this->cmodel->{'get'.$region}();
				$this->data['region']=$this->data['page_title']=ucfirst($region);
			   	$this->data['page_subtitle']='Results';
                $this->data['view']='results';
	           	$this->load->view('structure',$this->data);
			}
		public function candidate_results()
			{
				$x='
					<div class="form-group">
						<label for="" class="control-label col-md-2 col-md-offset-1">Raila Odinga</label>
						<div class="col-md-7">
						<input type="text" name="results[raila]" required="" autofocus="" class="form-control" value=""/>
						</div>
					</div>
					';
				$x="";
				$candidates=$this->cmodel->getCandidates($this->input->post('posts'),$this->input->post('region'),$this->input->post('regionid'));
				// $candidates=$this->cmodel->getCandidates(2,'county',30);
				$x.='<div class="form-group">
						<label for="" class="control-label col-md-2 col-md-offset-1">'.ucfirst($this->input->post('region')).'</label>
						<div class="col-md-7">
						<input type="text" name="region" required="" autofocus="" class="form-control" value="'.$this->getName($this->input->post('region'),$this->input->post('regionid')).'"/>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-2 col-md-offset-1">'.ucfirst($this->input->post('region')).' No</label>
						<div class="col-md-7">
						<input type="text" name="regionid" required="" autofocus="" class="form-control" value="'.$this->input->post('regionid').'"/>
						</div>
					</div>';
                foreach ($candidates as  $value)
                	{
                	# code...
                		$x.='<div class="form-group">
						<label for="" class="control-label col-md-2 col-md-offset-1">'.$value->Name.'</label>
						<div class="col-md-7">
						<input type="text" name="results['.$value->id.']" required="" autofocus="" class="form-control" value=""/>
						</div>
					</div>';
                	}
				
				$this->output->set_output($x);
			}
		public function getName($region,$regionid)
			{
                 $name=$this->cmodel->{'get'.ucfirst($region).'Name'}($regionid);
                 return $name;
			}
	}
