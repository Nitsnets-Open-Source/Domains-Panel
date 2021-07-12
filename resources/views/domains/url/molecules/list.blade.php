<div class="overflow-auto md:overflow-visible header-sticky">
    <table id="url-list-table" class="table table-report text-center" data-table-pagination="url-list-table-pagination" data-table-pagination-limit="50" data-table-sort>
        <thead>
            <tr>
                <th class="text-left">{{ __('url-index.url') }}</th>
                <th class="text-left">{{ __('url-index.subdomain') }}</th>
                <th>{{ __('url-index.time') }}</th>
                <th>{{ __('url-index.status') }}</th>
                <th>{{ __('url-index.code') }}</th>
                <th>{{ __('url-index.checked_at') }}</th>
                <th>{{ __('url-index.enabled') }}</th>
                <th>{{ __('url-index.go') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($list as $row)

            <tr>
                <td><a href="{{ route('domain.update.url.update', [$row->domain_id, $row->id]) }}" class="block text-left font-semibold whitespace-nowrap">{{ $row->url }}</a></td>
                <td><a href="{{ route('domain.update.subdomain.update', [$row->domain_id, $row->subdomain->id]) }}" class="block text-left font-semibold whitespace-nowrap">{{ $row->subdomain->host }}</a></td>
                <td>@number($row->time)</td>
                <td><span title="{{ $row->status }}">@statusString($row->status)</span></td>
                <td>{{ $row->code }}</span></td>
                <td>@datetime($row->checked_at)</td>
                <td><a href="{{ route('url.update.boolean', [$row->id, 'enabled']) }}" data-link-boolean="enabled" class="block text-center">@status($row->enabled)</a></td>
                <td><a href="{{ $row->url }}" rel="nofollow noopener noreferrer" target="_blank">@icon('external-link', 'w-4 h-4')</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <ul id="url-list-table-pagination" class="pagination justify-end"></ul>
</div>