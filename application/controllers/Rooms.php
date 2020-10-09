<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Rooms extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("Roomsmodel");
		$this->load->library("Sqlquery");
	}
	
	function index(){
		$this->load->helper("url");
		 $this->load->template("rooms", null, 0, 0);
		 
	}
	
	function loadRooms(){
		$sql = $this->sqlquery->select("tbl_session_rooms", "*", false, null);
		$query = $this->Roomsmodel->execute($sql, null);
		$arr = array();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				array_push($arr, $row["RoomName"]);
			}
			print_r(json_encode($arr));
		}
	}
	
	function checkbCode(){
		if($this->input->post("code")){
			$barcode = filter_var($this->input->post("code"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
			$room = filter_var($this->input->post("room"), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
			if($this->checkBExistence($barcode, $room)){
				$this->updateAttend($barcode, $room);
				echo "<span>Successfully Signed Out</span>";
			}else {
				$this->insertBCode($barcode, $room);
				echo "<span>Successfully Attended</span>";
			}
		}
	}
	
	function updateAttend($b, $r){
		$barcode = filter_var($b, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$room = filter_var($r, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$data = array("DateSignout" => $this->Roomsmodel->getDateTime(), "BarcodeID" => $barcode, "RoomName" => $room);
		$sql = $this->sqlquery->update("tbl_session_data", "DateSignout = ?", true, "BarcodeID = ? And RoomName = ?");
		$this->Roomsmodel->execute($sql, $data);
	}
	
	function insertBCode($b, $r){
		$barcode = filter_var($b, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$room = filter_var($r, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$data = array("Barcode" => $barcode, "RoomName" => $room, "DateRecorded" => $this->Roomsmodel->getDateTime(), "TS" => $this->Roomsmodel->getTime());
		$sql = $this->sqlquery->insert("tbl_session_data", "BarcodeID, RoomName, DateRecorded, TS", "?,?,?,?");
		$this->Roomsmodel->execute($sql, $data);
	}
	
	function checkBExistence($b, $r){
		$barcode = filter_var($b, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$room = filter_var($r, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$data = array("BarcodeID" => $barcode, "RoomName" => $room);
		$sql = $this->sqlquery->select("tbl_session_data", "*", true, "BarcodeID = ? And RoomName = ?");
		$query = $this->Roomsmodel->execute($sql, $data);
		
		if($query->num_rows() == 1){
			return true;
		}else{ 
			return false;
		}
	}
	
}