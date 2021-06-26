@extends ('layouts.in')

@section ('body')

<form method="get">
    <div class="sm:flex sm:space-x-4">
        <div class="flex-grow mt-2 sm:mt-0">
            <input type="search" class="form-control form-control-lg" placeholder="{{ __('subdomain-index.filter') }}" data-table-search="#subdomain-list-table" />
        </div>

        <div class="sm:ml-4 mt-2 sm:mt-0">
            <select name="error" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['error'] === false) ? 'selected' : '' }}>{{ __('subdomain-index.error-empty') }}</option>
                <option value="1" {{ ($filters['error'] === true) ? 'selected' : '' }}>{{ __('subdomain-index.error-yes') }}</option>
            </select>
        </div>

        <div class="sm:ml-4 mt-2 sm:mt-0">
            <select name="type" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['type'] === '') ? 'selected' : '' }}>{{ __('subdomain-index.type-empty') }}</option>
                <option value="certificate" {{ ($filters['type'] === 'certificate') ? 'selected' : '' }}>{{ __('subdomain-index.type-certificate') }}</option>
                <option value="ping" {{ ($filters['type'] === 'ping') ? 'selected' : '' }}>{{ __('subdomain-index.type-ping') }}</option>
                <option value="url" {{ ($filters['type'] === 'url') ? 'selected' : '' }}>{{ __('subdomain-index.type-url') }}</option>
            </select>
        </div>
    </div>
</form>

@include ('domains.subdomain.molecules.list')

@stop