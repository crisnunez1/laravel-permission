@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ __('Products') }}

                        @can('products.create')
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary float-right">
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
                            @foreach($products as $product)
                                <tr>
                                    <td scope="row">{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td class="w-auto p-2">
                                        @can('products.show')
                                            <a href="{{ route('products.show', $product->id) }}"
                                               class="btn btn-info btn-sm btn-block">
                                                {{ __('View') }}
                                            </a>
                                        @endcan
                                    </td>

                                    <td class="w-auto p-2">
                                        @can('products.edit')
                                            <a href="{{ route('products.edit', $product->id) }}"
                                               class="btn btn-warning btn-sm btn-block">
                                                {{ __('Edit') }}
                                            </a>
                                        @endcan
                                    </td>

                                    <td class="w-auto p-2">
                                        @can('products.destroy')
                                            <button
                                                onclick="document.getElementById('delete-product-' + {{ $product->id }}).submit()"
                                                class="btn btn-danger btn-sm btn-block">
                                                {{ __('Delete') }}
                                            </button>
                                            <form action="{{ route('products.destroy', $product->id) }}"
                                                  class="d-none"
                                                  id="delete-product-{{ $product->id }}"
                                                  method="POST">
                                                @csrf @method('DELETE')
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
