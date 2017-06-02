<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/classie.js') }}"></script>
<script src="{{ asset('js/stepsForm.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$(".content-wrap").scroll(function() {
		    if ($(this).scrollTop() >= 200) {
				if (!$('.go_to_top').hasClass('to_top_revealed')) {
					$('.go_to_top').addClass( "to_top_revealed" );
				}
		    }
		    if ($(this).scrollTop() < 200) {
				if ($('.go_to_top').hasClass('to_top_revealed')) {
					$('.go_to_top').removeClass( "to_top_revealed" );
				}
		    }
		});
	});

	$('.go_to_top').click(function() {
	  $(".content-wrap").animate({ scrollTop: 0 }, "slow");
	  return false;
	});

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
	});

	var theForm = document.getElementById( 'theForm' );

	new stepsForm( theForm, {
		onSubmit : function( form ) {
			// hide form
			classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );

			/*
			form.submit()
			or
			AJAX request (maybe show loading indicator while we don't have an answer..)
			*/

			$.ajax({
		      url: 'newsletter',
		      type: "post",
		      data: {'_token': $('input[name=_token]').val(), 'name':$('input[name=q1]').val(), 'email':$('input[name=q2]').val(), 'venue':$('input[name=q3]').val()},
		      success: function(data){

		      	if(data == '1'){
		      		var messageEl = theForm.querySelector( '.final-message' );
					messageEl.innerHTML = 'Σε ευχαριστούμε! Θα είμαστε σε επαφή.';
					classie.addClass( messageEl, 'show' );
		      	}
		      	else if(data == '0') {
		      		var messageEl = theForm.querySelector( '.final-message' );
					messageEl.innerHTML = 'Το email που έβαλες είναι ήδη στην λίστα Newsletter.';
					classie.addClass( messageEl, 'show' );
		      	}
				
		      },
		      error: function (request, error) {
			    var messageEl = theForm.querySelector( '.final-message' );
				messageEl.innerHTML = 'Κάτι πήγε στραβά! Πατήστε ανανέωση της σελίδας και δοκιμάστε ξανά.';
				classie.addClass( messageEl, 'show' );
			  }
			  
		    });  

		}
	} );
</script>