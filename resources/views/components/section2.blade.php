<section id="section2" class="wish-section">

    <div class="wish-container">

        <img
            src="{{ asset('images/wi-' . app()->getLocale() . '.png') }}"
            class="wish-bg"
        >

        <div class="wish-overlay">

            <form
                class="wish-form"
                action="{{ route('wish.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="wish-row">

                    <!-- Avatar -->

                    <div class="avatar-upload">

                        <input
                            type="file"
                            id="avatar"
                            name="avatar"
                            accept="image/*"
                            hidden
                        >

                        <!-- dùng để lưu ảnh đã crop -->
                        <input
                            type="hidden"
                            id="avatar_cropped"
                            name="avatar_cropped"
                        >

                        <div
                            id="avatar-preview"
                            onclick="document.getElementById('avatar').click()"
                        >

                            <span id="avatar-text">
                                {{ __('message.upload_photo') }}
                            </span>

                        </div>

                    </div>

                    <!-- Right -->

                    <div class="wish-fields">

                        <label class="form-label">
                            👤 {{ __('message.name') }}
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="wish-input"
                            placeholder="{{ __('message.desname') }}"
                            required
                        >

                        <label class="form-label">
                            ❤️ {{ __('message.message') }}
                        </label>

                        <textarea
                            name="message"
                            class="wish-textarea"
                            placeholder="{{ __('message.desmessage') }}"
                            required
                        ></textarea>

                        <button
                            type="submit"
                            class="wish-button"
                        >
                            ✈ {{ __('message.submit') }}
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Crop Modal -->

    <div
        id="cropModal"
        class="crop-modal"
    >

        <div class="crop-modal-content">

            <div class="crop-image-wrapper">

                <img
                    id="cropImage"
                    src=""
                    alt=""
                >

            </div>

            <div class="crop-footer">

                <button
                    type="button"
                    id="cropBtn"
                    class="crop-btn"
                >
                    {{ __('message.submit1') }}
                </button>

            </div>

        </div>

    </div>

</section>