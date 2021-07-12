<div class="overflow-auto md:overflow-visible header-sticky">
    <table id="domain-list-table" class="table table-report text-center" data-table-pagination="domain-list-table-pagination" data-table-pagination-limit="50" data-table-sort>
        <thead>
            <tr>
                <th class="text-left">{{ __('domain-index.host') }}</th>
                <th>{{ __('domain-index.domain_status') }}</th>
                <th>{{ __('domain-index.domain_enabled') }}</th>
                <th>{{ __('domain-index.domain_expires_at') }}</th>
                <th>{{ __('domain-index.certificate_status') }}</th>
                <th>{{ __('domain-index.certificate_expires_at') }}</th>
                <th>{{ __('domain-index.ping_status') }}</th>
                <th>{{ __('domain-index.url_status') }}</th>
                <th>{{ __('domain-index.enabled') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($list as $row)

            <tr>
                <td><a href="{{ route('domain.update.data', $row->id) }}" class="block text-left font-semibold whitespace-nowrap">{{ $row->host }}</a></td>
                <td data-table-sort-value="{{ $row->domain_status }}"><span title="@datetime($row->domain_checked_at)">@statusString($row->domain_status)</span></td>
                <td data-table-sort-value="{{ (int)$row->domain_enabled }}"><a href="{{ route('domain.update.boolean', [$row->id, 'domain_enabled']) }}" data-link-boolean="domain_enabled">@status($row->domain_enabled)</a></td>
                <td data-table-sort-value="{{ $row->domain_expires_at ?: '9' }}">@datetime($row->domain_expires_at)</td>
                <td data-table-sort-value="{{ $row->certificate_status }}"><span title="@datetime($row->certificate_checked_at)">@statusString($row->certificate_status)</span></td>
                <td data-table-sort-value="{{ $row->certificate_expires_at ?: '9' }}">@datetime($row->certificate_expires_at)</td>
                <td data-table-sort-value="{{ $row->ping_status }}"><span title="@datetime($row->ping_checked_at)">@statusString($row->ping_status)</span></td>
                <td data-table-sort-value="{{ $row->url_status }}"><span title="@datetime($row->url_checked_at)">@statusString($row->url_status)</span></td>
                <td data-table-sort-value="{{ (int)$row->enabled }}"><a href="{{ route('domain.update.boolean', [$row->id, 'enabled']) }}" data-link-boolean="enabled">@status($row->enabled)</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <ul id="domain-list-table-pagination" class="pagination justify-end"></ul>
</div>