<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login For Design</title>
	<style>	
body
{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
	letter-spacing: 1px;
}
.container{
	width: 100%;
	height: 750px;
	background-image: url(hospital.png);
	background-size: 100% 100%  ;
	background-repeat: no-repeat;

}

.Login
{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 340px;
	height: 400px;
	padding: 80px 40px;
	box-sizing: border-box;
	background: rgba(0,0,0,0.5);

}form{
	margin:0px 0px 0px 0px ;
}

.login:before
{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 50%;
	height: 100;
	background: pink;
	pointer-events: none;

}
.logo{
	width: 150px ;
	height: 150px;
	background-image: url(logo.png);
	background-size: 100% 100%;
	background-repeat: no-repeat;

	margin:-90px 0px 0px 47px ;
	color: white;
	
}

h2
{
	margin:-35px 0px 0px -15px ;
	padding: 0 0 20px;
	font-size: 32px;

	color: #efed40;
	text-align: center;

}
.Login p
{
	margin: 0;
	font-weight:bold; 
	color: #afff;	
}
.login input
{
	width: 100%;
	margin-bottom: 20px;
}
.Login input[type="text"],
 input[type="password"]
{
	border: none;
	border-bottom: 1px solid #fff;
	background: rgba(0,0,0,0.3);
	outline: none;
	color: #fff;
	font-size: 16px;
	height: 40px;
}
.Login input[type="submit"]
{
	border: none;
	outline: none;
	color: #262626;
	background: #efed40;
	cursor: pointer;
	border-radius: 20px;
	height: 40px;
	font-size: 16px;
	margin: 15px 0px 0px 0px ;

}
.sign{
	margin: 10px 0px 0px 0px ;
	
	
}

.Login input[type="submit"]:hover
{
	background: #efed89;
	color: #405628;
}
.Login a
{
	color: #ffff;
	font-size: 14px;
	font-weight: bold;
	text-decoration: none;
}
.login a:hover
{
	color: #efed40;
}

	</style>
</head>


<body>
	<div class="container">
	<div class="Login">
		<div class="logo"></div>
		<h2>Login</h2>
		<form name="f1" method="post" onsubmit="return xyz()">
			<p>Email address</p>
			<input type="text" name="txtuname" placeholder="Enter your  email">
			<p>password</p>
			<input type="password" name="txtupass" placeholder="**********">
			<input type="submit" name="b1" value="sign in">
			<a href="#">forget password</a>
			<div class="sign"><a href="patients_signup.php">Sign up</a></div>
		</form>
		</div>
		</div>

		<?php
		if(isset($_POST["b1"]))
		{
			$a=$_POST["txtuname"];
			$b=$_POST["txtupass"];
			$con=mysqli_connect("localhost","root","","hospitaldb");
			if($con)
			{
				$q="select * from patients where pemail='$a' and ppassword='$b'";
				$r=mysqli_query($con,$q);
				$c=mysqli_num_rows($r);
								if($c>0)
								{
									session_start();
									$_SESSION["un"]=$a;
									while($f=mysqli_fetch_array($r))
									{
										$pphoto=$f[6];
									}

									$_SESSION["pphoto"]=$pphoto;
									
									header("Location:patients_dashboard.php");
								}
								else
								{
									echo "Invalid Login";
								}
							}
							else
							{
								echo "Not connect";
							}
						mysqli_close($con);
						}
				
					?>



<script>
	function xyz()
	{
		if(document.f1.txtuname.value=="")
		{
			alert("Email address/User id should not be blank")
			return false;
		}
		else if(document.f1.txtupass.value=="")
		{
			alert("Password should not be blank")
			return false;
		}
		else
		{
			return true;
		}
	}
</script>

</body>
</html>