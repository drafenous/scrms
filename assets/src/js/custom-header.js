// global vars
window['globals'] = {now: moment().format('YYYY-MM-DD HH:mm:ss')};

// enable popover
$(function () {
    $('[data-toggle="popover"]').popover({
        container: 'body',
        placement: 'bottom',
        html: true 
    })
})