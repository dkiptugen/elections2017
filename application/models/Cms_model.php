<?php
class Cms_model extends CI_Model
	{
		public function __construct()
			{
				parent::__construct();
			}
		public function getcounty()
			{
				$dbh=$this->db->order_by('county_name','asc')->get('counties');
				if($dbh->num_rows()>0)
				  	{
 						return $dbh->result();
				  	}
			}
		public function getconstituency()
			{
				$dbh=$this->db->order_by('constituency_name','asc')->get('constituencies');
				if($dbh->num_rows()>0)
				  	{
 						return $dbh->result();
				  	}
			}
		public function getward()
			{
				$dbh=$this->db->order_by('ward_name','asc')->get('wards');
				if($dbh->num_rows()>0)
				  	{
 						return $dbh->result();
				  	}
			}
		public function getposts()
			{
				$dbh=$this->db->order_by('id','asc')->get('posts');
				if($dbh->num_rows()>0)
				  	{
 						return $dbh->result();
				  	}
			}
		public function getCandidates($posts,$region,$regionid)
			{
				$dbh=$this->db->where(strtolower($region).'_id',$regionid)->where('position',$posts)->order_by('Name','asc')->get('candidates');
				if($dbh->num_rows()>0)
				  	{
 						return $dbh->result();
				  	}
			}
		public function getCountyName($regionid)
			{
				$dbh=$this->db->where('county_id',$regionid)->order_by('county_name','asc')->get('counties');
				if($dbh->num_rows()>0)
				  	{
 						return $dbh->row();
				  	}
			}
		public function getConstituencyName($regionid)
			{
				$dbh=$this->db->where('constituency_id',$regionid)->order_by('constituency_name','asc')->get('constituencies');
				if($dbh->num_rows()>0)
				  	{
 						return $dbh->row();
				  	}
			}
		public function getWardName($regionid)
			{
				$dbh=$this->db->where('ward_id',$regionid)->order_by('ward_name','asc')->get('wards');
				if($dbh->num_rows()>0)
				  	{
 						return $dbh->row();
				  	}
			}
	}
?>