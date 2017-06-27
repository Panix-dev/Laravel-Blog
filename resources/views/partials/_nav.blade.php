<div class="menu-wrap">
  <nav class="menu">
    <div class="icon-list">
        
        @if (Auth::user())
          <div class="profile_menu"><b>Γειά</b> {{ Auth::user()->name }}</div>
        @endif

        <p class="inner_venue_ci links_show_mobile"><a style="color: #fff;" class="btn btn-success" href="tel:6941681692"><span class="glyphicon glyphicon-phone"></span> 694 16 81 692</a></p>

        <a class="{{ Request::is('pistes') ? "active" : ""}}" href="/pistes""><i class="fa fa-fw fa-glass"></i>Πίστες / Μπουζούκια</a>
        <a class="{{ Request::is('clubs') ? "active" : ""}}" href="/clubs""><i class="fa fa-fw fa-glass"></i>Νυχτερινά Club</a>
        <a class="{{ Request::is('bars') ? "active" : ""}}" href="/bars""><i class="fa fa-fw fa-glass"></i>Νυχτερινά Bar</a>
        <hr>
        <a class="{{ Request::is('bachelor-party') ? "active" : ""}}" href="/bachelor-party"><i class="fa fa-fw fa-calendar"></i>Bachelor Parties</a>
        <a class="{{ Request::is('ekdiloseis-xoroi') ? "active" : ""}}" href="/ekdiloseis-xoroi"><i class="fa fa-fw fa-calendar"></i>Εκδηλώσεις / Χώροι</a>
        {{-- <a class="{{ Request::is('etairikes-ekdiloseis') ? "active" : ""}}" href="/etairikes-ekdiloseis"><i class="fa fa-fw fa-calendar"></i>Εταιρικές Εκδηλώσεις</a> --}}
        
        <hr>
        {{-- <a class="{{ Request::is('about') ? "active" : ""}}" href="/about"><i class="fa fa-fw fa-users"></i>Σχετικά με εμάς</a> --}}
        <a class="{{ Request::is('blog') ? "active" : ""}}" href="/blog""><i class="fa fa-fw fa-comments"></i>Διαβάστε το Blog</a>
        <a class="{{ Request::is('contact') ? "active" : ""}}" href="/contact"><i class="fa fa-fw fa-envelope"></i>Επικοινωνήστε Μαζί Μας</a>
        @if (Auth::guest())
          <hr>
          <a class="{{ Request::is('login') ? "active" : ""}}" href="{{ route('login') }}"><i class="fa fa-fw fa-unlock-alt"></i>Σύνδεση</a>
          <a class="{{ Request::is('register') ? "active" : ""}}" href="{{ route('register') }}"><i class="fa fa-fw fa-user"></i>Εγγραφή</a>
        @endif

        @if (Auth::user())
        <hr>
        <a class="{{ Request::is('my-favorites') ? "active" : ""}}" href=" {{ route('favorites.index') }} "><i class="fa fa-fw fa-heart"></i>Τα αγαπημένα μου</a>
        <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-sign-out"></i>Αποσύνδεση
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @endif

    </div>
  </nav>
  <button class="close-button" id="close-button">Close Menu</button>
</div>

<nav class="navbar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <div class="menu-button fa fa-bars pull-left" id="open-button"></div>
      <a class="pull-left logo" href="{{ url('/') }}"> <img src="/logo.png" alt="Metr4U - Premium Reservations" /> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="pull-right hide_from_mobile">

      <div class="pull-right phone_header"><a href="tel:6941681692"><i class="fa fa-mobile" aria-hidden="true"></i> 6941.681.692</a></div>

      <ul class="nav navbar-nav navbar-right">    

      @if (Auth::guest())

      @else
        @if (Auth::user() &&  Auth::user()->id == '1')
          <li class="dropdown">
              <a class="admin_link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  Διαχείριση <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
              <li><a href=" {{ route('items.index') }} "><i class="fa fa-arrow-right" aria-hidden="true"></i>Μαγαζία</a></li>
              <li><a href=" {{ route('itags.index') }} "><i class="fa fa-arrow-right" aria-hidden="true"></i>Tag Μαγαζιών</a></li>
              <li role="separator" class="divider"></li>
              <li><a href=" {{ route('artists.index') }} "><i class="fa fa-arrow-right" aria-hidden="true"></i>Καλλιτέχνες</a></li>
              <li role="separator" class="divider"></li>
              <li><a href=" {{ route('posts.index') }} "><i class="fa fa-arrow-right" aria-hidden="true"></i>Άρθρα</a></li>
              <li><a href=" {{ route('tags.index') }} "><i class="fa fa-arrow-right" aria-hidden="true"></i>Tag Άρθρων</a></li>
              <li role="separator" class="divider"></li>
              <li><a href=" {{ route('categories.index') }} "><i class="fa fa-arrow-right" aria-hidden="true"></i>Κατηγορίες</a></li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>Αποσύνδεση
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
              
              </ul>
          </li>
          @endif
        @endif

      </ul>

    </div><!-- /.navbar-collapse -->
    <div class="clear"></div>
  </div><!-- /.container-fluid -->
</nav>