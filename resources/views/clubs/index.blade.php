@extends('main')

@section('title', 'Κρατήση σε Νυχτερινά Club Αθήνα')
@section('meta_description', 'Τηλέφωνο Κρατήσεων 6941.681.692 Κάντε κράτηση σε όλα τα νυχτερινά club, μπουζούκια, κέντρα, πίστες της Αθήνας με κανονική τιμή και φοιτητική προσφοράς φιάλης')
@section('meta_keywords', 'νυχτερινη αθηνα, κεντρα διασκεδασης, κεντρα διασκεδασησ, κεντρα διασκεδασησ αθηνα, μουσικα σχηματα, νυχτερινη διασκεδαση αθηνα, κράτηση για club')

@section('content')
		
<div class="category_image clubs_image">
    <div class="patter_overaly"></div>
    <div class="category_caption">
        <h1>Νυχτερινά Club</h1>
        <div class="clear"></div>
        <p>Επιλέξτε ανάμεσα στα καλύτερα νυχτερινά club της Αθήνας</p>
    </div>
</div>

    <div id="filters">
        <span class="filter_label">Καλύτερο για </span>
        @foreach ($result as $itag => $v)
            <span class="filter_options" value="/filter?type_id=2&itag_id={{ $itag }}"><i class="fa fa-tag" aria-hidden="true"></i> {{ $v }}</span>
        @endforeach
            <span class="filter_options_clear" value="/filter/reset?type_id=2"><i class="fa fa-times" aria-hidden="true"></i> Καθαρισμός</span>
    </div>
	
	@if (count($items) > 0)
	    <section class="posts">
	        @include('clubs.load')
	    </section>
	@endif

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
        $('#load').append('<div class="white_overlay"><img src="/img/loading.gif" /></div>');

        var url = $(this).attr('href');  
        getPosts(url);
        window.history.pushState("", "", url);
    });

    $('body').on('click', '#filters span', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<div class="white_overlay"><img src="/img/loading.gif" /></div>');
        $(".filter_options").removeClass("highlight");
        $(this).addClass("highlight");
        var url = $(this).attr('value'); 
        applyFilters(url);
    });

    function getPosts(url) {
        $.ajax({
            url : url  
        }).done(function (data) {

            $('.content-wrap').animate({
                scrollTop: $(".containerr").offset().top+500
            }, 1000, 'swing', function() {
                $('.posts').html(data); 
            });
             
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }

    function applyFilters(url) {
        $.ajax({
            url : url  
        }).done(function (data) {

            $('.content-wrap').animate({
                scrollTop: $(".containerr").offset().top+500
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

