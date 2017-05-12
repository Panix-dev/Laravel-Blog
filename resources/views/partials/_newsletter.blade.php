{!! Form::open(array('url'=>'newsletter','method'=>'POST', 'id'=>'theForm', 'class'=>'simform', 'autocomplete'=>'off')) !!}
	<div class="simform-inner">
		<ol class="questions">
			<li>
				<span><label for="q1">What is your name?</label></span>
				{{ Form::text('q1', null, array('id' => 'q1','placeholder' => 'name')) }}
			</li>
			<li>
				<span><label for="q2">What is your email?</label></span>
				{{ Form::email('q2', null, array('id' => 'q2','placeholder' => 'email')) }}
			</li>
			<li>
				<span><label for="q3">What is your favorite venue?</label></span>
				{{ Form::text('q3', null, array('id' => 'q3','placeholder' => 'venue')) }}
			</li>
		</ol><!-- /questions -->
		<button class="submit" type="submit">Subscribe to our Newsletter</button>
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