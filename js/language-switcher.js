var currentLang = localStorage.getItem('language') || 'ru';

function updateLangButton(){
    document.querySelectorAll('#language-changer').forEach(function(el){
        el.textContent = currentLang === 'ru' ? 'EN' : 'RU';
    });
}

function switchTo(lang){
    localStorage.setItem('language', lang);
    var path = window.location.pathname.replace(/\/$/, '/index.html');
    if(lang === 'en'){
        if(!/-en\.html$/.test(path)){
            path = path.replace(/\.html$/, '-en.html');
        }
    }else{
        path = path.replace(/-en\.html$/, '.html');
    }
    window.location.href = path;
}

function toggleLanguage(){
    switchTo(currentLang === 'ru' ? 'en' : 'ru');
}

document.addEventListener('DOMContentLoaded', function(){
    var pathname = window.location.pathname.replace(/\/$/, '/index.html');
    if(currentLang === 'en' && !/-en\.html$/.test(pathname)){
        var newPath = pathname.replace(/\.html$/, '-en.html');
        if(newPath !== pathname){
            window.location.replace(newPath);
            return;
        }
    }
    updateLangButton();
    document.querySelectorAll('#language-changer').forEach(function(el){
        el.addEventListener('click', function(){
            currentLang = localStorage.getItem('language') || 'ru';
            toggleLanguage();
        });
    });
});
