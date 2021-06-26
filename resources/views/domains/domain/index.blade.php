@extends ('layouts.in')

@section ('body')

<form method="get">
    <div class="sm:flex sm:space-x-4">
        <div class="flex-grow mt-2 sm:mt-0">
            <input type="search" class="form-control form-control-lg" placeholder="{{ __('domain-index.filter') }}" data-table-search="#domain-list-table" />
        </div>

        <div class="sm:ml-4 mt-2 sm:mt-0">
            <select name="error" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['error'] === false) ? 'selected' : '' }}>{{ __('domain-index.error-empty') }}</option>
                <option value="1" {{ ($filters['error'] === true) ? 'selected' : '' }}>{{ __('domain-index.error-yes') }}</option>
            </select>
        </div>

        <div class="sm:ml-4 mt-2 sm:mt-0">
            <select name="type" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['type'] === '') ? 'selected' : '' }}>{{ __('domain-index.type-empty') }}</option>
                <option value="certificate" {{ ($filters['type'] === 'certificate') ? 'selected' : '' }}>{{ __('domain-index.type-certificate') }}</option>
                <option value="domain" {{ ($filters['type'] === 'domain') ? 'selected' : '' }}>{{ __('domain-index.type-domain') }}</option>
                <option value="ping" {{ ($filters['type'] === 'ping') ? 'selected' : '' }}>{{ __('domain-index.type-ping') }}</option>
                <option value="url" {{ ($filters['type'] === 'url') ? 'selected' : '' }}>{{ __('domain-index.type-url') }}</option>
            </select>
        </div>

        <div class="sm:ml-4 mt-2 sm:mt-0 bg-white">
            <a href="{{ route('domain.create') }}" class="btn form-control-lg">{{ __('domain-index.create') }}</a>
        </div>
    </div>
</form>

@include ('domains.domain.molecules.list')

<div class="mt-5 text-right">
    <a href="{{ route('domain.create') }}" class="btn btn-primary">{{ __('domain-index.create') }}</a>
</div>

@stop