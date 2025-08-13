<?php
$val = $_GET['value'];
$field = $_GET['field'];

if ($field == "name_result") {
	if (!preg_match("/^[a-zA-Z\s]+$/", $val)) {
		echo 'Invalid';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}

if ($field == "email_result") {
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $val)) {
		echo 'Invalid email';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}

if ($field == "fname_result") {
	if (!preg_match("/^[a-zA-Z\s]+$/", $val)) {
		echo 'Invalid';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}

if ($field == "mname_result") {
	if (!preg_match("/^[a-zA-Z\s]+$/", $val)) {
		echo 'Invalid';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}

if ($field == "famobno_result") {
	if (strlen($val) < 10 || strlen($val) > 10)  {
		echo 'Invalid';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}
if ($field == "momobno_result") {
	if (strlen($val) < 10 || strlen($val) > 10) {
		echo 'Invalid';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}

if ($field == "aadhar_result") {
	if (strlen($val) < 12 || strlen($val) > 12) {
		echo 'Invalid! Eg Pattern: xxxxxxxxxxxx';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}

if($field == "fees_result"){
	if(strlen($val) < 3){
		echo 'Invalid';
	}else{
		echo '<label class = "text-success">Valid</label>';
	}
}

if($field == "tfees_result"){
	if(strlen($val) < 3){
		echo 'Invalid';
	}else{
		echo '<label class = "text-success">Valid</label>';
	}
}

if ($field == "address_result") {
	if (!preg_match('/^(\d{1,}) [a-zA-Z0-9\s]+(\,)? [a-zA-Z]+(\,)? [A-Z]{2} [0-9]{5,6}$/', $val)) {
		echo 'Invalid! Eg Pattern: 33 A Pandiya Nagar, Madurai, TN 625601 ';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}





?>