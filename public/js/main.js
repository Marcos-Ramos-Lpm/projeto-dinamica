var Main = function() {
    return {
        alert: function(options) {
            options = $.extend(true, {
                container: "", // alerts parent container(by default placed after the page breadcrumbs)
                place: "append", // "append" or "prepend" in container 
                type: 'success', // alert's type
                message: "", // alert's message
                close: true, // make alert closable
                reset: true, // close all previouse alerts first
                focus: true, // auto scroll to the alert after shown
                icon: "", // put icon before the message
                callback: ''
            }, options);
            var id = Main.getUniqueID("bootalert");
            var html = '<div id="' + id + '" class="app-alerts alert alert-' + options.type + ' mt-2">' + (options.close ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' : '') + (options.icon !== "" ? '<i class="' + options.icon + '"></i>  ' : '') + options.message + '</div>';
            if (options.reset) {
                $('.app-alerts').remove();
            }

            if (!options.container) {
                $('.card').after(html);
            } else {
                if (options.place == "append") {
                    $(options.container).append(html);
                } else {
                    $(options.container).prepend(html);
                }
            }

            if (options.closeInSeconds > 0) {
                setTimeout(function() {
                    $('#' + id).remove();
                    if (options.callback) {
                        options.callback();
                    }
                }, options.closeInSeconds * 1000);
            }

            return id;
        },
        scrollTo: function(el) {
            $('html,body').animate({
                scrollTop: ($(el).offset().top) - 150
            }, 'slow');
        },
        getUniqueID: function(prefix) {
            return 'prefix_' + Math.floor(Math.random() * (new Date()).getTime());
        },
    }
}();