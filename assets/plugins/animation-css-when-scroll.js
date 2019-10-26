
let window = $(window)

function scrollTop()
{
    
}

function animatedWhenScrollUp(element)
{
    window.on('scroll', scrollTop())
    window.trigger('scroll')
}