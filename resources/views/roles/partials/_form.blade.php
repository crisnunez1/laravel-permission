@csrf

<div class="form-group">
    <label>{{ __('Name') }}</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $role->name) }}">
</div>

<div class="form-group">
    <label for="description">
        {{ __('Description of the role') }}
    </label>
    <textarea class="form-control" name="description"
              rows="3">{{ old('description', $role->description) }}</textarea>
</div>

<hr>

<h3>{{ __('Permissions List') }}</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($permissions as $permission)
            <li>
                <label class="form-check-label">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                           @isset($role->id)
                           @if($role->permissions->contains($permission->id)) checked=checked @endif
                        @endisset>
                    {{ $permission->action }}
                    ( <em>{{ $permission->description ?: 'N/A'}}</em> )
                </label>
            </li>
        @endforeach
    </ul>
</div>

<button class="btn btn-primary float-right">
    {{ __($btnText) }}
</button>

<a class="btn btn-secondary" href="{{ route('roles.index') }}">
    {{ __('Cancel') }}
</a>
