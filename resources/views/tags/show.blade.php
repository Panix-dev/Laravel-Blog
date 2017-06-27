@extends('main')

<?php $titleTag = htmlspecialchars($tag->meta_title); ?>
<?php $descriptionTag = htmlspecialchars($tag->meta_desscription); ?>
<?php $keywordsTag = htmlspecialchars($tag->meta_keywords); ?>

@section('title', "$titleTag")
@section('meta_description', "$descriptionTag")
@section('meta_keywords', "$keywordsTag")

@section('content')

<div class="category_image blogs_image" style="margin-bottom: 25px;">
    <div class="patter_overaly"></div>
    <div class="category_caption">
        <h1>Διαβάστε τα άρθρα μας</h1>
        <div class="clear"></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</div>

<div class="row">
<h1 class="itag_heading">{{ $tag->name }}<div class="itag_counter"><span class="badge">{{ $tag->posts()->count() }}</span> blog άρθρα</div></h1>
</div>

<div class="container margin_top_container">		

	<div class="col-md-8">

    @if (count($posts) > 0)
        <section class="posts">
            @include('blog.load')
        </section>
    @endif

    </div>

    <div class="col-md-4 venue_side_info">
        
        <a href="/blog" class="hvr-icon-back">Πίσω στο Blog</a>
        
        <div class="well">
                
            <h3>Κατηγορίες (Tags)</h3>

            <dl class="dl-horizontal text-center">
                @foreach ($tags as $tag)
                    <a class="label label-default lg-label-tag" href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                @endforeach
            </dl>

        </div>

        <div class="well">
                
            <h3>Δημοφιλή Άρθρα</h3>

            <dl class="dl-horizontal">
                @foreach ($populars as $index => $popular)
                    <div class="popular_side">
                    @if($index == 1)
                        <div class="popular_side_wrapper odd">
                    @else
                        <div class="popular_side_wrapper even">
                    @endif
                            <img src="{{ asset('image_preset/'.$popular->image) }}" alt="{{ $popular->title }}">
                        </div>
                        <h3>{{ $popular->title }}</h3>
                        <p>
                            {{ substr(strip_tags($popular->body), 0, 130) }}{{ strlen(strip_tags($popular->body)) > 130 ? '...' : '' }}
                        </p>
                        <div class="text-right">
                            <a class="hvr-sweep-to-right" href="{{ route('blog.single', $popular->slug) }}">Περισσότερα</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </dl>

        </div>

        <div class="well">
                
            <h3>Πληροφορίες Κράτησης</h3>

            <dl class="dl-horizontal">
                <label>Τηλέφωνο Κρατήσεων:</label>
                <p class="inner_venue_ci"><a class="btn btn-success" href="tel:6941681692"><span class="glyphicon glyphicon-phone"></span> 694 16 81 692</a></p>
            </dl>
            <dl class="dl-horizontal">
                <label>Email Κρατήσεων:</label>
                <p class="inner_venue_ci"><a class="btn btn-success" href="mailto:info@metr4u.gr"><span class="glyphicon glyphicon-envelope"></span>info@metr4u.gr</a></p>
            </dl>

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