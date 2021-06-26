@extends ('layouts.in')

@section ('body')

<form method="post">
    <input type="hidden" name="_action" value="update" />

    <div class="box p-5 mt-5">
        <div class="p-2">
            <label for="user-name" class="form-label">{{ __('user-update.name') }}</label>
            <input type="text" name="name" class="form-control form-control-lg" id="user-name" value="{{ $REQUEST->input('name') }}" required>
        </div>

        <div class="p-2">
            <label for="user-email" class="form-label">{{ __('user-update.email') }}</label>
            <input type="email" name="email" class="form-control form-control-lg" id="user-email" value="{{ $REQUEST->input('email') }}" required>
        </div>

        <div class="p-2">
            <label for="user-password_current" class="form-label">{{ __('user-update.password_current') }}</label>
            <input type="password" name="password_current" class="form-control form-control-lg" id="user-password_current" required>
        </div>

        <div class="p-2">
            <label for="user-password" class="form-label">{{ __('user-update.password') }}</label>
            <input type="password" name="password" class="form-control form-control-lg" id="user-password">
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{ __('user-update.save') }}</button>
        </div>
    </div>
</form>

@stop
