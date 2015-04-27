function preloadImagenes() {
	var imageObjArr = new Array();
	for ( var i = 0; i < arguments.length; i++) { // creo los objetos de
		// imagen
		var imageObj = new Image();
		imageObj.src = arguments[i];
		imageObjArr.push(imageObj);
	}
}
preloadImagenes(
	'../images/nav-belgrano-over.png', 
	'../images/nav-palermo-over.png',
	'../images/nav-tienda-over.png'
);



$(document).ready(function(){

	
	$('.soon').click(function(e){

        $.fancybox({
            centerOnScroll:true,
            scrolling:true,
            autoScale:true,
            type: 'ajax',
            ajax: {
                url: 'lista-vinos.html'
            }

        });
		
	});
	
	
});