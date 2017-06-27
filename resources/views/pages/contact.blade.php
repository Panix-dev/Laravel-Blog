@extends('main')

@section('title', 'Επικοινωνήστε μαζί μας')
@section('meta_description', 'Τηλέφωνο Κρατήσεων 6941.681.692 - Κάντε κράτηση σε νυχτερινά κέντρα, νυχτερινά club, μπουζούκια και πίστες Αθήνας με κανονική τιμή και φοιτητική προσφοράς φιάλης')
@section('meta_keywords', 'online κρατηση, κρατηση online, κρατηση σε μπουζουκια, μπουζουκια κρατηση, πιστες κρατηση, πιστες κρατηση φοιτητική κράτηση μπουζούκια, μπουζούκια φοιτητικές τιμές, προσφορες νυχτερινα κεντρα')

@section('stylesheets')
    
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

<div class="category_image contacts_image">
    <div class="patter_overaly"></div>
    <div class="category_caption">
        <h1>Επικοινωνήστε μαζί μας!</h1>
        <div class="clear"></div>
        <p>Θα χαρούμε πολύ να σας εξυπηρετήσουμε.</p>
    </div>
</div>

<div class="contact_container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="contact_intro">
                    <h2>Χρειάζεστε παραπάνω πληροφορίες?</h2>
                    <p>Χρησιμοποιήστε την παρακάτω φόρμα επικοινωνίας για οποιοδήποτε αίτημα επιθυμείτε είτε για να πείτε απλά ένα γειά ή για να ρωτήσετε πληροφορίες σχετικά με κράτηση σε κάποιο από τα συνεργαζόμενα μαγαζιά μας. Εναλλακτικά μπορείτε να μας καλέσετε στο <span class="inner_venue_ci"><a class="btn btn-success" href="tel:6941681692"><span class="glyphicon glyphicon-phone"></span> 694 16 81 692</a></span> και θα χαρούμε πολύ να σας εξυπηρετήσουμε.</span></p>
                </div>

                {!! Form::open(['route' => 'contact.send', 'data-parsley-validate' => '']) !!}
                    
                    <div class="col-md-6">

                    <div class="form-group main_form_elements">
                        {{ Form::label('name', 'Ονοματεπώνυμο:') }}
                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Ονοματεπώνυμο')) }}
                    </div>

                    </div>
                    
                    <div class="col-md-6">

                    <div class="form-group main_form_elements">
                        {{ Form::label('email', 'Email:') }}
                        <input id="email" type="email" class="form-control" name="email" required placeholder="Email">
                    </div>

                    </div>
                    
                    <div class="col-md-12">

                    <div class="form-group main_form_elements">
                        {{ Form::label('phone', 'Τηλέφωνο:') }}
                        {{ Form::text('phone', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Τηλέφωνο')) }}
                    </div>


                    <div class="form-group main_form_elements">
                        {{ Form::label('message', 'Μήνυμα:') }}
                        {{ Form::textarea('message', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Μήνυμα')) }}
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label class="checkbox-inline">
                                <div class="fake-checkbox t_checked">
                                <input type="checkbox" name="venue_interest" id="venue_interest" value="1" checked><span></span>
                                </div>
                                Θέλετε να μάθετε πληροφορίες για κράτηση σε μαγαζί;
                            </label>
                        </div>
                    </div>

                    </div>

                    <div class="clear"></div>
                    
                    <div class="toggle_open_close">

                    <div class="col-md-12">

                    <div class="form-group venue_contact_list">
                        {{ Form::label('items', 'Συνεργαζόμενα Μαγαζιά') }}
                        <select name="items[]" class="form-control js-example-basic-multiple" multiple="">
                            @foreach ($items as $item)
                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="btn-group form-group btn-group-sm" role="group" aria-label="Programmatic setting and clearing Select2 options">
                        <button type="button" class="js-programmatic-multi-clear btn btn-default">Εκαθάριση</button>
                    </div>

                    </div>

                    <div class="col-md-4">

                    <div class="form-group venue_contact_list">
                        {{ Form::label('people', 'Αριθμός Ατόμων') }}
                        <select name="people" class="form-control">
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                           <option value="more">Παραπάνω απο 12</option>
                        </select>
                    </div>
                    
                    </div>

                    <div class="col-md-4">
                    
                    <div class="form-group venue_contact_list">
                        {{ Form::label('offer', 'Τύπος Προσφοράς') }}
                        <select name="offer" class="form-control">
                           <option value="kanoniko">Κανονική Κράτηση</option>
                           <option value="foititiko">Φοιτητική Κράτηση</option>
                        </select>
                    </div>

                    </div>

                    <div class="col-md-4">
                        <div class="venue_contact_list">
                            {{ Form::label('date', 'Ημερομηνία Κράτησης') }}
                        </div>
                        <div class="input-group date">
                            
                            <input type="text" class="form-control datepicker" name="date">
                            <div class="input-group-addon">
                                <span class="glyphicon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>

                    </div>

                    <div class="clear" style="padding-top: 20px"></div>

                    </div>

                    <div class="clear"></div>
                    
                    <div class="submit-wrap">
                        <span class="hover">
                            <span class="small"></span>
                            <span></span>
                        </span>
                        {{ Form::submit('Αποστολή', array('class' => 'btn_contact_send')) }}
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.full.min.js') !!}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.el.min.js" charset="UTF-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css"/>

    <script type="text/javascript">

        $(document).ready(function(){
            var date = new Date();
            date.setDate(date.getDate()-1);

             $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayHighlight: true,
                 startDate: date,
                language:'el',
                locale:'el-GR',
                autoclose: true
            });

            $('.newsletter').css('margin-top', '0');

            $("#venue_interest").on("click", function () { 
                if ($(".fake-checkbox").hasClass("t_checked")) {
                  $(".toggle_open_close").slideUp('slow');
                  $('.fake-checkbox').removeClass( "t_checked" );
                }
                else {
                    $(".toggle_open_close").slideDown('slow');
                    $('.fake-checkbox').addClass( "t_checked" );
                }
            });

        });

        $(".js-example-basic-multiple").select2();
        $(".js-programmatic-multi-clear").on("click", function () { $(".js-example-basic-multiple").val(null).trigger("change"); });
        
    </script>

@endsection