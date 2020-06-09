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
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th colspan="3">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td scope="row">{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="w-auto p-2">
                                        @can('roles.show')
                                            <a href="{{ route('roles.show', $role->id) }}"
                                               class="btn btn-info btn-sm btn-block">
                                                {{ __('View') }}
                                            </a>
                                        @endcan
                                    </td>

                                    <td class="w-auto p-2">
                                        @can('roles.edit')
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                               class="btn btn-warning btn-sm btn-block">
                                                {{ __('Edit') }}
                                            </a>
                                        @endcan
                                    </td>

                                    <td class="w-auto p-2">
                                        @can('roles.destroy')
                                            <button
                                                onclick="document.getElementById('delete-role-' + {{ $role->id }}).submit()"
                                                class="btn btn-danger btn-sm btn-block">
                                                {{ __('Delete') }}
                                            </button>
                                            <form action="{{ route('roles.destroy', $role->id) }}"
                                                  class="d-none"
                                                  id="delete-role-{{ $role->id }}"
                                                  method="POST">
                                                @csrf @method('DELETE')
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
