@extends ('layouts.in')

@section ('body')

<form method="post">
    <input type="hidden" name="_action" value="create" />

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-host" class="form-label">{{ __('domain-create.host') }}</label>
                <input type="text" name="host" class="form-control form-control-lg" id="domain-host" value="{{ $REQUEST->input('host') }}" autofocus required>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="enabled" value="1" class="form-check-switch" id="domain-enabled" {{ $REQUEST->input('enabled', true) ? 'checked' : '' }}>
                    <label for="domain-enabled" class="form-check-label">{{ __('domain-create.enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="domain_enabled" value="1" class="form-check-switch" id="domain-domain_enabled" {{ $REQUEST->input('domain_enabled', true) ? 'checked' : '' }}>
                    <label for="domain-domain_enabled" class="form-check-label">{{ __('domain-create.domain_enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="subdomain" value="1" class="form-check-switch" id="domain-subdomain" {{ $REQUEST->input('subdomain', true) ? 'checked' : '' }}>
                    <label for="domain-subdomain" class="form-check-label">{{ __('domain-create.subdomain') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{ __('domain-create.save') }}</button>
        </div>
    </div>
</form>

@stop
