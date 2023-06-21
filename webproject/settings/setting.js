function signout(){
    var log=localStorage.getItem("log");
    var sign=localStorage.getItem("sig");

    if(log){
        localStorage.setItem("log",false);
    }
    else{
        if(sign){
            localStorage.setItem("sign",false);
        }
    }
    window.location="../Pages/home.html";
}
