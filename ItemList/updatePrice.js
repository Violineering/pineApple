document.addEventListener('DOMContentLoaded', () => {
    const storageInputs = document.querySelectorAll('input[name="storage"]');
    const priceElement = document.querySelector('#itemDetails-container .price');
    const priceInput = document.querySelector('input[name="price"]');

    function updatePrice() {
        let basePrice = parseFloat(priceElement.getAttribute('data-base-price'));
        let selectedStorage = document.querySelector('input[name="storage"]:checked');

        if (selectedStorage) {
            let additionalPrice = parseFloat(selectedStorage.getAttribute('data-price'));
            let finalPrice = basePrice + additionalPrice;
            priceElement.textContent = `$${finalPrice.toFixed(2)}`;
            priceInput.value = finalPrice.toFixed(2);
        } else {
            priceElement.textContent = `$${basePrice.toFixed(2)}`;
            priceInput.value = basePrice.toFixed(2);
        }
    }

    storageInputs.forEach(input => {
        input.addEventListener('change', updatePrice);
    });

    updatePrice();
});
