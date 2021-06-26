@extends ('layouts.in')

@section ('body')

@include ('domains.domain.molecules.update-nav', ['selected' => 'check'])

<form method="get">
    <button type="submit" class="hidden"></button>

    <div class="sm:flex sm:space-x-4 mt-4">
        <div class="flex-grow mt-2 sm:mt-0">
            <input type="search" name="search" class="form-control form-control-lg" value="{{ $filters['search'] }}" placeholder="{{ __('domain-update-url-check.search') }}" />
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <input type="search" name="start_at" class="form-control form-control-lg" value="{{ $filters['start_at'] }}" placeholder="{{ __('domain-update-url-check.start_at') }}" />
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <input type="search" name="end_at" class="form-control form-control-lg" value="{{ $filters['end_at'] }}" placeholder="{{ __('domain-update-url-check.end_at') }}" />
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <select name="error" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['error'] === false) ? 'selected' : '' }}>{{ __('domain-update-check.error-empty') }}</option>
                <option value="1" {{ ($filters['error'] === true) ? 'selected' : '' }}>{{ __('domain-update-check.error-yes') }}</option>
            </select>
        </div>

        <div class="flex-1 sm:ml-4 mt-2 sm:mt-0">
            <select name="type" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['type'] === '') ? 'selected' : '' }}>{{ __('domain-update-check.type-empty') }}</option>
                <option value="certificate" {{ ($filters['type'] === 'certificate') ? 'selected' : '' }}>{{ __('domain-update-check.type-certificate') }}</option>
                <option value="domain" {{ ($filters['type'] === 'domain') ? 'selected' : '' }}>{{ __('domain-update-check.type-domain') }}</option>
                <option value="ping" {{ ($filters['type'] === 'ping') ? 'selected' : '' }}>{{ __('domain-update-check.type-ping') }}</option>
                <option value="url" {{ ($filters['type'] === 'url') ? 'selected' : '' }}>{{ __('domain-update-check.type-url') }}</option>
            </select>
        </div>
    </div>
</form>

<div class="overflow-auto md:overflow-visible header-sticky sm:mt-2">
    <table id="domain-check-list-table" class="table table-report text-center" data-table-sort>
        <thead>
            <tr>
                <th>{{ __('domain-update-check.created_at') }}</th>
                <th class="text-left">{{ __('domain-update-check.type') }}</th>
                <th class="text-left">{{ __('domain-update-check.value') }}</th>
                <th>{{ __('domain-update-check.status') }}</th>
                <th class="text-left">{{ __('domain-update-check.details') }}</th>
                <th>{{ __('domain-update-check.go') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($checks as $each)

            <tr>
                <td data-table-sort-value="{{ $each->created_at }}"><span class="block">@datetime($each->created_at)</span></td>
                <td><span class="block text-left font-semibold whitespace-nowrap">{{ $each->type }}</span></td>
                <td><span class="block text-left font-semibold whitespace-nowrap">{{ $each->value }}</span></td>
                <td data-table-sort-value="{{ $each->status }}">@statusString($each->status)</td>
                <td class="text-left">@jsonPretty($each->details)</td>
                <td><a href="{{ $each->valueLink() }}" rel="nofollow noopener noreferrer" target="_blank">@icon('external-link', 'w-4 h-4')</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@if ($checks->hasPages())
<div class="mt-2">
    {{ $checks->appends($REQUEST->input())->links() }}
</div>
@endif

@stop
