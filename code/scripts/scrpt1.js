let defaultMsg ="";
let loginErrorMsg = "User name should be non-empty and within 30 characters long";
//create paragraph to display the error Msg returned by validateLogin() function and assign this paragraph to the class warning,
// append the created element to the parent of login textfield.
let loginInput = document.getElementById("login0");
let loginError = document.createElement('p');
loginError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[0].append(loginError);
//method to validate user name and add event listener.
function validateLogin(){
    if((loginInput.value.trim() === "") ||
        (loginInput.value.length >30 )) {
        return loginError.textContent = loginErrorMsg;
     }      
    else {
        loginInput.value = loginInput.value.toLowerCase();
        return defaultMsg;
    }
}; 
let passwordErrorMsg = "Password should be at least 8 characters: 1 uppercase, 1 lowercase";
// create paragraph to display the error Msg returned by validatePassword() function,
// assign this paragraph to the class warning, append it to the parent of password.
let passwordInput = document.getElementById("pass0");
let passwordError = document.createElement('p');
passwordError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[1].append(passwordError);
//method to validate password.
function validatePassword(){
    if((passwordInput.value.trim() ==="") ||
        (passwordInput.value.length < 8) ||
        (!/[A-Z]/.test(passwordInput.value)) ||
        (!/[a-z]/.test(passwordInput.value)) )
        {return passwordError.textContent =passwordErrorMsg;}
    else {return defaultMsg;}
};

function validateIndex(){    
    let valid = true;
    let loginValidation = validateLogin();
    let passwordValidation = validatePassword();
    
    if (loginValidation !== defaultMsg){
        loginError.textContent = loginErrorMsg;
        valid = false;
    };
    if (passwordValidation !== defaultMsg){
        passwordError.textContent = passwordErrorMsg;
        valid = false;
    };
    return valid;
};

loginInput.addEventListener("change",()=>{
    let validationMsg =validateLogin();
    if (validationMsg === defaultMsg ){
        loginError.textContent = defaultMsg;
    }
    else {loginError.textContent=validationMsg;}
} );
passwordInput.addEventListener("change", ()=>{
    let validationMsg =validatePassword();
    if (validationMsg === defaultMsg){
        passwordError.textContent = defaultMsg;
    }
    else {passwordError.textContent = validationMsg;}
});
function resetFormatError1(){
    loginError.textContent = defaultMsg;    
    passwordError.textContent = defaultMsg;    
};
document.forms[1].addEventListener("reset",resetFormatError1);