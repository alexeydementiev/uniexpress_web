var currentLang = 'ru';
var skipTags = ['SCRIPT', 'STYLE', 'NOSCRIPT', 'IFRAME'];
var textNodes = [];

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

function collectTextNodes(){
    var walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, null, false);
    textNodes = [];
    var node;
    while((node = walker.nextNode())){
        if(skipTags.indexOf(node.parentNode.tagName) !== -1){
            continue;
        }
        if(node.textContent.trim()){ textNodes.push(node); }
    }
}

function translateDOM(lang){
    textNodes.forEach(function(node){
        if(typeof node._originalText === 'undefined'){
            node._originalText = node.textContent;
        }
        if(lang === 'ru'){
            node.textContent = node._originalText;
        }else{
            if(node._translatedText){
                node.textContent = node._translatedText;
            }else{
                translateText(node._originalText, lang).then(function(t){
                    node.textContent = t;
                    node._translatedText = t;
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
    collectTextNodes();
    var lang = localStorage.getItem('language') || 'ru';
    currentLang = lang;
    if(lang !== 'ru'){ translateDOM(lang); }
    updateLanguageIcon();
    document.querySelectorAll('#language-changer').forEach(function(el){
        el.addEventListener('click', toggleLanguage);
    });
});

