@extends('main')

@section('title', 'Διαγραφή Blog Tag?')

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Θέλετε να διαγράψετε αυτό το Tag?</h1>
                <hr>

                <p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">Όνομα</span>
                            {{ $tag->name }}
                      </li>
                        <li class="list-group-item">
                            <span class="badge">Id</span>
                            {{ $tag->id }}
                        </li>
                    </ul>
                </p>

				{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}

					{{ Form::submit('Ναι! Θέλω να προχωρήσω στην διαγραφή!', array('class' => 'btn btn-danger btn-lg btn-block')) }}

                {!! Form::close() !!}

            </div>
        </div>

@endsection