<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/classie.js') }}"></script>
<script src="{{ asset('js/stepsForm.js') }}"></script>
<script>
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
					messageEl.innerHTML = 'Thank you! We\'ll be in touch.';
					classie.addClass( messageEl, 'show' );
		      	}
		      	else if(data == '0') {
		      		var messageEl = theForm.querySelector( '.final-message' );
					messageEl.innerHTML = 'This email has already been subscribed.';
					classie.addClass( messageEl, 'show' );
		      	}
				
		      },
		      error: function (request, error) {
			    var messageEl = theForm.querySelector( '.final-message' );
				messageEl.innerHTML = 'Something went wrong! Refresh the page and try again.';
				classie.addClass( messageEl, 'show' );
			  }
			  
		    });  

		}
	} );
</script>