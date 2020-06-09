@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Product' . " No. " . $product->id) }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product->id) }}">
                        @method('PUT')

                        @include('products.partials._form', ['btnText' => 'Update'])

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
