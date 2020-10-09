<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("Registrationmodel");
		$this->load->library("Sqlquery");
	}
	
	function index(){
		$this->load->helper("url");
		$this->load->template("registration", null, 0);
	
	}
	
	function checkgenID($cid){
		$id = filter_var($cid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$sql = $this->sqlquery->select("tbl_persons", "BarcodeID", true, "BarcodeID = ?");
		$data = array("BarcodeID" => $id);
		$query = $this->Registrationmodel->execute($sql, $data);
		if($query->num_rows() > 0){
			$this->checkgenID($id);
		}else{ 
			return false;
		}
	}
	
	function genID(){
		return base_convert(uniqid(rand()), 10, 36);
	}
	
	function save(){
		
		$this->load->library("session");
		
		if($this->input->post("FN") && $this->input->post("LN")){
					$email = $this->input->post("Email");
					/* if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
						echo -4;
					}else{  */
				if(!($this->checkgenID($this->genID()))){
						$BarcodeID = $this->genID();
						$present = $this->input->post("Present");
						$sal = filter_var($this->input->post("SAL"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
						$fn = filter_var($this->input->post("FN"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
						$ln = filter_var($_POST["LN"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
						$businessPhone = filter_var($this->input->post("BusinessPhone"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
						$mobileNo = filter_var($this->input->post("MobileNo"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
					//	$province = filter_var($this->input->post("Province"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
					//	$city = filter_var($this->input->post("City"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
						$designation = filter_var($this->input->post("Designation"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
						$company = filter_var($this->input->post("Company"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
						$dateRegistered = $this->Registrationmodel->getDateTime();
						
						$PRC = filter_var($this->input->post("PRC"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
						$OR = filter_var($this->input->post("OR"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
						$Vtype = filter_var($this->input->post("VType"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
						$kt = filter_var($this->input->post("KIT"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
						
						$VIP = filter_var($this->input->post("VIP"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
						
						$KIT = null;
						
						if($kt == "true"){
							$KIT = "Claimed";
							$this->saveKit($BarcodeID);
						}
						
						
						$dateAttended = ($present == "true") ? $this->Registrationmodel->getDateTime() : null;
						
						$sql = $this->sqlquery->insert("tbl_persons", "Salutation,FirstName,LastName,CompanyName"
								.",Email,MobileNo,BusinessPhone,Designation,Province,CityMunicipality,DateRegistered,DateAttended,isAllowed,BarcodeID",
								"?,?,?,?,?,?,?,?,?,?,?,?,?,?");
						
						
						$data = array("Salutation" => $VIP,//$sal,
									  "FN" => $fn,
									  "LN" => $ln,
									  "CompanyName" => $company,
									  "Email" => $email,
									  "MobileNo" => $mobileNo,
									  "BusinessPhone" => $businessPhone,
									  "Designation" => $designation,
									  "Province" => $PRC,
									  "CityMunicipality" => $OR,
									  "DateRegistered" => $dateRegistered,
									  "DateAttended" => $dateAttended,
									  "isAllowed" => 0,
									  "BarcodeID" => $BarcodeID);
								  
						$this->Registrationmodel->execute($sql, $data);
						$this->session->set_userdata("Barcode_ID", $BarcodeID);
						echo 0;
				}		
					//}
		}else{ 
			echo -2;
		}
	}
	
	function saveKit($b){
		$barcode = filter_var($b, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$data = array("BarcodeID" => $barcode, "DateRecorded" => $this->Registrationmodel->getDateTime());
		$sql = $this->sqlquery->insert("tbl_kits", "BarcodeID, DateRecorded", "?,?");
		$this->Registrationmodel->execute($sql, $data);
	}
	
}