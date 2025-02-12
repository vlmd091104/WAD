const signUpBtn = document.getElementById('signUpBtn');
const signInBtn = document.getElementById('signInBtn');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signUp');

signUpBtn.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})

signInBtn.addEventListener('click',function(){
    signUpForm.style.display="none";
    signInForm.style.display="block";
})