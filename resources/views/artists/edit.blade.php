@extends('main')

@section('title', 'Επεξεργασία Καλλιτέχνη')

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

			{!! Form::model($artist, ['route' => ['artists.update', $artist->id], 'method' => 'PUT', 'files' => true, 'data-parsley-validate' => '']) !!}

			<div class="col-md-8">

				<div class="form-group">
					{{ Form::label('name', 'Όνομα καλλιτέχνη:') }}
					{{ Form::text('name', null, array('class' => 'form-control input-lg', 'required' => '', 'maxlength' => '255')) }}
				</div>

				<div class="form-group">
					{{ Form::label('slug', 'Slug:') }}
					{{ Form::text('slug', null, array('class' => 'form-control input-lg', 'required' => '', 'maxlength' => '255')) }}
				</div>

				<div class="form-group">
					{{ Form::label('item_id', 'Μαγαζί που εργάζεται:') }}
					{{ Form::select('item_id', $itemlist, null, array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('featured_image', 'Κεντρική Εικόνα:') }}
					{{ Form::file('featured_image') }}
				</div>

				<div class="form-group">
					{{ Form::label('body', 'Περιγραφή:') }}
					{{ Form::textarea('body', null, array('class' => 'form-control artist_body_area')) }}
				</div>

				<div class="form-group">
					{{ Form::label('meta_title', 'Meta Title:') }}
					{{ Form::text('meta_title', null, array('class' => 'form-control meta_title', 'required' => '', 'maxlength' => '70')) }}
					<div class="meta_title_counter_outer">Απαιτείται ένα maximum των <span class="meta_title_counter"></span> χαρακτήρων.</div>
				</div>

				<div class="form-group">
					{{ Form::label('meta_desscription', 'Meta Description:') }}
					{{ Form::textarea('meta_desscription', null, array('class' => 'form-control meta_desscription', 'maxlength' => '160')) }}
					<div class="meta_desscription_counter_outer">Απαιτείται ένα maximum των <span class="meta_desscription_counter"></span> χαρακτήρων.</div>
				</div>

				<div class="form-group">
					{{ Form::label('meta_keywords', 'Meta Keywords:') }}
					{{ Form::text('meta_keywords', null, array('class' => 'form-control meta_keywords', 'required' => '')) }}
				</div>

			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Δημιουργήθηκε στις:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($artist->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Τροποποιήθηκε στις:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($artist->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::LinkRoute('artists.show', 'Ακύρωση', array($artist->slug), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Αποθήκευση', array('class' => 'btn btn-success btn-block')) }}
						</div>
					</div>
				</div>
			</div>

			{!! Form::close() !!}

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