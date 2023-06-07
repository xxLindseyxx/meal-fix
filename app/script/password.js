// This function is used for the password match in the create an account form

function passwordMatch(passwordInput, repeatInput, errorMessage)
{
const password = document.getElementById(passwordInput);
const repeatPassword = document.getElementById(repeatInput);
const message = document.getElementById(errorMessage);

  repeatPassword.addEventListener('input', () => 
  {
    if (password.value !== repeatPassword.value) 
    {
      message.style.display = 'block';
    } else {
      message.style.display = 'none';
    }
  });
}

passwordMatch('password', 'repeat-password', 'message');

// This function is used to check if the password is storng enough
function passwordRequrements(passwordInput, repeatInput, errorMessage)
{
const password = document.getElementById(passwordInput);
const repeatPassword = document.getElementById(repeatInput);
const message = document.getElementById(errorMessage);
const hasUpperCaseLetter = /[A-Z]/.test(password);
const hasNumber = /\d/.test(password);

repeatPassword.addEventListener('input', () => {
  
    if (password !== repeatPassword || !hasUpperCaseLetter || !hasNumber) 
    {
      message.style.display = 'block';
    } else 
    {
      message.style.display = 'none';
    }
  });
}

passwordRequrements('password', 'repeat-password', 'eMessage');