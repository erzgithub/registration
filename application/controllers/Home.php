<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("Homemodel");
		$this->load->library("Sqlquery");
	}
	
	function index(){
		$this->load->helper("url");
		$this->load->template("home", null, 0);
	}
	
}