document.addEventListener('DOMContentLoaded', () => {
    if (window.imagePaths && window.imagePaths.length > 0) {
        let images = window.imagePaths;
        let currentIndex = 0;

        const imageElement = document.querySelector('#itemImage');
        const nextButton = document.getElementById('next-image');
        const prevButton = document.getElementById('previous-image');

        function updateImage(newIndex, direction) {
            if (newIndex >= 0 && newIndex < images.length) {
                const exitDirection = direction === 'next' ? '-100%' : '100%';
                const enterDirection = direction === 'next' ? '100%' : '-100%';

                imageElement.style.transition = 'transform 0.5s ease-in-out, opacity 0.5s ease-in-out';
                imageElement.style.transform = `translateX(${exitDirection}) scale(1.1)`;
                imageElement.style.opacity = 0;

                setTimeout(() => {
                    currentIndex = newIndex;
                    imageElement.src = images[currentIndex];

                    imageElement.style.transition = 'none';
                    imageElement.style.transform = `translateX(${enterDirection}) scale(1.1)`;

                    setTimeout(() => {
                        imageElement.style.transition = 'transform 0.5s ease-in-out, opacity 0.5s ease-in-out';
                        imageElement.style.transform = 'translateX(0) scale(1)';
                        imageElement.style.opacity = 1;
                    }, 20);
                }, 500);
            }
        }

        updateImage(currentIndex, 'next');

        nextButton.addEventListener('click', () => {
            let newIndex = (currentIndex + 1) % images.length;
            updateImage(newIndex, 'next');
        });

        prevButton.addEventListener('click', () => {
            let newIndex = (currentIndex - 1 + images.length) % images.length;
            updateImage(newIndex, 'prev');
        });
    }
});
