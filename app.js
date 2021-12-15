/* SCRIPT FOR USER NAV DROPDOWN */
function userNav1() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function userNav2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches(".dropbtn1")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};
window.onclick = function (event) {
  if (!event.target.matches(".dropbtn2")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};

//Scripts for Signup/Signin tabs in modal
function openTab(evt, tabName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active-tab", "");
  }
  document.getElementById(tabName).style.display = "flex";
  evt.currentTarget.className += "active-tab";
}

// Script that handles the changes in the verification modal.
function verificationConfirm() {
  const before = document.getElementById("before");
  const after = document.getElementById("after");
  const before_foot = document.getElementById("before_foot");
  const after_foot = document.getElementById("after_foot");

  before.style.display = "none";
  after.style.display = "block";
  before_foot.style.display = "none";
  after_foot.style.display = "flex";
}

// Changing Modal content on "Verify Phone"
function phoneConfirm() {
  const before = document.getElementById("phone-validation-header");
  const after = document.getElementById("phone-validation-header_after");
  const before_foot = document.getElementById("phone-validation-footer");
  const after_foot = document.getElementById("phone-validation-footer_after");

  before.style.display = "none";
  after.style.display = "block";
  before_foot.style.display = "none";
  after_foot.style.display = "flex";
}

//Scripts for fetching Signup/Signin apis in modal
async function login() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-login", {
    method: "POST",
    body: new FormData(form),
  });
  let response = await conn.json();
  console.log(response);
  if (conn.ok) {
    location.href = "index";
  } else {
    _one("#feedback_login").innerHTML = " ";
    _one("#feedback_login").classList.add("badge", "bg-danger");
    _one("#feedback_login").innerHTML = JSON.stringify(response);
  }
}

async function signup() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-signup", {
    method: "POST",
    body: new FormData(form),
  });
  let response = await conn.json();
  console.log(response);
  if (conn.ok) {
    location.href = "index";
  } else {
    _one("#feedback_signup").innerHTML = " ";
    _one("#feedback_signup").classList.add("badge", "bg-danger");
    _one("#feedback_signup").innerHTML = JSON.stringify(response);
  }
}

// ForgotPassword inital verification
async function forgotPassword() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-forgotten-pass", {
    method: "POST",
    body: new FormData(form),
  });

  if (conn.ok) {
    forgotConfirm();
  }
}

// Changing Modal content on "Forgot Password"
async function forgotConfirm() {
  const before = document.getElementById("forgot-before");
  const after = document.getElementById("forgot-after");

  before.style.display = "none";
  after.style.display = "flex";
}

// Uploading item feedback
async function uploadItem() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-upload-item", {
    method: "POST",
    body: new FormData(form),
  });
  let response = await conn.json();
  console.log(response);
  if (conn.ok) {
    _one("#feedback_upload").innerHTML = " ";
    _one("#feedback_upload").classList.remove("bg-danger");
    _one("#feedback_upload").classList.add(
      "badge",
      "text-center",
      "bg-success"
    );
    _one("#feedback_upload").innerHTML = JSON.stringify(response);
    _one("#feedback_upload").scrollIntoView();
  } else {
    _one("#feedback_upload").innerHTML = " ";
    _one("#feedback_upload").classList.add("badge", "text-center", "bg-danger");
    _one("#feedback_upload").innerHTML = JSON.stringify(response);
    _one("#feedback_upload").scrollIntoView();
  }
}

async function sendVerify() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("email/verify-mail", {
    method: "POST",
    body: new FormData(form),
  });

  if (conn.ok) {
    verificationConfirm();
  }
}

async function updateName() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-edit-name", {
    method: "POST",
    body: new FormData(form),
  });
  if (conn.ok) {
    location.href = "account-settings";
  }
}

async function updateScreenName() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-edit-screenname", {
    method: "POST",
    body: new FormData(form),
  });
  if (conn.ok) {
    location.href = "account-settings";
  }
}

async function changeEmail() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-edit-email", {
    method: "POST",
    body: new FormData(form),
  });
  if (conn.ok) {
    location.href = "account-settings";
  }
}

async function changePass() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-edit-password", {
    method: "POST",
    body: new FormData(form),
  });
  let response = await conn.json();
  console.log(response);
  if (conn.ok) {
    _one("#feedback_pass").innerHTML = " ";
    _one("#feedback_pass").classList.remove("bg-danger");
    _one("#feedback_pass").classList.add("badge", "bg-success");
    _one("#feedback_pass").innerHTML = "Your password has been changed";
  } else {
    _one("#feedback_pass").innerHTML = " ";
    _one("#feedback_pass").classList.add("badge", "bg-danger");
    _one("#feedback_pass").innerHTML = JSON.stringify(response);
  }
}

async function verifyPhone() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-verify-phone", {
    method: "POST",
    body: new FormData(form),
  });
  if (conn.ok) {
    phoneConfirm();
  } else {
    _one("#feedback_phone").innerHTML = " ";
    _one("#feedback_phone").classList.add("badge", "bg-danger");
    _one("#feedback_phone").innerHTML = JSON.stringify(response);
  }
}

async function enableTwofa() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-authenticator", {
    method: "POST",
    body: new FormData(form),
  });
  let response = await conn.json();
  console.log(response);
  if (conn.ok) {
    _one("#feedback_2fa").innerHTML = " ";
    _one("#feedback_2fa").classList.remove("bg-danger");
    _one("#feedback_2fa").classList.add("badge", "bg-success");
    _one("#feedback_2fa").innerHTML =
      "Your phone has been verified and registered";
  } else {
    _one("#feedback_2fa").innerHTML = " ";
    _one("#feedback_2fa").classList.add("badge", "bg-danger");
    _one("#feedback_2fa").innerHTML = JSON.stringify(response);
  }
}

async function deleteUser() {
  const form = event.target.form;
  console.log(form);
  let conn = await fetch("apis/api-delete-user", {
    method: "POST",
    body: new FormData(form),
  });
  if (conn.ok) {
    location.href = "index";
  }
}
