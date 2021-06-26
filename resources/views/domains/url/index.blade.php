@extends ('layouts.in')

@section ('body')

<form method="get">
    <div class="sm:flex sm:space-x-4">
        <div class="flex-grow mt-2 sm:mt-0">
            <input type="search" class="form-control form-control-lg" placeholder="{{ __('url-index.filter') }}" data-table-search="#domain-list-table" />
        </div>

        <div class="sm:ml-4 mt-2 sm:mt-0">
            <select name="error" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['error'] === false) ? 'selected' : '' }}>{{ __('url-index.error-empty') }}</option>
                <option value="1" {{ ($filters['error'] === true) ? 'selected' : '' }}>{{ __('url-index.error-yes') }}</option>
            </select>
        </div>
    </div>
</form>

@include ('domains.url.molecules.list')

@stop