<?php
require_once('bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>FIBO CALENDAR</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      Materialize.updateTextFields();
    });
    $(document).ready(function() {
      $('select').material_select();
    });
    $(document).ready(function(){
      $('.tooltipped').tooltip({delay: 50});
    });</script>

    <!-- <title>Bare - Start Bootstrap Template</title>-->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 10px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 1000px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <nav>
    <div class="nav-wrapper orange accent-4">
      <a href="http://fibo.kmutt.ac.th/" class="brand-logo">&nbsp&nbspFIBO Calendar</span></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      </ul>
    </div>
  </nav>

    <!-- Navigation -->
    <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">-->
            <!-- Brand and toggle get grouped for better mobile display -->
            <!--<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Free Calendar</a>
            </div>-->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Menu</a>
                    </li>
                </ul>
            </div>-->
            <!-- /.navbar-collapse -->
        <!--</div>-->
        <!-- /.container -->
    <!--</nav>-->

    <!-- Page Content -->
     <div class="container">
       <div class="col s12 m6 l6 input-field">
          <i class="small material-icons black-text text-darken-4">stop</i>
          Ended Event
       </div>
       <div class="col s12 m6 l6 input-field">
          <i class="small material-icons green-text text-accent-4">stop</i>
          Available Reservation
       </div>
       <div class="col s12 m6 l6 input-field">
          <i class="small material-icons red-text text-accent-4">stop</i>
          Reserved
       </div>
       <div class="col s12 m6 l6 input-field">
          <i class="small material-icons light-blue-text text-accent-1">stop</i>
          Coming up Event
       </div>

        <div class="row">
            <!--<div class="col-lg-12 text-center">-->
                <!--<h1>FullCalendar BS3 PHP MySQL</h1>-->
                <!--<p class="lead">Complete with pre-defined file paths that you won't have to change!</p>-->
                <div id="calendar" class="col-centered" style="margin-top: 1%">
                </div>
            </div>

        </div>
        <!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">

			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>

						</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="datetime-local(yyyy-mm-ddTHH:MM:SS)" name="start" class="form-control" id="start" max="20">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="datetime-local(yyyy-mm-ddTHH:MM:SS)" name="end" class="form-control" id="end" max="20">
					</div>
				  </div>

          <div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
					  <input type="text" name="password" class="form-control" id="password1" placeholder="Password" onmouseover="confADDEvent()" onmouseout="confADDEvent()" onchange="confADDEvent()">
					</div>
				  </div>

			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" id="saveBtn1" class="btn btn-primary" disabled>Save changes</button>
			  </div>
        <script type="text/javascript">
        function confADDEvent(){
          var adminValidateVal1 = document.getElementById('password1').value;
          var saveBtn1 = document.getElementById('saveBtn1').disabled;
          if(adminValidateVal1 == 1234){
            console.log('Password Correct');
            document.getElementById('saveBtn1').disabled = false;
          }
          else {
            console.log('Password is not correct');
            document.getElementById('saveBtn1').disabled = true;
          }
        }
        </script>
			</form>
			</div>
		  </div>
		</div>



		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  <div class="modal-body">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>

						</select>
					</div>
				  </div>
				    <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>

          <div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
					  <input type="text" name="password" class="form-control" id="password" placeholder="Password" onmouseover="confEditEvent()" onmouseout="confEditEvent()" onchange="confEditEvent()">
					</div>
				  </div>

				  <input type="hidden" name="id" class="form-control" id="id">


			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" id="saveBtn" class="btn btn-primary" disabled>Save changes</button>
			  </div>
        <script type="text/javascript">
        function confEditEvent(){
          var adminValidateVal = document.getElementById('password').value;
          var saveBtn = document.getElementById('saveBtn').disabled;
          if(adminValidateVal == 1234){
            console.log('Passwrod Correct');
            document.getElementById('saveBtn').disabled = false;
          }
          else {
            console.log('Password is not correct');
            document.getElementById('saveBtn').disabled = true;
          }
        }
        </script>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>

	<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '<?php echo date('Y-m-d');?>',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {

				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},


			eventRender: function(event, element) {
          var DELAY = 500, clicks = 0, timer = null;
        element.bind('click', function() {
          clicks++;  //count clicks

       if(clicks === 1) {

           timer = setTimeout(function() {
             if(event.title == "FIBO Visiting Reservation" && event.color == "#008000"){
               window.location.href = 'Booking.php';

             }  //perform single-click action
               clicks = 0;             //after action performed, reset counter

           }, DELAY);

       } else {

           clearTimeout(timer);    //prevent single-click action
           clicks = 0;             //after action performed, reset counter
       }

     })
      .on("dblclick", function(){
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},


			eventDrop: function(event, delta, revertFunc) {

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) {

				edit(event);

			},

      eventAfterRender: function (event, element, view) {
        var todaydate = new Date();
        if (event.start.format('YYYY-MM-DD HH:mm:ss') < todaydate && event.end.format('YYYY-MM-DD HH:mm:ss') < todaydate) {
            event.color = "#000";
            element.css('background-color', "#000");
          }
      },

			events: [
			<?php foreach($events as $event):


				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
          }
			?>

				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach;?>
			]
		});

		function edit(event){
      var passcode;
      var password2="1234";
      passcode=prompt('Please enter your password',' ');
      if (password2==passcode){
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
  			if(event.end){
  				end = event.end.format('YYYY-MM-DD HH:mm:ss');
  			}else{
  				end = start;
  			}

  			id =  event.id;

  			Event = [];
  			Event[0] = id;
  			Event[1] = start;
  			Event[2] = end;

  			$.ajax({
  			 url: 'editEventDate.php',
  			 type: "POST",
  			 data: {Event:Event},
  			 success: function(rep) {
           if (rep == 'OK'){
             alert('Saved');
           }
           else{
             alert('Could not be saved. try again.');
          }
  			}
  			});
      }
      else{
        alert('Could not be saved. try again.');
      }
		}
	});
</script>

</body>

</html>
