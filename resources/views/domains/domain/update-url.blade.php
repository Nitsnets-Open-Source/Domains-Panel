@extends ('layouts.in')

@section ('body')

@include ('domains.domain.molecules.update-nav', ['selected' => 'url'])

<form method="get">
    <div class="sm:flex sm:space-x-4 mt-4">
        <div class="flex-grow mt-2 sm:mt-0">
            <input type="search" class="form-control form-control-lg" placeholder="{{ __('domain-update-url.filter') }}" data-table-search="#domain-url-list-table" />
        </div>

        <div class="sm:ml-4 mt-2 sm:mt-0 bg-white">
            <a href="{{ route('domain.update.url.create', $row->id) }}" class="btn form-control-lg">{{ __('domain-update-url.create') }}</a>
        </div>
    </div>
</form>

<div class="overflow-auto">
    <table id="domain-url-list-table" class="table table-report text-center sm:mt-2">
        <thead>
            <tr>
                <th class="text-left">{{ __('domain-update-url.url') }}</th>
                <th class="text-left">{{ __('domain-update-url.subdomain') }}</th>
                <th>{{ __('domain-update-url.time') }}</th>
                <th>{{ __('domain-update-url.status') }}</th>
                <th>{{ __('domain-update-url.code') }}</th>
                <th>{{ __('domain-update-url.checked_at') }}</th>
                <th>{{ __('domain-update-url.enabled') }}</th>
                <th>{{ __('domain-update-url.go') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($urls as $each)

            <tr>
                <td><a href="{{ route('domain.update.url.update', [$row->id, $each->id]) }}" class="block text-left font-semibold whitespace-nowrap">{{ $each->url }}</a></td>
                <td><a href="{{ route('domain.update.subdomain.update', [$row->id, $each->subdomain->id]) }}" class="block text-left font-semibold whitespace-nowrap">{{ $each->subdomain->host }}</a></td>
                <td>@number($each->time)</td>
                <td><span title="{{ $each->status }}">@statusString($each->status)</span></td>
                <td>{{ $each->code }}</span></td>
                <td>@datetime($each->checked_at)</td>
                <td><a href="{{ route('url.update.boolean', [$each->id, 'enabled']) }}" data-link-boolean="enabled" class="block text-center">@status($each->enabled)</a></td>
                <td><a href="{{ $each->url }}" rel="nofollow noopener noreferrer" target="_blank">@icon('external-link', 'w-4 h-4')</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-5 text-right">
    <a href="{{ route('domain.update.url.create', $row->id) }}" class="btn btn-primary">{{ __('domain-update-url.create') }}</a>
</div>

@stop
