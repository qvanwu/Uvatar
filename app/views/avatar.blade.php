@extends ('layouts.master')

@section ('body.main')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            {{HTML::image(
                        url('userimage/'.Auth::user()->id.'/'.$avatar->filename),
                            '', # alt attribute
                            array('class' => 'single-avatar thumbnail center-block')
                        )
            }}

            {{Form::submit('Delete', array('class' => 'btn btn-danger center-block'))}}
        </div>

        <div class="col-md-5">
            <div class="row">
                <h4>The image is attaching to:</h4>
                Choose your Email or <a href="email/add"><b>add a new address</b></a>
                <br/>

                <select class="form-control">
                    @foreach(Auth::user()->emails as $email)
                        {{$main = Auth::user()->main_email == $email? 'main' : ''}}

                        <option id="{{$email->id}}">{{$email->email.$main}}</option>                                    </option>
                    @endforeach
                </select>
            </div>
            <br/>

            <div class="row">
                {{Form::submit('Attach to this Email', array('class' => 'btn btn-primary'))}}
            </div>
            <br/>
        </div>
    </div>
    </div>
@endsection

@stop