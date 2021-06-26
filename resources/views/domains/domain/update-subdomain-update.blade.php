@extends ('layouts.in')

@section ('body')

@include ('domains.domain.molecules.update-nav', ['selected' => 'subdomain'])

<form method="post">
    <input type="hidden" name="_action" value="update" />

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-host" class="form-label">{{ __('domain-update-subdomain-update.host') }}</label>
                <input type="text" name="host" class="form-control form-control-lg" id="domain-host" value="{{ $REQUEST->input('host') }}" required>
            </div>
        </div>

        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="enabled" value="1" class="form-check-switch" id="domain-enabled" {{ $REQUEST->input('enabled', true) ? 'checked' : '' }}>
                    <label for="domain-enabled" class="form-check-label">{{ __('domain-update-subdomain-update.enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-certificate_status" class="form-label">{{ __('domain-update-subdomain-update.certificate_status') }}</label>
                <input type="text" name="certificate_status" class="form-control form-control-lg" id="domain-certificate_status" value="{{ $subdomain->certificate_status }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-certificate_expires_at" class="form-label">{{ __('domain-update-subdomain-update.certificate_expires_at') }}</label>
                <input type="text" name="certificate_expires_at" class="form-control form-control-lg" id="domain-certificate_expires_at" value="@datetime($subdomain->certificate_expires_at)" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-certificate_checked_at" class="form-label">{{ __('domain-update-subdomain-update.certificate_checked_at') }}</label>
                <input type="text" name="certificate_checked_at" class="form-control form-control-lg" id="domain-certificate_checked_at" value="@datetime($subdomain->certificate_checked_at)" readonly />
            </div>
        </div>

        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="certificate_enabled" value="1" class="form-check-switch" id="domain-certificate_enabled" {{ $REQUEST->input('certificate_enabled') ? 'checked' : '' }}>
                    <label for="domain-certificate_enabled" class="form-check-label">{{ __('domain-update-subdomain-update.certificate_enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-ping_status" class="form-label">{{ __('domain-update-subdomain-update.ping_status') }}</label>
                <input type="text" name="ping_status" class="form-control form-control-lg" id="domain-ping_status" value="{{ $subdomain->ping_status }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-ping_checked_at" class="form-label">{{ __('domain-update-subdomain-update.ping_checked_at') }}</label>
                <input type="text" name="ping_checked_at" class="form-control form-control-lg" id="domain-ping_checked_at" value="@datetime($subdomain->ping_checked_at)" readonly />
            </div>
        </div>

        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="ping_enabled" value="1" class="form-check-switch" id="domain-ping_enabled" {{ $REQUEST->input('ping_enabled') ? 'checked' : '' }}>
                    <label for="domain-ping_enabled" class="form-check-label">{{ __('domain-update-subdomain-update.ping_enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="lg:flex">
            <div class="flex-auto p-2">
                <label for="domain-url_status" class="form-label">{{ __('domain-update-subdomain-update.url_status') }}</label>
                <input type="text" name="url_status" class="form-control form-control-lg" id="domain-url_status" value="{{ $subdomain->url_status }}" readonly />
            </div>

            <div class="flex-auto p-2">
                <label for="domain-url_checked_at" class="form-label">{{ __('domain-update-subdomain-update.url_checked_at') }}</label>
                <input type="text" name="url_checked_at" class="form-control form-control-lg" id="domain-url_checked_at" value="@datetime($subdomain->url_checked_at)" readonly />
            </div>
        </div>

        <div class="lg:flex">
            <div class="flex-initial p-4">
                <div class="form-check">
                    <input type="checkbox" name="url_enabled" value="1" class="form-check-switch" id="domain-url_enabled" {{ $REQUEST->input('url_enabled') ? 'checked' : '' }}>
                    <label for="domain-url_enabled" class="form-check-label">{{ __('domain-update-subdomain-update.url_enabled') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box p-5 mt-5">
        <div class="text-right">
            <a href="javascript:;" data-toggle="modal" data-target="#delete-modal" class="btn btn-outline-danger mr-5">{{ __('domain-update-subdomain-update.delete.button') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('domain-update-subdomain-update.save') }}</button>
        </div>
    </div>
</form>

<div id="delete-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <form action="{{ route('subdomain.delete', $subdomain->id) }}" method="post">
                    <input type="hidden" name="_action" value="delete" />
                    <input type="hidden" name="redirect" value="{{ route('domain.update.subdomain', $row->id) }}" />

                    <div class="p-5 text-center">
                        @icon('x-circle', 'w-16 h-16 text-theme-24 mx-auto mt-3')
                        <div class="text-3xl mt-5">{{ __('domain-update-subdomain-update.delete.title') }}</div>
                        <div class="text-gray-600 mt-2">{{ __('domain-update-subdomain-update.delete.message') }}</div>
                    </div>

                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">{{ __('domain-update-subdomain-update.delete.cancel') }}</button>
                        <button type="submit" class="btn btn-danger w-24">{{ __('domain-update-subdomain-update.delete.delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
