let loginInput=document.querySelector("#login");
let passInput=document.querySelector("#pass");

// create paragraph to display the error Msg returented by vaildateEmail() function 
// and assign this paragraph to the class warning to style the error MSg
let loginError=document.createElement('p');
loginError.setAttribute("class","warning");
document.querySelectorAll(".form__row")[0].append(loginError);

let passError=document.createElement('p');
passError.setAttribute("class","warning");
document.querySelectorAll(".form__row")[1].append(passError);

//define a global variables
let defaultMSg="";

let loginErrorMsg="User name should be non-emptu, and within 30 characters long";
let loginlengthErrorMsg="User name can not longer than 30 characters";
let passErrorMsg="Please enter a password";
let passlengthErrorMsg="Password should be at least 8 characters long"

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

    return valid;
};

// event listner to empty the text inside the paragraphs when resent
function reserFormError() {

    loginError.textContent=defaultMSg;
    passError.textContent=defaultMSg;

    loginInput.style.borderColor="";
    passInput.style.borderColor="";
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