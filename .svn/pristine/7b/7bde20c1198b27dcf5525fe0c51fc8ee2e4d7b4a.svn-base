    var specialKeys = new Array(); 
    specialKeys.push(8); //Backspace
    specialKeys.push(9); //Tab
    specialKeys.push(46); //Delete
    specialKeys.push(36); //Home
    specialKeys.push(35); //End
    specialKeys.push(37); //Left
    specialKeys.push(64); //Right
    specialKeys.push(39); //Right
    specialKeys.push(222); //Right
    specialKeys.push(110); //Right

// Function to accept only Alphabet Letters
function OKValidateAlphaOnly(e) {
	var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
	var ret = ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 96 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode || keyCode==46 || keyCode==39 || keyCode==32));            
	return ret;
}
  
// Function to accept numeric value
function numbersonlyEntry(evt) {  
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 48 && charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	else return true;
}
 
// Function to accept Alpha numeric values
function OKValidateAlphaNumeric(e) {  // Allow Alpha numberic values only
	var key;
	var keychar;
	if (window.event) key = window.event.keyCode;
	else if (e) key = e.which;
	else return true;
	keychar = String.fromCharCode(key);
	keychar = keychar.toLowerCase(); // control keys 
	if ((key==null) || (key==0) || (key==46) || (key==32) || (key==8) || (key==9) || (key==13) || (key==27) ) return true; // alphas and numbers
	else if ((("abcdefghijklmnopqrstuvwxyz0123456789&/'").indexOf(keychar) > -1)) return true; else return false; 
}

function restrictHTMLTagEntry(evt) {  // Html Restrict Keys Validation
	var charCode = (evt.which) ? evt.which : evt.keyCode
	if (charCode != 60 && charCode != 62 && charCode != 33 && charCode != 36 && charCode != 61 && charCode != 123 && charCode != 125 && charCode != 91 && charCode != 93 && charCode != 92  && charCode != 13 )
	return true;

	else return false;
}

function OKValidateAlphaSpecialNumeric(e) {  // Allow Alpha numberic values only
	var key;
	var keychar;
	if (window.event) key = window.event.keyCode;
	else if (e) key = e.which;
	else return true;
	keychar = String.fromCharCode(key);
	keychar = keychar.toLowerCase(); // control keys 
	if ((key==null) || (key==0) || (key==46) || (key==32) || (key==8) || (key==9) || (key==13) || (key==27) ) return true; // alphas and numbers
	else if ((("abcdefghijklmnopqrstuvwxyz0123456789&-:/'").indexOf(keychar) > -1)) return true; else return false; 
}

/* -------- Validation Function for mandatory Field---------- */
function validateMandatory (valueId,errId) {
	var getvalue = document.getElementById(valueId).value;
	if(getvalue == "") {
		document.getElementById(errId).innerHTML = errMsg["80547"];
	} else {
		document.getElementById(errId).innerHTML = ""; 
	}
}
/* -------- Validation for Checkbox ---------- */
function validateTermscheck(checkboxvalueId,errvalId) {		 
	var checkboxvalue = document.getElementById(checkboxvalueId);		
	if ((checkboxvalue.checked == false ) ) {						
		document.getElementById(errvalId).innerHTML= errMsg["80547"];
	} else {
		document.getElementById(errvalId).innerHTML=" ";	 
	}
}			
/* -------- End of Validation for Checkbox ---------- */

/* -------- Validation Function for Email ---------- */
function validateEmail(valueId,errId) {
	var getUser = document.getElementById(valueId).value;
	//var at = getUser.indexOf("@");
	//var dot = getUser.lastIndexOf(".");
	var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(getUser == ""){
		document.getElementById(errId).innerHTML = errMsg["80547"];
	} else if (!emailPattern.test(getUser)) {
		document.getElementById(errId).innerHTML = errMsg["80530"];
	} else {
		document.getElementById(errId).innerHTML = "";	
	}
}

/* -------- Validation Function for Url---------- */
 function validateUrl(valueId,errId) {
	var urlval = /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&=]*)/;
	var getUrl = document.getElementById(valueId).value;
	if(getUrl == "") {
		document.getElementById(errId).innerHTML = errMsg["80547"];
	} else if(!urlval.test(getUrl)) {
		document.getElementById(errId).innerHTML = errMsg["80595"];
	} else {
		document.getElementById(errId).innerHTML = "";
	}
}

/* -------- Validation Function for Mobile ---------- */
function validateMobile(valueId,errId) {
	//var mobval = /^\d{9,14}$/;
	var mobval = /^[1-9][0-9]{9,15}$/;
	var getMobile = document.getElementById(valueId).value;
	if(getMobile == "") {     
		document.getElementById(errId).innerHTML =errMsg["80547"];
	} else if(!mobval.test(getMobile)) {
		document.getElementById(errId).innerHTML =errMsg["80533"];
	} else {
		document.getElementById(errId).innerHTML = "";
	}
}
/* -------- Onblur Validation End ---------- */	

/*-------- Validation Function for License ----------*/
function validateLicenseNo(valueId,errId) {
	//var mobval = /^\d{9,14}$/;
	var license_pattern = /^[0-9]{10}$/;
	var getlicense = document.getElementById(valueId).value;
	if(getlicense == "") {     
		document.getElementById(errId).innerHTML =errMsg["80547"];
	} else if(!license_pattern.test(getlicense)) {
		document.getElementById(errId).innerHTML =errMsg["80604"];
	} else {
		document.getElementById(errId).innerHTML = "";
	}
}

/*-------- Validation Card no ----------*/
function validatePaymentCardNo(valueId,errId) {
	var pattern = /^[0-9]{9,20}$/;
	var getno = document.getElementById(valueId).value;
	if(getno == "") {     
		document.getElementById(errId).innerHTML =errMsg["80547"];
	} else if(!pattern.test(getno)) {
		document.getElementById(errId).innerHTML =errMsg["80606"];
	} else {
		document.getElementById(errId).innerHTML = "";
	}
}

/*-------- Validation PostalCode ----------*/
function validatePostalcode(valueId,errId) {
	var pattern = /^[0-9]{5}$/;
	var getpostalcode = document.getElementById(valueId).value;
	if(getpostalcode == "") {     
		document.getElementById(errId).innerHTML =errMsg["80547"];
	} else if(!pattern.test(getpostalcode)) {
		document.getElementById(errId).innerHTML =errMsg["80607"];
	} else {
		document.getElementById(errId).innerHTML = "";
	}
}
/* -------- Onblur Validation End ---------- */	
/* -------- Validation Function for password---------- */
function validatePassword(valueId,errId) {
	var passval = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,30}$/;
	var getPassword = document.getElementById(valueId).value;
	if(getPassword == "") {
		document.getElementById(errId).innerHTML = errMsg["80547"];
	} else if(!passval.test(getPassword)) {
		document.getElementById(errId).innerHTML = errMsg["80603"]; 
	} else {
		document.getElementById(errId).innerHTML = "";
	}
}
/* -------- Validation Function for Mobile ---------- */

/* -------- Validation Function for confirm password---------- */
function validatePasswordMatch(valueId,valueCfnId,errId) {
	var getPassword = document.getElementById(valueId).value;
	var getCfnPassword = document.getElementById(valueCfnId).value;
	if(getPassword != getCfnPassword) {
		document.getElementById(errId).innerHTML = errMsg['80564'];
	} else {
		document.getElementById(errId).innerHTML = "";
	}
}

function Validatedate(valueId,errId) { 
    var getDate = document.getElementById(valueId).value;
	var date = new Date(getDate);
	var convert_toDate= $.datepicker.formatDate('M dd, yy',new Date()); 
	var sys_date = new Date(convert_toDate);
 
    if (date >= sys_date) {
		document.getElementById(errId).innerHTML = "";
    } else {
		document.getElementById(errId).innerHTML = errMsg["80596"]; 
	}
}

/* -------- Date Compare Actual End Date ---------- */
function compareDate(value1,value2,err2) {
	var srt_date = document.getElementById(value1).value;
	var end_date = document.getElementById(value2).value;
	
	var convert_srt_date= $.datepicker.formatDate('dd/mm/yy',new Date(srt_date));
	var convert_end_date= $.datepicker.formatDate('dd/mm/yy',new Date(end_date));
	
	var srtDateSplit = new Date(convert_srt_date.split('/')[2],convert_srt_date.split('/')[1],convert_srt_date.split('/')[0]);
	var endDateSplit = new Date(convert_end_date.split('/')[2],convert_end_date.split('/')[1],convert_end_date.split('/')[0]);

	if(srtDateSplit > endDateSplit) {
		document.getElementById(err2).innerHTML = errMsg['80588'];
	} else {
		document.getElementById(err2).innerHTML = "";
	}
}
	
/* -------- Validation for Password Show Hide Function  ---------- */
function toggle_password(target){
    var tag = document.getElementById(target);
    var tag2 = document.getElementById("showhide");

    if (tag2.innerHTML == 'Hide'){
		tag.setAttribute('type', 'password');
        tag2.innerHTML = 'Show';

    } else {
        tag.setAttribute('type', 'text');
        tag2.innerHTML = 'Hide';
    }
}

/* -------- Date Format Change Function  ---------- */
function date_display_format(date){
	$convert_date= $.datepicker.formatDate('M dd, yy',new Date(date));
	return $convert_date;
}

/* -------- Date Format Change Function  ---------- */
function date_validation_format(date){
	$convert_date= $.datepicker.formatDate('dd/mm/yy',new Date(date));
	return $convert_date;
}

/* --------- Function for get 1st 100 words on Guideline Divider ---------- */
function trimByWord(sentence,count) {
	var result = sentence;
	var resultArray = result.split(" ");	
	if(resultArray.length > count){
	resultArray = resultArray.slice(0, count);	
	result = resultArray.join(" ");
	}
	return result;
}

/* ------------ Function for get Remaining Words for Guideline Divider ---------------- */
function trimByWordEnd(sentence,count) {
	var resultArray = sentence.split(" ");	
	resultArray = resultArray.slice(count);	
	result = resultArray.join(" ");
	return result;
}