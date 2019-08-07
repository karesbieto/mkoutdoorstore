$(document).ready(function(){
  $(window).scroll(function(){
    var scroll = $(window).scrollTop();
      if (scroll < 50 ) {
        $("nav").removeClass("bg-nav");
      }else if (scroll > 50) {
          $("nav").addClass("bg-nav");   
      }
  });
});

function changeSort() {
	let sort = document.getElementById('sort_id');
	let strSort = sort.options[sort.selectedIndex].value;

	window.location.href = "../controllers/sort.php?sort=" + strSort;

}

function changeCategory() {
	let category = document.getElementById('category_id');
	let idCategory = category.options[category.selectedIndex].value;	

	if(idCategory > 0 ) {
		window.location.href = "../views/catalog.php?category_id=" + idCategory;
	} else {
		window.location.href = "../views/catalog.php";
	}
}

