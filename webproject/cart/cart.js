var tax = 0.05;
var shipping = 15.00; 
var total,PPI,text1,quantity,timer;
var total2,PPI2,text2,quantity2;
var total3,PPI3,text3,quantity3;
var Rem,Rem2,Rem3;
var TotalPay,Tot,tempo;
var taxPay,shippingPay,finalPay;

    var temp1;
    var temp3;
    var temp5;

    var taxp,finalP;

    var temp2;
    var temp4;
    var temp6;





function DisplayTotal(){
    quantity=document.getElementById("quantity");
    quantity2=document.getElementById("quantity2");
    quantity3=document.getElementById("quantity3");


    

    // temp2=temp1*quantity.value;
    // temp4=temp3*quantity2.value;
    // temp6=temp5*quantity3.value;


    total.innerHTML=temp2;
    total2.innerHTML=temp4;
    total3.innerHTML=temp6;

    Recalc();
    // tempo=temp2+temp4+temp6;

    taxp=tempo*0.05;
    finalP=taxp+15+tempo;

    TotalPay.innerHTML="Subtotal:  "+tempo;
    taxPay.innerHTML="Tax(5%):  "+taxp;
    if(tempo==0){
    shippingPay.innerHTML="Shipping: 0";
    finalPay.innerHTML="Total:  0";
    }

    else{
        shippingPay.innerHTML="Shipping: 15";
        finalPay.innerHTML="Total:  "+finalP;

    }





}



function Initialize(){
    finalPay=document.getElementById("finalPay");
    taxPay=document.getElementById("taxPay");
    shippingPay=document.getElementById("shippingPay");
    TotalPay=document.getElementById("TotalPay");
    Tot=0;
    Rem=document.getElementById("Rem");
    Rem2=document.getElementById("Rem2");
    Rem3=document.getElementById("Rem3");

    total=document.getElementById("total");
    total2=document.getElementById("total2");
    total3=document.getElementById("total3");


    PPI=document.getElementById("PPI");
    PPI2=document.getElementById("PPI2");
    PPI3=document.getElementById("PPI3");


    quantity=document.getElementById("quantity");
    quantity2=document.getElementById("quantity2");
    quantity3=document.getElementById("quantity3");


    quantity.value=1;
    quantity2.value=1;
    quantity3.value=1;

    text1=PPI.textContent;
    text2=PPI2.textContent;
    text3=PPI3.textContent;

    ChangeTotal();

}

function Recalc(){
    if(temp1==0 && temp3==0 && temp5==0){
        tempo=0;
        
    }
    else if(temp1==0){

        if(temp3==0){
            if(temp5!=0){
                tempo=temp5*quantity3.value;
            }
        }

        else if(temp5==0){
            if(temp3!=0){
                tempo=temp3*quantity2.value;
            }
        }

        else{
            temp3=parseFloat(text2);
            temp5=parseFloat(text3);
            
            temp4=temp3*quantity2.value;
            temp6=temp5*quantity3.value;
            tempo=temp4+temp6;

        }
    }

    else if(temp3==0)
    {
        if(temp1==0)
        {
            if(temp5!=0){
                tempo=temp5*quantity3.value;

            }
        }

        else if(temp5==0){
            if(temp3!=0){

                tempo=temp1*quantity2.value;
            }
        }

        else{

            temp1=parseFloat(text1);
            temp5=parseFloat(text3);
    
    
            temp2=temp1*quantity.value;
            temp6=temp5*quantity3.value;
            tempo=temp2+temp6;
        }
    }

    else if(temp5==0){
        if(temp1==0){
            if(temp3!=0){

                tempo=temp3*quantity2.value;
            }

        }

        else if(temp3==0){
            if(temp1!=0){
                tempo=temp1*quantity.value;
            }

        }

        else{

            temp1=parseFloat(text1);
            temp3=parseFloat(text2);
    
            temp2=temp1*quantity.value;
            temp4=temp3*quantity2.value;
            tempo=temp2+temp4;
        }

    }


    else{
        temp1=parseFloat(text1);
        temp3=parseFloat(text2);
        temp5=parseFloat(text3);

        temp2=temp1*quantity.value;
        temp4=temp3*quantity2.value;
        temp6=temp5*quantity3.value;
        tempo=temp2+temp4+temp6;

    }
}



function ChangeTotal(){
    timer=setInterval(DisplayTotal,10);
}

function RemoveDiv(){
    temp1=0;
    Rem.parentElement.remove();
}

function RemoveDiv2(){
    temp3=0;
    Rem2.parentElement.remove();

}

function RemoveDiv3(){
    temp5=0;
    Rem3.parentElement.remove();
}




