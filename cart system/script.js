function showPage(pageId) {
  let pages = document.querySelectorAll(".page");
  pages.forEach(page => page.classList.remove("active"));
  document.getElementById(pageId).classList.add("active");
}

function homeAlert() {
  alert("Welcome to Home Page!");
}

function sendMessage() {
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;

  if (name === "" || email === "") {
    alert("Please fill all fields");
  } else {
    alert("Message Sent Successfully!");
  }
}

