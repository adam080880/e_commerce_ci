/* 
    Source: https://codepen.io/toddwebdev/pen/yExKoj 
    Rewrite: Muhamad Adam
*/

function __init_scrolling(_items) {
    const slider = _items;
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active-items-gs');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active-items-gs');
    });
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active-items-gs');
    });
    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 1; 
        slider.scrollLeft = scrollLeft - walk;
    });
}
