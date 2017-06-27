
<div>
Ονοματεπώνυμο: {{ $name }}
</div>
<div>
Τηλέφωνο: {{ $phone }}
</div>
<div>
Email: {{ $email }}
</div>
<div>
Μήνυμα: {{ $bodyMessage }}
</div>

@if ($venue_interest == 1)
	<br><br>
	<div>
	Αριθμός Ατόμων: {{ $people }}
	</div>
	<div>
	Τύπος Προσφοράς: {{ $offer }}
	</div>
	<div>
	Ενδιαφερόμενα Μαγαζιά: 
		@foreach ($items as $item)
			{{ $item }} @if ($item != end($items)) , @endif
		@endforeach
	</div>
	<div>
	Ημερομηνία: {{ $date }}
	</div>

@endif