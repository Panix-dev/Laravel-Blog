@extends('main')

@section('title', 'Διαγραφή Μαγαζιού?')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Θέλετε να διαγράψετε αυτό το Μαγαζί?</h1>
                <hr>

                <p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">Όνομα</span>
                            {{ $item->title }}
                      </li>
                        <li class="list-group-item">
                            <span class="badge">Id</span>
                            {{ $item->id }}
                        </li>
                        <li class="list-group-item">
                            <span class="badge">Περιγραφή</span>
                            {{ $item->meta_desscription }}
                        </li>
                    </ul>
                </p>

				{!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'DELETE']) !!}

					{{ Form::submit('Ναι! Θέλω να προχωρήσω στην διαγραφή!', array('class' => 'btn btn-danger btn-lg btn-block')) }}

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection