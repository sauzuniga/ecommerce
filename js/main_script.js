/**
 * Espera a que el documento HTML esté completamente cargado y listo para ser manipulado.
 * @function
 * @name documentReady
 */
$(document).ready(function(){
   /**
     * Función que se ejecuta cuando se presiona una tecla en el elemento con id "idbusqueda".
     * Verifica si la tecla presionada es Enter (código 13) y llama a la función searchProducts.
     * @function
     * @name handleKeyPress
     * @param {Object} e - Objeto de evento que contiene información sobre el evento de tecla presionada.
     */
   $("#idbusqueda").keyup(function(e){
    if(e.keyCode==13){
        search_products()
    }

   });
});
/**
 * Función para realizar la búsqueda de productos.
 * Redirige a la página de búsqueda, pasando el texto de búsqueda como parámetro en la URL.
 * @function
 * @name searchProducts
 */
function search_products(){
   window.location.href="search.php?text="+$("#idbusqueda").val();
}