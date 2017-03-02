@extends('main')

@section('title', 'Create New Post')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Create New Post</h1>
                <hr>

				{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
					
					<div class="form-group">
						{{ Form::label('title', 'Post Title:') }}
						{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
					</div>

					<div class="form-group">
						{{ Form::label('slug', 'Slug:') }}
						{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
					</div>

					<div class="btn-group form-group btn-group-sm" role="group" aria-label="Programmatic setting and clearing Select2 options">
				    	<button type="button" class="js-programmatic-multi-clear btn btn-default">Clear</button>
				    </div>

					<div class="form-group">
						{{ Form::label('category_id', 'Category:') }}
						<select name="category_id" class="form-control" required="">
							@foreach ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						{{ Form::label('tags', 'Tags:') }}
						<select name="tags[]" class="form-control js-example-basic-multiple" multiple="">
							@foreach ($tags as $tag)
								<option value="{{ $tag->id }}">{{ $tag->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						{{ Form::label('body', 'Post Body:') }}
						{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}
					</div>

					{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}


                {!! Form::close() !!}

            </div>
        </div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.full.min.js') !!}

	<script type="text/javascript">
		$(".js-example-basic-multiple").select2();
		$(".js-programmatic-multi-clear").on("click", function () { $(".js-example-basic-multiple").val(null).trigger("change"); });
	</script>

@endsection