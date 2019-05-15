<?php
/***
@param int  flag number
returns jason object of db data
refer to database for flag definitions
return array
***/
class dbdisplay
{
	//Properties
	//Methods
	//constructor
	public function __construct()
	{

	}
	//private functions
	//protected functions
	//public functions

	/***
	@param int flag
	return array count

	***/
	public function getdealcount($flag)
	{
		$list=db_query(sprintf(GETDEALCOUNT,$flag),0);
		return $list[0];

	}
	public function getdealslist($fliter)
	{
		$list=db_query(sprintf(GETDEALSLIST,$fliter),0);
		return $list;

	}

	public function getclient_detailsbyID($clientid){
		$list=db_query(sprintf(GETCLIENT_BYID,$clientid),0);
		return $list[0];
	}

	public function getoccupationbyid($occupid){
		$list=db_query(sprintf(GETOCCUPATIONBYID,$occupid),0);
		return $list[0];
	}


	public function user_list()
	{
		$list=db_query("select user_name from sales_team where user_type='credit canada'",0);
    //print_r($list);
		return $list;

	}
	public function get_all_teamlist(){
		$list=db_query("select id,team_name from user_team ",0);
    //print_r($list);
		return $list;
	}public function get_all_rolelist(){
		$list=db_query("select role_id,role_name from user_role ",0);
		//print_r($list);
		return $list;
	}


	public function app_received_list($startdate,$enddate,$agent){

		$list=db_query("select  clientid,first_name,last_name,personal_info.email,createddate from personal_info
										 where date(createddate) >='$startdate' and date(createddate) <='$enddate'
										 and personal_info.agent='$agent' order by date(createddate)",0);
    //print_r($list);
		return $list;

	}

	/*public function all_user_list(){
		$list=db_query("select * from sales_team where user_type='credit canada'",0);
    //print_r($list);
		return $list;
	}*/

	public function get_all_userlist(){
		//$list=db_query("select * from sales_team where user_type='credit canada'",0);
    //print_r($list);
		//return $list;
		$list=db_query(sprintf(GETUSERLIST),0);
		return $list;
	}

	public function add_agreement_amendment($agreementdate,$firstname,$lastname,$email,$phonenumber,$address,$city,$province,$postalcode,$diffsuf,$filename,$user_name){

		$list=db_query("CAll addAgreementAmendmentInfo('$agreementdate','$firstname','$lastname','$email','$phonenumber','$address','$city','$province','$postalcode','$diffsuf','$filename','$user_name')",0,0);
    //print_r($list);
		$list="CAll addAgreementAmendmentInfo('$agreementdate','$firstname','$lastname','$email','$phonenumber','$address','$city','$province','$postalcode','$diffsuf','$filename','$user_name')";
		return $list;
	}
	public function getAgreementAmendmentlist(){
		$list=db_query(sprintf(GETAGREEMENTAMENDMENTLIST),0);
		return $list;
	}

	public function getUserInfoByID($user){
		$list=db_query(sprintf(GETUSERINFOBYID,$user),0);
		return $list;
	}

	public function setredoagreement_pathbyID($clientid,$path){
		$list=db_query(sprintf(REDOAGREEMENTPATHBYID,$clientid,$path),0,0);
		return $list;
	}

	public function adduser_trackinfo($clientid,$userid,$actiontitle,$actioncomments,$username){
		$list=db_query(sprintf(USERTRACKINFO,$clientid,$userid,$actiontitle,$actioncomments,$username),0,0);
		return $list;
	}


} // end of class dbdisplay

?>
