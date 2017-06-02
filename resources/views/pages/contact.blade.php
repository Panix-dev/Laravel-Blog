@extends('main')

@section('title', 'Contact')
@section('meta_description', 'Meta Description To Be Replaced')
@section('meta_keywords', 'Meta Keywords To Be Replaced')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <h1>Επικοινωνήστε μαζί μας!</h1>
                <hr>
                <form action=" {{ url('contact') }} " method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name"email">Email:</label>
                        <input id="email" name="email" class="form-control">                        
                    </div>

                    <div class="form-group">
                        <label name"subject">Θέμα:</label>
                        <input id="subject" name="subject" class="form-control">                        
                    </div>

                    <div class="form-group">
                        <label name"message">Μήνυμα:</label>
                        <textarea id="message" name="message" class="form-control">Εισάγετε το μήνυμα σας...</textarea>                        
                    </div>

                    <input type="submit" name="submit" value="Αποστολή Μηνύματος" class="btn btn-success">
                </form>
            </div>
        </div>

@endsection