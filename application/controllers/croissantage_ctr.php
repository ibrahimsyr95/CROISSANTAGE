<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Croissantage_ctr extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("croissantage","ctg");
		$this->load->model("etudiant","etu");
		$this->load->model("viennoiserie","vinn");
		$this->load->model("currentcommand","curr_cmd");
		$this->load->model("croissantagepending","ctg_pending");
		$this->load->model("pastrycommanditems","pastry_cmd");

	}


	public function index()
	{
		$this->createToken();
		if($this->isConnected()){
			$this->load->view('croissantage.php');
			
		}
	}
	public  function deconnecter()
	{
		
		 unset($_SESSION["id"]);
		 unset($_SESSION["role"]);
		 $this->index();
	}
	/**
	 * 
	 */
	public function verify(){
		$donnees["login"]=$this->input->post("donnees")["login"];
		$pwd_hashed=$this->etu->verify($donnees);
		
		
		$pwd=$this->input->post("donnees")["pwd"];
		$pwd_hashed=$pwd_hashed->pwd;
	
		//echo password_verify($pwd,$pwd_hashed);
		if (password_verify($pwd,$pwd_hashed)) {
			$this->createToken();
			
			$_SESSION["id"]=$this->etu->getid($donnees)[0]["id"];
			$rep=$this->getRole(array("idS"=>$_SESSION["id"]));
			if(isset($rep[0]["role"]))
				$_SESSION["role"]=$rep[0]["role"];
			echo "true";
		}
		else {
			echo "false";
			
		//	echo "Password .".$pwd_hashed->pwd.$this->input->post("donnees")["pwd"];
		}
		

	}
	public function isAdmin(){
		if(!isset($_SESSION["role"])){
			
			$this->index();
			return "";
			
		}else{
			
			return  true;
			
		}
	}
	/**
	 * 
	 * 
	 */
	public function isConnected()
	{
		if(!isset($_SESSION["id"])){
			$this->load->view('login.php');
			return "";
			
		}else{
			
			return true;
			
		}
	}
	/***
	 * 
	 * 
	 */
	public function get_all_student(){
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			$rep =$this->etu->getAll();
			echo $rep;
		}
	}
	/***
	 * supprimer etudiant
	 */
	public function deleteStudent()
	{
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			$rep =$this->etu->deleteStudent($this->input->post("donnees"));
			echo $rep;
		}
	}
	/**
	 * 
	 */
	public function updateRole()
	{
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			$rep =$this->etu->updateRole($this->input->post("donnees"));
			echo $rep;
		}
	}
	public function getTypeCTG(){
		$rep =$this->ctg->getTypeCTG();
		echo $rep;
	}
	public function get_my_prfile(){
		if($this->isCorrectToken($this->input->post("csrf_token"))){
		if($this->isConnected()){
			
			$rep=$this->etu->get_my_prfile($_SESSION["id"]);
			print_r ($rep);
		}else{
			$this->index();
		}
	}

	}
	public function update_my_profile(){
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			$donnees=$this->input->post("donnees");
			$donnees["pwd"]=password_hash($donnees["pwd"],PASSWORD_DEFAULT);
		$rep=$this->etu->update_my_profile($_SESSION["id"],$donnees);
		print_r ($rep);
		}
	}
	
	public function getallTypeViennoiserie(){
		if($this->isCorrectToken($this->input->post("csrf_token"))){
		$rep =$this->vinn->getAll();
		echo $rep;
		}
	}
	public function getAvailableTypeViennoiserie(){
		if($this->isCorrectToken($this->input->post("csrf_token"))){
		$rep =$this->vinn->getAvailable();
		echo $rep;
		}
	}
	public function get_Number_time_croissanted(){
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			
			$rep=$this->etu->get_Number_time_croissanted($_SESSION["id"]);
			print_r($rep);
		}
	}
	public function is_admin(){
		$rep=$this->etu->is_admin($_SESSION["login"]);
		return $rep;
	}
	public function get_Number_time_croissanter(){
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			$rep=$this->etu->get_Number_time_croissanter($_SESSION["id"]);
			print_r ($rep);
		}
	}
	public function addCroissantage(){
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			if($this->isAdmin()){
				
				$rep =$this->ctg->insert($this->input->post("donnees"));
				$rep=$this->curr_cmd->add_current_command($rep);
			}else{
				//si c'est pas l'admin proposer un croissantage
				$rep =$this->ctg_pending->insert($this->input->post("donnees"));
			}
	}
			
		
		print_r($rep);
	}
	public function get_commande_mount(){
	
		echo $this->curr_cmd->get_number_items($this->input->post("id"));
	}

	public function get_all_croissantages(){
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			$rep =$this->ctg->getAll($_SESSION["id"]);
			
		foreach($rep as $key=>$value){
			
			$value["somme"]=$this->curr_cmd->get_number_items($value["id"]);
			
			
			$res[]=$value;
		
		}
		
		print_r(json_encode($res));
	
		}
	
	}
	public function isCorrectToken($token)
	{
			if($_SESSION["csrf_token"]==$token){
				return true;
			}else{
				echo "error bad query";
				return "";
			}
	}
	public function get_all_croissantages_pending()
	{
		if($this->isCorrectToken($this->input->post("csrf_token"))){	
			$rep =$this->ctg_pending->getAll($_SESSION["id"]);
			print_r(json_encode($rep));
		}
	}
	/**
	 * refuser une proposition de croissantage
	 */
	public function rejectCroissantage()
	{
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			unset($_POST["csrf_token"]);
		$rep =$this->ctg_pending->rejectCroissantage($this->input->post());
		print_r(json_encode($rep));
		}
	}
	/**
	 * accepter une proposition de croissantage
	*/
	public function confirmCroissantage()
	{
		if($this->isCorrectToken($this->input->post("csrf_token"))){
		$rep =$this->ctg_pending->confirmCroissantage($this->input->post("id"));
		$rep =$this->ctg->insert($rep[0]);
			$rep=$this->curr_cmd->add_current_command($rep);
			unset($_POST["csrf_token"]);
			$rep =$this->ctg_pending->rejectCroissantage($this->input->post());//afin de supprimer la croissantage de la table ctg pending 

		print_r(json_encode($rep));
		}
	}
	/**
	 * mettre a jours les donneés de commande en cours 'pastrytype'
	 */
	public function update_crrent_commande(){
		if($this->isCorrectToken($this->input->post("csrf_token")))
		echo $this->curr_cmd->update_crrent_commande($this->input->post("pastryType"),$this->input->post("idCroissantage"),$_SESSION['id']);
	}
	public function getRole(){
		return ($this->etu->getRole(array("idS"=>$_SESSION["id"])));
	}
	/**
	 * 
	 */
	public function getrolestudent()
	{
		echo json_encode($this->etu->getRole(array("idS"=>$_SESSION["id"])));
	}
	/**
	 * 
	 */
	public function update_status_pastry(){
		if($this->isCorrectToken($this->input->post("csrf_token")))
		echo $this->vinn->update_status_pastry($this->input->post("id"),$this->input->post("donnees"));
	}
	public function signin(){

		if($this->input->method() !== 'post'){
			$this->load->view('signin.php');
		}else{

			if($this->isCorrectToken($this->input->post("csrf_token"))){
				$donnees=$this->input->post("donnees");
		        $donnees["pwd"]=password_hash($donnees["pwd"], PASSWORD_DEFAULT);
				$rep=$this->etu->insert($donnees);
			echo $rep;
			}
			
		}

	}
	/**
	 * stat functions
	 */
	public function get_5best_croissanted()
	{
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			$rep=$this->ctg->get_5best_croissanted();
		echo json_encode($rep);
		}else{
			echo " <br>bad boy";
		}

	}
	public function get_percentage_items()
	{
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			$rep=$this->pastry_cmd->get_percentage_items();
		echo ($rep);
		}else{
			echo "    <br>bad boy";
		}
	}
	public function croissantage_over_time()
	{
		if($this->isCorrectToken($this->input->post("csrf_token"))){
			$rep=$this->ctg->croissantage_over_time();
		echo ($rep);
		}else{
			echo "bad boy";
		}
	}
	public function test(){
		$pwd="test";
		$pwd_hashed = password_hash($pwd, PASSWORD_DEFAULT);
		echo $pwd_hashed;

	}
//
/***
 * obtenir les vues 
 * creer un token 
 * sauvegarder le token  dans une variable de session
 * inserer le token dans la page 
 */
	public function myprofile(){
		if($this->isConnected()){
			
		$this->createToken();
		
		$this->load->view('myprofile.php');
		}
		
	}
	public function stat(){
		if($this->isConnected()){
			
		$this->createToken();
		
		$this->load->view('stat.php');
		}
		
	}
	
	public function ctg_pending(){
		if($this->isAdmin()){
				
		$this->createToken();
		
		$this->load->view('croissantagepending.php');
		}
	}


	public function etudiants(){
		if($this->isAdmin()){
			$this->createToken();
			$this->load->view('users.php');
		}
	
	}

	public function viennoiserie(){
		if($this->isAdmin()){
		
			$this->createToken();
			$this->load->view('viennoiserie.php');
		}
	
	}
	public function createToken()
	{
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
		
	}
}
