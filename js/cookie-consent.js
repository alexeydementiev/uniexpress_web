(function(){
    function loadAnalytics(){
        if(window.analyticsLoaded){return;}
        window.analyticsLoaded=true;
        var ym=document.createElement('script');
        ym.src='//mc.yandex.ru/metrika/watch.js';
        ym.async=true;
        document.head.appendChild(ym);
        ym.onload=function(){
            try{window.yaCounter443878=new Ya.Metrika({id:443878,webvisor:true,clickmap:true,trackLinks:true,accurateTrackBounce:true});}catch(e){}
        };
        var ns=document.createElement('noscript');
        ns.innerHTML="<div><img src='//mc.yandex.ru/watch/443878' style='position:absolute; left:-9999px;' alt='' /></div>";
        document.body.appendChild(ns);

        window.replainSettings={id:'1c0b73f3-51b2-4445-9e44-5aec7f52dd45'};
        var rp=document.createElement('script');
        rp.type='text/javascript';
        rp.async=true;
        rp.src='https://widget.replain.cc/dist/client.js';
        document.body.appendChild(rp);
    }

    function clearCookies(){
        document.cookie.split(';').forEach(function(c){
            var d=c.indexOf('=');
            var name=d> -1?c.substr(0,d):c;
            document.cookie=name+'=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/';
        });
    }

    function hide(){
        var c=document.getElementById('cookie-consent');
        if(c){c.parentNode.removeChild(c);}
    }

    function show(){
        if(document.getElementById('cookie-consent')){return;}
        var div=document.createElement('div');
        div.id='cookie-consent';
        div.style.position='fixed';
        div.style.left='0';
        div.style.right='0';
        div.style.bottom='0';
        div.style.background='#f8f8f8';
        div.style.padding='10px';
        div.style.boxShadow='0 -2px 5px rgba(0,0,0,0.3)';
        div.style.zIndex='1000';
        div.style.fontFamily='Roboto, sans-serif';
        div.innerHTML="Shipperty использует файлы cookie. Они необходимы для оптимальной работы сайтов и сервисов. Подробнее прочитайте в <a href='privatedata.html'>Политике использования файлов cookie</a> <button id='cc-allow'>Разрешить</button> <button id='cc-deny'>Запретить</button>";
        document.body.appendChild(div);
        document.getElementById('cc-allow').onclick=function(){localStorage.setItem('cookie_consent','allow');hide();loadAnalytics();};
        document.getElementById('cc-deny').onclick=function(){localStorage.setItem('cookie_consent','deny');hide();clearCookies();};
    }

    document.addEventListener('DOMContentLoaded',function(){
        var c=localStorage.getItem('cookie_consent');
        if(c==='allow'){
            loadAnalytics();
        }else if(c==='deny'){
            // cookies disabled
        }else{
            show();
        }
    });
})();
