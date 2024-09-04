// document.addEventListener('DOMContentLoaded', () => {
//     let images = [];
//     let currentIndex = 0;

//     const imageElement = document.querySelector('#itemImage');
//     const nextButton = document.getElementById('next-image');
//     const prevButton = document.getElementById('previous-image');

//     function updateImage(index, direction) {
//         if (index >= 0 && index < images.length) {
//             imageElement.style.opacity = 0;
//             imageElement.style.transform = `translateX(${direction === 'next' ? '100px' : '-100px'})`;

//             setTimeout(() => {
//                 imageElement.src = images[index];
//                 imageElement.style.transform = 'translateX(0)';
//                 imageElement.style.opacity = 1;
//             }, 500);
//         }
//     }

//     // Fetch image paths via AJAX
//     fetch('fetch_images.php?product=PineBook%20Lite')
//         .then(response => response.json())
//         .then(data => {
//             images = data;
//             if (images.length > 0) {
//                 updateImage(currentIndex, 'next');
//             }
//         })
//         .catch(error => console.error('Error fetching images:', error));

//     nextButton.addEventListener('click', () => {
//         currentIndex = (currentIndex + 1) % images.length;
//         updateImage(currentIndex, 'next');
//     });

//     prevButton.addEventListener('click', () => {
//         currentIndex = (currentIndex - 1 + images.length) % images.length;
//         updateImage(currentIndex, 'prev');
//     });
// });
