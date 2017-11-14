<!DOCTYPE html>
<html>
	<head>
		<script>var number = 0; </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
		<script src="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.css">
		<script>

			function clearFields(element){
				console.log(element.id);
				if (element.id == "searchlastname"){
					$("#searchfirstname").val(""); 
					$("#searchemail").val(""); 
				}
				else if (element.id == "searchfirstname"){
					$("#searchlastname").val(""); 
					$("#searchemail").val(""); 
				}
				else if (element.id == "searchemail"){
					$("#searchfirstname").val(""); 
					$("#searchlastname").val(""); 
				}
				$("#firstname").val(""); 
				$("#lastname").val(""); 
				$("#email").val(""); 
				$("#password").val(""); 
				$("#maleradio").prop('checked',false);
				$("#femaleradio").prop('checked',false);
				$("#financecheckbox").prop('checked',false);
				$("#programmingcheckbox").prop('checked',false);
				$("#managementcheckbox").prop('checked',false);
				$("#phoneNumber").val(""); 
			}


			function submitAjax_register() {

				// var skillsCheckboxes = new Array();
				// $("input:checked").each(function() {
				// 	skillsCheckboxes.push($(this).val());

				// 	data['myCheckboxes[]'].push($(this).val());

				// });

				var data = $('#signupForm').serialize();
				//console.log(data);
				//calling backend php code through Ajax
				$.ajax({
					url: "form.php",
					method: "POST",
					data: {"data" : data },
					success:  function(response){
						$("#ajaxDiv").html("form submitted successfully");
					}					
				}); // end of ajax call
			}

			function submitAjax_fetch() {
				var lastname = $('#searchlastname').val();
				var firstname = $('#searchfirstname').val();
				var email = $('#searchemail').val();
				// console.log("last name is " +lastname +" first name is " + firstname+" email is " + email);
				if (firstname != ""){
					$("#ajaxDiv").html("fetching from database for user: " + firstname);

					$.ajax({
						url: "search.php",
						method: "POST",
						data: {"searchfirstname" : firstname },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call

				}
				else if (lastname != ""){
					$("#ajaxDiv").html("fetching from database for user: " + lastname);

					$.ajax({
						url: "search.php",
						method: "POST",
						data: {"searchlastname" : lastname },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}
				else if (email != ""){
					$("#ajaxDiv").html("fetching from database for user: " + email);

					$.ajax({
						url: "search.php",
						method: "POST",
						data: {"searchemail" : email },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}

				clearFields(this);				
			}

			function submitAjax_delete() {
				var lastname = $('#searchlastname').val();
				var firstname = $('#searchfirstname').val();
				var email = $('#searchemail').val();
				// console.log("last name is " +lastname +" first name is " + firstname+" email is " + email);
				if (firstname != ""){
					$("#ajaxDiv").html("deleting rows where first name: " + firstname);

					$.ajax({
						url: "delete.php",
						method: "POST",
						data: {"searchfirstname" : firstname },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call

				}
				else if (lastname != ""){
					$("#ajaxDiv").html("deleting rows where lastname: " + lastname);

					$.ajax({
						url: "delete.php",
						method: "POST",
						data: {"searchlastname" : lastname },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}
				else if (email != ""){
					$("#ajaxDiv").html("deleting rows where email: " + email);

					$.ajax({
						url: "delete.php",
						method: "POST",
						data: {"searchemail" : email },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}

				clearFields(this);				
			}

		</script>
	</head>
	<body>
		<div class="column small-centered small-6">
			<h1 class="column small-centered"> Sign up Form</h1>
			<form class="small-centered small-12 column " id="signupForm" action=""  >
			<div class="row">
				<div class="small-6 column">
				<label> Enter name
					<input type="text" name="firstname" id="firstname" placeholder="Enter name">
				</label>
				</div>
				<div class="small-6 column">
				<label> Enter last name
					<input type="text"  name="lastname" id="lastname" placeholder="Enter last name">
				</label>
				</div>
			</div>
			<div class="row">
				<div class="small-6 column">
				<label> Enter email (Username)
					<input type="text" name="email" id="email" placeholder="Enter email">
				</label>
				</div>
				<div class="small-6 column">
				<label> Enter password
					<input type="password" name="password" id="password" placeholder="Enter password">
				</label>
				</div>
			</div>

			<div class="row ">
				<div class="small-6 column small-centered">
					<label>Gender</label>
					<input type="radio" name="gender" value="male" checked="checked" id="maleradio"><label for="maleradio">Male</label>
					<input type="radio" name="gender" value="female" id="femaleradio"><label for="femaleradio">Female</label>
				</div>
			</div>

			<div class="row ">
				<div class="small-10 column small-centered">
					<label>Skills</label>
					<input type="checkbox" name="skills" value="finance" id="financecheckbox"><label for="financecheckbox">Finance</label>
					<input type="checkbox" name="skills" value="programming" id="programmingcheckbox"><label for="programmingcheckbox">Programming</label>
					<input type="checkbox" name="skills" value="management" id="managementcheckbox"><label for="managementcheckbox">Management</label>
					</div>
			</div>

			<div class="row">
				<div class="small-10 column">
				<label> Enter phone number
					<input type="text" name="phoneNumber" id="phoneNumber"placeholder="Enter phone number">
				</label>
				</div>
			</div>

			<div class="row">
				<input class="button  small-12 column" id="ajax_register" value="Register" type="button" onclick="submitAjax_register();">
			</div>

			<div class="row ">
				<div class="small-6 column">
					<label>Search by last name
						<input type="text" name="search" id="searchlastname"  placeholder="Search by last name" onfocus="clearFields(this);">
					</label>
				</div>
				<div class="small-6 column">
					<label>Search by first name
						<input type="text" name="search" id="searchfirstname"  placeholder="Search by first name" onfocus="clearFields(this);">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-10 column">
				<label> Search by email
					<input type="text" name="search" id="searchemail"placeholder="Search by email" onfocus="clearFields(this);">
				</label>
				</div>
			</div>

			<div class="row">
			<input class="button  small-6 column" id="ajax_fetch" value="Search" type="button" onclick="submitAjax_fetch();">
			<input class="button  small-6 column alert" id="ajax_delete" value="Delete" type="button" onclick="submitAjax_delete();">
			
			</div>

			</form>
			
			<p id="ajaxDiv"> </p>	
			<?php	 ?>
		</div>
	</body>
</html>