@extends ('mail.layout')

@section ('body')

<div class="f-fallback">
  <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">{{ __('domain-domain-expires-today-mail.message') }}</p>

  <table class="purchase" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; margin: 0; padding: 35px 0;">
    <tr>
      <td colspan="2" style="word-break: break-word; font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 16px;">
        <table class="purchase_content" width="100%" cellpadding="0" cellspacing="0" style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; margin: 0; padding: 25px 0 0;">
          <tr>
            <th class="purchase_heading" align="left" style="font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 16px; padding-bottom: 8px; border-bottom-width: 1px; border-bottom-color: #EAEAEC; border-bottom-style: solid;">
              <p class="f-fallback" style="font-size: 12px; line-height: 1.625; color: #85878E; margin: 0;">{{ __('domain-domain-expires-today-mail.host') }}</p>
            </th>
            <th class="purchase_heading" align="right" style="font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 16px; padding-bottom: 8px; border-bottom-width: 1px; border-bottom-color: #EAEAEC; border-bottom-style: solid;">
              <p class="f-fallback" style="font-size: 12px; line-height: 1.625; color: #85878E; margin: 0;">{{ __('domain-domain-expires-today-mail.domain_expires_at') }}</p>
            </th>
          </tr>

          @foreach ($list as $row)
          <tr>
            <td width="80%" class="purchase_item" style="word-break: break-word; font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 15px; color: #51545E; line-height: 18px; padding: 10px 0;"><span class="f-fallback">{{ $row->host }}</span></td>
            <td class="align-right" width="20%" style="word-break: break-word; font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 16px; text-align: right;" align="right"><span class="f-fallback">@datetime($row->domain_expires_at)</span></td>
          </tr>
          @endforeach

        </table>
      </td>
    </tr>
  </table>
</div>

@stop