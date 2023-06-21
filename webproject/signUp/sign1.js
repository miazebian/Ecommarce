function validate(){
    const username=document.getElementById("username").value;
    const password=document.getElementById("password").value;
    const email=document.getElementById("email").value;
    const dob=document.getElementById("DOB").value;


    const validemail =new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
    const validusername=new RegExp(/\w+/);
    const validpass=new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{5,10}$/);

   
    let go=true;

    if(email=='' && password=='' && username=='' && email==null && password==null && username==null){
        document.getElementById("a").innerHTML="SignUp Unsuccessful!";
        document.getElementById("a").style.color="red";
        document.getElementById("a").style.fontSize="medium";        
        go=false;
    }
    else{
        //validate email
        if(!validemail.test(email)){
            document.getElementById("a").innerHTML="SignUp Unsuccessful!";
            document.getElementById("a").style.color="red";
            document.getElementById("a").style.fontSize="medium";
            go=false;
        }
       else{
            //validate username- check if already exists
            if(!validusername.test(username)){
                document.getElementById("a").innerHTML="SignUp Unsuccessful!";
                document.getElementById("a").style.color="red";
            document.getElementById("a").style.fontSize="medium";
                go=false;
            }
            else{
                if(username.toLowerCase() =="admin"){
                    document.getElementById("a").innerHTML="SignUp Unsuccessful!";
                    document.getElementById("a").style.color="red";
            document.getElementById("a").style.fontSize="medium";
                    go=false;
                }
                else{
                //validate password
                    if(!validpass.test(password)){
                        document.getElementById("a").innerHTML="SignUp Unsuccessful!";
                        document.getElementById("a").style.color="red";
                        document.getElementById("a").style.fontSize="medium";
                        go=false;
                    }
                    else{
                        //dob makes sense
                        var d = new Date(dob);
                        year = d.getFullYear();
                        if(dob != null) {
                            if(year > 2020 || year < 1940){
                                document.getElementById("a").style.color="red";
            document.getElementById("a").style.fontSize="medium";
            document.getElementById("a").innerHTML="SignUp Unsuccessful!";

                                go=false;
                            }
                        }
                }
            }
        }
        }
    }


    if(go){
        if(!localStorage.getItem('sig')){
            sign=true;
            localStorage.setItem("sig",sign);
            window.location="../Pages/home.html";    
        }else{
            //bcz still logged in
            document.getElementById("a").innerHTML="SignUp Unsuccessful!";
            document.getElementById("a").style.color="red";
            document.getElementById("a").style.fontSize="medium";
        }
    }
}