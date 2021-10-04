/**
* Author: Hirpara Sharmik
* Target: enquire.html
* Purpose: To validate the data entered by user in HTML form
*/

"use strict";

function showBillingAddress()  {
	if(document.getElementById("billing_add").checked) {
		document.getElementById("show_bill_add").removeAttribute("hidden");
		document.getElementById("b_street_name").setAttribute("required","required");
		document.getElementById("b_suburb").setAttribute("required","required");
		document.getElementById("b_state").setAttribute("required","required");
		document.getElementById("b_postcode").setAttribute("required","required");
	}
	else {
		document.getElementById("show_bill_add").setAttribute("hidden","hidden");
		document.getElementById("b_street_name").removeAttribute("required");
		document.getElementById("b_suburb").removeAttribute("required");
		document.getElementById("b_state").removeAttribute("required");
		document.getElementById("b_postcode").removeAttribute("required");
	}
}

function showPrice() {
	var temp_selected = document.getElementById("category").value;
	for(var j = 0; j < document.getElementsByClassName("category").length; j++) 
		document.getElementsByClassName("category")[j].setAttribute("hidden", "hidden");
	for(var k = 0; k < document.getElementsByClassName(temp_selected).length; k++)
		document.getElementsByClassName(temp_selected)[k].removeAttribute("hidden");
}

function changeRequiredField() {
	var check_boxes = document.getElementsByName("product_features");
	for(var k = 0; k < check_boxes.length; k++) {
		if(check_boxes[k].checked) {
			for(var j = 0; j < check_boxes.length; j++)
				check_boxes[j].removeAttribute("required");
			k = check_boxes.length;
		}
		else
			check_boxes[k].setAttribute("required","required");
	}
}

function storeEnquire(first_name, last_name, email_id, street_name, suburb, state, pin_code, b_street_name, b_suburb, b_state, b_pin_code, phone_no, preferred_contact, category, product_features, no_of_members) {
	sessionStorage.first_name = first_name;
	sessionStorage.last_name = last_name;
	sessionStorage.email_id = email_id;
	sessionStorage.street_name = street_name;
	sessionStorage.suburb = suburb;
	sessionStorage.state = state;
	sessionStorage.pin_code = pin_code;
	sessionStorage.b_street_name = b_street_name;
	sessionStorage.b_suburb = b_suburb;
	sessionStorage.b_state = b_state;
	sessionStorage.b_pin_code = b_pin_code;
	sessionStorage.phone_no = phone_no;
	sessionStorage.preferred_contact = preferred_contact;
	sessionStorage.category = category;
	sessionStorage.product_features = product_features;
	sessionStorage.no_of_members =  no_of_members;
}

function digitFromRightSide(number, position) {
	return Math.floor((number / Math.pow(10, position - 1)) % 10);
}

function addressValidate(street_name, suburb, state, pin_code) {
	var result = "";
	if(!street_name.match(/^[a-zA-Z0-9 ]+$/))
		result = result + "Street name must contain alpha numeric characters.\n";
	if(!suburb.match(/^[a-zA-Z ]+$/))
		result = result + "Suburb name must contain alpha characters.\n";
	if(document.getElementById("state").selectedIndex === 0)
		result += "Select state.\n";
	if(pin_code.length != 4)
		result = result + "Post code must be of 4 digit.\n";

	switch(state) {
		case "VIC": if(digitFromRightSide(pin_code, 4) != 3 && digitFromRightSide(pin_code, 4) != 8)
						result += "Enter valid post code for " + state;
					break;
		case "NSW": if(digitFromRightSide(pin_code, 4) != 1 && digitFromRightSide(pin_code, 4) != 2)
						result += "Enter valid post code for " + state;
					break;
		case "QLD": if(digitFromRightSide(pin_code, 4) != 4 && digitFromRightSide(pin_code, 4) != 9)
						result += "Enter valid post code for " + state;
					break;
		case "NT":  if(digitFromRightSide(pin_code, 4) != 0)
						result += "Enter valid post code for " + state;
					break;
		case "WA":  if(digitFromRightSide(pin_code, 4) != 6)
						result += "Enter valid post code for " + state;
					break;
		case "SA":  if(digitFromRightSide(pin_code, 4) != 5)
						result += "Enter valid post code for " + state;
					break;
		case "TAS": if(digitFromRightSide(pin_code, 4) != 7)
						result += "Enter valid post code for " + state;
					break;
		case "ACT": if(digitFromRightSide(pin_code, 4) != 0)
						result += "Enter valid post code for " + state;
					break;
	}
	return result;
}

function validateEnquire() {
	var errMsg = "";
	var result = true;

	var first_name = document.getElementById("first_name").value;
	var last_name = document.getElementById("last_name").value;
	var email_id = document.getElementById("email_id").value;
	var street_name = document.getElementById("street_name").value;
	var suburb = document.getElementById("suburb").value;
	var state = document.getElementById("state").value;
	var pin_code = document.getElementById("postcode").value;
	var phone_no = document.getElementById("phone_number").value;
	var no_of_members = document.getElementById("no_of_members").value;

	if(!first_name.match(/^[a-zA-Z ]+$/))
		errMsg = errMsg + "Your first name must contain alpha characters.\n";

	if(!last_name.match(/^[a-zA-Z ]+$/))
		errMsg = errMsg + "Your last name must contain alpha characters.\n";

	errMsg = addressValidate(street_name, suburb, state, pin_code);

	if(phone_no.length != 10)
		errMsg = errMsg + "Phone number must be of 10 digit\n";

	for(var i = 0; i < document.getElementsByName("preferred_contact").length; i++) {
		if(document.getElementsByName("preferred_contact")[i].checked) {
			var preferred_contact = document.getElementsByName("preferred_contact")[i].value;
			i = document.getElementsByName("preferred_contact").length;
		}
		else if(i == (document.getElementsByName("preferred_contact").length - 1))
			errMsg += "Select atleast one preferred contect type\n";
	}

	if(document.getElementById("category").selectedIndex === 0)
		errMsg += "Select category.\n";
	else {
		var category = document.getElementById("category").value;
		if (category == "gymnastics")
			category = "Gymnastics";
		else if (category == "swimming")
			category = "Swimming";
		else
			category = "Yoga";
	}

	for(var i = 0; i < document.getElementsByName("product_features[]").length; i++) {
		if(document.getElementsByName("product_features[]")[i].checked) {
			var product_features = document.getElementsByName("product_features[]")[i].id;
			if (product_features == "group_activity")
				product_features = "Group Activity";
			else
				product_features = "Personal Training";
			i = document.getElementsByName("product_features[]").length;
		}
		else if(i == (document.getElementsByName("product_features[]").length - 1))
			errMsg += "Select atleast one product feature\n";
	}

	if(no_of_members > 10)
		errMsg = errMsg + "Maximum 10 members are allowed for one enquire";

	if(no_of_members < 1)
		errMsg = errMsg + "Atleast 1 member required";

	if(document.getElementById("billing_add").checked) {
		var b_street_name = document.getElementById("b_street_name").value;
		var b_suburb = document.getElementById("b_suburb").value;
		var b_state = document.getElementById("b_state").value;
		var b_pin_code = document.getElementById("b_postcode").value;
		errMsg = addressValidate(b_street_name, b_suburb, b_state, b_pin_code);
	}
	else {
		var b_street_name = "Not applicable";
		var b_suburb = "Not applicable";
		var b_state = "Not applicable";
		var b_pin_code = "Not applicable";
	}

	if(errMsg != "") {
		alert("JavaScript Validation says: \n" + errMsg);
		result = false;
	}

	if(result)
		storeEnquire(first_name, last_name, email_id, street_name, suburb, state, pin_code, b_street_name, b_suburb, b_state, b_pin_code, phone_no, preferred_contact, category, product_features, no_of_members);

	return result;
}

function cancelBooking() {
	sessionStorage.clear();
	window.location = "index.php";
}

function calculateCost() {
	var result = 0;

	if(sessionStorage.product_features == "Group Activity") {
		if(sessionStorage.category == "Gymnastics")
			result = sessionStorage.no_of_members * 5;
		else if(sessionStorage.category == "Swimming")
			result = sessionStorage.no_of_members * 6;
		else if(sessionStorage.category == "Yoga")
			result = sessionStorage.no_of_members * 7;
	}
	else if(sessionStorage.product_features == "Personal Training") {
		if(sessionStorage.category == "Gymnastics")
			result = sessionStorage.no_of_members * 10;
		else if(sessionStorage.category == "Swimming")
			result = sessionStorage.no_of_members * 12;
		else if(sessionStorage.category == "Yoga")
			result = sessionStorage.no_of_members * 15;
	}
	return result;
}

function changeImg() {
	for(var i = 0; i < document.getElementsByName("payment_type").length; i++) {	
		if(document.getElementById("americanexpress").checked) {
			document.getElementById("cvv_number_image").setAttribute("img", "id='cvv_number_image'")
			document.getElementById("card_number").placeholder = "xxxx-xxxxxx-xxxxx";
			document.getElementById("card_number_image").src = "images/amex_card_no.png";
			document.getElementById("card_number_image").alt = "American Express Card"
			document.getElementById("cvv_number_image").src = "images/amex_cvv_no.png";
			document.getElementById("cvv_number_image").alt = "American Express Card";
		}
		else {
			document.getElementById("card_number_image").setAttribute("img", "id='card_number_image'")
			document.getElementById("card_number").placeholder = "xxxx-xxxx-xxxx-xxxx";
			document.getElementById("card_number_image").src = "images/card_no.png";
			document.getElementById("card_number_image").alt = "Credit Card"
			document.getElementById("cvv_number_image").src = "images/cvv.png";
			document.getElementById("cvv_number_image").alt = "Credit Card";	
		}
		document.getElementById("expiry_month").placeholder = " MM";
		document.getElementById("expiry_year").placeholder = " YY";
	}
}

function validatePayment() {
	var errMsg = "";
	var result = true;

	var card_number = document.getElementById("card_number").value;
	var expiry_month = document.getElementById("expiry_month").value;
	var expiry_year = document.getElementById("expiry_year").value;
	var cardholder_name = document.getElementById("cardholder_name").value;
	var cvv_no = document.getElementById("cvv_no").value;

	for(var i = 0; i < document.getElementsByName("payment_type").length; i++) {
		if(document.getElementsByName("payment_type")[i].checked) {
			var payment_type = document.getElementsByName("payment_type")[i].value;
			var selected_type = i;
			i = document.getElementsByName("payment_type").length;
		}
		else if(i == (document.getElementsByName("payment_type").length - 1))
			errMsg += "Select atleast one payment type\n";
	}

	if(selected_type == 0) {	
		if(card_number.length != 16 || digitFromRightSide(card_number, 16) != 4)
			errMsg += "Enter valid card number\n";
		if(cvv_no.length != 3)
			errMsg += "Enter valid CVV number(3 digits)\n";
	}
	else if(selected_type == 1) {	
		if(card_number.length != 16 || digitFromRightSide(card_number, 16) != 5)
			errMsg += "Enter valid card number\n";
		else if(digitFromRightSide(card_number, 15) < 1 || digitFromRightSide(card_number, 15) > 5)
			errMsg += "Enter valid card number\n";
		if(cvv_no.length != 3)
			errMsg += "Enter valid CVV number(3 digits)\n";
	}
	else {
		if(card_number.length != 15 || digitFromRightSide(card_number, 15) != 3)
			errMsg += "Enter valid card number\n";
		else if(digitFromRightSide(card_number, 14) != 4 && digitFromRightSide(card_number, 14) != 7)
			errMsg += "Enter valid card number\n";
		if(cvv_no.length != 4)
			errMsg += "Enter valid CVV number(4 digits)\n";
	}

	var today = new Date();
	if(expiry_year.length != 2 && (today.getFullYear() % 2000) > expiry_year)
		errMsg += "Card is already expired, Try different card!\n";	
	else if((today.getMonth() + 1) > expiry_month && (today.getFullYear() % 2000) == expiry_year)
		errMsg += "Card is already expired, Try different card!\n";

	if(!cardholder_name.match(/^[a-zA-Z ]+$/) || cardholder_name.length > 40)
		errMsg = errMsg + "Card holder name must contain alpha characters or less then 40 alphabates.\n";

	if(errMsg != "") {
		alert(errMsg);
		result = false;
	}

	return result;
}

function getPayment() {
	if(sessionStorage.first_name != undefined) {
		document.getElementById("confirm_name").textContent = sessionStorage.first_name + " " + sessionStorage.last_name;
		document.getElementById("confirm_address").textContent = sessionStorage.street_name + ", " + sessionStorage.suburb + ", " + sessionStorage.state + ", " + sessionStorage.pin_code + ". Australia.";
		if(sessionStorage.b_street_name.match("Not applicable") == null)
			document.getElementById("confirm_b_address").textContent = sessionStorage.b_street_name + ", " + sessionStorage.b_suburb + ", " + sessionStorage.b_state + ", " + sessionStorage.b_pin_code + ". Australia.";
		else
			document.getElementById("confirm_b_address").textContent = "Not applicable";
		document.getElementById("confirm_phone_number").textContent = sessionStorage.phone_no;
		document.getElementById("confirm_email_id").textContent = sessionStorage.email_id;
		document.getElementById("confirm_preferred_contact").textContent = sessionStorage.preferred_contact;
		document.getElementById("confirm_category").textContent = sessionStorage.category;
		document.getElementById("confirm_feature").textContent = sessionStorage.product_features;
		document.getElementById("confirm_member_count").textContent = sessionStorage.no_of_members;
		document.getElementById("confirm_cost").textContent = calculateCost();

		document.getElementById("first_name").value = sessionStorage.first_name;
		document.getElementById("last_name").value = sessionStorage.last_name;
		document.getElementById("email_id").value = sessionStorage.email_id;
		document.getElementById("street_name").value = sessionStorage.street_name;
		document.getElementById("suburb").value = sessionStorage.suburb;
		document.getElementById("state").value = sessionStorage.state;
		document.getElementById("postcode").value = sessionStorage.pin_code;
		document.getElementById("b_street_name").value = sessionStorage.b_street_name;
		document.getElementById("b_suburb").value = sessionStorage.b_suburb;
		document.getElementById("b_state").value = sessionStorage.b_state;
		document.getElementById("b_postcode").value = sessionStorage.b_pin_code;
		document.getElementById("phone_number").value = sessionStorage.phone_no;
		document.getElementById("preferred_contact").value = sessionStorage.preferred_contact;
		document.getElementById("category").value = sessionStorage.category;
		document.getElementById("product_features").value = sessionStorage.product_features;
		document.getElementById("member_count").value = sessionStorage.no_of_members;
	}
}

function debugMode(e) {
	var enquire_form = document.getElementById("enquire_form");
	
	if(enquire_form != null) {
		if(document.getElementById("debug").checked) {
			if(!validateEnquire())
				e.preventDefault();
		}
	}
	else {
		if(document.getElementById("debug").checked) {
			if(!validatePayment())
				e.preventDefault();
		}
	}
}

function init() {
	var enquire_form = document.getElementById("enquire_form");
	var payment = document.getElementById("payment");
	var manager = document.getElementById("manager");
	var fix_order = document.getElementById("fix_enquire_form");
	var receipt = document.getElementById("receipt");
	
	if(enquire_form != null) {
		var check_box = document.getElementById("billing_add");
		check_box.onchange = showBillingAddress;
		document.getElementById("category").onchange = showPrice;
		var check_boxes = document.getElementsByName("product_features");
		for(var i = 0; i < check_boxes.length; i++)
			check_boxes[i].onchange = changeRequiredField;
		enquire_form.onsubmit = debugMode;
	}
	else if(payment != null) {
		payment.onload = getPayment();
		
		var radio_options = document.getElementsByName("payment_type");
		for(var i = 0; i < radio_options.length; i++)
			radio_options[i].onchange = changeImg;
		payment.onsubmit = debugMode;
		document.getElementById("cancelButton").onclick = cancelBooking;
	}
	else if(fix_order != null) {
		var radio_options = document.getElementsByName("payment_type");
		for(var i = 0; i < radio_options.length; i++)
			radio_options[i].onchange = changeImg;
		fix_order.onsubmit = debugMode;
		document.getElementById("cancelButton").onclick = cancelBooking;
	}
	else if(receipt != null)
		document.getElementById("backButton").onclick = cancelBooking;
}
window.onload = init;