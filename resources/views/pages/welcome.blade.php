@extends('main')

@section('title', 'Κρατήση σε Πίστες Μπουζούκια Αθήνα 2017')
@section('meta_description', 'Τηλέφωνο Κρατήσεων 6941.681.692 Κάντε κράτηση σε όλα τα νυχτερινά club, μπουζούκια, κέντρα, πίστες της Αθήνας με κανονική τιμή και φοιτητική προσφοράς φιάλης')
@section('meta_keywords', 'πιστες αθηνα, σχηματα μπουζουκια, μουσικεσ σκηνεσ, μουσικα σχηματα, μπουζουκια αθηνα 2017, μπουζουκια, πιστεσ αθηνα, μουσικεσ σκηνεσ αθηνα, αθηναικεσ πιστεσ, club αθήνα, μπουζούκια φοιτητικές τιμές')

@section('stylesheets')

{!! Html::style('css/camera.css') !!}

@endsection

@section('content')

<div class="container text-center home_intro">
  <h1>Η νυχτερινή διασκέδαση ξεκινάει από το <span>Metr4u.gr</span></h1>
  <p>Πραγματοποιήστε εύκολα και γρήγορα την κράτησή σας μέσα από το metr4u.gr σε όλα τα νυχτερινά <a class="general_link_style" href="/clubs">club</a>, <a class="general_link_style" href="/bars">bar</a>, <a class="general_link_style" href="/pistes">μπουζούκια</a>, κέντρα και πίστες της Αθήνας. Βρείτε το συνεργαζόμενο μαγαζί που σας ενδιαφέρει, καλέστε μας και δείτε πόσο εύκολο είναι να διασκεδάζετε ως VIP.</p>
</div>

<div class="container display_mobile">
<p class="inner_venue_ci"><a class="btn btn-success" href="tel:6941681692"><span class="glyphicon glyphicon-phone"></span> 694 16 81 692</a></p>
</div>

<div id="app">

<div class="home_venues">
  
  <div class="grid">

  @foreach($items as $item)

    <figure class="effect-zoe col-md-4 col-sm-12">
      <div class="figure_inner">
      <a href="{{ route('bars.single', $item->slug) }}" title="{{ $item->title }}">
      <img src="{{ asset('image_preset/'.$item->image) }}" alt="{{ $item->title }}">
      </a>
      <figcaption>
      
        <h2>{{ $item->title }}</h2>
        <p class="icon-links">
          @if (Auth::check())
              <favorite
                :item={{ $item->id }}
                :favorited={{ $item->favorited() ? 'true' : 'false' }}>
               </favorite>
          @endif
          <a href="{{ route('bars.single', $item->slug) }}"><span class="fa fa-eye"></span></a>
          <a href="/contact"><span class="fa fa-mobile"></span></a>
        </p>
        <p class="description">{{ $item->list_teaser }}</p>
      </figcaption>  

      </div> 
    </figure>

  @endforeach

<div class="clear"></div>

</div>

</div>

<div class="category_links">
  
  <div class="grid">
    <figure class="effect-marley col-md-4 col-sm-12">
      <img src="img/17.jpg" alt="Μπουζούκια / Πίστες"/>
      <figcaption>
        <h2>Μπουζούκια / <span>Πίστες</span></h2>
        <p>Ανακαλύψτε όλα τα νυχτερινά σχήματα και πίστες του 2016 - 2017</p>
        <a href="/pistes" title="Περισσότερα">Περισσότερα</a>
      </figcaption>     
    </figure>
    <figure class="effect-marley col-md-4 col-sm-12">
      <img src="img/18.jpg" alt="Νυχτερινά Club"/>
      <figcaption>
        <h2>Νυχτερινά <span>Club</span></h2>
        <p>Επιλέξτε ανάμεσα στα καλύτερα νυχτερινά club της Αθήνας</p>
        <a href="/clubs" title="Περισσότερα">Περισσότερα</a>
      </figcaption>     
    </figure>
    <figure class="effect-marley col-md-4 col-sm-12">
      <img src="img/19.jpg" alt="Νυχτερινά Bar"/>
      <figcaption>
        <h2>Νυχτερινά <span>Bar</span></h2>
        <p>Βρείτε που θα πιείτε σήμερα το ποτό σας με την παρέα σας</p>
        <a href="/bars" title="Περισσότερα">Περισσότερα</a>
      </figcaption>     
    </figure>
    <div class="clear"></div>
  </div>

</div>

</div>

<div class="clear"></div>

<div class="row home_divider_section">
  
  <div class="col-md-6 col-sm-12 home_left"></div>
  <div class="col-md-6 col-sm-12 home_right">
      <h1>Metr4u.gr - Your easy VIP</h1>
      <p>Καλώς ήλθατε στο metr4u.gr, την πιο διαδεδομένη ιστοσελίδα κρατήσεων για τα νυχτερινά μαγαζιά της Αθήνας. Με πολυετή εμπειρία στον χώρο καταφέρνουμε όλα αυτά τα χρόνια να κάνουμε την νυχτερινή σας διασκέδαση εύκολη και άμεση. Συνεχίζουμε δυναμικά και φέτος να σας παρέχουμε ευχάριστες εμπειρίες, προνομιακές τιμές για τα αγαπημένα σας μαγαζιά ή κέντρα και να σας κάνουμε να νοιώθετε VIP με κάθε σας νυχτερινή απόδραση. Καλέστε μας και κάντε τη επόμενη κράτηση σας μέσα από την απίθανη ομάδα του Metr4U.gr
      <br>
      <a href="/contact" class="hvr-shutter-out-horizontal pull-right">Επικοινωνήστε μαζί μας!</a>
      </p>

  </div>
  <div class="clear"></div>

</div>

<div class="posts_home_page_wrapper">

<div class="heading_h2_outer">
  <h2 class="heading_h2">Νέα από το <span>Blog!</span></h2>
  <div class="clear"></div>
</div>

<div class="posts_home_page">
  <div class="row">

      @foreach($posts as $post)

        <div class="post col-md-4 col-sm-12">
          <div class="post_home_img">
            <img src="{{ asset('image_preset/'.$post->image) }}" alt="{{ $post->title }}">

            <div class="tags">
              @foreach ($post->tags as $tag)
                <a class="label label-default" href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
              @endforeach
            </div>

            <div class="created">
              {{ date('F nS, Y', strtotime($post->created_at)) }}
            </div>

          </div>

          <h3>{{ $post->title }}</h3>
          <p>
            {{ substr(strip_tags($post->body), 0, 230) }}{{ strlen(strip_tags($post->body)) > 230 ? '...' : '' }}
          </p>
          <a href="{{ url('blog/'.$post->slug) }}" class="hvr-sweep-to-top">Περισσότερα</a>
        </div>

      @endforeach

  </div>
</div>

</div>

@endsection

@section('scripts')

{!! Html::script('js/jquery.mobile.customized.min.js') !!}
{!! Html::script('js/camera.min.js') !!}
   
    <script>
    jQuery(function(){
      
      jQuery('#camera_wrap_4').camera({
        fx: 'scrollTop',
        height: 'auto',
        loader: 'bar',
        pagination: true,
        thumbnails: false,
        navigation: false,
        hover: false,
        opacityOnGrid: false,
        imagePath: '/img/'
      });

    });
  </script>

@endsection