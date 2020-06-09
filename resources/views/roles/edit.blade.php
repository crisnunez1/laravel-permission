@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Role' . " No. " . $role->id) }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @method('PUT')

                        @include('roles.partials._form', ['btnText' => 'Update'])

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
