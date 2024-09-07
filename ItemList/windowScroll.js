document.addEventListener('DOMContentLoaded', () => {
    const toggleFeatures = document.getElementById('toggleFeatures');
    const featureContent = document.getElementById('featureContent');
    const leftColumn = document.querySelector('.itemDetails-column-left');
    const rightColumn = document.querySelector('.itemDetails-column-right');
    let lastScrollTop = 0;

    // Toggle the 'open' class to expand/collapse
    toggleFeatures.addEventListener('click', function() {
        featureContent.classList.toggle('open');
        
        // Wait for the content to fully expand/collapse before recalculating scroll positions
        setTimeout(syncScroll, 300);
    });

    // Sync scrolling between columns
    function syncScroll() {
        const currentScrollTop = window.scrollY;
        const scrollDifference = currentScrollTop - lastScrollTop;

        const leftColumnBottom = leftColumn.offsetTop + leftColumn.offsetHeight;
        const rightColumnHeight = rightColumn.scrollHeight;
        const rightColumnVisibleHeight = rightColumn.offsetHeight;

        if (rightColumnHeight > rightColumnVisibleHeight) {
            // Scroll the right column based on the scroll difference
            rightColumn.scrollBy({
                top: scrollDifference,
                behavior: 'auto'
            });
        }

        lastScrollTop = currentScrollTop;
    }

    // Listen for scroll events on the window
    window.addEventListener('scroll', syncScroll);
});