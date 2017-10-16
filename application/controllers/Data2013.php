<?php
class Data2013 extends CI_Controller
	{
		public function __construct()
			{
				parent::__construct();
			}
		public function president()
			{
				$data=$this->db->where("position_id",1)->group_by("candidate_id")->get("election_results")->result();
				foreach($data as $value)
				   {
				   	$s["c_othernames"]=$value->candidate_name;
				   	$s["c_positioncode"]=1;
				   	$s["c_pollyear"]=1;
				   	$s["c_countycode"]=0;
				   	 $this->db->insert("poll_candidates",$s);

				   }

			}
	}