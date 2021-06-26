@extends ('layouts.in')

@section ('body')

@include ('domains.domain.molecules.update-nav', ['selected' => 'subdomain'])

<form method="get">
    <div class="sm:flex sm:space-x-4 mt-4">
        <div class="flex-grow mt-2 sm:mt-0">
            <input type="search" class="form-control form-control-lg" placeholder="{{ __('domain-update-subdomain.filter') }}" data-table-search="#domain-subdomain-list-table" />
        </div>

        <div class="sm:ml-4 mt-2 sm:mt-0 bg-white">
            <a href="{{ route('domain.update.subdomain.create', $row->id) }}" class="btn form-control-lg">{{ __('domain-update-subdomain.create') }}</a>
        </div>
    </div>
</form>

<div class="overflow-auto md:overflow-visible header-sticky">
    <table id="domain-list-table" class="table table-report text-center" data-table-sort>
        <thead>
            <tr>
                <th class="text-left">{{ __('domain-update-subdomain.host') }}</th>
                <th>{{ __('domain-update-subdomain.certificate_status') }}</th>
                <th>{{ __('domain-update-subdomain.certificate_enabled') }}</th>
                <th>{{ __('domain-update-subdomain.certificate_expires_at') }}</th>
                <th>{{ __('domain-update-subdomain.ping_status') }}</th>
                <th>{{ __('domain-update-subdomain.ping_enabled') }}</th>
                <th>{{ __('domain-update-subdomain.url_status') }}</th>
                <th>{{ __('domain-update-subdomain.url_enabled') }}</th>
                <th>{{ __('domain-update-subdomain.enabled') }}</th>
                <th>{{ __('domain-update-subdomain.go') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($subdomains as $each)

            <tr>
                <td><a href="{{ route('domain.update.subdomain.update', [$row->id, $each->id]) }}" class="block text-left font-semibold whitespace-nowrap">{{ $each->host }}</a></td>
                <td data-table-sort-value="{{ $each->certificate_status }}"><span title="@datetime($each->certificate_checked_at)">@statusString($each->certificate_status)</span></td>
                <td data-table-sort-value="{{ (int)$each->certificate_enabled }}"><a href="{{ route('subdomain.update.boolean', [$each->id, 'certificate_enabled']) }}" data-link-boolean="certificate_enabled">@status($each->certificate_enabled)</a></td>
                <td data-table-sort-value="{{ $each->certificate_expires_at ?: '9' }}">@datetime($each->certificate_expires_at)</td>
                <td data-table-sort-value="{{ $each->ping_status }}"><span title="@datetime($each->ping_checked_at)">@statusString($each->ping_status)</span></td>
                <td data-table-sort-value="{{ (int)$each->ping_enabled }}"><a href="{{ route('subdomain.update.boolean', [$each->id, 'ping_enabled']) }}" data-link-boolean="ping_enabled">@status($each->ping_enabled)</a></td>
                <td data-table-sort-value="{{ $each->url_status }}"><span title="@datetime($each->url_checked_at)">@statusString($each->url_status)</span></td>
                <td data-table-sort-value="{{ (int)$each->url_enabled }}"><a href="{{ route('subdomain.update.boolean', [$each->id, 'url_enabled']) }}" data-link-boolean="url_enabled">@status($each->url_enabled)</a></td>
                <td data-table-sort-value="{{ (int)$each->enabled }}"><a href="{{ route('subdomain.update.boolean', [$each->id, 'enabled']) }}" data-link-boolean="enabled">@status($each->enabled)</a></td>
                <td><a href="http://{{ $each->host }}" rel="nofollow noopener noreferrer" target="_blank">@icon('external-link', 'w-4 h-4')</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-5 text-right">
    <a href="{{ route('domain.update.subdomain.create', $row->id) }}" class="btn btn-primary">{{ __('domain-update-subdomain.create') }}</a>
</div>

@stop
