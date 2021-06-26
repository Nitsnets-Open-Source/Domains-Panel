@extends ('layouts.in')

@section ('body')

<div class="overflow-auto md:overflow-visible header-sticky">
    <table id="configuration-list-table" class="table table-report">
        <thead>
            <tr>
                <th>{{ __('configuration-index.key') }}</th>
                <th>{{ __('configuration-index.value') }}</th>
                <th>{{ __('configuration-index.description') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($list as $row)

            <tr>
                <td><a href="{{ route('configuration.update', $row->id) }}" class="block text-left font-semibold whitespace-nowrap">{{ $row->key }}</a></td>
                <td>{{ $row->value }}</td>
                <td>{{ $row->description }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@stop