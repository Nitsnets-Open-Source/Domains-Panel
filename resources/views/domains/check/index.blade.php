@extends ('layouts.in')

@section ('body')

<form method="get">
    <button type="submit" class="hidden"></button>

    <div class="sm:flex sm:space-x-4 mt-4">
        <div class="flex-grow mt-2 sm:mt-0">
            <input type="search" name="search" class="form-control form-control-lg" value="{{ $filters['search'] }}" placeholder="{{ __('check-index.search') }}" />
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <input type="search" name="start_at" class="form-control form-control-lg" value="{{ $filters['start_at'] }}" placeholder="{{ __('check-index.start_at') }}" />
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <input type="search" name="end_at" class="form-control form-control-lg" value="{{ $filters['end_at'] }}" placeholder="{{ __('check-index.end_at') }}" />
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <select name="error" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['error'] === false) ? 'selected' : '' }}>{{ __('check-index.error-empty') }}</option>
                <option value="1" {{ ($filters['error'] === true) ? 'selected' : '' }}>{{ __('check-index.error-yes') }}</option>
            </select>
        </div>

        <div class="flex-1 sm:ml-4 mt-2 sm:mt-0">
            <select name="type" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['type'] === '') ? 'selected' : '' }}>{{ __('check-index.type-empty') }}</option>
                <option value="certificate" {{ ($filters['type'] === 'certificate') ? 'selected' : '' }}>{{ __('check-index.type-certificate') }}</option>
                <option value="domain" {{ ($filters['type'] === 'domain') ? 'selected' : '' }}>{{ __('check-index.type-domain') }}</option>
                <option value="ping" {{ ($filters['type'] === 'ping') ? 'selected' : '' }}>{{ __('check-index.type-ping') }}</option>
                <option value="url" {{ ($filters['type'] === 'url') ? 'selected' : '' }}>{{ __('check-index.type-url') }}</option>
            </select>
        </div>
    </div>
</form>

@include ('domains.check.molecules.list')

@stop