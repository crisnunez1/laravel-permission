@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Roles') }}

                    @can('roles.create')
                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary float-right">
                        {{ __('Create') }}
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>{{ __('Name') }}</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td width="10px">
                                    @can('roles.show')
                                    <a href="{{ route('roles.show', $role->id) }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        {{ __('View') }}
                                    </a>
                                    @endcan
                                </td>

                                <td width="10px">
                                    @can('roles.edit')
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        {{ __('Edit') }}
                                    </a>
                                    @endcan
                                </td>

                                <td width="10px">
                                    @can('roles.destroy')
                                        <button onclick="document.getElementById('delete-role-' + {{ $role->id }}).submit()" class="btn btn-sm btn-danger">
                                            {{ __('Delete') }}
                                        </button>
                                        <form id="delete-role-{{ $role->id }}" class="d-none" method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                            @csrf @method('DELETE')
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
