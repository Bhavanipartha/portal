function validForm() {
	var name = document.getElementById("Name").value;
    var email = document.getElementById("Email").value;
	var fname = document.getElementById("fname").value;
	var mname = document.getElementById("mname").value;
	var fmob = document.getElementById("Famobno").value;
	var mmob = document.getElementById("Momobno").value;
	var saadhar = document.getElementById("s_aadhar").value;
	var fee = document.getElementById("feesamount").value;	
    var tfee = document.getElementById("transportfees").value;
	var addr = document.getElementById("Address").value;
	
	if (name == '' || email == ''  || fname == '' || mname == ''  || fmob == '' || mmob == '' || saadhar == '' ||fee == '' || tfee == '' || addr == '') {
		alert("Complete all the required fields");
	} else {
		var name1 = document.getElementById("name_result");
        var email1 = document.getElementById("email_result");
		var fname1 = document.getElementById("fname_result");
		var mname1 = document.getElementById("mname_result");
		var fmob1 = document.getElementById("famobno_result");
		var mmob1 = document.getElementById("momobno_result");	
		var saadhar1 = document.getElementById("aadhar_result");
		var fee1 = document.getElementById("fees_result");
        var tfee1 = document.getElementById("tfees_result");
		var addr1 = document.getElementById("address_result");
		
		if ( name1.innerHTML == 'Invalid' || email1.innerHTML == 'Invalid email' || fname1.innerHTML == 'Invalid' || mname1.innerHTML == 'Invalid' || fmob1.innerHTML == 'Invalid' || mmob1.innerHTML == 'Invalid' || saadhar1.innerHTML == 'Invalid! Eg Pattern: xxxxxxxxxxxx' ||fee1.innerHTML == 'Invalid' || tfee1.innerHTML == 'Invalid' || addr1.innerHTML == 'Invalid! Eg Pattern: 33 A Pandiya Nagar, Madurai, TN 625601 ') {
			alert("Complete valid information");
		} else {
			document.getElementById("addStudentfrm").submit();
		}
	}
}

function validate(field, value) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else { 
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
			document.getElementById(field).innerHTML = "Validating..";
		} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(field).innerHTML = xmlhttp.responseText;
		} else {
			document.getElementById(field).innerHTML = "Error Occurred. <a href=''>Reload Or Try Again</a> the page.";
		}
	}
	xmlhttp.open("GET", "validation.php?field=" + field + "&value=" + value, true);
	xmlhttp.send();
}