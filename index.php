<?php session_start(); 
include 'zd_functions/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zendesk PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <script type="text/javascript">
    
  $('#second').click(function(){
      $('#img').show(); //<----here
      $.ajax({
        ....
       success:function(result){
           $('#img').hide();  //<--- hide again
       }
    }

  </script>

  </head>
  <body>
	<div class="container">

		<?php if(empty($_SESSION["ZDUSER"])){ ?>

			<h2>Zendesk login</h2>
			<div class="col-xs-10 col-xs-offset-1 well content">
				<form action="zd_functions/script.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="logZDUSER" name="logZDUSER" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">API token</label>
            <input type="password" class="form-control" id="logZDAPIKEY" name="logZDAPIKEY" placeholder="API Token">
          </div>
        
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" id="logZDDOMAINNAME" name="logZDDOMAINNAME">
              <div class="input-group-addon">.zendesk.com</div>
            </div>
          </div>
        
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
			</div>

		<? }else{ 

			switch ($page) {

                case '1':
                    include 'zd_functions/tickets.php';
                    break;
                case '2':
                    include 'zd_functions/endsession.php';
                    break;
                /*case '3':
                    include 'zd_functions/errors.php';
                    break;
                case '4':
                    include 'zd_functions/create_ticket.php';
                    break;*/

            }

		} ?>

	</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  </body>
</html>