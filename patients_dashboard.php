<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style>
	    #header
		{
			background:skyblue;
			height:100px;
			text-align:center;
		}
		#pics
		{
			float:right;
			text-align: right;
			border:0px solid red;
			margin:10px 20px 15px 0px;
		}

	
	</style>
</head>
<body>
	<h1 id="header">
	Welcome
	<?php
	    session_start();
		echo $_SESSION["un"];
	?>

<div id="pics">
	     <img src="pphoto/<?php echo $_SESSION['pphoto'];?>" height="80px" width="80px"></img>
		 </div>
	
	</h1>
</body>
</html>