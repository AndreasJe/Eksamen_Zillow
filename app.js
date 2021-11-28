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

function phoneConfirm() {
  const before = document.getElementById("phone-validation-header");
  const after = document.getElementById("phone-validation-header_after");
  const before_foot = document.getElementById("phone-validation-footer");
  const after_foot = document.getElementById("phone-validation-footer_after");

  before.style.display = "none";
  after.style.display = "flex";
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

  if (conn.ok) {
    location.href = "index";
  }
}
async function signup() {
  try {
    const form = event.target.form;
    console.log(form);
    let conn = await fetch("apis/api-signup", {
      method: "POST",
      body: new FormData(form),
    });
  } catch (ex) {
    console.error(ex);
    const feedback_login = document.getElementById("feedback_signup");
    feedback_login.innerHTML = ex.message;
  }
}
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

async function forgotConfirm() {
  const before = document.getElementById("forgot-before");
  const after = document.getElementById("forgot-after");

  before.style.display = "none";
  after.style.display = "flex";
}
