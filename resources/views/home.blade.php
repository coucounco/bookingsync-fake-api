@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Hello {{ auth()->user()->name }} !</h3>
                    <hr /><br />
                    <dl class="row">
                        <dt class="col-sm-3">API Token</dt>
                        <dd class="col-sm-9"><code>{{ auth()->user()->api_token }}</code></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
