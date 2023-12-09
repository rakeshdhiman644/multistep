<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
include('functions.php'); 
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<script
src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyARURDX-C22NE3W9JnkG0zzyrw48d1_rqQ&callback=initMap&v=weekly"
defer
></script>
<link rel="stylesheet" href="style.css">
<script src="googleapis.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script type="text/javascript">
	function updateURL() {
		if (history.pushState) {
			var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?utm_source=google&utm_medium=conversion&utm_campaign=fl-campaign-11&utm_term=employment-full-stack&utm_content=v7';

			window.history.pushState({path:newurl},'',newurl);
		}
	}
	updateURL();
</script>

<style>
	.min-max label{
		font-size: 14px;
		/*float: left;*/
		/*margin-right: 5px;*/
		line-height: 1.6;    
	}
	.min{
		text-align: center;
		/*float: left;*/    
	}
	/*.max{
		float: right;    
	}*/
	.range-slider {
		width: 100%;
		position: relative;
	}

	.range {
		-webkit-appearance: none;
		width: 100%;
		height: 14px;
		border-radius: 24px;
		background: #ffc60a;
		outline: none;
		padding: 0;
		margin: 0;
	}
	.range::-webkit-slider-thumb {
		-webkit-appearance: none;
		appearance: none;
		width: 25px;
		height: 25px;
		border-radius: 50%;
		background: #fff;
		border:1px solid #ccc;
		cursor: pointer;
		-webkit-transition: background 0.15s ease-in-out;
		transition: background 0.15s ease-in-out;
	}
	.range::-moz-range-thumb {
		width: 20px;
		height: 20px;
		border: 0;
		border-radius: 50%;
		background: #2c3e50;
		cursor: pointer;
		-moz-transition: background 0.15s ease-in-out;
		transition: background 0.15s ease-in-out;
	}
	.min-max{
		width: 90%;
		max-width: 100px;
		margin: 0 auto;
		padding: 0px 0px 15px 0px;   
	}
	.min-max span{
		font-size: 18px;
		text-align: center;
		display: inline-block;    
	}
	.min-max-range{
		display:flex;
	}
	/*
	.min-max-range{
		padding: 30px 0px 20px 0px;    
	}
	.range{
		-webkit-appearance:none;
		appearance:none;
		width: 50%;
		height: 4px;
		max-width: 400px;
		background-color: #6fc06a;
		margin: 0;
		padding: 0;
		outline: none;
		float: left;    
	}
	#min::-moz-range-progress {
		background-color: lightgray; 
	}

	#max::-moz-range-track {  
		background-color: lightgray;
	}
	#max::-moz-range-progress {
		background-color: #6fc06a; 
	}
	.range::-webkit-slider-thumb{
		-webkit-appearance:none;
		appearance:none;
		background-color: #0070BF;
		height: 10px;
		width: 10px;
		border-radius: 50%;
		cursor: pointer;
	}
	.range::moz-range-thumb{
		-webkit-appearance:none;
		appearance:none;
		background-color: #0070BF;
		height: 10px;
		width: 10px;
		border-radius: 50%;
		cursor: pointer;
	}
	.min-max-range input{
		border: unset !important;
	} */
	#name {
		text-transform: capitalize;
	}
	.iti.iti--allow-dropdown {
		width: 100%;
	}
	.c-logo__wrapper {
		cursor: pointer;
	}
	#dots{
        /*text-align:center;
        margin-top:40px;*/
        opacity: 0;
      }
      #tab1 p input{
      	width: 49%;
      }
      .video_section {
      	margin-top: 3rem;
      }
      /* button */
      #button {
      	top: 0; 
      	left: 0;
      	display: inline-block;
      	width: 50px;
      	height: 50px;
      	text-align: center;
      	border-radius: 4px;
      	position: fixed;
      	bottom: 30px;
      	right: 30px;
      	transition: background-color .3s, 
      	opacity .5s, visibility .5s;
      	z-index: 1000;
      }
      #button::after {
      	content: "\f053";
      	font-family: FontAwesome;
      	font-weight: normal;
      	font-style: normal;
      	font-size: 2em;
      	line-height: 50px;
      	color: #ffd95c;
      }
      #button:hover {
      	cursor: pointer;
      	background-color: #333;
      }
      #button:active {
      	background-color: #555;
      }
      #button.show {
      	opacity: 1;
      	visibility: visible;
      }
      @media only screen and (max-width: 767px) {
      	#nextBtn, #prevBtn {
      		font-size: 14px;
      		min-width: 90px;
      		height: 40px;
      	}
      	#prevBtn {
      		margin-right: 6px;
      	}
      	#tab5 .radio-button label .box__wrapper{
      		width: auto;
      		height: auto;
      	}
      	.solar-icon {
      		font-size: 40px;
      	}
      	.compaty-logo .c-logo__wrapper {
      		width: auto;
      		height: auto;
      	}
      	#tab5 .radio-button label .box__wrapper p {
      		font-size: 12px;
      	}
      	#tab1 > span, #tab2 > span, #tab3 > span, #tab4 > span, #tab5 > span, #tab6 > span, #tab7 > span, #tab8 > span {
      		font-size: 16px;
      	}
      	.compaty-logo img {
      		padding: 2px;
      	}
      	#tab1 p input{
      		width: 100%;
      	}
      	#regForm {
      		padding: unset;
      		margin: 50px auto;
      	}
      }
      @media only screen and (min-width: 767px) and (max-width: 958px){
      	#nextBtn, #prevBtn {
      		min-width: 130px;
      		height: 50px;
      	}
      	#prevBtn {
      		margin-right: 6px;
      	}
      	.compaty-logo .c-logo__wrapper {
      		width: auto;
      		height: auto;
      	}
      	#tab5 .radio-button label .box__wrapper{
      		width: auto;
      		height: auto;
      	}
      	#tab5 .radio-button label .box__wrapper p {
      		font-size: 17px;
      	}
      	.solar-icon {
      		font-size: 50px;
      	}
      	#tab1 > span, #tab2 > span, #tab3 > span, #tab4 > span, #tab5 > span, #tab6 > span, #tab7 > span, #tab8 > span, .video_section > span, #tab9 > span{
      		font-size: 22px;
      	}
      	.compaty-logo img {
      		padding: 2px;
      	}
      	#regForm {
      		padding: unset;
      		margin: 50px auto;
      	}
      }
    </style>

    <body>
    	<?php
    	
    	if(isset($_GET['utm_source'], $_GET['utm_medium'], $_GET['utm_campaign'], $_GET['utm_term'], $_GET['utm_content'])){
    		addUtmSouces($_GET['utm_source'], $_GET['utm_medium'], $_GET['utm_campaign'], $_GET['utm_term'], $_GET['utm_content'], $conn);
    	}

    	$query = "SELECT `utility_company` FROM `region`";
    	$res = mysqli_query($conn, $query) or die(mysqli_error());
    	while($row = mysqli_fetch_assoc($res)){
    		$companyName[] = $row;
    	}

    	$singleArray = array_column($companyName, 'utility_company'); 
    	$arrayFilter = array_diff($singleArray, array('APS','SRP','TECO'));
    	?>
    	<a id="button" onclick="nextPrev(-1)" ></a>
    	<form id="regForm" method="POST">
    		<h1><i class="fa-solid fa-user"></i></h1>
    		<!-- One "tab" for each step in the form: -->
    		<div class="tab" id="tab1">
    			<span>Hi! I'm Sunny! Lets get you a solar quote in on time!</span>
    			<p>
    				<input class="inputs" placeholder="First name" oninput="this.className = ''" name="fname" autofocus>
    				<input class="inputs" placeholder="Last name" oninput="this.className = ''" name="lname" >
    			</p>
    		</div>

    		<div class="tab" id="tab2">
    			<span>Greate! Where should we send your quote and custom solar design when it's ready?</span>
    			<p><input placeholder="E-mail" oninput="this.className = ''" name="email"></p>
    		</div>

    		<div class="tab" id="tab3">
    			<span>Nice to meet you <span id="name"></span>. What address would you like to place solar on?</span>
    			<p><input placeholder="Address" id="address-3" oninput="this.className = ''" name="address"></p>
    		</div>

    		<div class="tab" id="tab4">
    			<span>Greate! Can you confirm this is your house?</span>
    			<div id="map"></div>
    		</div>

    		<div class="tab" id="tab5">
    			<span>Solar only or include a battery?</span>
    			<div class="radio-button">
    				<label>
    					<input type="radio" value="solar" name="radio1">
    					<div class="box__wrapper">
    						<i class="fa-solid fa-solar-panel solar-icon"></i>
    						<p>Solar</p>
    					</div>
    				</label>

    				<label>
    					<input type="radio" value="solar+battery" name="radio1">
    					<div class="box__wrapper">
    						<i class="fa-solid fa-battery-full solar-icon"></i>
    						<p>Solar+Battery</p>
    					</div>
    				</label>
    				<input type="hidden" name="solartype" id="solartype" value="">
    			</div>

    				</div>


    				<div class="tab" id="tab6">
    					<span>Which utility company do you use?</span>
    					<div class="compaty-logo">
    						<label>
    							<input type="radio" value="<?php echo $singleArray[6];?>" name="radio2">
    							<div class="c-logo__wrapper">
    								<img src="images/teco-logo.png">
    							</div>
    						</label>

    						<label>
    							<input type="radio" value="<?php echo $singleArray[5];?>" name="radio2">
    							<div class="c-logo__wrapper">
    								<img src="images/srp-logo.jpeg">
    							</div>
    						</label>

    						<label>
    							<input type="radio" value="<?php echo $singleArray[4];?>" name="radio2">
    							<div class="c-logo__wrapper">
    								<img src="images/aps-logo.jpeg">
    							</div>
    						</label>

    						<input type="hidden" name="company-name" id="company-name" value="">

    						<select name="other">
    							<option value="" disabled selected>Other</option>
    							<?php
    							foreach($arrayFilter as $key => $value){ ?>
    								<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
    							<?php	} ?>
    						</select>

    					</div>
    				</div>


    				<div class="tab" id="tab7">
    					<span>How much is your monthly electricity bill?</span>
    					<p>
    						<div class="min-max">
    							<div class="min">
    								<label>$</label><span id="min-value"></span>
    							</div>
					<!-- <span>-</span>
					<div class="max">
						<label>$</label><span id="max-value"></span>
					</div> -->     
				</div> 

				<div class="min-max-range">
					<input type="range" min="0" max="1000" value="55" class="range" id="min" step="1">
					<!-- <input type="range" min="501" max="999" value="100" class="range" id="max" step="1"> -->
					<input type="hidden" name="minbill" value="" id="minbill">
					<!-- <input type="hidden" name="maxbill" value="" id="maxbill"> -->      
				</div>    

				<div style="clear: both;"></div>    

			</p>
		</div>  


		<div class="tab" id="tab8">
			<span>Your quote is ready. Please verify your phone number.</span>
			<p><input type="tel" oninput="this.className = ''" name="phone" id="phone"></p>
			<input type="hidden" id="dataid" name="id" value="" > 
		</div>

		<div class="tab" id="tab9">
			<span>One moment while we run the numbers!</span>
			<div class="progressBar">
				<div class="progressBarcontainer">
					<div class="progressBarValue ht "></div>
				</div>
			</div>    
		</div>


		<div style="overflow:auto;">
			<div style="float:none;">
				<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
				<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
			</div>
		</div>

		<div class="video_section" style="display: none;">
			<span>Need help deciding?</span>
			<video width="100%" height="240" controls>
				<source src="images/dummyvideo.mp4" type="video/mp4">
					<source src="movie.ogg" type="video/ogg">
						Your browser does not support the video tag.
					</video> 
				</div>

		<div id="dots">

		</div>
	</form>

	<script src="form.js"></script>

	<script>
		var minSlider = document.getElementById('min');
		//var maxSlider = document.getElementById('max');

		var outputMin = document.getElementById('min-value');
		//var outputMax = document.getElementById('max-value');

		outputMin.innerHTML = minSlider.value;
		//outputMax.innerHTML = maxSlider.value;


		minSlider.oninput = function(){
			outputMin.innerHTML=this.value; 
			document.getElementById('minbill').value=this.value;   
		}

		// maxSlider.oninput = function(){
		// 	outputMax.innerHTML=this.value;
		// 	document.getElementById('maxbill').value=this.value;    
		// }
	</script>

	<script>
		function pregressBar(){
			var skills = {
				ht: 100
			};

			$.each(skills, function(key, value) {
				var skillbar = $("." + key);

				skillbar.animate(
				{
					width: value + "%"
				},
				2000
				);
			}); 
		}

		const info = document.querySelector("#tab8 .alert-info");

		function validateNumber() {
			const phoneNumber = phoneInput.getNumber();
			info.style.display = "";
			info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
		}

	</script>

	<script>
		$(document).ready(function(){
			$('#nextBtn').click(function (e) {
				e.preventDefault();
				$('#name').text($('#tab1 input[name="fname"]').val());
				var currentTab = 0;
				var data = {};
				$('.tab').each(function(i){
					if($(this).css('display') == "block"){
						currentTab = i;
						$(".tab > p > input").focus();
					}
				});
				$("#tab"+currentTab +" > p > input").each(function(ind){
					data[$(this).attr('name')] = $(this).val();
					data['position'] = currentTab;
				});

				if(currentTab !=3){
					$('#prevBtn').hide();
				}else{
					$('#prevBtn').show();
					$('#prevBtn').html('Try again');
				}

                if(currentTab == 4){
					$('.video_section').show();
				}else{
					$('.video_section').hide();
				}

				if(currentTab !=1){
					data['recordid'] = $("#dataid").val();
				}

				if(currentTab == 5){
					data['solartype'] = $('#solartype').val();
					data['position'] = 5;
				}

				if(currentTab == 6){
					data['company-name'] = $('#company-name').val();
					data['position'] = 6;
				}

				if(currentTab == 7){
					data['bill'] = $('#minbill').val();
					//data['bill'] = "$"+$('#minbill').val()+"-"+"$"+$('#maxbill').val();
					data['position'] = 7;
				}

				if(currentTab == 8){
					const phoneNumber = phoneInput.getNumber();
					data['phone'] = phoneNumber;
					data['position'] = 8;

					$('#nextBtn').hide();
					pregressBar();

					$('.iframe-section').css({"backgroundColor": "red"});

					// var sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
					// swal.fire({
					// 	html: '<h4>Please Wait...</h4>',
					// 	showConfirmButton: false,
					// 	onRender: function() {
					// 		$('.swal2-content').prepend(sweet_loader);
					// 	}
					// });
					// setTimeout(function() {
					// 	swal.fire({
					// 		icon: 'success',
					// 		html: '<h4>Success!</h4>',
					// 		showConfirmButton: false,
					// 	});
					// }, 2000);

					setTimeout(function(){
						$('#regForm')[0].reset();
						window.location.href = window.location.protocol + "//" + window.location.host + window.location.pathname +'result.php';
					},3000);
				}

				console.log(data);
				$.ajax({
					type: 'POST',
					url: 'functions.php',
					data: data,
					dataType : 'json',
					success: function (data) {
						if(currentTab == 1){
							$("#dataid").val(data);
						}
					}
				});
			});
		});
	</script>

	<script>
		$(document).ready(function(){
			$('.radio-button input[type="radio"]').each(function(){
				$(this).change(function() {
					$('#solartype').val($(this).val());

				});
			});

		});
	</script>

	<script>
		$(document).ready(function(){
			$('.compaty-logo input[type="radio"]').each(function(){
				$(this).change(function() {
					$('#company-name').val($(this).val());
					if($(this).is(":checked")){
						$('.compaty-logo select').prop("selectedIndex", 0);
					}
				});
			});
		});
	</script>

	<script>
		$(document).ready(function(){
			$('.compaty-logo select').on('change', function() {
				$('#company-name').val($(this).val());
				$('.compaty-logo label input').prop('checked', false);
			});	
		});
	</script>
	<script>
		$(document).ready(function(){
			$('.inputs').keydown(function (e) {
				if (e.which === 13) {
					var index = $('.inputs').index(this) + 1;
					$('.inputs').eq(index).focus();
				}
			});
		});
	</script>
	<script>
		function getIp(callback) {
			fetch('https://ipinfo.io/json?token=1fd5b78941406d', { headers: { 'Accept': 'application/json' }})
			.then((resp) => resp.json())
			.catch(() => {
				return {
					country: 'us',
				};
			})
			.then((resp) => callback(resp.country));
		}

		const phoneInputField = document.querySelector("#phone");
		const phoneInput = window.intlTelInput(phoneInputField, {
			initialCountry: "auto",
			geoIpLookup: getIp,
			utilsScript:
			"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
		});
	</script>
</body>
</html>
