function idioma (){ 
    // Selector de index por idioma, por defecto muestra la pagina en castellano
    let ln = window.navigator.language;
    //let ln = 'pt-BR';
    if (ln.includes('es')) {
        window.location.href = 'index_es.html';
    } else if (ln.includes('pt')) {
        window.location.href = 'index_pt.html';
    } else {
        window.location.href = 'index_es.html';
    }
}
