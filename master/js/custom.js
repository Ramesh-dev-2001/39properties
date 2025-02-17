function validateName(stringValue)
{
    //  alpha [A-Za -z] ,
    //  between {3 and 50} , 
    //  no space  ,
    //  no special character  ,
    //  no number
    
    //var letters = /^[A-Za-z]+$/;
    var letters = /^[A-Za-z\s]+$/;


    stringValue = stringValue.trim();
     
    if(stringValue == '') {
        return 'Please enter the Name';
    } else if (stringValue.length < 3 || stringValue.length > 64) {
        return 'Minimum 3 and Maximum 64 characters allowed';
    } else if (!stringValue.match(letters)) {
        return 'Special characters and numbers are not allowed';
    } else {
        return '';
    }  
}

function validateDescription(stringValue)
{      
    stringValue = stringValue.trim();
     
      if(stringValue == '') {
        return 'Please enter the value';
    } else if (stringValue.length > 500) {
        return 'Maximum 500 characters allowed';
    } else {
        return '';
    }  
}

function validateextraDetails(extraDetails)
{      
    extraDetails = extraDetails.trim();
     
    if(extraDetails == '') {
        return 'Please enter the value';
    } else if (extraDetails.length > 1000) {
        return 'Maximum 1000 characters allowed';
    } else {
        return '';
    }  
}

function validatePolicies(policies)
{      
    policies = policies.trim();
     
    if(policies == '') {
        return 'Please enter the value';
    } else if (policies.length > 1000) {
        return 'Maximum 1000 characters allowed';
    } else {
        return '';
    }  
}

function validatePhone(phoneNumber)
{
    var letters = /^\+{0,2}([\-\. ])?(\(?\d{0,3}\))?([\-\. ])?\(?\d{0,3}\)?([\-\. ])?\d{3}([\-\. ])?\d{4}/; 
    phoneNumber = phoneNumber.trim();
     
    if(phoneNumber == '') {
        return 'Please enter the value';
    } else if (phoneNumber.length > 15) {
        return 'Maximum 15 characters allowed';
    } else if (!phoneNumber.match(letters)) {
        return 'Not valid Phone Number';
    } else {
        return '';
    }
}

function validateEmail(email)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    email = email.trim();
     
    if(email == '') {
        return 'Please enter the Email';
    } else if (email.length > 80) {
        return 'Maximum 80 characters allowed';
    } else if (!email.match(mailformat)) {
        return 'Not valid email';
    } else {
        return '';
    }
}

function validatePassword(password)
{
    var strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
    var mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')
 
    password = password.trim();
     
    if(password == '') {
        return 'Please enter the value';
    } else if (password.length < 8) {
        return 'Minimum 8 characters allowed';
    } else if(strongPassword.test(password)) {
        return 'Strong';
    } else if(mediumPassword.test(password)) {
        return 'Medium';
    } else {
        return 'Password must follow the criteria below<br> * 8 characters,<br>* one uppercase letter (?=.*[A-Z]),<br>* one lowercase letter (?=.*[a-z]),<br>* one digit (?=.*[0-9]),<br>* one special character ([^A-Za-z0-9]).';
    }
}

function validateInteger(integerNumber)
{
    integerNumber = integerNumber.trim();
    
    if(integerNumber == '') {
        return 'Please enter the value';
    } else if(/\D/.test(integerNumber)) {
        return 'Please enter the numeric value';
    } else {
        return '';
    }
}


function validateDecimal(decimalNumber)
{
    decimalNumber = decimalNumber.trim();
    var re = /(?:\d*\.\d{1,10}|\d+)$/;
 
    if(decimalNumber == '') {
        return 'Please enter the value';
    } else if(!re.test(decimalNumber)) {
        return 'Please enter the numeric value';
    } else {
        return '';
    }
}

function validateIntegerLimit(integerNumber,l)
{
    integerNumber = integerNumber.trim();
    
    if(integerNumber == '') {
        return 'Please enter the value';
    } else if(/\D/.test(integerNumber)) {
        return 'Please enter the numeric value';
    } else if(integerNumber.length > l) {
        return 'Maximum '+l+' digits allowed';
    } else {
        return '';
    }
}

function validateImage(img) 
{
    if (img == '') {
        return "Please upload an image";
    } else {

        var Extension = img.substring(img.lastIndexOf('.') + 1).toLowerCase();
        if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                || Extension == "jpeg" || Extension == "jpg") { 
            return '';
        } 
        else 
        {
            return "Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.";
        }
    }
}


function validateImages(oForm) 
{
    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    return "Allowed extensions are: " + _validFileExtensions.join(", ");
                }
            }
        }
    }
    return '';
}
