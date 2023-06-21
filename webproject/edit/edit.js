function myFunction(o) {
    var p=o.parentNode;
     p.parentNode.removeChild(p);
  }

//window.addEventListener("load", info);

function info() {
    var log = localStorage.getItem("log");
    var sign = localStorage.getItem("sig");

    var username = localStorage.getItem("user");
    var email = localStorage.getItem("email");
    var dob = localStorage.getItem("dob");

    var username1 = localStorage.getItem("user1");
    if (log) {
        document.getElementById("username").value = username1;
    } else {
        if (sign) {
            document.getElementById("username").value = username;
            document.getElementById("email").value = email;
            if (dob != null) {
                document.getElementById("dob").value = dob;
            }
        }else{
        document.getElementById("a").innerHTML="Not Logged in or Sign up!!";
        document.getElementById("a").style.color="black";
        document.getElementById("a").style.fontSize="medium";
    }
    }
}

function add(){
    var text = document.getElementById("newadd").value;
    if (text != '' && text != null) {
        document.getElementById("add").innerHTML += "<br>" + text;
    }
}

