@extends ('layouts.in')

@section ('body')

@include ('domains.domain.molecules.update-nav', ['selected' => 'url'])

<form method="post">
    <input type="hidden" name="_action" value="update" />

    <div class="box p-5 mt-5">
        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-12 mb-2">
                <x-select name="subdomain_id" value="id" :text="['host']" :options="[$url->subdomain->toArray()]" :label="__('domain-update-url-update.subdomain')" required disabled></x-select>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-12 mb-2">
                <label for="domain-url-url" class="form-label">{{ __('domain-update-url-update.url') }}</label>
                <input type="text" name="url" class="form-control form-control-lg" id="domain-url-url" value="{{ $url->url }}" required>
            </div>

            <div class="col-span-12 mb-2">
                <div class="form-check">
                    <input type="checkbox" name="enabled" value="1" class="form-check-switch" id="domain-url-enabled" {{ $url->enabled ? 'checked' : '' }}>
                    <label for="domain-url-enabled" class="form-check-label">{{ __('domain-update-url-update.enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-url-status" class="form-label">{{ __('domain-update-url-update.status') }}</label>
                <input type="text" name="status" class="form-control form-control-lg" id="domain-url-status" value="{{ $url->status }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-url-code" class="form-label">{{ __('domain-update-url-update.code') }}</label>
                <input type="text" name="code" class="form-control form-control-lg" id="domain-url-code" value="{{ $url->code }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-url-time" class="form-label">{{ __('domain-update-url-update.time') }}</label>
                <input type="text" name="time" class="form-control form-control-lg" id="domain-url-time" value="{{ $url->time }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-url-checked_at" class="form-label">{{ __('domain-update-url-update.checked_at') }}</label>
                <input type="text" name="checked_at" class="form-control form-control-lg" id="domain-url-checked_at" value="@datetime($url->checked_at)" readonly />
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="text-right">
            <a href="javascript:;" data-toggle="modal" data-target="#delete-modal" class="btn btn-outline-danger mr-5">{{ __('domain-update-url.delete.button') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('domain-update-url-update.save') }}</button>
        </div>
    </div>
</form>

@if ($checks->isNotEmpty())

<form method="get">
    <button type="submit" class="hidden"></button>

    <div class="sm:flex sm:space-x-4 mt-4 box p-5">
        <div class="flex-1 mt-2 sm:mt-0">
            <input type="number" name="limit" step="1" class="form-control form-control-lg" value="{{ $filters['limit'] }}" placeholder="{{ __('check-index.limit') }}" />
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <input type="search" name="start_at" class="form-control form-control-lg" value="{{ $filters['start_at'] }}" placeholder="{{ __('check-index.start_at') }}" />
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <input type="search" name="end_at" class="form-control form-control-lg" value="{{ $filters['end_at'] }}" placeholder="{{ __('check-index.end_at') }}" />
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <select name="error" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="" {{ ($filters['error'] === false) ? 'selected' : '' }}>{{ __('check-index.error-empty') }}</option>
                <option value="1" {{ ($filters['error'] === true) ? 'selected' : '' }}>{{ __('check-index.error-yes') }}</option>
            </select>
        </div>

        <div class="flex-1 mt-2 sm:mt-0">
            <select name="sort" class="form-select form-select-lg bg-white" data-change-submit>
                <option value="date" {{ ($filters['sort'] === 'date') ? 'selected' : '' }}>{{ __('check-index.sort-date') }}</option>
                <option value="time" {{ ($filters['sort'] === 'time') ? 'selected' : '' }}>{{ __('check-index.sort-time') }}</option>
            </select>
        </div>
    </div>
</form>

<div class="box mt-5 p-5">
    <x-check-chart-url :rows="$checks"></x-check-chart-url>
</div>

<div class="overflow-auto md:overflow-visible header-sticky sm:mt-2">
    <table id="domain-check-list-table" class="table table-report text-center" data-table-sort>
        <thead>
            <tr>
                <th>{{ __('domain-update-check.created_at') }}</th>
                <th>{{ __('domain-update-check.status') }}</th>
                <th>{{ __('domain-update-check.details') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($checks as $each)

            <tr>
                <td data-table-sort-value="{{ $each->created_at }}"><span class="block">@datetime($each->created_at)</span></td>
                <td data-table-sort-value="{{ $each->status }}">@statusString($each->status)</td>
                <td>@jsonPretty($each->details)</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endif

<div id="delete-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <form action="{{ route('url.delete', $url->id) }}" method="post">
                    <input type="hidden" name="_action" value="delete" />
                    <input type="hidden" name="redirect" value="{{ route('domain.update.url', $row->id) }}" />

                    <div class="p-5 text-center">
                        @icon('x-circle', 'w-16 h-16 text-theme-24 mx-auto mt-3')
                        <div class="text-3xl mt-5">{{ __('domain-update-url.delete.title') }}</div>
                        <div class="text-gray-600 mt-2">{{ __('domain-update-url.delete.message') }}</div>
                    </div>

                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">{{ __('domain-update-url.delete.cancel') }}</button>
                        <button type="submit" class="btn btn-danger w-24">{{ __('domain-update-url.delete.delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
