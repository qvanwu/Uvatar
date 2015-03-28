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
                {{Form::open(array('route' => array('avatar.destroy', $avatar->id),
                                    'method' => 'delete',
                                    'onsubmit' => 'return confirm("You really want to delete this item?")'))}}
                {{Form::submit('Delete', array('class' => 'btn btn-danger center-block',
                                                'id' => 'btnDelete'))}}
                {{Form::close()}}
            </div>

            <div class="col-md-5">
                <div class="row">
                    <h4>The image is attaching to:</h4>
                    Choose a email below to attach this image:

                </div>

                <div class="row">
                    {{Form::open(array('route' => array('avatar.edit', $avatar->id),
                                        'method' => 'get'))}}

                    <select class="form-control" name="email">
                        @foreach(Auth::user()->emails as $email)
                            {{$main = Auth::user()->main_email == $email? 'main' : ''}}
                            {{$value = $email->email}}
                            <option id="{{$email->id}}" value="{{$value}}">
                                {{$value}}
                            </option>
                        @endforeach
                    </select>
                    <br/>
                    {{Form::submit('Attach to this Email', array('class' => 'btn btn-primary'))}}
                    {{Form::close()}}
                </div>
                <br/>
            </div>
        </div>
    </div>
@endsection

@stop