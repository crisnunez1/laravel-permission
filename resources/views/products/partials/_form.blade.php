@csrf

<div class="form-group">
    <label>{{ __('Name') }}</label>
    <input type="text" class="form-control"
        name="name"
        id="name"
        value="{{ old('name', $product->name) }}">
</div>

<div class="form-group">
    <label for="description">
        {{ __('Description of the product') }}
    </label>
    <textarea class="form-control" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
</div>

<button class="btn btn-primary float-right">
    {{ __($btnText) }}
</button>

<a class="btn btn-secondary" href="{{ route('products.index') }}">
    {{ __('Cancel') }}
</a>
