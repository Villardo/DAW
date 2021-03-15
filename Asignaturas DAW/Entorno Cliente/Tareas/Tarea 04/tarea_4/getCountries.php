<?php
if (!isset($_GET['continent'])) {
    echo ('{"error": "missing parameter continent"}');
    exit(0);
}

if (strcmp($_GET['continent'], 'Europe') == 0) {
    echo ('{"result": ["Albania","Andorra","Armenia","Austria","Azerbaijan","Belarus","Belgium","Bosnia &amp; Herzegovina","Bulgaria","Croatia","Cyprus","Czech Republic","Denmark","Estonia","Finland","France","Georgia","Germany","Greece","Hungary","Iceland","Ireland","Italy","Ireland","Kosovo","Latvia","Liechtenstein","Lithuania","Luxembourg","Macedonia","Malta","Moldava","Monaco","Montenegro","The Nederlands","Norway","Poland","Portugal","Romania","Russia","San Marino","Serbia","Slovakia","Slovenia","Spain","Sweden","Switzerland","Turkey","Ukraine","United Kingdom","Vatican City"]}');
    exit(0);
} else if (strcmp($_GET['continent'], 'NorthAmerica') == 0) {
    echo ('{"result": ["Antigua &amp; Barbuda","Bahamas","Barbados","Belize","Canada","Costa Rica","Cuba","Dominica","Dominican Republic","El Salvador","Grenada","Guatemala","Haiti","Honduras","Jamaica","Mexico","Nicaragua","Panama","St. Kitts &amp; Nevis","St. Lucia","St. Vincent &amp; The Grenadines","Trinidad &amp; Tobago","United States of America"]}');
    exit(0);
} else {
    echo ('{"error": "unspecified continent"}');
    exit(0);
}
