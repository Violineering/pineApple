document.addEventListener('DOMContentLoaded', function() {
    const elementsToAnimate = document.querySelectorAll('.section-content');
    const videoContainer = document.querySelector('.video-container');
    
    function handleScroll() {
            // Scroll text animation
        elementsToAnimate.forEach(element => {
            const rect = element.getBoundingClientRect();
            const isVisible = (rect.top < window.innerHeight) && (rect.bottom > 0);
            if (isVisible) {
                element.classList.add('animate-fadeInUp');
            }
        });
    
        // Scroll video scaling
        const scrollY = window.scrollY;
        const screenWidth = window.innerWidth;
    
        if (screenWidth > 1100) {
            const minScale = 0.9;
            const maxScale = 1;
            const maxScroll = 1300;
    
            let scale = maxScale - ((scrollY / maxScroll) * (maxScale - minScale));
            scale = Math.max(minScale, Math.min(scale, maxScale));
    
            let borderRadius = (scrollY / maxScroll) * 48;
            borderRadius = Math.max(0, Math.min(borderRadius, 48));
    
            videoContainer.style.transform = `scale(${scale})`;
            videoContainer.style.borderRadius = `${borderRadius}px`;
        } else {
            videoContainer.style.transform = 'none';
            videoContainer.style.borderRadius = '48px';
        }
    }
    
    // Initial check
    handleScroll();
    
    // Attach event listeners
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', handleScroll);
    
    // Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                    entry.target.classList.add('show');
            } else {
                    entry.target.classList.remove('show');
            }
     });
});
    
 const hiddenElements = document.querySelectorAll('.product.hidden');
hiddenElements.forEach((el) => observer.observe(el));
});