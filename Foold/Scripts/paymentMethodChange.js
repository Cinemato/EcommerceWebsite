function changeMethod(){
    var selectTag = document.getElementById('paymentOptions');
    var paypalForm = document.getElementById('paypal');
    var cashForm = document.getElementById('cash');
    var creditCardForm = document.getElementById('creditCard');

    if(selectTag.value == 'creditCard'){
        creditCardForm.style.display = 'block';
        paypalForm.style.display = 'none';
        cashForm.style.display = 'none';
    }

    else if(selectTag.value == 'paypal'){
        creditCardForm.style.display = 'none';
        paypalForm.style.display = 'block';
        cashForm.style.display = 'none';
    }
    else if(selectTag.value == 'cash'){
        creditCardForm.style.display = 'none';
        paypalForm.style.display = 'none';
        cashForm.style.display = 'block';
    }
}
