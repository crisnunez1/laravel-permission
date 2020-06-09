@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('New Role') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">

                        @include('roles.partials._form', ['btnText' => 'Save'])

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
