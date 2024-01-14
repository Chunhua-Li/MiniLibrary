let titleInput=document.querySelector("#title");
let authorInput=document.querySelector("#author");
let genreInput=document.querySelector("#genre");
// create paragraph to display the error Msg returented by vaildateEmail() function 
// and assign this paragraph to the class warning to style the error MSg
let titleError=document.createElement('p');
titleError.setAttribute("class","warning");
document.querySelectorAll(".form__row")[0].append(titleError);

let authorError=document.createElement('p');
authorError.setAttribute("class","warning");
document.querySelectorAll(".form__row")[1].append(authorError);

let genreError=document.createElement('p');
genreError.setAttribute("class","warning");
document.querySelectorAll(".form__row")[2].append(genreError)

//define a global variables
let defaultMSg="";

let titleErrorMsg="Please enter book title.";
let authorErrorMsg="Please enter author name.";
let genreErrorMsg="Please enter genre.";

//method to validate book title
function validateTitle() {
    let title = titleInput.value;
    
    if(title.length>0){ 
    error = defaultMSg;
    }
    else{
    error = titleErrorMsg;}
    return error; 
}

//method to validate author
function validateAuthor(){
    let author = authorInput.value; 
    
    if(author.length>0){ 
    error = defaultMSg;}
    else {
    error = authorErrorMsg;}
    return error;      
}

//method to validate genre
function validateGenre(){
    let genre = genreInput.value; 
    
    if(genre.length>0){ 
    error = defaultMSg;    }
    else{
    error = genreErrorMsg;}
    return error;      
}

//event handler for submit event
function validate(){
    let valid = true;//global validation 

    let titleValidation=validateTitle();
    if(titleValidation !==defaultMSg){
        titleError.textContent = titleValidation;
        valid = false;
        titleInput.style.borderColor="red";        
    }

    let authorValidation=validateAuthor();
    if(authorValidation !==defaultMSg){
        authorError.textContent = authorValidation;
        valid = false;  
        authorInput.style.borderColor="red";     
    }

    let genreValidation=validateGenre();
    if(genreValidation !==defaultMSg){
        genreError.textContent = genreValidation;
        valid = false;
        genreInput.style.borderColor="red";        
    }

    return valid;
};

// event listner to empty the text inside the paragraphs when resent
function reserFormError() {

    titleError.textContent=defaultMSg;
    authorError.textContent=defaultMSg;
    genreError.textContent=defaultMSg;

    titleInput.style.borderColor="";
    authorInput.style.borderColor="";
    genreInput.style.borderColor="";
}
 document.form.addEventListener("reset",reserFormError);

titleInput.addEventListener("blur",()=>{ 
    let x=validateTitle();
    titleError.textContent = x;
    if(x==defaultMSg){
    titleInput.style.borderColor="";}
    else{
    titleInput.style.borderColor="red";}
    });

authorInput.addEventListener("blur",()=>{ 
    let x=validateAuthor();
    authorError.textContent = x; 
    if(x==defaultMSg){
    authorInput.style.borderColor="";}
    else{
    authorInput.style.borderColor="red";}
    });

genreInput.addEventListener("blur",()=>{ 
    let x=validateGenre();
    genreError.textContent = x;
    if(x==defaultMSg){
    genreInput.style.borderColor="";}
    else{
    genreInput.style.borderColor="red";}
    });