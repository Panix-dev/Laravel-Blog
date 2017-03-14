@extends('main')

@section('title', 'Edit Blog Post')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>

	<script>
		tinymce.init({ 
			selector:'textarea',
			plugins: 'advlist autolink link image imagetools lists charmap code wordcount',
		});
	</script>

@endsection

@section('content')
		
		<div class="row">

			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true, 'data-parsley-validate' => '']) !!}

			<div class="col-md-8">

				<div class="form-group">
					{{ Form::label('title', 'Post Title:') }}
					{{ Form::text('title', null, array('class' => 'form-control input-lg', 'required' => '', 'maxlength' => '255')) }}
				</div>

				<div class="form-group">
					{{ Form::label('slug', 'Slug:') }}
					{{ Form::text('slug', null, array('class' => 'form-control input-lg', 'required' => '', 'maxlength' => '255')) }}
				</div>

				<div class="form-group">
					{{ Form::label('category_id', 'Category:') }}
					{{ Form::select('category_id', $categories, null, array('class' => 'form-control', 'required' => '')) }}
				</div>

				<div class="form-group">
					{{ Form::label('tags', 'Tags:') }}
					{{ Form::select('tags[]', $tags, null, array('class' => 'form-control js-example-basic-multiple', 'multiple' => '')) }}
				</div>

				<div class="btn-group form-group btn-group-sm" role="group" aria-label="Programmatic setting and clearing Select2 options">
			    	<button type="button" class="js-programmatic-multi-clear btn btn-default">Clear Tags</button>
			    </div>

				<div class="form-group">
					{{ Form::label('featured_image', 'Update Featured Image:') }}
					{{ Form::file('featured_image') }}
				</div>

				

				<div class="form-group">
					{{ Form::label('body', 'Post Body:') }}
					{{ Form::textarea('body', null, array('class' => 'form-control')) }}
				</div>

			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::LinkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block')) }}
						</div>
					</div>
				</div>
			</div>

			{!! Form::close() !!}

		</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.full.min.js') !!}

	<script type="text/javascript">
		$(".js-example-basic-multiple").select2();
		$(".js-example-basic-multiple").val( {!! json_encode($post->tags->pluck('id')) !!} ).trigger("change");
		$(".js-programmatic-multi-clear").on("click", function () { $(".js-example-basic-multiple").val(null).trigger("change"); });
	</script>

@endsection