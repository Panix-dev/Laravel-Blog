@extends('main')

@section('title', 'Create New Artist')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>

	<script>
		tinymce.init({ 
			selector:'.artist_body_area',
			plugins: 'advlist autolink link image imagetools lists charmap code wordcount',
		});
	</script>

@endsection

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Create New Artist</h1>
                <hr>

				{!! Form::open(['route' => 'artists.store', 'data-parsley-validate' => '', 'files' => true]) !!}
					
					<div class="form-group">
						{{ Form::label('name', 'Artist Name:') }}
						{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
					</div>

					<div class="form-group">
						{{ Form::label('slug', 'Slug:') }}
						{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
					</div>

					<div class="form-group">
						{{ Form::label('item_id', 'Item:') }}
						<select name="item_id" class="form-control">
							@foreach ($items as $item)
								<option value="{{ $item->id }}">{{ $item->title }}</option>
							@endforeach
						</select>
					</div>

				    <div class="form-group">
						{{ Form::label('featured_image', 'Upload Featured Image:') }}
						{{ Form::file('featured_image', array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('body', 'Artist Body:') }}
						{{ Form::textarea('body', null, array('class' => 'form-control artist_body_area')) }}
					</div>

					<div class="form-group">
						{{ Form::label('meta_title', 'Meta Title:') }}
						{{ Form::text('meta_title', null, array('class' => 'form-control meta_title', 'required' => '', 'maxlength' => '70')) }}
						<div class="meta_title_counter_outer">A maximum of <span class="meta_title_counter"></span> charachters is required.</div>
					</div>

					<div class="form-group">
						{{ Form::label('meta_desscription', 'Meta Description:') }}
						{{ Form::textarea('meta_desscription', null, array('class' => 'form-control meta_desscription', 'maxlength' => '160')) }}
						<div class="meta_desscription_counter_outer">A maximum of <span class="meta_desscription_counter"></span> charachters is required.</div>
					</div>

					<div class="form-group">
						{{ Form::label('meta_keywords', 'Meta Keywords:') }}
						{{ Form::text('meta_keywords', null, array('class' => 'form-control meta_keywords', 'required' => '')) }}
					</div>

					{{ Form::submit('Create Artist', array('class' => 'btn btn-success btn-lg btn-block')) }}


                {!! Form::close() !!}

            </div>
        </div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

	<script type="text/javascript">
		(function ($) {
		    $.fn.extend({
		        limiter: function (minLimit, maxLimit, elem) {
		            $(this).on("keydown keyup focus keypress", function (e) {
		                setCount(this, elem, e);
		            });

		            function setCount(src, elem, e) {
		                var chars = src.value.length;
		                if (chars == maxLimit) {
		                    //e.preventDefault();
		                     elem.html(maxLimit - chars);
		                    elem.addClass('maxLimit');
		                    return false;
		                     
		                } else if (chars > maxLimit) {
		                    src.value = src.value.substr(0, maxLimit);
		                    chars = maxLimit;
		                    elem.addClass('maxLimit');
		                } else {
		                    elem.removeClass('maxLimit');
		                }
		                if (chars < minLimit) {
		                    elem.addClass('minLimit');
		                } else {
		                    elem.removeClass('minLimit');
		                }
		                elem.html(maxLimit - chars);
		            }
		            setCount($(this)[0], elem);
		        }
		    });
		})(jQuery);

		var elem = $(".meta_title_counter");
		var elem2 = $(".meta_desscription_counter");
		$(".meta_title").limiter(0, 70, elem);
		$(".meta_desscription").limiter(0, 160, elem2);
	</script>

@endsection