let loginInput=document.querySelector("#login");
let passInput=document.querySelector("#pass");
let pass2Input=document.querySelector("#pass2");
let phoneInput=document.querySelector("#phone");
let emailInput=document.querySelector("#email");
let termsInput=document.querySelector("#terms");
// create paragraph to display the error Msg returented by vaildateEmail() function 
// and assign this paragraph to the class warning to style the error MSg
let loginError=document.createElement('p');
loginError.setAttribute("class","warning");
document.querySelectorAll(".form__row")[0].append(loginError);

let passError=document.createElement('p');
passError.setAttribute("class","warning");
document.querySelectorAll(".form__row")[1].append(passError);

let pass2Error=document.createElement('p');
pass2Error.setAttribute("class","warning");
document.querySelectorAll(".form__row")[2].append(pass2Error)

let phoneError=document.createElement('p');
phoneError.setAttribute("class","warning");
document.querySelectorAll(".form__row")[3].append(phoneError);

let emailError=document.createElement('p');
emailError.setAttribute("class","warning");
//append the created element to the parent of email div
document.querySelectorAll(".form__row")[4].append(emailError);

let termError=document.createElement('p');
termError.setAttribute("class","warning");
document.querySelectorAll(".form__row")[5].append(termError);

//define a global variables
let defaultMSg="";

let loginErrorMsg="User name should be non-emptu, and within 30 characters long";
let loginlengthErrorMsg="User name can not longer than 30 characters";
let passErrorMsg="Please enter a password";
let passlengthErrorMsg="Password should be at least 8 characters long"
let pass2ErrorMsg="Please re-type password";
let pass2notmatchErrorMsg="Please ensure both password are same";
let emailErrorMsg="Email address should be non-empty with the formal xyx@xyz.xyz";
let phoneErrorMsg="Phone should be non-empty with the formal 364-7586909";
let termsErrorMsg="terms must be checked";

//method to validate User Name
function validateLogin() {
    let login = loginInput.value;
    
    if(login.length>30){ 
    error = loginlengthErrorMsg;}
    else if(login.length>0 && login.length<30){
    error = defaultMSg;
    }
    else{
    error = loginErrorMsg;}
    return error; 
}

//method to validate pass
function validatePass(){
    let pass = passInput.value; 
    
    if(pass.length>=8){ 
    error = defaultMSg;}
    else if(pass.length>0 && pass.length<8){
    error = passlengthErrorMsg;
    }
    else {
    error = passErrorMsg;}
    return error;      
}

//method to validate pass2
function validatePass2(){
    let pass2 = pass2Input.value; 
    let pass = passInput.value;
    
    if(pass2==pass && pass2.length>0){ 
    error = defaultMSg;}
    else if(pass2.length>0){
    error = pass2notmatchErrorMsg;
    }
    else{
    error = pass2ErrorMsg;}
    return error;      
}

//method to validate email
function validateEmail(){
    let email = emailInput.value; // access the value of the email
    let regexp=/\S+@\S+\.\S+/; //reg. expression 
    
    if(regexp.test(email)){ //test is predefiend method to check if the entered email matches the regexp
    error = defaultMSg;}
    else {
    error = emailErrorMsg;}
    return error;      
}

function validatePhone(){
    let phone = phoneInput.value; // access the value of the email
    let regexp=/^\d{3}-\d{7}$/; //reg. expression 
    
    if(regexp.test(phone)){ //test is predefiend method to check if the entered phone matches the regexp
    error = defaultMSg;}
    else {
    error = phoneErrorMsg;}
    return error;      
}

//method to validate the terms 
function validatTerms(){
    if(termsInput.checked)
    return defaultMSg;
    else
    return termsErrorMsg;
}

//event handler for submit event
function validate(){
    let valid = true;//global validation 

    let loginValidation=validateLogin();
    if(loginValidation !==defaultMSg){
        loginError.textContent = loginValidation;
        valid = false;
        loginInput.style.borderColor="red";        
    }

    let passValidation=validatePass();
    if(passValidation !==defaultMSg){
        passError.textContent = passValidation;
        valid = false;  
        passInput.style.borderColor="red";     
    }

    let pass2Validation=validatePass2();
    if(pass2Validation !==defaultMSg){
        pass2Error.textContent = pass2Validation;
        valid = false;
        pass2Input.style.borderColor="red";        
    }

    let emailValidation=validateEmail();
    if(emailValidation !==defaultMSg){
        emailError.textContent = emailValidation;
        valid = false; 
        emailInput.style.borderColor="red";
    }

    let phoneValidation=validatePhone();
    if(phoneValidation !==defaultMSg){
        phoneError.textContent = phoneValidation;
        valid = false; 
        phoneInput.style.borderColor="red";
    }

    let termsValidation=validatTerms();    
    if(termsValidation!==defaultMSg){
        termError.textContent=termsValidation;
        valid = false;
    }
    return valid;
};

// event listner to empty the text inside the paragraphs when resent
function reserFormError() {

    loginError.textContent=defaultMSg;
    passError.textContent=defaultMSg;
    pass2Error.textContent=defaultMSg;
    emailError.textContent=defaultMSg;
    phoneError.textContent=defaultMSg;
    termError.textContent=defaultMSg;
    loginInput.style.borderColor="";
    passInput.style.borderColor="";
    pass2Input.style.borderColor="";
    emailInput.style.borderColor="";
    phoneInput.style.borderColor="";
}
 document.form.addEventListener("reset",reserFormError);

// add event listner to the email if you entered correct email,the error paragraph with be empty

loginInput.addEventListener("blur",()=>{ 
    let x=validateLogin();
    loginError.textContent = x;
    if(x==defaultMSg){
    loginInput.style.borderColor="";}
    else{
    loginInput.style.borderColor="red";}
    });

passInput.addEventListener("blur",()=>{ 
    let x=validatePass();
    passError.textContent = x; 
    if(x==defaultMSg){
    passInput.style.borderColor="";}
    else{
    passInput.style.borderColor="red";}
    });

pass2Input.addEventListener("blur",()=>{ 
    let x=validatePass2();
    pass2Error.textContent = x;
    if(x==defaultMSg){
    pass2Input.style.borderColor="";}
    else{
    pass2Input.style.borderColor="red";}
    });

emailInput.addEventListener("blur",()=>{ // arrow function
    let x=validateEmail();
    emailError.textContent = x;
    if(x==defaultMSg){
    emailInput.style.borderColor="";
    }
    else{
    emailInput.style.borderColor="red";    
    }
    });

phoneInput.addEventListener("blur",()=>{ // arrow function
    let x=validatePhone();
    phoneError.textContent = x;
    if(x==defaultMSg){
    phoneInput.style.borderColor="";
    }
    else{
    phoneInput.style.borderColor="red";    
    }
    });

// add event listner to the checkbox if you check the terms box,the error paragraph with be empty
termsInput.addEventListener("change", function(){// anonymous function
    if(this.checked){
        termError.textContent= defaultMSg;
    }
    else{
        termError.textContent = termsErrorMsg
    }
    });