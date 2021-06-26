@extends ('layouts.in')

@section ('body')

@include ('domains.domain.molecules.update-nav', ['selected' => 'data'])

<form method="post">
    <input type="hidden" name="_action" value="update" />

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-host" class="form-label">{{ __('domain-update.host') }}</label>
                <input type="text" name="host" class="form-control form-control-lg" id="domain-host" value="{{ $REQUEST->input('host') }}" required>
            </div>
        </div>

        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="enabled" value="1" class="form-check-switch" id="domain-enabled" {{ $REQUEST->input('enabled', true) ? 'checked' : '' }}>
                    <label for="domain-enabled" class="form-check-label">{{ __('domain-update.enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-domain_status" class="form-label">{{ __('domain-update.domain_status') }}</label>
                <input type="text" name="domain_status" class="form-control form-control-lg" id="domain-domain_status" value="{{ $row->domain_status }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-domain_expires_at" class="form-label">{{ __('domain-update.domain_expires_at') }}</label>
                <input type="text" name="domain_expires_at" class="form-control form-control-lg" id="domain-domain_expires_at" value="@datetime($row->domain_expires_at, '')" />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-domain_checked_at" class="form-label">{{ __('domain-update.domain_checked_at') }}</label>
                <input type="text" name="domain_checked_at" class="form-control form-control-lg" id="domain-domain_checked_at" value="@datetime($row->domain_checked_at)" readonly />
            </div>
        </div>

        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="domain_enabled" value="1" class="form-check-switch" id="domain-domain_enabled" {{ $REQUEST->input('domain_enabled') ? 'checked' : '' }}>
                    <label for="domain-domain_enabled" class="form-check-label">{{ __('domain-update.domain_enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="subdomain_enabled" value="1" class="form-check-switch" id="domain-subdomain_enabled" {{ $REQUEST->input('subdomain_enabled') ? 'checked' : '' }}>
                    <label for="domain-subdomain_enabled" class="form-check-label">{{ __('domain-update.subdomain_enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-certificate_status" class="form-label">{{ __('domain-update.certificate_status') }}</label>
                <input type="text" name="certificate_status" class="form-control form-control-lg" id="domain-certificate_status" value="{{ $row->certificate_status }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-certificate_expires_at" class="form-label">{{ __('domain-update.certificate_expires_at') }}</label>
                <input type="text" name="certificate_expires_at" class="form-control form-control-lg" id="domain-certificate_expires_at" value="@datetime($row->certificate_expires_at)" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-certificate_checked_at" class="form-label">{{ __('domain-update.certificate_checked_at') }}</label>
                <input type="text" name="certificate_checked_at" class="form-control form-control-lg" id="domain-certificate_checked_at" value="@datetime($row->certificate_checked_at)" readonly />
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-ping_status" class="form-label">{{ __('domain-update.ping_status') }}</label>
                <input type="text" name="ping_status" class="form-control form-control-lg" id="domain-ping_status" value="{{ $row->ping_status }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-ping_checked_at" class="form-label">{{ __('domain-update.ping_checked_at') }}</label>
                <input type="text" name="ping_checked_at" class="form-control form-control-lg" id="domain-ping_checked_at" value="@datetime($row->ping_checked_at)" readonly />
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-url_status" class="form-label">{{ __('domain-update.url_status') }}</label>
                <input type="text" name="url_status" class="form-control form-control-lg" id="domain-url_status" value="{{ $row->url_status }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-url_checked_at" class="form-label">{{ __('domain-update.url_checked_at') }}</label>
                <input type="text" name="url_checked_at" class="form-control form-control-lg" id="domain-url_checked_at" value="@datetime($row->url_checked_at)" readonly />
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="text-right">
            <a href="javascript:;" data-toggle="modal" data-target="#delete-modal" class="btn btn-outline-danger mr-5">{{ __('domain-update.delete.button') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('domain-update.save') }}</button>
        </div>
    </div>
</form>

<div id="delete-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <form action="{{ route('domain.delete', $row->id) }}" method="post">
                    <input type="hidden" name="_action" value="delete" />

                    <div class="p-5 text-center">
                        @icon('x-circle', 'w-16 h-16 text-theme-24 mx-auto mt-3')
                        <div class="text-3xl mt-5">{{ __('domain-update.delete.title') }}</div>
                        <div class="text-gray-600 mt-2">{{ __('domain-update.delete.message') }}</div>
                    </div>

                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">{{ __('domain-update.delete.cancel') }}</button>
                        <button type="submit" class="btn btn-danger w-24">{{ __('domain-update.delete.delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
