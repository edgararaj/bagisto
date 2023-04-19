@php
    $isRendered = false;
    $advertisementFour = null;
    $isLazyLoad = !isset($lazyload) ? true : ($lazyload ? true : false);
@endphp

{{-- @if ($velocityMetaData && $velocityMetaData->advertisement)
    @php
        $advertisement = json_decode($velocityMetaData->advertisement, true);

        if (isset($advertisement[4]) && is_array($advertisement[4])) {
            $advertisementFour = array_values(array_filter($advertisement[4]));
        }
    @endphp

    @if ($advertisementFour)
        @php
            $isRendered = true;
        @endphp


        <div class="col-lg-4 col-12 advertisement-container-block offers-ct-panel">
            @if (isset($advertisementFour[1]))
                <a @if (isset($two)) href="{{ $two }}" @endif
                    class="row col-12 remove-padding-margin" aria-label="Advertisement">
                    <img class="offers-ct-top {{ $isLazyLoad ? 'lazyload' : '' }}"
                        @if (!$isLazyLoad) src="{{ Storage::url($advertisementFour[1]) }}" @endif
                        data-src="{{ Storage::url($advertisementFour[1]) }}" alt="" />
                </a>
            @endif

            <div style="height: 10px;"></div>

            @if (isset($advertisementFour[2]))
                <a @if (isset($three)) href="{{ $three }}" @endif
                    class="row col-12 remove-padding-margin" aria-label="Advertisement">
                    <img class="offers-ct-bottom {{ $isLazyLoad ? 'lazyload' : '' }}"
                        @if (!$isLazyLoad) src="{{ Storage::url($advertisementFour[2]) }}" @endif
                        data-src="{{ Storage::url($advertisementFour[2]) }}" alt="" />
                </a>
            @endif
        </div>
    @endif
@endif --}}

@if (!$isRendered)
    <div class="col-lg-3 col-12 advertisement-container-block offers-ct-panel">
        <a @if (isset($two)) href="{{ $two }}" @endif aria-label="Advertisement">
            <img class="offers-ct-top {{ $isLazyLoad ? 'lazyload' : '' }}"
                @if (!$isLazyLoad) src="{{ asset('/themes/velocity/assets/images/olasnog_tshirts.png') }}" @endif
                data-src="{{ asset('/themes/velocity/assets/images/olasnog_tshirts.png') }}" alt="" />
        </a>

        <a @if (isset($three)) href="{{ $three }}" @endif aria-label="Advertisement">
            <img class="offers-ct-bottom {{ $isLazyLoad ? 'lazyload' : '' }}"
                @if (!$isLazyLoad) src="{{ asset('/themes/velocity/assets/images/olasnog_acessorios.png') }}" @endif
                data-src="{{ asset('/themes/velocity/assets/images/olasnog_acessorios.png') }}" alt="" />
        </a>
    </div>
@endif
