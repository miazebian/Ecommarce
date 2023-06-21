function toggleCouponField(){
    var couponField = document.getElementById('hidden-input');

    if(couponField.style.visibility==='hidden'){
        couponField.style.visibility='visible';
        
    }
    else{
        couponField.style.visibility='hidden';
        
    }
}