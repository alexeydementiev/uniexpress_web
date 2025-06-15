var currentLang = localStorage.getItem('language') || 'ru';

function updateLangButton(){
    document.querySelectorAll('#language-changer').forEach(function(el){
        el.textContent = currentLang === 'ru' ? 'EN' : 'RU';
    });
}

function switchTo(lang){
    localStorage.setItem('language', lang);
    var path = window.location.pathname;
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
    if(currentLang === 'en' && !/-en\.html$/.test(window.location.pathname)){
        var newPath = window.location.pathname.replace(/\.html$/, '-en.html');
        if(newPath !== window.location.pathname){
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
