/*
 * @package xshare
 * @author rainastudio
 * @version 1.0.1
*/
(function($){
    $.fn.xShare = function( options ) {
        var rand = Math.floor((Math.random() * 1000) + 1);
        var tname = $('meta[name="xShare_tname"]').attr("content");
        var settings = $.extend({
            // These are the defaults.
            url:window.location.href,
            text:document.title,
            twitterUsername:tname,
            id: rand,
            total: 0,
            position: 'append' //append|prepend
        }, options );
        // greenify the collection based on the settings variable.
        this.each(function(){
          var elem = $(this);
          switch(settings.position){
              case 'append':
                  elem.append(init());
                  break;
              default: 
                  elem.prepend(init());
                  break;
          }
        });
        function init(){
         var code = "<div class='mct_xShare' id='xShare_"+settings.id+"'>"+
            "<div class='mct_xShare_container'>"+
               "<div class='mct_xShare_counter' id='xShare_counter_"+settings.id+"'>"+
                  "<span id='sctotal'>0</span><br><span class='total-text'>Shares</span>"+
               "</div>"+
               "<div class='mct_xShare_buttons' id='xShare_buttons_"+settings.id+"'>"+
                "<a target=_blank rel=nofollow href='https://www.facebook.com/sharer.php?u="+encodeURIComponent(settings.url)+"&t="+encodeURI(settings.text)+"' class='xShare_btn facebook'><span class='xShare_btn_text'><span class='fa fa-facebook'></span><span class='ct_text'>Share</span></span></a>"+
                "<a target=_blank rel=nofollow href='https://twitter.com/intent/tweet?via="+settings.twitterUsername+"&url="+encodeURIComponent(settings.url)+"&text="+encodeURI(settings.text)+"' class='xShare_btn twitter'><span class='xShare_btn_text'><span class='fa fa-twitter'></span><span class='ct_text'>Tweet</span></span></a>"+
                "<a target=_blank rel=nofollow href='https://pinterest.com/pin/create/button/?url="+encodeURIComponent(settings.url)+"' class='xShare_btn pinterest'><span class='xShare_btn_text'><span class='fa fa-pinterest'></span><span class='ct_text'>Pin</span></span></a>"+
                "<a target=_blank rel=nofollow href='https://www.linkedin.com/cws/share?token&isFramed=false&url="+encodeURIComponent(settings.url)+"' class='xShare_btn linkedin'><span class='xShare_btn_text'><span class='fa fa-linkedin'></span><span class='ct_text'>Share</span></span></a>"+
                "<a target=_blank rel=nofollow href='https://buffer.com/add?url="+encodeURIComponent(settings.url)+"&text="+encodeURIComponent(settings.text)+"' class='xShare_btn buffer'><span class='xShare_btn_text'><span class='fa fa-buffer'></span><span class='ct_text'>Buffer</span></span></a>"+
            "</div></div>";
          return code;
        }
        // sharedcount functions
        function sharedCount(url, fn) {
            url = encodeURIComponent(url || location.href);
            var domain = "//api.sharedcount.com/v1.0/";
            var api = $('meta[name="xShare_api"]').attr("content");
            var apikey = api; 
            var arg = {
              data: {
                url : url,
                apikey : apikey
              },
                url: domain,
                cache: true,
                dataType: "json"
            };
            if ('withCredentials' in new XMLHttpRequest) {
                arg.success = fn;
            }
            else {
                var cb = "sc_" + url.replace(/\W/g, '');
                window[cb] = fn;
                arg.jsonpCallback = cb;
                arg.dataType += "p";
            }
            return jQuery.ajax(arg);
        };
        // update shared count
        sharedCount(location.href, function(data){
           $('#sctotal').text(data.Facebook.total_count+data.LinkedIn+data.Pinterest).fadeIn();
        });
        return this;
    };
    // install social share
    $("#xShare_bf, #xShare_baa, #xShare_v").xShare();
    
}(jQuery));
