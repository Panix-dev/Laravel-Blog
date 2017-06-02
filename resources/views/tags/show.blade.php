@extends('main')

<?php $titleTag = htmlspecialchars($tag->meta_title); ?>
<?php $descriptionTag = htmlspecialchars($tag->meta_desscription); ?>
<?php $keywordsTag = htmlspecialchars($tag->meta_keywords); ?>

@section('title', "$titleTag")
@section('meta_description', "$descriptionTag")
@section('meta_keywords', "$keywordsTag")

@section('content')
		
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $tag->name }} Tag <span class="badge">{{ $tag->posts()->count() }}</span> <small> Posts </small></h1>
		</div>
	</div>

	@if (count($posts) > 0)
	    <section class="posts">
	        @include('tags.load')
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