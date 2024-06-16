import './bootstrap';

import Inputmask from 'inputmask';

document.addEventListener('DOMContentLoaded', () => {
    const phoneInput = document.getElementById('phone');

    if (phoneInput) {
        Inputmask({ mask: '+7 (999) 999-99-99' }).mask(phoneInput);
    }
});
