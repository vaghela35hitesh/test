<!DOCTYPE html>
<html>
<head>
	<title>Task 2</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<style type="text/css">
	.card{
		background-color: #eee;
		margin: 10%;
		text-align: center;
		padding: 3%;
	}
	input {
		margin-top: 8px;
	}
	#submit{
		background-color: #a09595;
		color: #fff;
	}
	span{
		color: red;
	}
</style>
<body>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
								<h1>Task 2</h1>
							<form method="post" name="send_data" id=send_data>
								<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" maxlength="20">
								<span id="ename" class="error"></span>
								<input type="number" name="age" id="age" min="0" placeholder="Age" class="form-control">
								<span id="eage" class="error"></span>
								<input type="textarea" name="address" id="address" placeholder="Address" class="form-control" maxlength="100">
								<span id="eaddress" class="error"></span>
								<input type="number" name="mobile" min=1 id="mobile" placeholder="Mobile" class="form-control">
								<span id="emobile" class="error"></span>
								<input type="submit" name="Submit" id="submit" class="form-control">
								<span id="result" class="error"></span>
							</form>
					</div>
				</div>

			</div>
		</div>
	</section>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">

	$("#send_data").submit(function(event){
		event.preventDefault();

		var name=$("#fname").val();
		var age=$("#age").val();
		var address=$("#address").val();
		var mobile=$("#mobile").val();

		var success=true;

		$(".error").hide();

		if(name==""){
			$("#ename").text("Please Enter a First Name");
			$("#ename").show();
			success=false;
		}
		if(age==""){
			$("#eage").show();
			$("#eage").text("Please Enter a Age");
			success=false;
		}
		if(address==""){
			$("#eaddress").show();
			$("#eaddress").text("Please Enter a Address");
			success=false;
		}
		if(mobile==""){
			$("#emobile").show();
			$("#emobile").text("Please Enter a Mobile");
			success=false;
		}
		if(age.length>3){
			$("#eage").show();
			$("#eage").text("Please Enter a Valid Age");
			success=false;
		}
		if(mobile.length!=10){
			$("#emobile").show();
			$("#emobile").text("Please Enter a Valid Mobile");
			success=false;
		}

		var form_data=new FormData(this);
		// alert(form_data);

		if(success==true){

		 $("#result").html('Processing...');
         $("#result").show();
         $("#result").css("color", "blue");

         $.ajax({
         	url: "send_ajax.php",
         	type: "POST",
         	data: form_data,
         	processData: false,
			contentType: false,
         	success: function(dataArray){

         		 $("#result").html(dataArray);
         	}

         });

		}


	});
</script>
</html>