<?php
	session_start();
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
<title>
POS
</title>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
	  .ll {
	  padding-left:42%;
	  margin-bottom:10px;
	  }
	  .mm {
	  padding-left:47%;
	  margin-bottom:10px;
	  }
	  .button {
      background-color: #4CAF50;
      color: white;
      text-align: center;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
}
.bodi {
  background-image:url(main/images/covid.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
    </style>
    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">
<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body class="bodi">
<div id="login">
<form action="login.php" method="post">

			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 15px #000; color:#fff;"><center>Input Data Covid</center></font>
		<br>

		
<div class="ll">
<input style="height:40px;" type="text" name="username" Placeholder="Username" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><br>
</div>
<div class="ll">
<input type="password" style="height:40px;" name="password" Placeholder="Password" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><br>
</div>
<div class="mm">
<button class="button" href="dashboard.html" type="submit">Login</button>
</div>
		 </form>
</div>
</div>
</div>
</div>
</body>
</html>