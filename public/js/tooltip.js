
$(function(){

    var $body = $("body");

    $(".my-tooltip").each(function(){
        var $this = $(this);
        var title = $this.attr("title");

        var $tooltip = $([
            "<span class='tooltip'>",
            "<span class='tooltip__body'>",
            title,
            "</span>",
            "</span>"
        ].join(""));

        $this.attr("title", "");

        var ua = navigator.userAgent;
        var pointer_event_start = "";
        var pointer_event_end = "";
        if (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
            // スマートフォン用コード
            pointer_event_start = "touchstart";
            pointer_event_end = "touchend";

        } else if (ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0) {
            // タブレット用コード
            pointer_event_start = "touchstart";
            pointer_event_end = "touchend";
        } else {
            // PC用コード
            pointer_event_start = "mouseenter";
            pointer_event_end = "mouseleave";

        }

        $this
            .on(pointer_event_start, function(){

                $body.append($tooltip);

                var offset = $this.offset();

                var size = {
                    width: $this.outerWidth(),
                    height: $this.outerHeight()
                };

                var ttSize = {
                    width: $tooltip.outerWidth(),
                    height: $tooltip.outerHeight()
                };

                $tooltip.css({
                    top: offset.top - ttSize.height,
                    left: offset.left + size.width / 2 - ttSize.width / 2
                });
            })

            .on(pointer_event_end, function(){
                $tooltip.remove();
            });

    });
});

