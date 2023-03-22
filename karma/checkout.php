<?php
session_start();

if(isset($_SESSION['userid'])){
	include_once('connect.php');
	$rs=mysqli_query($connect,"SELECT * FROM users WHERE Userid='".$_SESSION['userid']."'");
	$row=mysqli_fetch_assoc($rs);
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
   <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/faviti.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Faviti Shop</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Form.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		function checkOrder(){
			var firstname=$('#c_fname').val(),lastname=$('#c_lname').val();
			var company=$('#c_companyname').val(),city=$('#c_city').val();
			var address= $('#c_address').val();
			var email=$('#c_email_address').val(),phone=$('#c_phone').val();
			var notes=$('#c_order_notes').val();
			var flag=true;
			var testemail=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+\.\w{2,4}$/;
			var testphone=/^(08|09|03|07|05)\d{8}$/;
			if(firstname=="" || lastname=="" || email=="" || address=="" || phone=="" ||city==""){
				//$("#c_fname").addClass("ui-state-error");
				$("form[name='order'] input").each(function(){
					if($(this).val()==""){
						$(this).addClass("ui-state-error");
					}
				});
				if(city==""){
					$("form[name='order'] select[id='c_city']").addClass("ui-state-error");
				}
				flag=false;
			}
			if(!testemail.test(email)){
				alert("Email invalid !!!");
				$('#c_email_address').addClass("ui-state-error");
				flag=false;
			}		
			if(!testphone.test(phone)){
				alert("Phone invalid !!!");
				$('#c_phone').addClass("ui-state-error");
				flag=false;
			}
			return flag;
		}
			function checkLogin(){
			var tk=$("#dn_username").val();
			var mk=$("#dn_password").val();
			var flag=true;
			$("#log-in-form input.form-control").each(function(){
				if($(this).val()==""){
					$(this).addClass('ui-state-error');
					flag=false;
				}
			});
			if(flag==false){
				return flag;
			}
			$.ajax({
				url:"xulydangnhap.php",
				type:"post",
				data:{username:$("#dn_username").val(),password:$("#dn_password").val()},
				success:function(data){
					//alert(data);
					if(data==0){	
						$(".error-1").html("Username or password Invalid. Please try again.");
						$(".error-1").fadeIn(300);
						return false;
					}
					if(data==3){
						//alert(data);
						window.location.reload();
						
					}else{
						alert("Connect Admin page");
						window.location.href="admin/index.php";			}
				}
			});
			return false;
		}
		function checkSignup(){
			var flag=true;
			$("form#registration-form input").each(function(){
				if($(this).val()==""){
					$(this).addClass("ui-state-error");
				}
			});
			var testemail=/^[0-9A-Za-z]+[0-9A-Za-z_.-]*@[\w\d.]+\.\w{2,4}$/;
			var testphone=/^(08|09|03|07|05)\d{8}$/;
			var testmk=/([a-z,0-9,A-Z]){5,}$/;
			if(!testemail.test($("#dk_email").val())){
				$("#dk_email").addClass("ui-state-error");
				$("#dk_err_email").html("Email Invalid. ");
				$("#dk_err_email").fadeIn(300);
				flag=false;
			}
			if(!testphone.test($("#dk_phone").val())){
				$("#dk_phone").addClass("ui-state-error");
				$("#dk_err_phone").html("Phone Invalid");
				$("#dk_err_phone").fadeIn(300);
				flag=false;
			}
			if(!testmk.test($("#dk_password").val())){
				$("#dk_password").addClass("ui-state-error");
				$("#dk_err_password").html("Password more than 5 characters and not special characters");
				$("#dk_err_password").fadeIn(300);
				flag=false;
			}
			if($("#dk_password").val()!=$("#dk_repassword").val()){
				$("#dk_repassword").addClass("ui-state-error");
				$("#dk_err_repassword").html("Password does not match");
				$("#dk_err_repassword").fadeIn(300);
				flag=false;
			}
			if(flag==false) return flag;
			
			$.ajax({
				type:"post",
				url:"xulydangky.php",
				data:{fname:$("#dk_fname").val(),lname:$("#dk_lname").val(),email:$("#dk_email").val(),phone:$("#dk_phone").val(),
					 username:$("#dk_username").val(),password:$("#dk_password").val()},
				success:function(data){
					//alert(data);
					if(data==0){
						var tk=$("#dk_username").val(),mk=$("#dk_password").val();
						$("#registration-form").fadeOut(300);
						$("html body").append('<div id="popup_login" style="border: double 2px;width: 350px;height: 200px;position: fixed;top: 30%;left: 38%;z-index:15001;background: white;"><img src="img/success.jpg" alt="" width="50px" height="50px" style="border-radius: 50%; opacity: 1;margin-left: 150px;margin-top: 20px"><h2><p style="margin-left: 40px;margin-top: 20px">Registration success.</p></h2><input id="bt_loginnow" type="button" style="background: #FF0004;color: white;width: 120px;height: 40px;margin-left: 110px;" value="Login now"></input></div>');
						
					}else{
						if(data.indexOf("1")!=-1){
							$("#dk_err_email").html("Email already exists");
							$("#dk_err_email").fadeIn(300);
						}
						if(data.indexOf("2")!=-1){
							$("#dk_err_phone").html("Phone numbers already exists");
							$("#dk_err_phone").fadeIn(300);
						}
						if(data.indexOf("3")!=-1){
							$("#dk_err_username").html("Username already exists");
							$("#dk_err_username").fadeIn(300);
						}
					}
				}
			});
			
			
			return false;
		}
		function checkinfo()
		{
			"use strict";
			var testemail=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+\.\w{2,4}$/;
			var testphone=/^(08|09|03|07|05)\d{8}$/;
			var flag=true;
			$("form#info input").each(function(){
				if($(this).val()==""){
					$(this).addClass("ui-state-error");
					$(this).focus();
					return false;
				}
			});
			if(!testemail.test($("#infoemail").val())){
				$("#infoemail").addClass("ui-state-error");
				$("#info_err_email").html("Email Invalid. ");
				$("#info_err_email").fadeIn(300);
				flag=false;
			}
			if(!testphone.test($("#infophone").val())){
				$("#infophone").addClass("ui-state-error");
				$("#info_err_phone").html("Phone Invalid");
				$("#info_err_phone").fadeIn(300);
				flag=false;
			}
			if(flag==true){
				flag=confirm("Do you Edit User ?");
			}
			else{
				return false;
			}
			if(flag==false){
				return flag;
			}
			
			$.ajax({
				type:"post",
				url:"admin/edituser.php",
				data:{user:0,firstname:$("#infofirstname").val(),lastname:$("#infolastname").val(),
				  email:$("#infoemail").val(),phone:$("#infophone").val()},
				success:function(data){
					//alert(data);
					if(data.indexOf("1")!=-1)
						{
							alert("ERROR:Phone already exists");
							$("#infophone").addClass("ui-state-error");
							$("#infophone").focus();
							$("#info_err_phone").html("Phone Invalid");
							$("#info_err_phone").fadeIn(300);
							
						}
					if(data.indexOf("2")!=-1)
						{
							alert("ERROR:Email already exists");
							$("#infoemail").addClass("ui-state-error");
							$("#infoemail").focus();
							$("#info_err_email").html("Email Invalid. ");
							$("#info_err_email").fadeIn(300);
							
						}
					if(data==0)
						{
							alert("UPLOAD SUCCESSFULLY");
							window.location.reload();
						}
				}
			});
			
			return false;
			
		}
		$(document).ready(function(){
			$("form input").mousedown(function(){
				$(".error-1").fadeOut(300);
				
			});
			$("form input").keyup(function(){
				$(this).removeClass("ui-state-error");
			});
			$("form input").change(function(){
				$(this).removeClass("ui-state-error");
			});
			$("#dk_repassword").keyup(function(){
				$("#dk_err_repassword").fadeIn(300);
				$("#dk_err_repassword").removeClass("text-success");
				if($("#dk_password").val()!=$("#dk_repassword").val()){
					$("#dk_repassword").addClass("ui-state-error");
					$("#dk_err_repassword").html("Password does not match");
				}
				else{
					$("#dk_repassword").removeClass("ui-state-error");
					$("#dk_err_repassword").addClass("text-success");
					$("#dk_err_repassword").html("Password matches");
				}
			});
			$(document).on("click","#bt_loginnow",function(){
				$.ajax({
					type:"post",
					url:"xulydangnhap.php",
					data:{username:$("#dk_username").val(),password:$("#dk_password").val()},
					success:function(){
						window.location.reload();
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			"use strict";
			$('#btsignin').click(function(){
		var sign="#log-in-form";
		$(sign).fadeIn(300);
		$('body').append('<div id="over"></div>');
		$('#over').fadeIn(300);
		return false;
		});
	$(document).on('click',"#over,.cancel-btn",function(){
		$('#over,#log-in-form,#registration-form,#info').fadeOut(300,function(){
			$('#over').remove();
			$('#popup_login').remove();
		});
		return false;
	});
	$('#noacc').click(function(){
		$('#registration-form').fadeIn(300);
		$('#log-in-form').fadeOut(300);
		return false;
	});
	$('#haveacc').click(function(){
		$('#registration-form').fadeOut(300);
		$('#log-in-form').fadeIn(300);
	});
	
	$("#logout").click(function(){
		$.ajax({
			url:"xulydangnhap.php",
			type:"post",
			data:{logout:1},
			success:function(){
				window.location.reload();
			}
		});
	});
	$("form[name='order'] input").keyup(function(){
		$(this).removeClass("ui-state-error");
	});
	$(document).on("click","#name",function(){
	
		$("#info").fadeIn(300);
		$('body').append('<div id="over"></div>');
		$('#over').fadeIn(300);
		});			
		});
	</script>	
</head>

<body>
<form class="form-info" action="" onSubmit="return checkinfo();"  id="info" name="info" method="post" >
					<h1 align="center">Thông Tin Cá Nhân</h1>
					
					<hr>
		 			 <div class="form-group row">
							<div class="col-md-6">
								<label for="infofirstname"> <b>Họ</b> </label>
								<input id="infofirstname" type="text" placeholder="Last Name" name="firstname" class="form-control" value="<?php 
					  		if(isset($_SESSION['isLogin'])){
								if($_SESSION['isLogin']==1){
									echo $_SESSION['firstname'];
								}  
						}
					  ?>">
								<div class="error">Invalid information</div>
							</div>
							<div class="col-md-6">
								<label for="infolname"> <b>Tên</b> </label>
								<input id="infolastname" type="text" placeholder="Name" name="lastname" class="form-control" value="<?php 
					  		if(isset($_SESSION['isLogin'])){
								if($_SESSION['isLogin']==1){
									echo $_SESSION['lastname'];
								}  
						}
					  ?>">
								<div class="error">Invalid information</div>
							</div>
						</div>
						
						
					<div class="form-group">
						<div class="col-md-11">
							<label for="infousername"><b> Username</b></label>
							<input id="infousername" type="text" placeholder="Username" name="username" class="form-control" value="<?php 
					  		if(isset($_SESSION['isLogin'])){
								if($_SESSION['isLogin']==1){
									echo $_SESSION['username'];
								}  
						}
					  ?>" readonly disabled>

						</div>
					</div>
					<div class="form-group">
						<div class="col-md-11">
							<label for="infopassword"><b> Password </b></label>
							<input id="infopassword" type="password" placeholder="Password" name="password" class="form-control" value="password" readonly disabled>
								<div class="error-1">Invalid information</div>
						</div>
					</div>
		  		<div class="form-group row">
							<div class="col-md-6">
								<label for="infoemail" > <b> Email </b></label>
								<input id="infoemail" type="text" placeholder="Email" name="email" class="form-control" value="<?php 
					  		if(isset($_SESSION['isLogin'])){
								if($_SESSION['isLogin']==1){
									echo $_SESSION['Email'];
								}  
						}
					  ?>">
								<div class="error-1" id="info_err_email">Invalid information</div>
							</div>
							<div class="col-md-6">
								<label for="infophone"><b>SĐT </b></label>
								<input id="infophone" type="text" placeholder="Phone number" name="phone" class="form-control" value="<?php 
					  		if(isset($_SESSION['isLogin'])){
								if($_SESSION['isLogin']==1){
									echo $_SESSION['phone'];
								}  
						}
					  ?>">
								<div class="error-1" id="info_err_phone">Invalid information</div>
							</div>
						</div>
						<div align="center" class="selection-box">
							<input type="submit" id="submitupload" name="submitUpload" value="UPLOAD">
						</div>
	</form>
	  
	  
				<form class="form-dangnhap " action="" onSubmit="return checkLogin();"  id="log-in-form" name="log-in-form" method="post">
					<h1>Đăng Nhập</h1>
					<p>Nhập username và password để đăng nhập</p>
					<hr>
					<div class="form-group">
						<div class="col-md-11">
							<label for="dn_username"><b> Username</b></label>
							<input id="dn_username" type="text" placeholder="Username" name="username" class="form-control">
<!--								<div class="error-1">Invalid information</div>-->
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-11">
							<label for="dn_password"><b> Password </b></label>
							<input id="dn_password" type="password" placeholder="Password" name="password" class="form-control">
								<div class="error-1">Invalid information</div>
						</div>
					</div>
						<div class="selection-box">
							<input type="button" class="cancel-btn" id="cancel-log-in" value="Thoát">
							<input type="submit" id="a" name="log-in-submit" value="Đăng Nhập">
							<div class="no-hope">
								
								<a href="#"> <h6 id="noacc"> Đăng ký tại đây!!</h6> </a>
							</div>
						</div>
				</form>
	  
			
					<form class="form-dangnhap" onSubmit="return checkSignup()" id="registration-form" name="registration-form" method="post">
						<h1>Tạo Tài Khoản</h1>

						<hr>
						
						<div class="form-group row">
							<div class="col-md-6">
								<label for="dk_fname"> <b>Họ</b><span class="text-danger">*</span> </label>
								<input id="dk_fname" type="text" placeholder="Last Name" name="firstname" class="form-control">
								<div class="error">Invalid information</div>
							</div>
							<div class="col-md-6">
								<label for="dk_lname"> <b>Tên</b><span class="text-danger">*</span> </label>
								<input id="dk_lname" type="text" placeholder="Name" name="lastname" class="form-control">
								<div class="error">Invalid information</div>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-md-6">
								<label for="dk_email" > <b> Email </b><span class="text-danger">*</span></label>
								<input id="dk_email" type="text" placeholder="Email" name="email" class="form-control">
								<div class="error-1" id="dk_err_email">Invalid information</div>
							</div>
							<div class="col-md-6">
								<label for="dk_phone"><b>SĐT </b><span class="text-danger">*</span></label>
								<input id="dk_phone" type="text" placeholder="Phone number" name="phone" class="form-control">
								<div class="error-1" id="dk_err_phone">Invalid information</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label for="dk_username"> <b> Username </b><span class="text-danger">*</span>
									<i style="font-size: 14px; padding-left:5px"></i> </label>
								<input id="dk_username" type="text" placeholder="Username" name="username" class="form-control">
								<div class="error-1" id="dk_err_username">Invalid information</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="dk_password"> <b>Password</b><span class="text-danger">*</span> 
								<i style="font-size: 14px; padding-left:5px">(Minimum 5 characters)</i> </label>
								<input id="dk_password" type="password" placeholder="Password" name="password" class="form-control">
								<div class="error-1" id="dk_err_password">Invalid information</div>
							</div>
							<div class="col-md-6">
								<label for="dk_repassword"> <b>Nhập lại password</b><span class="text-danger">*</span> </label>
								<input id="dk_repassword" type="password" placeholder="Retype password" name="psw-repeat" class="form-control">
								<div class="error-1" id="dk_err_repassword">Invalid information</div>
							</div>
						</div>
						
						<div class="selection-box">
							<input type="submit" name="log-in-submit" value="Đăng Ký">
							<input type="button" class="cancel-btn" id="cancel-log-in" value="Thoát">
							
						</div>
						<div class="no-hope">
								<a href="#"> <h6 id="haveacc"> Đăng nhập tại đây!!</h6> </a>
					  	</div>
					</form>	
    <!-- Start Header Area -->
	<header class="header_area sticky-header">
	<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/faviti.png" alt="" width="70" height="70"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item "><a class="nav-link" href="index.php">Trang chủ</a></li>
							<li class="nav-item "><a class="nav-link" href="category.php">Sản phẩm</a></li>
							<?php
								if(isset($_SESSION['isLogin'])){
									if($_SESSION['role']!=3){
										echo '<li class="nav-item"><a href="admin/index.php" class="nav-link">Admin</a></li>';
									}  
								}
							?>
							<li class="nav-item"><a class="nav-link" href="contact.php">Giới thiệu</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item">
					  <?php
					  if(isset($_SESSION['isLogin'])){
						  if($_SESSION['isLogin']==1){
							  echo '<a href="" id="logout"><span class="ti-power-off"></span>';
						  }
					  }
					  else{
						  echo '<a href="" id="btsignin"><span class="ti-user"></span>';
					  }
					  ?>
					  </a>
					  <?php
					  if(isset($_SESSION['isLogin'])){
						  if($_SESSION['isLogin']==1){
							  echo '<a href="#" id="name"> Hello, '.$_SESSION['nameLogin'].'</a>';
						  }
					  }
					  ?>
					  </li>
							<li class="nav-item "><a href="cart.php" class="cart"><span class="ti-bag"></span>
							<span class="count"><?php $count=0; if(isset($_SESSION['cart'])){foreach($_SESSION['cart'] as $k=>$v)$count+=$v;}; echo ($count) ?></span>	</a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Thanh Toán</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Thanh Toán</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
					<form name="order" method="post" onSubmit="return checkOrder();" action="addOrder.php">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Thông Tin Người Nhận</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group col-md-12">
                <label for="c_city" class="text-black">Tỉnh/Thành Phố <span class="text-danger">*</span></label>
                <select id="c_city" name="c_city" class="form-control col-md-12">
				  <option value="">Chọn</option>
				  <option value="Da Nang">Da Nang</option>                      
                  <option value="Ho Chi Minh">Ho Chi Minh City</option>    
                  <option value="Ha Noi">Ha Noi </option>                        
                  <option value="Hue">Hue</option>    
                  <option value="Thai Binh">Thai Binh</option>    
                  <option value="Vung Tau">Vung Tau</option>
					<option value="Nha Trang">Nha Trang</option>  
                </select>
              </div>
                <div class="col-md-12">
                  <label for="c_fname" class="text-black">Họ <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname" value="<?php if(isset($_SESSION['userid'])){ echo $row['Firstname'];} ?>">				
                </div>
                <div class="col-md-12">
                  <label for="c_lname" class="text-black">Tên <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname" value="<?php if(isset($_SESSION['userid'])){ echo $row['Lastname'];} ?>">
                </div>
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Tên công ty </label>
                  <input type="text" class="form-control" id="c_companyname" name="c_companyname">
				</div>
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Địa chỉ <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address">
              </div>
                <div class="col-md-12">
                  <label for="c_email_address" class="text-black">Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address" value="<?php if(isset($_SESSION['userid'])){ echo $row['Email'];} ?>">
                </div>
                <div class="col-md-12">
                  <label for="c_phone" class="text-black">Số Điện Thoại <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" value="<?php if(isset($_SESSION['userid'])){ echo $row['Phone'];} ?>">
                </div>
              <div class="form-group">
                <label for="c_order_notes" class="text-black">Ghi Chú Cho Shop</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" ></textarea>
              </div>
            </div>
          </div>
                                  <div class="col-lg-4 mt-5">
                        <div class="order_box">
                            <h2>Thông Tin Thanh Toán</h2>
                            <ul class="list">
                                <li><a href="#">Sản Phẩm <span>Total</span></a></li>
								<?php
								include_once('connect.php');
								$str="";$total=0;
								if(isset($_SESSION['cart'])){
									foreach($_SESSION['cart'] as $k=>$v){
										if(isset($_SESSION[$k])){
											foreach($_SESSION[$k] as $sz=>$sl){
												$results=mysqli_query($connect,"SELECT * FROM products WHERE ID='$k'");
												$row=mysqli_fetch_assoc($results);
												$str.='<li>';
												$str.='<a><strong>'.$row["NAME"].' (size '.mb_strtoupper($sz,"utf8").')</strong></a><a><span class="middle">x'.$sl.'</span>';
												$str.='<span class="last">$'.($row["PRICE"]*$sl).'</span>';
												$str.='</a></li>';
												$total+=($row["PRICE"]*$sl);
											}
										}
									}
								}
						  		echo $str;
	    						?>
                            </ul>
                            <ul class="list list_2">
                                <li><a>Tổng <span>$<?php echo($total); $_SESSION['cart']['total']=$total; ?></span></a></li>
                            </ul>
                        </div>
													<div class="form-group">
                    			<button type="submit" class="btn btn-primary btn-lg py-3 btn-block mt-3">Đặt Hàng</button>
                  			</div>	
                    </div>
        </div>
	</form>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>CSKH</h6>
					<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h6><font color="#FFFFFF">VietNam, Ho Chi Minh city</font></h6>
							<p>273 An Dương Vương, Phường 3, Quận 5</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h6><font color="#FFFFFF">(+84) 767 328 271</font></h6>
							<p>Thứ 2 đến Thứ 6 từ 9:00 đến 18:00<p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h6><font color="#FFFFFF">ATBMHTTT@gmail.com</font></h6>
						</div>
					</div>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Nhận thông tin</h6>
						<p>Để lại email của bạn để nhận thông tin về sản phẩm mới nhất</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter Email '"
									 required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

									<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instagram Feed</h6>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="img/i1.jpg" alt=""></li>
							<li><img src="img/i2.jpg" alt=""></li>
							<li><img src="img/i3.jpg" alt=""></li>
							<li><img src="img/i4.jpg" alt=""></li>
							<li><img src="img/i5.jpg" alt=""></li>
							<li><img src="img/i6.jpg" alt=""></li>
							<li><img src="img/i7.jpg" alt=""></li>
							<li><img src="img/i8.jpg" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Fanpage</h6>
						<div class="footer-social d-flex align-items-center">
							<a href="https://www.facebook.com/groups/atbmhttt.07.sgu"><i class="fa fa-facebook"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
    <!-- End footer Area -->


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>