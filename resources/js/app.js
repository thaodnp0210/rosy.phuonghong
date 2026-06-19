import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';

let cropper = null;

window.addEventListener('DOMContentLoaded', () => {

    /* ======================================
       SECTION 2 - AVATAR CROP
    ====================================== */

    const avatar = document.getElementById('avatar');
    const cropModal = document.getElementById('cropModal');
    const cropImage = document.getElementById('cropImage');
    const cropBtn = document.getElementById('cropBtn');
    const preview = document.getElementById('avatar-preview');

    if (
        avatar &&
        cropModal &&
        cropImage &&
        cropBtn &&
        preview
    ) {

        avatar.addEventListener('change', (e) => {

            const file = e.target.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = (event) => {

                cropModal.style.display = 'flex';

                cropImage.src = event.target.result;

                cropImage.onload = () => {

                    if (cropper) {
                        cropper.destroy();
                    }

                    cropper = new Cropper(cropImage, {

                        aspectRatio: 1,

                        viewMode: 1,

                        dragMode: 'move',

                        autoCropArea: 0.8,

                        responsive: true,

                        restore: false,

                        guides: false,

                        center: true,

                        highlight: false,

                        cropBoxMovable: true,

                        cropBoxResizable: false,

                        background: false,

                        modal: true,

                        ready() {

                            this.cropper.setCropBoxData({
                                width: 300,
                                height: 300
                            });

                        }

                    });

                };

            };

            reader.readAsDataURL(file);

        });

        cropBtn.addEventListener('click', () => {

            if (!cropper) return;

            const canvas = cropper.getCroppedCanvas({

                width: 500,
                height: 500

            });

            const croppedImage =
    canvas.toDataURL('image/png');

            preview.innerHTML = `
                <img
                    src="${croppedImage}"
                    alt=""
                >
            `;

            document
                .getElementById('avatar_cropped')
                .value = croppedImage;

            cropModal.style.display = 'none';

            cropper.destroy();

            cropper = null;

        });

        cropModal.addEventListener('click', (e) => {

            if (e.target === cropModal) {

                cropModal.style.display = 'none';

                if (cropper) {

                    cropper.destroy();

                    cropper = null;

                }

            }

        });

    }

    /* ======================================
   SECTION 3 - MEMORY BOOK POPUP
====================================== */

    const wishModal =
        document.getElementById('wishModal');

    const modalAvatar =
        document.getElementById('modalAvatar');

    const modalInitial =
        document.getElementById('modalInitial');

    const modalName =
        document.getElementById('modalName');

    const modalMessage =
        document.getElementById('modalMessage');

    const closeWishModal =
        document.getElementById('closeWishModal');

    const cards =
        document.querySelectorAll('.memory-card');

    if (
        wishModal &&
        modalName &&
        modalMessage &&
        closeWishModal
    ) {

        cards.forEach(card => {

            card.addEventListener('click', () => {

                const name =
                    card.dataset.name || '';

                const avatar =
                    card.dataset.avatar || '';

                const message =
                    card.dataset.message || '';

                modalName.textContent =
                    name;

                modalMessage.textContent =
                    message;

                if (
                    avatar &&
                    avatar !== 'null' &&
                    avatar !== 'undefined' &&
                    avatar.trim() !== ''
                ) {

                    modalAvatar.src =
                        avatar;

                    modalAvatar.style.display =
                        'block';

                    modalInitial.style.display =
                        'none';

                } else {

                    modalAvatar.style.display =
                        'none';

                    modalInitial.style.display =
                        'flex';

                    modalInitial.textContent =
                        name
                            .trim()
                            .charAt(0)
                            .toUpperCase();

                }

                wishModal.style.display =
                    'flex';

            });

        });

        closeWishModal.addEventListener('click', () => {

            wishModal.style.display =
                'none';

        });

        wishModal.addEventListener('click', (e) => {

            if (e.target === wishModal) {

                wishModal.style.display =
                    'none';
            }
        });
    }
});