@extends('main')

@section('title', 'Διαγραφή Blog Άρθρου?')

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Θέλετε να διαγράψετε αυτό το Blog Άρθρο?</h1>
                <hr>

                <p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">Τίτλος</span>
                            {{ $post->title }}
                      </li>
                        <li class="list-group-item">
                            <span class="badge">Id</span>
                            {{ $post->id }}
                        </li>
                        <li class="list-group-item">
                            <span class="badge">Περιγραφή</span>
                            {{ $post->meta_desscription }}
                        </li>
                    </ul>
                </p>

				{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

					{{ Form::submit('Ναι! Θέλω να προχωρήσω στην διαγραφή!', array('class' => 'btn btn-danger btn-lg btn-block')) }}

                {!! Form::close() !!}

            </div>
        </div>

@endsection