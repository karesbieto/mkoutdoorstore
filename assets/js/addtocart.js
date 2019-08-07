function sortSelect(selElem) {
    var tmpAry = new Array();
    for (var i=0;i<selElem.options.length;i++) {
        tmpAry[i] = new Array();
        tmpAry[i][0] = selElem.options[i].text;
        tmpAry[i][1] = selElem.options[i].value;
    }
    tmpAry.sort();
    while (selElem.options.length > 0) {
        selElem.options[0] = null;
    }
    for (var i=0;i<tmpAry.length;i++) {
        var op = new Option(tmpAry[i][0], tmpAry[i][1]);
        selElem.options[i] = op;
    }
    return;
}

let addtocartbutton = document.querySelectorAll('.add-to-cart');
// console.log(addtocartbutton);

addtocartbutton.forEach(function (addtocartbutton){
	addtocartbutton.addEventListener('click', function(indiv_button) {

		let item_id = indiv_button.target.getAttribute("data-id"); 
		
		let item_quantity = indiv_button.target.previousElementSibling.value;
		

		if(item_quantity == "") {
			alert('Please enter a quantity');
		} else {
			let data = new FormData();

			data.append("item_id", item_id);
			data.append("item_quantity", item_quantity);
			console.log(...data);

			fetch('../controllers/update_cart.php', {
			method: 'POST',
			body: data
			}).then(function(response) {
				return response.text();
			}).then(function(data_from_fetch){
				// console.log(data_from_fetch);
				// console.log(data_from_fetch);
				document.querySelector('#cart-count').innerHTML = data_from_fetch;
				window.location.replace("../views/catalog.php");
			});
		}

	});

});