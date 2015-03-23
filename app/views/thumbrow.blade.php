@section('thumbrow')
    {{
        $addRow = false;
        if ($i == 4){
            $addRow = true;
            $i = 1;
        } else $i++;
    }}
@endsection