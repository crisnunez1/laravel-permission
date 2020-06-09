@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('User') . " No. " . $user->id }}
                    </div>

                    <div class="card-body">
                        <p><strong>{{ __('Name') }} :</strong> {{ $user->name }}</p>
                        <p><strong>{{ __('Email') }} :</strong> {{ $user->email }}</p>

                        <div class="form-group">
                            <label><strong>{{ __('Roles') }}:</strong></label>
                            <p>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</p>
                        </div>
                        <div>
                            <a href="{{ route('users.index') }}">{{ __('Return to users') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
