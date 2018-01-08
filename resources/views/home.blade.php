@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Заштедете време</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    Пребарајте брзо и лесно низ широкиот асортиман на производи!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
