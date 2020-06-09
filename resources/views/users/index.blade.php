@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Users') }}
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
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td class="w-auto p-2">
                                        @can('users.show')
                                            <a href="{{ route('users.show', $user->id) }}"
                                               class="btn btn-info btn-sm btn-block">
                                                {{ __('View') }}
                                            </a>
                                        @endcan
                                    </td>

                                    <td class="w-auto p-2">
                                        @can('users.edit')
                                            <a href="{{ route('users.edit', $user->id) }}"
                                               class="btn btn-warning btn-sm btn-block">
                                                {{ __('Edit') }}
                                            </a>
                                        @endcan
                                    </td>

                                    <td class="w-auto p-2">
                                        @can('users.destroy')
                                            <button
                                                onclick="document.getElementById('delete-user-' + {{ $user->id }}).submit()"
                                                class="btn btn-danger btn-sm btn-block">
                                                {{ __('Delete') }}
                                            </button>
                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                  class="d-none"
                                                  id="delete-user-{{ $user->id }}"
                                                  method="POST">
                                                @csrf @method('DELETE')
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
