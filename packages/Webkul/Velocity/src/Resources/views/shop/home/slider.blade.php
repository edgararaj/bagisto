@if ($velocityMetaData && $velocityMetaData->slider)
        <div class="col-lg-6 slider-container">
            <slider-component direction="{{ core()->getCurrentLocale()->direction }}"
                default-banner="{{ asset('/themes/velocity/assets/images/banner.webp') }}"
                :banners="{{ json_encode($sliderData) }}">
            </slider-component>
        </div>
@endif
