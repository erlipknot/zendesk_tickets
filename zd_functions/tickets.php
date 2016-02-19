<?php

	//TOTAL OF TICKETS

	if(!$num_page){
	
		$ticketData = curlWrap("/tickets.json", null, "GET");
	
	}else{
		
		$ticketData = curlWrap("/tickets.json?page=".$num_page, null, "GET");

	}

	$ticketPages = ceil($ticketData->count/100);

	//TOTAL OF REQUESTER
	$requesterData = curlWrap("/users.json", null, "GET");
	//$requesterPages = ceil($requesterData->count/100);	

	//PAGINATION

	$table_pagination_result ="<img src='../img/ajax-loader.gif' id='img' style='display:none'/ ><tr><div class='btn-group' role='group'><td colspan='6' align='center'><form action='../zendesk_tickets/index.php?page=1' method='POST'>";

	for($i = 1; $i <= $ticketPages; $i++){

		$table_pagination_result .="<button type='submit' name='num_page' value='".$i."' id='second' class='btn btn-default'>".$i."</button>";

	}

	$table_pagination_result .= "</div></tr>";

	$table_result = "<table class='table table-bordered'><thead>".$table_pagination_result."<tr><th>&nbsp;</th><th>Id</th><th>Subject</th><th>Status</th><th>User</th><th>Role</th></tr></thead><tbody>";

		
	foreach ($ticketData->tickets as $tic){

		//CREATING THE TABLE
		$table_result .= "<tr><td><input type='checkbox' class='checkbox1' value='".$tic->id."'></td><td><a href='http://www.erlino.com/zendesk/comments.php?ticketId=".$tic->id."&sid=".session_id()."' class='fancybox' data-fancybox-type='iframe' '>".$tic->id."</a></td><td>".$tic->subject."</td><td>".$tic->status."</td>";

		//SEARCHING FOR THE REQUESTER
		foreach ($requesterData->users as $us){

			if($us->id == $tic->requester_id){
				$table_result .= "<td>".$us->name."</td><td>".$us->role."</td></tr>";
			}

		}

	}

	//CLOSING THE TABLE
	$table_result .= $table_pagination_result."</tbody></table>";
	//PRINTING THE TABLE
	echo $table_result;

?>