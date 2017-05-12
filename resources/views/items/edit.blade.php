@extends('main')

@section('title', 'Edit Item')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>

	<script>
		tinymce.init({ 
			selector:'.item_body_area',
			plugins: 'advlist autolink link image imagetools lists charmap code wordcount',
		});
	</script>

@endsection

@section('content')
		
		<div class="row">

			{!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'PUT', 'files' => true, 'data-parsley-validate' => '']) !!}

			<div class="col-md-8">

				<div class="form-group">
						{{ Form::label('title', 'Item Title:') }}
						{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
					</div>

					<div class="form-group">
						{{ Form::label('slug', 'Slug:') }}
						{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
					</div>

					<div class="form-group">
						{{ Form::label('type_id', 'Type:') }}
						{{ Form::select('type_id', $typelist, null, array('class' => 'form-control', 'required' => '')) }}
					</div>

					<div class="form-group">
						{{ Form::label('itags', 'Itags:') }}
						{{ Form::select('itags[]', $itags, null, array('class' => 'form-control js-example-basic-multiple', 'multiple' => '')) }}
					</div>

					<div class="btn-group form-group btn-group-sm" role="group" aria-label="Programmatic setting and clearing Select2 options">
				    	<button type="button" class="js-programmatic-multi-clear btn btn-default">Clear Itags</button>
				    </div>

				    <div class="form-group">
						{{ Form::label('featured_image', 'Upload Featured Image:') }}
						{{ Form::file('featured_image', array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('pricing_body', 'Pricing Body:') }}
						{{ Form::textarea('pricing_body', null, array('class' => 'form-control item_body_area')) }}
					</div>

					<div class="form-group">
						{{ Form::label('body_1', 'Item Body 1:') }}
						{{ Form::textarea('body_1', null, array('class' => 'form-control item_body_area')) }}
					</div>

					<div class="form-group">
						{{ Form::label('body_2', 'Item Body 2:') }}
						{{ Form::textarea('body_2', null, array('class' => 'form-control item_body_area')) }}
					</div>

					<div class="form-group">
						{{ Form::label('body_3', 'Item Body 3:') }}
						{{ Form::textarea('body_3', null, array('class' => 'form-control item_body_area')) }}
					</div>

					<div class="form-group">
						{{ Form::label('body_4', 'Item Body 4:') }}
						{{ Form::textarea('body_4', null, array('class' => 'form-control item_body_area')) }}
					</div>

					<div class="form-group">
						{{ Form::label('weekdays', 'Weekdays:') }}
						{{ Form::text('weekdays', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
					</div>

					<div class="form-group">
						{{ Form::label('google_map', 'Google Map:') }}
						{{ Form::text('google_map', null, array('class' => 'form-control', 'required' => '')) }}
					</div>

					<div class="form-group">
						{{ Form::label('points_to_award', 'Points To Award:') }}
						{{ Form::text('points_to_award', null, array('class' => 'form-control', 'required' => '')) }}
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

			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($item->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($item->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::LinkRoute('items.show', 'Cancel', array($item->slug), array('class' => 'btn btn-danger btn-block')) !!}
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
		$(".js-example-basic-multiple").val( {!! json_encode($item->itags->pluck('id')) !!} ).trigger("change");
		$(".js-programmatic-multi-clear").on("click", function () { $(".js-example-basic-multiple").val(null).trigger("change"); });
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