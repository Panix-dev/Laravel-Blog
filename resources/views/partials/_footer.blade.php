<div class="footer_area row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<ul class="footer_menu_container">
		<li class="footer_heading">Με λίγα λόγια</li>
		<li><a class="{{ Request::is('/') ? "active" : ""}}" href="{{ url('/') }}">Αρχική</a>
		<li><a class="{{ Request::is('privacy-policy') ? "active" : ""}}" href="/privacy-policy"">Όροι χρήσης</a>
		{{-- <li><a class="{{ Request::is('payment-methods') ? "active" : ""}}" href="/payment-methods""></i>Τρόποι πληρωμής</a> --}}
		<li><a class="{{ Request::is('about') ? "active" : ""}}" href="/about">Λίγα λόγια για εμάς</a>
		<li><a class="{{ Request::is('blog') ? "active" : ""}}" href="/blog"">Διαβάστε το Blog μας</a>
        <li><a class="{{ Request::is('contact') ? "active" : ""}}" href="/contact">Επικοινωνήστε μαζί μας</a>
    </ul>
	</div>
	<div class="col-md-4">
	<ul class="footer_menu_container">
		<li class="footer_heading">Διαθέσιμες υπηρεσίες</li>
		<li><a class="{{ Request::is('pistes') ? "active" : ""}}" href="/pistes"">Πίστες / Μπουζούκια</a>
        <li><a class="{{ Request::is('clubs') ? "active" : ""}}" href="/clubs"">Νυχτερινά Club</a>
        <li><a class="{{ Request::is('bars') ? "active" : ""}}" href="/bars"">Νυχτερινά Bar</a>
        <li><a class="{{ Request::is('bachelor-party') ? "active" : ""}}" href="/bachelor-party">Bachelor Parties</a>
        <li><a class="{{ Request::is('ekdiloseis-xoroi') ? "active" : ""}}" href="/ekdiloseis-xoroi">Εκδηλώσεις / Χώροι</a>
        {{-- <li><a class="{{ Request::is('etairikes-ekdiloseis') ? "active" : ""}}" href="/etairikes-ekdiloseis">Εταιρικές Εκδηλώσεις</a> --}}
    </ul>
	</div>
	<div class="clear"></div>
</div>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-8">
		<div class="footer_menu_container" style="margin-bottom: 20px;">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
		</div>
	</div>
	<div class="clear"></div>
</div>


