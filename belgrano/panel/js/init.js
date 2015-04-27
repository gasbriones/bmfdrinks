// Seteo el charset-iso en ajax
$.ajaxSetup( {
	'beforeSend' : function(xhr) {
		xhr.overrideMimeType('text/html; charset=ISO-8859-1');
	},
	cache: false
});

function validarFormPromos (){
	var file = $('#photoCover').val();
	var descripcion = $('#promo-descripcion').val();
	var precio = $('#promo-precio').val();
	
	
	if(file == '' || descripcion =='' || precio ==''){
		$('#alertContainer').html('<div class="alert alert-error"><strong>¡Error!</strong> Por favor complete el formulario.</div>');
		
		setTimeout(function(){
			$('#alertContainer').html('');
			$('#save').removeAttr('disabled');
		},1500);		
		return false;
	}
	$('#imgLoader').show();
}


function basename(path) {
    return path.replace(/\\/g,'/').replace( /.*\//, '');
}

function cancelDelete(){
	$('#alertContainerBorrar').html('');
}

function loadABMPromo(){
	$('#imgTumb').load('phpScripts/promociones/abmPromoList.php',function(msj){
		
		$('.span3').popover({
			title:'Datos de la promoción',
			placement:'bottom',
			trigger:'hover'
		});
		
		$('.control-btn-edit').click(function(){
			var promoId = $(this).attr('promoId');
			$('#modal-body-edit').load('phpScripts/promociones/editPromoForm.php?id='+promoId,function(){
				$('input[id=imagenEdit]').change(function() {
				   $('#photoCoverEdit').val(basename($(this).val()));
				}); 
				$('#formPromosEdit').submit(function() {
			        $(this).ajaxSubmit({
			        	url:$(this).attr('action'),
			        	data:$(this).serialize(),
			        	success: function(msj){
			        		loadABMPromo();						
							$('#alertContainerEdit').html(msj);
							setTimeout(function(){
								$('#alertContainerEdit').html('');
								$('#editPromocion').modal('hide')
							},3000);
						}
			        });
			       return false;
			    });
			});
		});
		
		
		$('.control-btn-delete').click(function(){
			var img = $(this).parent().find('img').attr('id');
			
			$('#alertContainerBorrar').html('');
			$('#alertContainerBorrar').html('<div class="alert alert-error"><strong>¡Alerta!</strong> ¿Desea borrar la promocion seleccionada? <b>'+
					'</b> <span class="btn btn-danger" onclick="cancelDelete()">Cancelar</span> '+
					'<span class="btn" id="deleteImgBtn">Aceptar</span>'+
			'</div>');
			
			$("#deleteImgBtn").click(function(){
				$.ajax({
					url:"phpScripts/promociones/deletePromo.php",
					data:"id="+img,
					success: function(msj){
						loadABMPromo();						
						$('#alertContainerBorrar').html(msj);
						setTimeout(function(){
							$('#alertContainerBorrar').html('');
						},3000);
					}
				});
			});			
		});		
	});
}

function loadABMProducto(){
	$('#abmProductoContainer').load('phpScripts/productos/newProducto.php',function(){
		saveProducto();
		$('#selectCategoria').change(function(){
			var categoriaId = $(this).val();
			loadTipo(categoriaId);
		});
	});
}

function loadABMListProducto(){
	$('#abmListProductoContainer').load('phpScripts/productos/abmListProductos.php',function(){
		$('#selectCategoriaList').change(function(){
			var categoriaId = $(this).val();
			$('#selectTipoContainerList').load('phpScripts/productos/getTipoProductoById.php?categoriaId='+categoriaId+'&action=loadList',function(){
				$('#selectTipoList').change(function(){
					var tipoId = $(this).val();
					listarProductosABM(categoriaId,tipoId)
				});			
			});
		});
	});
}

function listarProductosABM(categoriaId,tipoId){
	$('#listaDeProductos').load('phpScripts/productos/getListProductos.php?categoriaId='+categoriaId+'&tipoId='+tipoId,function(){
		$('.icon-pencil').click(function(){							
			$(this).hide();
			$(this).parents('tr').find('td span').hide();
			$(this).parents('tr').find('td input').show();
			$(this).parent().find('.icon-ok-sign').removeClass('hide');
		});
		
		$('.icon-ok-sign').click(function(){
			var productoId = $(this).attr('productoId');
			var descripcion = $(this).parents('tr').find('td .productoDescripcion').val();
			var precio = $(this).parents('tr').find('td .productoPrecio').val();
			$.ajax({
				url:'phpScripts/productos/abmProductosActions.php',
				data:'productoId='+productoId+'&productoDescripcion='+descripcion+'&productoPrecio='+precio,
				success:function(){
					listarProductosABM(categoriaId,tipoId);
				}
			});
		});
		
		$('.icon-remove-sign').click(function(){
			var productoId = $(this).attr('prodId');
			$.ajax({
				url:'phpScripts/productos/abmProductosActions.php',
				data:'productoId='+productoId+'&action=deleteItem',
				success:function(){
					listarProductosABM(categoriaId,tipoId);
				}
			});
		});
	});
}


function loadTipo(categoriaId){
	$('#selectTipoContainer').load('phpScripts/productos/getTipoProductoById.php?categoriaId='+categoriaId,function(){
		if(categoriaId ==""){
			$('#nuevoTipo').hide();
		}else{
			$('#nuevoTipo').show();
		}
		
		$('#selectTipo').change(function(){
			var tipoId = $(this).val();
			if(tipoId ==""){
				$('#nuevoTipo').show();
				$('#editTipo').hide();
				$('#borrarTipo').hide();
			}else{
				$('#nuevoTipo').hide();
				$('#editTipo').show();
				$('#borrarTipo').show();
			}
		});
		
		$('#nuevoTipo').click(function(){
			var categoria = $('#selectCategoria').val();
			actionTipo(categoria,'null','save');
		});
		
		$('#editTipo').click(function(){
			var categoria = $('#selectCategoria').val();
			var tipo = $('#selectTipo').val();
			actionTipo(categoria,tipo,'edit');
		});
		
		$('#borrarTipo').click(function(){
			$('#tipoAlertError').show();
		});
	});
}


function actionDeleteTipo (categoria,tipo){
	$.ajax({
		url:'phpScripts/productos/deleteTipoProducto.php',
		data:'categoria='+categoria+'&tipo='+tipo,
		success: function(msj){
			$('#tipoAlertError').hide();
			loadTipo(categoria);
			$('#alertContainerProducto').html(msj);
			setTimeout(function(){
				$('#alertContainerProducto').html('');
			},3000);
		}
	});
}


function actionTipo(categoria,tipo,action){
	$('#modal-body-tipo').load('phpScripts/productos/newTipoForm.php?categoria='+categoria+'&tipo='+tipo+'&action='+action,function(){
		
		$('input[id=imagenTipo]').change(function() {
		   $('#photoCoverTipo').val(basename($(this).val()));
		});
		
		$('#formNewTipo').submit(function() {
	        $(this).ajaxSubmit({
	        	url:$(this).attr('action'),
	        	data:$(this).serialize(),
	        	success: function(msj){
	        		loadTipo(categoria);					
					$('#alertContainerTipo').html(msj);
					setTimeout(function(){
						$('#alertContainerTipo').html('');
						$('#nuevoTipoModal').modal('hide')
					},3000);
				}
	        });
	       return false;
	    });
	});
}




function saveProducto(){
	$('#formProducto').submit(function() {
        $(this).ajaxSubmit({
        	beforeSubmit : function(){
        		$('#imgLoader').show();
        		$('#saveProducto').attr('disabled','disabled');
        	},
        	url:$(this).attr('action'),
        	data:$(this).serialize(),	
			success : function(msj){
				$('#alertContainerProducto').html(msj);
				setTimeout(function(){
					$('#alertContainerProducto').html('');
				},2500);
				$('#saveProducto').removeAttr('disabled');
				$('#imgLoader').hide();				
			}        	
        });
       return false;
    });
}



$(document).ready(function(){
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        if($(this).attr('href') == '#abmPromo'){
        	loadABMPromo();
        }else if($(this).attr('href') == '#abmProducto'){
        	loadABMProducto();
        }else if($(this).attr('href') == '#abmListaProducto'){
        	loadABMListProducto();
        }
        
    });
	
	$('input[id=imagen]').change(function() {
	   $('#photoCover').val(basename($(this).val()));
	}); 
	
	
//	$('#save').click(function(e){
//		$(this).attr('disabled','disabled');
//		$('#formImg').ajaxSubmit( {
//			beforeSubmit : validarForm,
//			success : function(msj){
//				$('#alertContainer').html(msj);
//				setTimeout(function(){
//					$('#alertContainer').html('');
//				},2500);
//				$('#save').removeAttr('disabled');
//				$('#imgLoader').hide();				
//			}
//		});
//		 return false;
//	});
//	

    $('#formPromos').submit(function() {
        $(this).ajaxSubmit({
        	beforeSubmit : validarFormPromos,
        	url:$(this).attr('action'),
        	data:$(this).serialize(),	
			success : function(msj){
				$('#alertContainer').html(msj);
				setTimeout(function(){
					$('#alertContainer').html('');
				},2500);
				$('#save').removeAttr('disabled');
				$('#imgLoader').hide();				
			}        	
        });
       return false;
    });
});

