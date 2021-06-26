@extends ('layouts.in')

@section ('body')

@include ('domains.domain.molecules.update-nav', ['selected' => 'subdomain'])

<form method="post">
    <input type="hidden" name="_action" value="create" />
    <input type="hidden" name="domain_id" value="{{ $row->id }}" />

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-host" class="form-label">{{ __('domain-update-subdomain-create.host') }}</label>
                <input type="text" name="host" class="form-control form-control-lg" id="domain-host" value="{{ $REQUEST->input('host', '.'.$row->host) }}" autofocus required>
            </div>
        </div>

        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="enabled" value="1" class="form-check-switch" id="domain-enabled" {{ $REQUEST->input('enabled', true) ? 'checked' : '' }}>
                    <label for="domain-enabled" class="form-check-label">{{ __('domain-update-subdomain-create.enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="certificate_enabled" value="1" class="form-check-switch" id="domain-certificate_enabled" {{ $REQUEST->input('certificate_enabled', true) ? 'checked' : '' }}>
                    <label for="domain-certificate_enabled" class="form-check-label">{{ __('domain-update-subdomain-create.certificate_enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="ping_enabled" value="1" class="form-check-switch" id="domain-ping_enabled" {{ $REQUEST->input('ping_enabled', true) ? 'checked' : '' }}>
                    <label for="domain-ping_enabled" class="form-check-label">{{ __('domain-update-subdomain-create.ping_enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="url_enabled" value="1" class="form-check-switch" id="domain-url_enabled" {{ $REQUEST->input('url_enabled', true) ? 'checked' : '' }}>
                    <label for="domain-url_enabled" class="form-check-label">{{ __('domain-update-subdomain-create.url_enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{ __('domain-update-subdomain-create.save') }}</button>
        </div>
    </div>
</form>

@stop
