// displaying customer sign up form
function displayCustomerSignUp() {
  const cusSignUpForm = document.getElementById("customer-sign-up");
  const cusLogInForm = document.getElementById("log-in");
  const verifyEmailForm = document.getElementById("verify-email");

  if (cusSignUpForm.style.display === "block") {
    cusSignUpForm.style.display = "none";
  } else {
    cusSignUpForm.style.display = "block";
    cusLogInForm.style.display = "none";
    verifyEmailForm.style.display = "none";
  }
}

// displaying customer log in form
function displayLogIn() {
  const cusSignUpForm = document.getElementById("customer-sign-up");
  const cusLogInForm = document.getElementById("log-in");
  const verifyEmailForm = document.getElementById("verify-email");

  if (cusLogInForm.style.display === "block") {
    cusLogInForm.style.display = "none";
  } else {
    cusLogInForm.style.display = "block";
    cusSignUpForm.style.display = "none";
    verifyEmailForm.style.display = "none";
  }
}

// displaying verify email form
function verifyEmailForm() {
  const verifyEmailForm = document.getElementById("verify-email");
  const cusSignUpForm = document.getElementById("customer-sign-up");
  const cusLogInForm = document.getElementById("log-in");

  if (verifyEmailForm.style.display === "block") {
    verifyEmailForm.style.display = "none";
  } else {
    verifyEmailForm.style.display = "block";
    cusLogInForm.style.display = "none";
    cusSignUpForm.style.display = "none";
  }
}

// show password functionality
function cusSignUp() {
  const cusSignUpPass = document.getElementById("cusSignUpPass");

  if (cusSignUpPass.type == "password") {
    cusSignUpPass.type = "text";
  } else {
    cusSignUpPass.type = "password";
  }
}

function cusSignUpRep() {
  const cusSignUpRepPass = document.getElementById("cusSignUpRepPass");

  if (cusSignUpRepPass.type == "password") {
    cusSignUpRepPass.type = "text";
  } else {
    cusSignUpRepPass.type = "password";
  }
}

function cusPass() {
  const cusPass = document.getElementById("cusLogPass");

  if (cusPass.type == "password") {
    cusPass.type = "text";
  } else {
    cusPass.type = "password";
  }
}

// function adminPass() {
//   const adminPass = document.getElementById("adminLogPass");

//   if (adminPass.type == "password") {
//     adminPass.type = "text";
//   } else {
//     adminPass.type = "password";
//   }
// }

function closeForm() {
  const verifyEmailForm = document.getElementById("verify-email");
  const cusSignUpForm = document.getElementById("customer-sign-up");
  const cusLogInForm = document.getElementById("log-in");

  verifyEmailForm.style.display = "none";
  cusLogInForm.style.display = "none";
  cusSignUpForm.style.display = "none";
}
