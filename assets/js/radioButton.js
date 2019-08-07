let cod = document.getElementById('codDiv');
let bank = document.getElementById('bankDiv');
let remit = document.getElementById('remitDiv');
let paypal = document.getElementById('paypalDiv');

let codvalue = document.getElementById('post-cod').value;
let bankvalue = document.getElementById('post-bank').value;
let remitvalue = document.getElementById('post-remit').value;
let paypalvalue = document.getElementById('post-paypal').value;

cod.className += " col-12 col-md-12 p-3 rounded bg-secondary";
document.querySelector('#cod').innerHTML = 'Pay the total amount with cash upon delivery.';			

function showSpan(){
	if(document.getElementById('post-cod').checked == true ) {
		// alert('success!');
		cod.className += " col-12 col-md-12 p-3 rounded bg-secondary";
		document.querySelector('#cod').innerHTML = 'Pay the total amount with cash upon delivery.';			
	} else {
		cod.className -= " col-12 col-md-12 p-3 rounded bg-secondary";
		document.querySelector('#cod').innerHTML = '';
	}

	if (document.getElementById('post-bank').checked == true ) {
		// alert('success!');
		bank.className += " col-12 col-md-12 p-3 rounded bg-secondary";
		document.querySelector('#bank').innerHTML = 'Make your payment directly into our Bank Account.  Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account. The details will be sent to your registered email.';
	} else {
		bank.className -= " col-12 col-md-12 p-3 rounded bg-secondary";
		document.querySelector('#bank').innerHTML = '';	
	}

	if (document.getElementById('post-remit').checked == true ) {
		// alert('success!');
		remit.className += "col-12 col-md-12 p-3 rounded bg-secondary";
		document.querySelector('#remit').innerHTML = 'Pay via Palawan Pawnshop, Cebuana and Mlhuiller. Please use your Order ID as the payment reference. Your order will not be shipped until the funds are transfered.The details will be sent to your registered email.';			
	} else {
			remit.className -= " col-12 col-md-12 p-3 rounded bg-secondary";
			document.querySelector('#remit').innerHTML = '';
	}

	if (document.getElementById('post-paypal').checked == true ) {
		// alert('success!');
		paypal.className += " col-12 col-md-12 p-3 rounded bg-secondary";
		document.querySelector('#paypal').innerHTML = 'Pay the total amount via Paypal.';			
	} else {
			paypal.className -= " col-12 col-md-12 p-3 rounded bg-secondary";
			document.querySelector('#paypal').innerHTML = '';
	}
}