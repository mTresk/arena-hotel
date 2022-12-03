import 'inputmask/dist/inputmask.min.js';

const inputMasks = document.querySelectorAll('input[name="phone"]');
if (inputMasks.length) {
    let im = new Inputmask('+7 (999) 999 99 99', {showMaskOnHover: false});
    inputMasks.forEach((inputMask) => {
        im.mask(inputMask);
    });
}
