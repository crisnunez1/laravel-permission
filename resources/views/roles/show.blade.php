@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Role') . " No. " . $role->id }}
                    </div>

                    <div class="card-body">
                        <p><strong>{{ __('Name') }}: </strong> {{ $role->name }}</p>
                        <p><strong>{{ __('Description') }}: </strong> {{ $role->description }}</p>

                        <div class="form-group">
                            <label><strong>{{ __('Permissions') }}:</strong></label>
                            <p>{{ implode(', ', $role->permissions()->get()->pluck('action')->toArray()) }}</p>
                        </div>
                        <div>
                            <a href="{{ route('roles.index') }}">{{ __('Return to Roles') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
