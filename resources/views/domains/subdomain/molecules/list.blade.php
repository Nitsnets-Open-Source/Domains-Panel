<div class="overflow-auto md:overflow-visible header-sticky">
    <table id="subdomain-list-table" class="table table-report text-center" data-table-pagination="subdomain-list-table-pagination" data-table-pagination-limit="50" data-table-sort>
        <thead>
            <tr>
                <th class="text-left">{{ __('subdomain-index.host') }}</th>
                <th class="text-left">{{ __('subdomain-index.domain') }}</th>
                <th>{{ __('subdomain-index.certificate_status') }}</th>
                <th>{{ __('subdomain-index.certificate_enabled') }}</th>
                <th>{{ __('subdomain-index.certificate_expires_at') }}</th>
                <th>{{ __('subdomain-index.ping_status') }}</th>
                <th>{{ __('subdomain-index.ping_enabled') }}</th>
                <th>{{ __('subdomain-index.url_status') }}</th>
                <th>{{ __('subdomain-index.url_enabled') }}</th>
                <th>{{ __('subdomain-index.enabled') }}</th>
                <th>{{ __('subdomain-index.go') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($list as $row)

            <tr>
                <td><a href="{{ route('domain.update.subdomain.update', [$row->domain->id, $row->id]) }}" class="block text-left font-semibold whitespace-nowrap">{{ $row->host }}</a></td>
                <td><a href="{{ route('domain.update.data', $row->domain->id) }}" class="block text-left font-semibold whitespace-nowrap">{{ $row->domain->host }}</a></td>
                <td data-table-sort-value="{{ $row->certificate_status }}"><span title="@datetime($row->certificate_checked_at)">@statusString($row->certificate_status)</span></td>
                <td data-table-sort-value="{{ (int)$row->certificate_enabled }}"><a href="{{ route('subdomain.update.boolean', [$row->id, 'certificate_enabled']) }}" data-link-boolean="certificate_enabled">@status($row->certificate_enabled)</a></td>
                <td data-table-sort-value="{{ $row->certificate_expires_at ?: '9' }}">@datetime($row->certificate_expires_at)</td>
                <td data-table-sort-value="{{ $row->ping_status }}"><span title="@datetime($row->ping_checked_at)">@statusString($row->ping_status)</span></td>
                <td data-table-sort-value="{{ (int)$row->ping_enabled }}"><a href="{{ route('subdomain.update.boolean', [$row->id, 'ping_enabled']) }}" data-link-boolean="ping_enabled">@status($row->ping_enabled)</a></td>
                <td data-table-sort-value="{{ $row->url_status }}"><span title="@datetime($row->url_checked_at)">@statusString($row->url_status)</span></td>
                <td data-table-sort-value="{{ (int)$row->url_enabled }}"><a href="{{ route('subdomain.update.boolean', [$row->id, 'url_enabled']) }}" data-link-boolean="url_enabled">@status($row->url_enabled)</a></td>
                <td data-table-sort-value="{{ (int)$row->enabled }}"><a href="{{ route('subdomain.update.boolean', [$row->id, 'enabled']) }}" data-link-boolean="enabled">@status($row->enabled)</a></td>
                <td><a href="http://{{ $row->host }}" rel="nofollow noopener noreferrer" target="_blank">@icon('external-link', 'w-4 h-4')</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <ul id="subdomain-list-table-pagination" class="pagination justify-end"></ul>
</div>
