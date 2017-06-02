@extends('main')

<?php $titleTag = htmlspecialchars($itag->meta_title); ?>
<?php $descriptionTag = htmlspecialchars($itag->meta_desscription); ?>
<?php $keywordsTag = htmlspecialchars($itag->meta_keywords); ?>

@section('title', "$titleTag")
@section('meta_description', "$descriptionTag")
@section('meta_keywords', "$keywordsTag")

@section('content')
		
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $itag->name }} Itag <span class="badge">{{ $itag->items()->count() }}</span> <small> Items </small></h1>
		</div>
	</div>

	@if (count($items) > 0)
	    <section class="posts">
	        @include('itags.load')
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
            alert('Items could not be loaded.');
        });
    }
})(jQuery);

</script>

@endsection