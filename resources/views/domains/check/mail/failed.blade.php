@extends ('mail.layout')

@section ('body')

<div class="f-fallback">
  <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">{!! __('check-failed-mail.message', ['count' => $count, 'limit' => $limit] + $row->only(['type', 'value'])) !!}</p>

  <table class="purchase" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; margin: 0; padding: 35px 0;">
    <tr>
      <td colspan="2" style="word-break: break-word; font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 16px;">
        <table class="purchase_content" width="100%" cellpadding="0" cellspacing="0" style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; margin: 0; padding: 25px 0 0;">
          <tr>
            <th class="purchase_heading" align="left" style="font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 16px; padding-bottom: 8px; border-bottom-width: 1px; border-bottom-color: #EAEAEC; border-bottom-style: solid;">
              <p class="f-fallback" style="font-size: 12px; line-height: 1.625; color: #85878E; margin: 0;">{{ __('check-failed-mail.type') }}</p>
            </th>
            <th class="purchase_heading" align="left" style="font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 16px; padding-bottom: 8px; border-bottom-width: 1px; border-bottom-color: #EAEAEC; border-bottom-style: solid;">
              <p class="f-fallback" style="font-size: 12px; line-height: 1.625; color: #85878E; margin: 0;">{{ __('check-failed-mail.value') }}</p>
            </th>
            <th class="purchase_heading" align="center" style="font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 16px; padding-bottom: 8px; border-bottom-width: 1px; border-bottom-color: #EAEAEC; border-bottom-style: solid;">
              <p class="f-fallback" style="font-size: 12px; line-height: 1.625; color: #85878E; margin: 0;">{{ __('check-failed-mail.created_at') }}</p>
            </th>
          </tr>

          @foreach ($list as $each)
          <tr>
            <td class="purchase_item" style="word-break: break-word; font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 15px; color: #51545E; line-height: 18px; padding: 10px 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><span class="f-fallback">{{ $each->type }}</span></td>
            <td class="purchase_item" style="word-break: break-word; font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 15px; color: #51545E; line-height: 18px; padding: 10px 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><span class="f-fallback">{{ $each->value }}</span></td>
            <td class="align-center" style="word-break: break-word; font-family: 'Nunito Sans', Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" align="center"><span class="f-fallback">@datetime($each->created_at)</span></td>
          </tr>
          @endforeach

        </table>
      </td>
    </tr>
  </table>
</div>

@stop