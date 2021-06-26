<div class="overflow-auto md:overflow-visible header-sticky">
    <table id="subdomain-list-table" class="table table-report text-center" data-table-sort>
        <thead>
            <tr>
                <th class="text-left">{{ __('subdomain-index.host') }}</th>
                <th>{{ __('subdomain-index.certificate_expires_at') }}</th>
                <th>{{ __('subdomain-index.go') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($list as $row)

            <tr>
                <td><a href="{{ route('domain.update.subdomain.update', [$row->domain->id, $row->id]) }}" class="block text-left font-semibold whitespace-nowrap">{{ $row->host }}</a></td>
                <td data-table-sort-value="{{ $row->certificate_expires_at ?: '9' }}">@datetime($row->certificate_expires_at)</td>
                <td><a href="http://{{ $row->host }}" rel="nofollow noopener noreferrer" target="_blank">@icon('external-link', 'w-4 h-4')</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
