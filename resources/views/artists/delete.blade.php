@extends('main')

@section('title', 'Διαγραφή Καλλιτέχνη?')

@section('content')
    
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Θέλετε να διαγράψετε αυτόν τον καλλιτέχνη?</h1>
                <hr>

                <p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">Όνομα</span>
                            {{ $artist->name }}
                      </li>
                        <li class="list-group-item">
                            <span class="badge">Id</span>
                            {{ $artist->id }}
                        </li>
                        <li class="list-group-item">
                            <span class="badge">Περιγραφή</span>
                            {{ $artist->meta_desscription }}
                        </li>
                    </ul>
                </p>

				{!! Form::open(['route' => ['artists.destroy', $artist->id], 'method' => 'DELETE']) !!}

					{{ Form::submit('Ναι! Θέλω να προχωρήσω στην διαγραφή!', array('class' => 'btn btn-danger btn-lg btn-block')) }}

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection