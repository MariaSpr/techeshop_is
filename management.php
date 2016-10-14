<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TechEStore Management Console</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" href="css/fileinput.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
  <script type="text/javascript" src="js/moment.js"></script>
  <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/fileinput.js" charset="utf-8"></script>
<!--   <script type="text/javascript" src="js/transition.js"></script>
<script type="text/javascript" src="js/collapse.js"></script> -->
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="management.php">TechEshop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Αποθήκη<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" onclick="$('#maincontent').load('search.php')">Αναζήτηση</a></li>
            <li><a href="#" onclick="$('#maincontent').load('add.php')">Προσθήκη</a></li>
            <li><a href="#" onclick="$('#maincontent').load('remove.php')">Αφαίρεση</a></li>
			      <li><a href="#" onclick="$('#maincontent').load('change.php')">Αλλαγή</a></li>
          </ul>
        </li>
        <li><a href="#" onclick="$('#maincontent').load('reciept.php')">Απόδειξη</a></li>
		    <li><a href="#" onclick="$('#maincontent').load('recycle.php')">Ανακύκλωση</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $login_session; ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logοut</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" id="maincontent" style="margin-top:50px">
    <h3>TechEshop Management Console</h3>
  <p>Καλώς ορίσατε στο σύστημα διαχείρισης του TechEStore.</p>
  <p>Επιλέξτε κάτι από το μενού για να ξεκινήσετε.</p>
</div>

</body>
</html>
