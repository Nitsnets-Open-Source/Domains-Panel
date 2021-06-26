@extends ('layouts.in')

@section ('body')

<form method="post">
    <input type="hidden" name="_action" value="update" />

    <div class="box p-5 mt-5">
        <div class="p-2">
            <label for="configuration-key" class="form-label">{{ __('configuration-update.key') }}</label>
            <input type="text" name="key" class="form-control form-control-lg" id="configuration-key" value="{{ $REQUEST->input('key') }}" readonly>
        </div>

        <div class="p-2">
            <label for="configuration-value" class="form-label">{{ __('configuration-update.value') }}</label>
            <input type="text" name="value" class="form-control form-control-lg" id="configuration-value" value="{{ $REQUEST->input('value') }}" required>
        </div>

        <div class="p-2">
            <label for="configuration-description" class="form-label">{{ __('configuration-update.description') }}</label>
            <input type="text" name="description" class="form-control form-control-lg" id="configuration-description" value="{{ $REQUEST->input('description') }}" required>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{ __('configuration-update.save') }}</button>
        </div>
    </div>
</form>

@stop
