<section id="section3" class="memory-section">

<div class="memory-container">

    <img
        src="{{ asset('images/memory-' . app()->getLocale() . '.png') }}"
        class="memory-bg"
        alt=""
    >

    <div class="memory-overlay">

        <div class="memory-grid">

            @foreach($wishes as $wish)

                <div
                    class="memory-card"
                    data-name="{{ $wish->name }}"
                    data-message="{{ $wish->message }}"
                    data-avatar="{{ $wish->avatar ? asset('storage/'.$wish->avatar) : '' }}"
                >

                    <div class="envelope-top">
                        💌
                    </div>

                    @if($wish->avatar)

                        <img
                            src="{{ asset('storage/'.$wish->avatar) }}"
                            class="memory-avatar"
                            alt=""
                        >

                    @else

                        <div class="memory-avatar-placeholder">

                            {{ strtoupper(substr($wish->name,0,1)) }}

                        </div>

                    @endif

                    <div class="memory-name">

                        {{ $wish->name }}

                    </div>

                </div>

            @endforeach
        </div>

        @if($wishes->hasPages())
        <div class="memory-pagination">
            @if($wishes->onFirstPage())
                <span class="page-btn disabled">
                    <
                </span>
            @else
                <a
                    href="{{ $wishes->previousPageUrl() }}#section3"
                    class="page-btn"
                >
                    <
                </a>
            @endif

            @if($wishes->hasMorePages())
                <a
                    href="{{ $wishes->nextPageUrl() }}#section3"
                    class="page-btn"
                >
                    >
                </a>
            @else
                <span class="page-btn disabled">
                    >
                </span>
            @endif            
        </div>
        @endif
</div>

</section>

<!-- Popup -->

<div
    id="wishModal"
    class="wish-modal"
>

<div class="wish-modal-content">

    <button
        id="closeWishModal"
        class="close-modal"
        type="button"
    >
        ✕
    </button>

    <div id="modalAvatarWrapper">

        <img
            id="modalAvatar"
            class="modal-avatar"
            src=""
            alt=""
        >

        <div 
            id="modalInitial"
            class="modal-initial"
            style="display:none"
        ></div>

        <div
            id="modalAvatarLetter"
            class="modal-avatar-letter"
            style="display:none;"
        >
        </div>

    </div>

    <h2 id="modalName"></h2>

    <div id="modalMessage"></div>

</div>

</div>
