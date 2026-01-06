function showPage(pageId) {
  let pages = document.querySelectorAll(".page");
  let navItems = document.querySelectorAll("nav li");

  pages.forEach(page => page.classList.remove("active"));
  document.getElementById(pageId).classList.add("active");

  navItems.forEach(item => item.classList.remove("active"));
  document.getElementById("nav-" + pageId).classList.add("active");
}

function homeAlert() {
  alert("Welcome to the Cool Home Page!");
}

function sendMessage() {
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;

  if(name === "" || email === "") {
    alert("Please fill all fields!");
  } else {
    alert(`Thank you, ${name}! Your message has been sent.`);
  }
}
