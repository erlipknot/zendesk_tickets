<?php session_start(); 

include 'functions.php';

$_SESSION["ZDAPIKEY"] = $logZDAPIKEY;
$_SESSION["ZDUSER"] = $logZDUSER;
$_SESSION["ZDURL"] = "https://".$logZDDOMAINNAME.".zendesk.com/api/v2";
$_SESSION["ZDDOMAINNAME"] = $logZDDOMAINNAME.".zendesk.com";

//SEARCH REQUESTER

//$requesterData = curlWrap("/users.json", null, "GET");

$requesterData = curlWrap("/search.json?query=type:user%20email:".$_SESSION["ZDUSER"], null, "GET");

//print_r($requesterData->count);
//print_r($requesterData->results[0]->email);

if($requesterData->count != 0){
	//print "Hola";
	print "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=../index.php?page=1'>";

}else{
	//print "Adios";
	print "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=../index.php?page=4&err=nouser'>";
}

?>
