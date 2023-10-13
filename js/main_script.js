$(document).ready(function(){
   $("#idbusqueda").keyup(function(e){
    if(e.keyCode==13){
        search_products()
    }

   });
});


function search_products(){
   window.location.href="search.php?text="+$("#idbusqueda").val();
}