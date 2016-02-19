<?php  

	//TOTAL OF TICKETS
	$ticketData = curlWrap("/tickets.json", null, "GET");
	$ticketPages = ceil($ticketData->count/100);
	//print_r($ticketData);


	$file = fopen("zd_functions/tickets.csv","w");	

	for($i=1;$i<=$ticketPages;$i++){

		if($i<>1){
			$ticketData = curlWrap("/tickets.json?page=".$i, null, "GET");
		}

		foreach ($ticketData->tickets as $tic){

			//ADDING THE LINE TO THE CSV
		$line = $tic->id.",".$tic->subject;
		fputcsv($file,explode(',',$line));

		}

	}
	fclose($file); 

	print "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=zd_functions/tickets.csv'>";

?>