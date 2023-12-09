<?php
ini_set('session.cookie_samesite', 'None');
ini_set('session.cookie_secure', 'true');
session_start();

include('database.php');

if (!empty($_POST)) {
	$position = $_POST['position'];
	$id = $_POST['recordid'];

	if ($position == 1) {
		addName($_POST['fname'], $_POST['lname'], $_SERVER['REMOTE_ADDR'], $conn);
		$_SESSION['fname'] = $_POST['fname'];
		$_SESSION['lname'] = $_POST['lname'];
	} elseif ($position == 2) {
		addEmail($_POST['email'], $id, $conn);
		$_SESSION['email'] = $_POST['email'];
	} elseif ($position == 3) {
		addAddress($_POST['address'], $id, $conn);
		$_SESSION['address'] = $_POST['address'];
	} elseif ($position == 5) {
		solarType($_POST['solartype'], $id, $conn);
	} elseif ($position == 6) {
		addCompanyName($_POST['company-name'], $id, $conn);
		$_SESSION['company-name'] = $_POST['company-name'];
	} elseif ($position == 7) {
		addMonthlyBill($_POST['bill'], $id, $conn);
		$_SESSION['bill'] = $_POST['bill'];
	} elseif ($position == 8) {
		addPhone($_POST['phone'], $id, $conn);
		createCustomerInShopify($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_POST['phone']);
	}
	mysqli_close($conn);
}

function addName($fname, $lname, $ipaddress, $conn)
{
	if ($fname != "" && $lname != "") {
		$sql = "INSERT INTO `steps`(`Id`, `ipaddress`, `first_name`, `last_name`) VALUES (NULL,'$ipaddress','$fname','$lname')";

		if (mysqli_query($conn, $sql)) {

			$lastId = mysqli_insert_id($conn);

			echo $lastId;
		}
	}
}

function addEmail($email, $id, $conn)
{
	if ($email != "") {
		$sql = "UPDATE `steps` SET `email`='" . $email . "' WHERE Id = '" . $id . "'";
		if (mysqli_query($conn, $sql)) {
			echo "email updated";
		}
	}
}

function addAddress($address, $id, $conn)
{
	if ($address != "") {
		$sql = "UPDATE `steps` SET `address`='" . $address . "' WHERE Id = '" . $id . "'";
		if (mysqli_query($conn, $sql)) {
			echo "address updated";
		}
	}
}

function solarType($solartype, $id, $conn)
{
	$sql = "UPDATE `steps` SET `solartype`='" . $solartype . "' WHERE Id = '" . $id . "'";
	if (mysqli_query($conn, $sql)) {

		echo "solar type updated";
	}
}

function addCompanyName($companyname, $id, $conn)
{
	$sql = "UPDATE `steps` SET `company_name`='" . $companyname . "' WHERE Id = '" . $id . "'";
	if (mysqli_query($conn, $sql)) {

		echo "company name updated";
	}
}

function addMonthlyBill($bill, $id, $conn)
{
	$sql = "UPDATE `steps` SET `monthly_bill`='$" . $bill . "' WHERE Id = '" . $id . "'";
	if (mysqli_query($conn, $sql)) {

		echo "monthly bill updated";
	}
}

function addPhone($phone, $id, $conn)
{
	$sql = "UPDATE `steps` SET `phone_number`='" . $phone . "' WHERE Id = '" . $id . "'";
	if (mysqli_query($conn, $sql)) {

		echo "phone number updated";
	}
}

function createCustomerInShopify($fname, $lname, $email, $phone)
{

	$url = "https://sunpanion.myshopify.com/admin/api/2022-07/customers.json";

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$headers = array(
		"X-Shopify-Access-Token: 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",
		"Content-Type: application/json",
	);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	$data = [
		'customer' => [
			'first_name' => $fname,
			'last_name' => $lname,
			'email' => $email,
			'phone' => $phone,
			'verified_email' => true,
		]
	];

	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$resp = curl_exec($curl);
	curl_close($curl);
	var_dump($resp);
}

function pr($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
function br()
{
	echo "<br/>";
}

function calculations($utilityName, $price, $conn)
{
	$utilityDataQuery = "Select * from region where	utility_company = '$utilityName'";
	$utilityData = mysqli_fetch_array(mysqli_query($conn, $utilityDataQuery), true);
	//var_dump($price);
	$tempCostPerUnit = ((float)$price / (float)$utilityData['price_per_kwh_averaged']) * 12;
	$customerValue65 = $tempCostPerUnit * .65;
	$customerValue85 = $tempCostPerUnit * .85;
	$customerValue95 = $tempCostPerUnit * .95;
	$numberOfPanels65 = floor($customerValue65 / $utilityData['production_per_panel']);
	$numberOfPanels85 = floor($customerValue85 / $utilityData['production_per_panel']);
	$numberOfPanels95 = floor($customerValue95 / $utilityData['production_per_panel']);
	$kWSystem65 = round(($numberOfPanels65 *  $utilityData['panels_wattage']) / 1000, 2);
	$kWSystem85 = round(($numberOfPanels85 *  $utilityData['panels_wattage']) / 1000, 2);
	$kWSystem95 = round(($numberOfPanels95 *  $utilityData['panels_wattage']) / 1000, 2);
	$montlySaving65 = (($customerValue65 * $utilityData['price_per_kwh_averaged']) / 12) * 1.07;
	$montlySaving85 = (($customerValue85 * $utilityData['price_per_kwh_averaged']) / 12) * 1.07;
	$montlySaving95 = (($customerValue95 * $utilityData['price_per_kwh_averaged']) / 12) * 1.07;
	$pricePerWatt = $utilityData['price_per_watt'] * .74;
	//pr($utilityData);
	//echo $tempCostPerUnit;
	// br();
	// echo "$customerValue65  $customerValue85 $customerValue95";
	// br();
	// echo "Number of panels --> $numberOfPanels65 , $numberOfPanels85 , $numberOfPanels95";
	// br();
	// echo "KW system --> $kWSystem65 , $kWSystem85 , $kWSystem95";
	// br();
	// echo "Montly Savings --> $montlySaving65 , $montlySaving85 , $montlySaving95";
	// br();
	// echo "price per watt $pricePerWatt";
	//die;

	$data['customer_value65'] = $customerValue65;
	$data['customer_value85'] = $customerValue85;
	$data['customer_value95'] = $customerValue95;
	$data['number_of_panels65'] = $numberOfPanels65;
	$data['number_of_panels85'] = $numberOfPanels85;
	$data['number_of_panels95'] = $numberOfPanels95;
	$data['kw_system65'] = $kWSystem65;
	$data['kw_system85'] = $kWSystem85;
	$data['kw_system95'] = $kWSystem95;
	$data['montly_saving65'] = $montlySaving65;
	$data['montly_saving85'] = $montlySaving85;
	$data['montly_saving95'] = $montlySaving95;
	$data['price_per_watt'] = $pricePerWatt;

	return $data;


}

function addUtmSouces($utmsource, $utmmedium, $utmcampaign, $utmterm, $tmcontent, $conn){
	$sql = "INSERT INTO `utmsource`(`id`, `utm_source`, `utm_medium`, `utm_campaign`, `utm_term`, `utm_content`) VALUES (NULL,'$utmsource','$utmmedium','$utmcampaign','$utmterm','$tmcontent')";
	mysqli_query($conn, $sql);
}
