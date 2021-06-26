@extends ('layouts.in')

@section ('body')

@include ('domains.domain.molecules.update-nav', ['selected' => 'url'])

<form method="post">
    <input type="hidden" name="_action" value="create" />
    <input type="hidden" name="domain_id" value="{{ $row->id }}" />

    <div class="box p-5 mt-5">
        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-12 mb-2">
                <x-select name="subdomain_id" value="id" :text="['host']" :options="$subdomains->toArray()" :label="__('domain-update-url-create.subdomain')" :selected="$REQUEST->input('subdomain_id')" :placeholder="($subdomains->count() === 1) ? '' : __('domain-update-url-create.subdomain-placeholder')" required></x-select>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-12 mb-2">
                <label for="domain-url-url" class="form-label">{{ __('domain-update-url-create.url') }}</label>
                <input type="text" name="url" class="form-control form-control-lg" id="domain-url-url" value="{{ $REQUEST->input('url', 'https://') }}" required>
            </div>

            <div class="col-span-12 mb-2">
                <div class="form-check">
                    <input type="checkbox" name="enabled" value="1" class="form-check-switch" id="domain-url-enabled" {{ $REQUEST->input('enabled', true) ? 'checked' : '' }}>
                    <label for="domain-url-enabled" class="form-check-label">{{ __('domain-update-url-create.enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{ __('domain-update-url-create.save') }}</button>
        </div>
    </div>
</form>

@stop
