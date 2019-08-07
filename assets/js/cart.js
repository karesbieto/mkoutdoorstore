//get all button with the class deleteBtn

let deleteBtns = document.querySelectorAll('.deleteBtn');
// console.log(deleteBtn);

deleteBtns.forEach(function (deleteBtn){
	deleteBtn.addEventListener("click", function () {

		function getConfirm() {
			let delCon = confirm('Are you sure?');
			if(!delCon) {
				alert("User cancelled the deletion");
			} else {
				deleteBtn.previousElementSibling.submit();
			}
		}

		getConfirm();
	}) // deleteBtn click
}) // deleteBtns forEach


let editInputs = document.querySelectorAll('.quantityInput');

editInputs.forEach(function (editInput) {
	editInput.addEventListener('blur', function () {
		editInput.parentElement.submit();
	})
})