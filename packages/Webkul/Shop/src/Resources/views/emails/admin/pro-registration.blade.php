@component('shop::emails.layouts.master')
    <div>
        <div style="text-align: center;">
            <a href="{{ route('shop.home.index') }}">
                @include ('shop::emails.layouts.logo')
            </a>
        </div>

        <div style="padding: 30px;">
            <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
                <p style="font-weight: bold;font-size: 20px;color: #242424;line-height: 24px;">
                    {{ __('shop::app.mail.customer.registration.dear-admin', ['admin_name' => core()->getAdminEmailDetails()['name']]) }},
                </p>

                <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                    {!! __('shop::app.mail.customer.registration.pro-summary-admin', ['customer_name' => $data['first_name']. ' ' .$data['last_name'], 'customer_email' => $data['email'], 'vat_id' => '123456789',
                        'nif_site' => '<a style="color:#0041FF" href="https://nif.pt/123456789">aqui</a>' ]) !!}
                </p>
            </div>

            <p style="text-align: center;padding: 20px 0;">
                <a href="{{ route('admin.customer.accept', $data['id']) }}" style="padding: 10px 20px;background: #0041FF;color: #ffffff;text-transform: uppercase;text-decoration: none; font-size: 16px">
                    {{ __('shop::app.header.accept') }}
                </a>
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('shop::app.mail.customer.registration.thanks') }}
            </p>
        </div>
    </div>
@endcomponent
