@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Product') . " No. " . $product->id }}
                </div>

                <div class="card-body">
                    <p><strong>{{ __('Name') }}</strong> {{ $product->name }}</p>
                    <p><strong>{{ __('Description') }}</strong> {{ $product->description }}</p>

                    <div>
                        <a href="{{ route('products.index') }}">{{ __('Return to Products') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
