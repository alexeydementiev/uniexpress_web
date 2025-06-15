var currentLang = 'ru';

function translateText(text, lang){
    return fetch('functions/deepseek_translate.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ text: text, target: lang })
    })
    .then(function(r){ return r.json(); })
    .then(function(data){ return data.text || text; })
    .catch(function(){ return text; });
}

function translateDOM(lang){
    document.querySelectorAll('body *').forEach(function(el){
        if(el.children.length === 0){
            var txt = el.textContent.trim();
            if(!txt){ return; }
            if(!el.dataset.originalText){
                el.dataset.originalText = el.textContent;
            }
            if(lang === 'ru'){
                el.textContent = el.dataset.originalText;
            }else{
                translateText(el.dataset.originalText, lang).then(function(t){
                    el.textContent = t;
                });
            }
        }
    });
    updateLanguageIcon();
}

function setLanguage(lang){
    currentLang = lang;
    localStorage.setItem('language', lang);
    translateDOM(lang);
}

function toggleLanguage(){
    if(currentLang === 'ru'){ setLanguage('en'); }
    else{ setLanguage('ru'); }
}

function updateLanguageIcon(){
    document.querySelectorAll('#language-changer').forEach(function(el){
        el.textContent = currentLang === 'ru' ? 'EN' : 'RU';
    });
}

document.addEventListener('DOMContentLoaded', function(){
    var lang = localStorage.getItem('language') || 'ru';
    currentLang = lang;
    if(lang !== 'ru'){ translateDOM(lang); }
    updateLanguageIcon();
    document.querySelectorAll('#language-changer').forEach(function(el){
        el.addEventListener('click', toggleLanguage);
    });
});

