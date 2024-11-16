// displaying the dropdown
// function logIn() {
//   document.getElementById("login-dropdown").classList.toggle("log-in-show");
// }
// function signUp() {
//   document.getElementById("signup-dropdown").classList.toggle("sign-up-show");
// }

// Close the dropdown if the user clicks outside of it
window.onclick = function (e) {
  if (!e.target.matches(".log-in-drop-btn")) {
    var loginDropdown = document.getElementById("login-dropdown");
    if (loginDropdown.classList.contains("log-in-show")) {
      loginDropdown.classList.remove("log-in-show");
    }
  }

  if (!e.target.matches(".sign-up-drop-btn")) {
    var signupDropdown = document.getElementById("signup-dropdown");
    if (signupDropdown.classList.contains("sign-up-show")) {
      signupDropdown.classList.remove("sign-up-show");
    }
  }
};

// displaying customer sign up form
function displayCustomerSignUp() {
  const cusSignUpForm = document.getElementById("customer-sign-up");

  cusSignUpForm.style.display = "block";

  setTimeout(() => {
    document.addEventListener("click", hideFormOnClickOutside);
  }, 0);
}

// displaying customer log in form
function displayLogIn() {
  const cusLogInForm = document.getElementById("log-in");

  cusLogInForm.style.display = "block";

  setTimeout(() => {
    document.addEventListener("click", hideFormOnClickOutside);
  }, 0);
}

// displaying admin log in form
// function displayAdminLogIn() {
//   const adminLogInForm = document.getElementById("admin-log-in");

//   adminLogInForm.style.display = "block";

//   setTimeout(() => {
//     document.addEventListener("click", hideFormOnClickOutside);
//   }, 0);
// }

// displaying verify email form
function verifyEmailForm() {
  const verifyEmailForm = document.getElementById("verify-email");

  verifyEmailForm.style.display = "block";

  setTimeout(() => {
    document.addEventListener("click", hideFormOnClickOutside);
  }, 0);
}

// hiding customer or admin sign up/log in form
function hideFormOnClickOutside(event) {
  const cusSignUpForm = document.getElementById("customer-sign-up");
  const triggerButton = document.getElementsByClassName("sign-up-button");
  const cusLogInForm = document.getElementById("log-in");
  const triggerButton2 = document.getElementsByClassName("log-in-button");
  const verifyEmailForm = document.getElementById("verify-email");
  const triggerButton3 = document.getElementsByClassName("verify-button");

  if (!cusSignUpForm.contains(event.target) && event.target !== triggerButton) {
    cusSignUpForm.style.display = "none";
    document.removeEventListener("click", hideFormOnClickOutside);
  }
  //   if (
  //     !adminLogInForm.contains(event.target) &&
  //     event.target !== triggerButton2
  //   ) {
  //     adminLogInForm.style.display = "none";
  //     document.removeEventListener("click", hideFormOnClickOutside);
  //   }
  if (!cusLogInForm.contains(event.target) && event.target !== triggerButton2) {
    cusLogInForm.style.display = "none";
    document.removeEventListener("click", hideFormOnClickOutside);
  }
  if (
    !verifyEmailForm.contains(event.target) &&
    event.target !== triggerButton3
  ) {
    verifyEmailForm.style.display = "none";
    document.removeEventListener("click", hideFormOnClickOutside);
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
