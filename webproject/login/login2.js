function validate() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  localStorage.setItem("user1", username);

  let log = false;
  localStorage.setItem("log", log);
  log = localStorage.getItem("log");

  if (username == "admin" && password == "1234") {
    //go to admin page
    window.location = "";
  }
  if (username == "user1" && password == "1234") {
    //go to home page
    log = true;
    localStorage.setItem("log", log);
    window.location = "../Pages/home.html";
  } else {
    //show alert
    document.getElementById("a").innerHTML = "Login Unsuccessful!";
    document.getElementById("a").style.color = "red";
    document.getElementById("a").style.fontSize = "medium";
  }
}
