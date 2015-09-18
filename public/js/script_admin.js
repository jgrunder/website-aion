$(document).ready(function(){

	/**
	 * Shop Add Item
	 */
	var $idItem = $('#idItem');

	$idItem.on('focusout', function() {

		var idItem = $(this).val();

		$.get("/database/item/" + idItem, function(data) {

			var nameItem = $(data).find('.item_title').text();

			if(nameItem !== ''){
				$('#nameItem').val(nameItem);
			}

		});


	});

});
