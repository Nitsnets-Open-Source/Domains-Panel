<div class="overflow-auto md:overflow-visible header-sticky sm:mt-2">
    <table id="domain-check-list-table" class="table table-report text-center" data-table-sort>
        <thead>
            <tr>
                <th>{{ __('check-index.created_at') }}</th>
                <th class="text-left">{{ __('check-index.type') }}</th>
                <th class="text-left">{{ __('check-index.value') }}</th>
                <th>{{ __('check-index.status') }}</th>
                <th class="text-left">{{ __('check-index.details') }}</th>
                <th>{{ __('check-index.go') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($list as $row)

            <tr>
                <td data-table-sort-value="{{ $row->created_at }}"><span class="block">@datetime($row->created_at)</span></td>
                <td><span class="block text-left font-semibold whitespace-nowrap">{{ $row->type }}</span></td>
                <td><a href="{{ $row->updateLink() }}" class="block text-left font-semibold whitespace-nowrap">{{ $row->value }}</a></td>
                <td data-table-sort-value="{{ $row->status }}">@statusString($row->status)</td>
                <td class="text-left">@jsonPretty($row->details)</td>
                <td><a href="{{ $row->valueLink() }}" rel="nofollow noopener noreferrer" target="_blank">@icon('external-link', 'w-4 h-4')</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@if ($list->hasPages())
<div class="mt-2">
    {{ $list->appends($REQUEST->input())->links() }}
</div>
@endif
