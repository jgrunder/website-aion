	$(document).ready(function(){

		/*
		 * SLIDER
		 */
		$('#bxslider').bxSlider({
			captions: true,
			pager: false,
			nextSelector: '#slider-next',
			prevSelector: '#slider-prev',
			nextText: '',
			prevText: '',
			auto: true
		});

		/*
		 * BTN : CONNEXION
		 */
		var btnConnexion = $('#btn_connexion');

		if(btnConnexion.length > 0){
			btnConnexion.on('click', function(e){
				$('#user_panel').slideToggle();
				e.preventDefault();
			});
		}

		/*
		 * Flash Messages
		 */
		if($('#flashMsg p').length > 0){
			$('#flashMsg').show();
			setTimeout(function(){
				$('#flashMsg').fadeOut(500);
			}, 3000);
		}

		/*
		 * Shop Categories
		 */
		$('.top_categorie h4').on('click', function(e){
			$(this).parent().find('.sub_categorie').slideToggle();
			e.preventDefault();
		});

		/*
		 * Shop Preview alert
		 */
		$('.previewItem').on('click', function(e) {
			var itemId = $(this).attr('data-id');

			swal({
				title: "Tape et regarde !",
				text: '.preview '+itemId,
				timer: 7000
			});

			e.preventDefault();
		});

		/*
		 * Shop Add in cart
		 */
		function addItemInCart(){
			$('.addItemInCart').on('click', function(e) {
				var itemId = $(this).attr('data-id');

				$.get("/shop/add/"+itemId, function( data ) {
					$(".container_shop_cart").html(data);
					removeItemInCart();
				});

				e.preventDefault();

			});
		}

		addItemInCart();

		/*
		 * Shop remove in cart
		 */
		function removeItemInCart(){

			$('.removeItemInCart').on('click', function(e){

				var itemId = $(this).attr('data-id');

				$.get("/shop/remove/" + itemId, function( data ) {
					$(".container_shop_cart").html(data);
					removeItemInCart();
				});

				e.preventDefault();

			});
		}

		removeItemInCart();

		/*
		 * PAYPAL
		 */
		var inputTypeRange = $("input[type=range]");

		if(inputTypeRange.length > 0) {
			inputTypeRange.on('input', function() {

				var nbTool    = $(this).val();
				var moneyNeed = $(this).val() / 5000;
				var uid		  = $('#user_id').val();

				$('#money_need').val("J'achète "+ nbTool +" reals pour "+ moneyNeed +"€");
				$('#paypal_name').val(nbTool+' reals');
				$('#money').val(moneyNeed);
				$('#custom_paypal').val('reals='+nbTool+'&uid='+uid);
			});
		}

		/*
		 * AION DATABASE INFO BULLE
		 */
		var $databaseItem = $('.databaseItem');

		if ($databaseItem.length > 0) {
			$databaseItem.on('mouseenter', function() {
				var itemId = $(this).attr('data-id');
				$(this).after('<div class="information_item">Merci de patienter ...</div>');
				$.get('/database/item/' + itemId, function(data) {
					$('.information_item').html(data);
				});
			});
			$databaseItem.on('mouseleave', function() {
				$('.information_item' ).remove();
			});
		}

	});
