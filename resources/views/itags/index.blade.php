@extends('main')

@section('title', 'Tags Μαγαζιών')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
	<div class="container">
        <div class="row">
            
            <h1>Tags Μαγαζιών</h1>
			<hr>
				
			<div class="col-md-7">

				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th>#</th>
							<th>Όνομα</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>

						@foreach ($itags as $itag)

						<tr>
							<td style="width:20px;" align="center"><span class="label label-primary">{{ $itag->id }}</span> </td>
							<td> {{ $itag->name }} </a></td>
							<td style="width:80px;" align="center">
								{!! Html::LinkRoute('itags.show', 'View', array($itag->slug), array('class' => 'btn btn-primary btn-sm btn-block')) !!} 
							</td>
							<td style="width:80px;" align="center">
								{!! Html::LinkRoute('itags.edit', 'Edit', array($itag->id), array('class' => 'btn btn-warning btn-sm btn-block')) !!}
							</td>
							<td style="width:80px;" align="center">
							{!! Html::LinkRoute('itags.delete', 'Delete', array($itag->id), array('class' => 'btn btn-danger btn-sm btn-block')) !!}
							</td>
						</tr>

						@endforeach

					</tbody>
				</table>

			</div>

			<div class="col-md-5">
				<div class="well">
					{!! Form::open(array('route' => 'itags.store', 'method' => 'POST', 'data-parsley-validate' => '')) !!}
						
						<h3>Νέο Tag</h3>

						<div class="form-group">
							{{ Form::label('name', 'Όνομα Tag:') }}
							{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>

						<div class="form-group">
							{{ Form::label('slug', 'Slug:') }}
							{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
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

						{{ Form::submit('Δημιουργία Tag', array('class' => 'btn btn-primary btn-block')) }}

					{!! Form::close() !!}
				</div>
			</div>

        </div> <!-- end of row -->
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