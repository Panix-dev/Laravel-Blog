@extends('main')

@section('title', 'Pistes')
@section('meta_description', 'Meta Description To Be Replaced')
@section('meta_keywords', 'Meta Keywords To Be Replaced')

@section('content')
		
	<div class="row">
		<div class="col-md-12">
			<h1>Pistes</h1>
		</div>
	</div>
	
	@if (count($items) > 0)
	    <section class="posts">
	        @include('pistes.load')
	    </section>
	@endif
	
@endsection

@section('scripts')

<script type="text/javascript">

(function ($) {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');  
        getPosts(url);
        window.history.pushState("", "", url);
    });

    function getPosts(url) {
        $.ajax({
            url : url  
        }).done(function (data) {

          	$('html, body').animate({
		        scrollTop: $("#load").offset().top-100
		    }, 1000, 'swing', function() {
                $('.posts').html(data); 
          	});
             
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
})(jQuery);

</script>

@endsection

