document.getElementById('image1').addEventListener('change', function(){
        alert("pasok");
        readURL(this);
    });

function readURL(input) {
   if (input.files && input.files[0]) {
       var reader = new FileReader();

       reader.onload = function (e) {
           $('#imagepic')
               .attr('src', e.target.result);                
           // $('#image')
           //     .attr('value', e.target.result);
       };

       reader.readAsDataURL(input.files[0]);
   }
}



