(function($){
    
    $.fn.notif = function(options)
    {
        var settings = {
            html : '<div class="notification animated fadeInLeft {{cls}}">\
                        <div class="left">\
                        {{#icon}}<div class="icon">{{{icon}}}</div>{{/icon}}\
                        {{#img}}<div class="img" style="background-image: url({{img}})"></div>{{/img}}\
                        </div>\
                        <div class="right">\
                            <h2>{{title}}</h2>\
                            <p>{{content}}</p>\
                        </div>\
                    </div>',
            icon: "$",
            timeout: false
        };
        if(options.cls == 'success'){settings.icon = 'v'}
        if(options.cls == 'error'){settings.icon = "x"}
        if(options.cls == 'warning'){settings.icon = "!"}
        var options = $.extend(settings, options);
        
        return this.each(function(){
            var $this = $(this);
            var $notifs = $('> .notifications', this);
            var $notif = $(Mustache.render(options.html,options ));
            if ($notifs.length == 0)
                {
                    $notifs = $('<div class="notifications animated flipInX"/>')
                    $this.append($notifs);
                }
            $notifs.append($notif);
            if (options.timeout){
                setTimeout(function(){
                    $notif.trigger('click');
                },options.timeout);
            }
            $notif.click(function(event){
               event.preventDefault();
               $notif.addClass("fadeOutLeft").delay(500).slideUp(300, function(){
                   if($notif.siblings().length == 0){ $notifs.remove();}
                  $notif.remove(); 
               });
            });
        })
    }
    
//    $('.add').click(function(event){
//        event.preventDefault();
//        $('body').notif({title:"Mon titre", content:'Mon contenu', timeout: false, cls: "success"})
//    
//    });
    
})(jQuery);