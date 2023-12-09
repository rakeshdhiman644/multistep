<?php 

include ('functions.php');

$red = "";
if(isset($_SESSION['company-name'],$_SESSION['bill'])){
	$res = calculations($_SESSION['company-name'], $_SESSION['bill'], $conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<style type="text/css">
		body{margin-top:20px;}
		.block-7 {
			border-radius: 4px;
			margin-bottom: 30px;
			padding: 0;
			overflow: hidden;
			background: #fff;
			-webkit-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.05);
			-moz-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.05);
			box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.05);
			-moz-transition: all 0.3s ease;
			-o-transition: all 0.3s ease;
			-webkit-transition: all 0.3s ease;
			-ms-transition: all 0.3s ease;
			transition: all 0.3s ease;
		}
		@media (max-width: 991.98px) {
			.block-7 {
				margin-top: 30px;
			}
		}
		.col-md-7.heading-section.text-center.ftco-animate.fadeInUp.ftco-animated{
			margin-top: 1rem;
		}
		.block-7 .img {
			height: 200px;
			background-repeat: no-repeat;
			background-size: 100% 100%;
			object-fit: cover;
		}
		.block-7 .heading-2 {
			font-size: 14px;
			text-transform: uppercase;
			letter-spacing: 1px;
			font-weight: 600;
		}
		.block-7 .price {
			margin: 0;
			padding: 0;
			display: block;
		}
		.block-7 .price sup {
			font-size: 14px;
			top: -1em;
			color: #b3b3b3;
		}
		.block-7 .price .number {
			font-size: 24px;
			font-weight: 600;
			color: #000000;
		}
		.block-7 .excerpt {
			margin-bottom: 0px;
			color: #00bd56;
			font-size: 16px;
			font-weight: 600;
			text-transform: uppercase;
		}
		.block-7 .label2 {
			text-transform: uppercase;
		}
		.block-7 .pricing-text,
		.block-7 .pricing-text li {
			padding: 0;
			margin: 0;
		}
		.block-7 .pricing-text li {
			list-style: none;
			padding-top: 10px;
			padding-bottom: 10px;
			color: #000000;
		}
		.block-7 .pricing-text li:nth-child(odd) {
			background: rgba(0, 0, 0, 0.05);
		}
		.block-7 .pricing-text li span.fa {
			color: #207dff;
		}
		.block-7 .btn-primary {
			color: #fff;
			text-transform: capitalize;
			font-style: 16px;
			font-weight: 600;
			letter-spacing: 1px;
			width: 70%;
			margin: 0 auto;
			background: #e1aa35;
			border: navajowhite;
		}
		.block-7 .btn-primary:hover,
		.block-7 .btn-primary:focus {
			background: #e1aa35 !important;
			color: #fff;
		}
		.block-7:hover,
		.block-7:focus {
			-webkit-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.11);
			-moz-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.11);
			box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.11);
		}
		.price p {
			margin-bottom: 0rem;
		}
		.iframe-section{
			background-color: red !important;
		}
		@media only screen and (max-width: 480px) {
			.block-7 .btn-primary{
				width: 100%;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
						<img src="images/Group 17.png">
                        <?php if(isset($_SESSION['fname'])){ ?>
						<h2 class="font-weight-bold text-capitalize"><?php echo $_SESSION['fname'];?></h2>
					   <?php }?>
                        <?php if(isset($_SESSION['address'])){ ?>
						<p class="text-center"><?php echo $_SESSION['address'];?></p>
                       <?php }?>
					</div>
				</div>
				
				<div class="row justify-content-center">
					<div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
						<h2 class="font-weight-bold text-capitalize">Select Your System Size</h2>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 ftco-animate fadeInUp ftco-animated">
						<div class="block-7">
							<div class="img" style="background-image: url(images/image1.png);"></div>
							<div class="text-center p-4">
								<h3 class="font-weight-bold text-capitalize">sunny lite</h3>
								<p class="mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
								<ul class="pricing-text mb-3">
									<li><span class="fa fa-check mr-2"></span><?php echo round($res['kw_system65'], 2); ?> kw System</li>
									<li><span class="fa fa-check mr-2"></span><?php echo round($res['number_of_panels65'], 2); ?> Panel</li>
									<li><span class="fa fa-check mr-2"></span>25yr warranty</li>
									<li><span class="fa fa-check mr-2"></span>sunpanion promise blah</li>
									<li><span class="fa fa-check mr-2"></span>last benefit</li>
								</ul>
								<div class="price">
									<p class="text-capitalize">monthly saving</p>
									<h3 class="font-weight-bold text-capitalize"><span>$</span><span><?php echo round($res['montly_saving65'], 2); ?></span></h3>
								</div>
								<a href="#" class="btn btn-primary d-block px-2 py-3 mt-3">Proceed to checkout</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 ftco-animate fadeInUp ftco-animated">
						<div class="block-7">
							<div class="img" style="background-image: url(images/image2.png);"></div>
							<div class="text-center p-4">
								<h3 class="font-weight-bold text-capitalize">sunny standard</h3>
								<p class="mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
								<ul class="pricing-text mb-3">
									<li><span class="fa fa-check mr-2"></span><?php echo round($res['kw_system85'], 2); ?> kw System</li>
									<li><span class="fa fa-check mr-2"></span><?php echo round($res['number_of_panels85'], 2); ?> Panel</li>
									<li><span class="fa fa-check mr-2"></span>25yr warranty</li>
									<li><span class="fa fa-check mr-2"></span>sunpanion promise blah</li>
									<li><span class="fa fa-check mr-2"></span>last benefit</li>
								</ul>
								<div class="price">
									<p class="text-capitalize">monthly saving</p>
									<h3 class="font-weight-bold text-capitalize"><span>$</span><span><?php echo round($res['montly_saving85'], 2); ?></span></h3>
								</div>
								<a href="#" class="btn btn-primary d-block px-2 py-3 mt-3">Proceed to checkout</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 ftco-animate fadeInUp ftco-animated">
						<div class="block-7">
							<div class="img" style="background-image: url(images/image3.png);"></div>
							<div class="text-center p-4">
								<h3 class="font-weight-bold text-capitalize">sunny max</h3>
								<p class="mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
								<ul class="pricing-text mb-3">
									<li><span class="fa fa-check mr-2"></span><?php echo round($res['kw_system95'], 2); ?> kw System</li>
									<li><span class="fa fa-check mr-2"></span><?php echo round($res['number_of_panels95'], 2); ?> Panel</li>
									<li><span class="fa fa-check mr-2"></span>25yr warranty</li>
									<li><span class="fa fa-check mr-2"></span>sunpanion promise blah</li>
									<li><span class="fa fa-check mr-2"></span>last benefit</li>
								</ul>
								<div class="price">
									<p class="text-capitalize">monthly saving</p>
									<h3 class="font-weight-bold text-capitalize"><span>$</span><span><?php echo round($res['montly_saving95'], 2); ?></span></h3>
								</div>
								<a href="#" class="btn btn-primary d-block px-2 py-3 mt-3">Proceed to checkout</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<img class="img-fluid" src="images/image4.png">
					</div>
					<div class="col-md-6">
						<div class="text-center p-5">
							<h2 class="font-weight-bold text-capitalize">*<sapn>$</sapn><?php echo round($res['price_per_watt'], 2); ?> Per Watt*</h2>
							<p class="font-weight-bold">At Sunpanion, We believe in transparency prising.All select systesm are priced at $1.96 per watt* Pricing that low will lake you want to do the moolah hula.</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="text-center p-5">
							<h2 class="font-weight-bold text-capitalize">$128,448.12</h2>
							<p class="font-weight-bold">Marketing/ sales message...blah...this is the remaning cost using traditional energy for the next blank years...</p>
						</div>
					</div>
					<div class="col-md-6">
						<img class="img-fluid" src="images/image5.png">
					</div>
				</div> 

			</div>
		</section>
		
	</div>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>