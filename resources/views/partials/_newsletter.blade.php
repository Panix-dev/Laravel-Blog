{!! Form::open(array('url'=>'newsletter','method'=>'POST', 'id'=>'theForm', 'class'=>'simform', 'autocomplete'=>'off')) !!}
	<div class="simform-inner">
		<ol class="questions">
			<li>
				<span><label for="q1">Ποιο είναι το όνομά σου?</label></span>
				{{ Form::text('q1', null, array('id' => 'q1','placeholder' => 'όνομα')) }}
			</li>
			<li>
				<span><label for="q2">Ποιο είναι το email σου?</label></span>
				{{ Form::email('q2', null, array('id' => 'q2','placeholder' => 'email')) }}
			</li>
			<li>
				<span><label for="q3">Ποιο είναι το αγαπημένο σου μαγαζί?</label></span>
				{{ Form::text('q3', null, array('id' => 'q3','placeholder' => 'μαγαζί')) }}
			</li>
		</ol><!-- /questions -->
		<button class="submit" type="submit">Εγγραφή στο Newsletter</button>
		<div class="controls">
			<button class="fa fa-arrow-right next"></button>
			<div class="progress"></div>
			<span class="number">
				<span class="number-current"></span>
				<span class="number-total"></span>
			</span>
			<span class="error-message"></span>
		</div><!-- / controls -->
	</div><!-- /simform-inner -->
	<span class="final-message"></span>
{!! Form::close() !!}		