@php
    $isRendered = false;
    $advertisementFour = null;
    $isLazyLoad = !isset($lazyload) ? true : ($lazyload ? true : false);
@endphp

@if (!$isRendered)
    <div class="col-lg-3 ad-div2">
            <a @if (isset($two)) href="{{ $two }}" @endif aria-label="Advertisement">
                <img class="{{ $isLazyLoad ? 'lazyload' : '' }}"
                    @if (!$isLazyLoad) src="{{ asset('/themes/velocity/assets/images/olasnog_tshirts.png') }}" @endif
                    data-src="{{ asset('/themes/velocity/assets/images/olasnog_tshirts.png') }}" alt="" />
            </a>

            <a @if (isset($three)) href="{{ $three }}" @endif aria-label="Advertisement">
                <img class="{{ $isLazyLoad ? 'lazyload' : '' }}"
                    @if (!$isLazyLoad) src="{{ asset('/themes/velocity/assets/images/olasnog_acessorios.png') }}" @endif
                    data-src="{{ asset('/themes/velocity/assets/images/olasnog_acessorios.png') }}" alt="" />
            </a>
    </div>
@endif
