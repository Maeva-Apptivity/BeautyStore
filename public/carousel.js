
document.addEventListener('DOMContentLoaded', () => {
    const slider = document.querySelector('.slider');
    const list = document.querySelector('.slider .list');
    const items = document.querySelectorAll('.slider .list .item');
    const dots = document.querySelectorAll('.slider .dots li');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');

    if (!slider || !list || !items.length || !prev || !next) return;

    let active = 0;
    let refreshSlider = null;
    const lastIndex = items.length - 1;

    const setActiveSlide = (index) => {
        active = index < 0 ? lastIndex : index > lastIndex ? 0 : index;
        list.style.transform = `translateX(-${items[active].offsetLeft}px)`;

        document.querySelector('.slider .dots li.active')?.classList.remove('active');
        dots[active]?.classList.add('active');
    };

    const restartAutoplay = () => {
        window.clearInterval(refreshSlider);
        refreshSlider = window.setInterval(() => setActiveSlide(active + 1), 5000);
    };

    next.addEventListener('click', () => {
        setActiveSlide(active + 1);
        restartAutoplay();
    });

    prev.addEventListener('click', () => {
        setActiveSlide(active - 1);
        restartAutoplay();
    });

    dots.forEach((li, key) => {
        li.addEventListener('click', () => {
            setActiveSlide(key);
            restartAutoplay();
        });
    });

    window.addEventListener('resize', () => setActiveSlide(active));
    restartAutoplay();
});
