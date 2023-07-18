<html>
<head>
		<title>BAKAS: A Contact Tracing System</title>
		
<style>
.p1{
	padding-top:15px;
	font-family: "Acherus Militant 1";
	padding-right:320px;
}
.p2{
	font-family: "Acherus Militant 1";
	padding-top:55px;
	padding-right:285px;
}
.p3{
	font-family: "Adobe Gothic Std";
	font-size: 40px;
	padding-top:20px;
	margin-bottom:0px;
}
.p4{
	font-family: "Acherus Militant 1";
	font-size: 20px;
}
.p5{
	font-family: "Acherus Militant 1";
	font-size: 18px;
}
.shape{
	border-radius:25px;
	text-align:center;
    background-color:#33A9AB;
    width:500px;
    height:547px;
	color:white;
	margin:auto;
	position:relative;
}
.centerUser{
	display: block;
	position: absolute;
	margin-left: 60px;
	margin-top: -5px;
	width: 75%;
	padding: 8px 15px;
	box-sizing: border-box;
	border-radius: 10px;
	border-style:solid;
	background-image:url(images/emailicon.png);
    background-position:right;
    background-size:42px;
	background-repeat:no-repeat;
}

.centerPass{
	display: block;
	position: absolute;
	margin-left: 60px;
	margin-top: 0px;
	width: 75%;
	padding: 8px 15px;
	box-sizing: border-box;
	border-radius: 10px;
	border-style:solid;
	background-image:url(images/passicon.png);
    background-position:right;
    background-size:42px;
	background-repeat:no-repeat;
}
.cenImg{
	display: block;
	margin-left: auto;
	margin-right: auto;
    padding-top: 19px;

}

.miniImg1{
	position: relative;
	margin-left: 335px;
	margin-bottom:0;
	z-index: 1;
}
.miniImg2{
	position: relative; 
	margin-left: 335px;
	margin-bottom:0;
	z-index: 1;
}

.btn1{
	font-family: "Acherus Militant 1";
	font-size: 17px;
	width: 150px;
	height:28px;
	border-radius: 7px;
	margin-top:95px;
	margin-right:15px;
	border-style:none;
	cursor: pointer;
}
.btn2{
	font-family: "Acherus Militant 1";
	font-size: 17px;
	width: 150px;
	height:28px;
	border-radius: 7px;
	margin-top:35px;
	margin-left:15px;
	border-style:none;
	cursor: pointer;
}
.register:link{
	color: white;
	background-color: transparent;
	text-decoration: none;
}

.register:visited{
	color: white;
	background-color: transparent;
	text-decoration: none;
}

.register:hover{
	color: black;
	background-color: transparent;
	text-decoration: underline;
}
.showPW{
	position: absolute;
	margin-left: -199px;
	margin-top: 55px;
	width: 75%;
	padding: 8px 15px;
}
.show{
	display: block;
	position: absolute;
	margin-left: -57px;
	margin-top: 44px;
	width: 75%;
	padding: 8px 15px;
	font-family: "Acherus Militant 1";
}

</style>
</head>	

<!-- For Users -->

	<body style="background-color:#FFF9E7;">
		
		<img src="images/logo.png" width="330px" alt="BAKAS" class="cenImg"/>
		<div class="shape">	
			<p class = "p3"> LOGIN</p>
			<hr style="width:75%;margin-left:auto;margin-right:auto;"/>
			<p class = "p4"> Sign in to access your account.</p>
			
			<form action="userLoginProcess.php" method="POST">
			<p class = "p1">Email:</p> 
			<input type="email" name="email" required placeholder="Enter Email" class="centerUser" />
			
			<p class = "p2">Password:</p>
			<input type="password" required name="password" placeholder="Enter Password" class="centerPass" id="pword"/>
			
			
			<input type="hidden"  name="idNum"  class="centerPass" />
			<input type="hidden"  name="firstName"  class="centerPass" />
			<input type="hidden"  name="lastName"  class="centerPass" />
			<input type="hidden"  name="gender"  class="centerPass" />
			<input type="hidden"  name="contactNum"  class="centerPass" />
			<input type="hidden"  name="street"  class="centerPass" />
			<input type="hidden"  name="barangay"  class="centerPass" />
			<input type="hidden"  name="city"  class="centerPass" />
			
			<p class = "show">Show Password </p>
			<input type="checkbox" onclick="myFunction()" class="showPW"/>
			
			<input type="submit" name="signIn_btn" value="Sign In" class="btn1" src="signin.png"/> 
			<input type="button" name="cancel" value="Cancel" class="btn2" src="cancel.png" onclick="location.href='userSelection.php';"/>
			
			<hr style="width:75%;margin-left:auto;margin-right:auto;margin-top:35px;"/>
			<p class = "p5"><a href="userRegistration.php" class="register">Click here to Register</a></p>
			</form>
		</div>
		
			<script>
	function myFunction() {
	var x = document.getElementById("pword");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
	}
	</script>
	
	</body>
</html>