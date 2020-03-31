$(function() {
    var isDisplay = false;
    var TopBtn= $('#pagetop_btn');
    TopBtn.css('right', '-200px');
    var isDisplay = false;
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            if (isDisplay == false) {
                isDisplay = true;
                TopBtn.stop().animate({'right' : '10px'}, 200);
            }
        }
        else {
            if (isDisplay) {
                isDisplay = false;
                TopBtn.stop().animate({'right' : '-200px'}, 200);
            }
        }
    });

    TopBtn.click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});