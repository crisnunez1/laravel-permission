@csrf

<div class="form-group">
    <label>{{ __('Name') }}</label>
    <input type="text" class="form-control"
           name="name"
           id="name"
           value="{{ old('name', $user->name) }}">
</div>

<div class="form-group">
    <label>{{ __('Email') }}</label>
    <input type="text" class="form-control"
           name="email"
           id="email"
           value="{{ old('email', $user->email) }}">
</div>

<hr>
<h3>{{ __('Role List') }}</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $role)
            <li>
                <label class="form-check-label">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                       @isset($user->id)
                           @if($user->roles->contains($role->id)) checked=checked @endif
                       @endisset
                    >
                    {{ $role->name }}
                    ( <em>{{ $role->description ?: 'N/A'}}</em> )
                </label>
            </li>
        @endforeach
    </ul>
</div>

<hr>

<button class="btn btn-primary float-right">
    {{ __($btnText) }}
</button>

<a class="btn btn-secondary" href="{{ route('users.index') }}">
    {{ __('Cancel') }}
</a>
