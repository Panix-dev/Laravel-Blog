@extends('main')

<?php $titleTag = htmlspecialchars($itag->meta_title); ?>
<?php $descriptionTag = htmlspecialchars($itag->meta_desscription); ?>
<?php $keywordsTag = htmlspecialchars($itag->meta_keywords); ?>

@section('title', "$titleTag")
@section('meta_description', "$descriptionTag")
@section('meta_keywords', "$keywordsTag")

@section('content')
	
	<div class="row">
		<h1 class="itag_heading">{{ $itag->name }}<div class="itag_counter"><span class="badge">{{ $itag->items()->count() }}</span> μαγαζιά</div></h1>
	</div>

	@if (count($items) > 0)
	    <section class="posts">
	        @include('itags.load')
	    </section>
	@endif

<div class="category_links">
  
  <div class="grid">
    <figure class="effect-marley col-md-4 col-sm-6">
      <img src="/img/17.jpg" alt="Μπουζούκια / Πίστες"/>
      <figcaption>
        <h2>Μπουζούκια / <span>Πίστες</span></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a href="/pistes" title="Περισσότερα">Περισσότερα</a>
      </figcaption>     
    </figure>
    <figure class="effect-marley col-md-4 col-sm-6">
      <img src="/img/18.jpg" alt="Νυχτερινά Club"/>
      <figcaption>
        <h2>Νυχτερινά <span>Club</span></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a href="/clubs" title="Περισσότερα">Περισσότερα</a>
      </figcaption>     
    </figure>
    <figure class="effect-marley col-md-4 col-sm-6">
      <img src="/img/19.jpg" alt="Νυχτερινά Bar"/>
      <figcaption>
        <h2>Νυχτερινά <span>Bar</span></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a href="/bars" title="Περισσότερα">Περισσότερα</a>
      </figcaption>     
    </figure>
    <div class="clear"></div>
  </div>

</div>

<div class="contact_info">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Θέλετε Διευκρινίσεις;</h2>
                <div class="clear"></div>
                <p>Μην διστάσετε να επικοινωνήσετε μαζί μας!</p>
            </div>
            <div class="col-md-6 text-right">
                Τηλέφωνο Κρατήσεων<br>
                <span>694 16 81 692</span> <i class="fa fa-comment-o" aria-hidden="true"></i>
            </div>
            <div class="col-md-6 text-left">
                Ηλεκτρονική Διεύθυνση<br>
                <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>info@metr4u.gr</span>
            </div>
        </div>
    </div>    
</div>

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