// displaying the dropdown
function logIn() {
  document.getElementById("login-dropdown").classList.toggle("log-in-show");
}
function signUp() {
  document.getElementById("signup-dropdown").classList.toggle("sign-up-show");
}

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

// displaying admin sign up form
function displayAdminSignUp() {
  const cusSignUpForm = document.getElementById("admin-sign-up");

  cusSignUpForm.style.display = "block";

  setTimeout(() => {
    document.addEventListener("click", hideFormOnClickOutside);
  }, 0);
}

// displaying customer log in form
function displayCustomerLogIn() {
  const cusLogInForm = document.getElementById("customer-log-in");

  cusLogInForm.style.display = "block";

  setTimeout(() => {
    document.addEventListener("click", hideFormOnClickOutside);
  }, 0);
}

// displaying admin log in form
function displayAdminLogIn() {
  const adminLogInForm = document.getElementById("admin-log-in");

  adminLogInForm.style.display = "block";

  setTimeout(() => {
    document.addEventListener("click", hideFormOnClickOutside);
  }, 0);
}

// hiding customer or admin sign up/log in form
function hideFormOnClickOutside(event) {
  const cusSignUpForm = document.getElementById("customer-sign-up");
  const adminSignUpForm = document.getElementById("admin-sign-up");
  const triggerButton = document.getElementsByClassName("sign-up-button");
  const cusLogInForm = document.getElementById("customer-log-in");
  const adminLogInForm = document.getElementById("admin-log-in");
  const triggerButton2 = document.getElementsByClassName("log-in-button");

  if (!cusSignUpForm.contains(event.target) && event.target !== triggerButton) {
    cusSignUpForm.style.display = "none";
    document.removeEventListener("click", hideFormOnClickOutside);
  }
  if (
    !adminSignUpForm.contains(event.target) &&
    event.target !== triggerButton
  ) {
    adminSignUpForm.style.display = "none";
    document.removeEventListener("click", hideFormOnClickOutside);
  }
  if (
    !adminLogInForm.contains(event.target) &&
    event.target !== triggerButton2
  ) {
    adminLogInForm.style.display = "none";
    document.removeEventListener("click", hideFormOnClickOutside);
  }
  if (!cusLogInForm.contains(event.target) && event.target !== triggerButton2) {
    cusLogInForm.style.display = "none";
    document.removeEventListener("click", hideFormOnClickOutside);
  }
}

// show password functionality
function adminSignUp() {
  const adminSignUpPass = document.getElementById("adminSignUpPass");

  if (adminSignUpPass.type == "password") {
    adminSignUpPass.type = "text";
  } else {
    adminSignUpPass.type = "password";
  }
}

function adminSignUpRep() {
  const adminSignUpRepPass = document.getElementById("adminSignUpRepPass");

  if (adminSignUpRepPass.type == "password") {
    adminSignUpRepPass.type = "text";
  } else {
    adminSignUpRepPass.type = "password";
  }
}

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

function adminPass() {
  const adminPass = document.getElementById("adminLogPass");

  if (adminPass.type == "password") {
    adminPass.type = "text";
  } else {
    adminPass.type = "password";
  }
}
