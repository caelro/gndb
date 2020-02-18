for (let i=0; i<7; i++) {
    const row = document.querySelector("table").insertRow(-1);
    for (let j=0; j<360; j++) {
        let letter = String.fromCharCode("A".charCodeAt(0)+j-1);
        row.insertCell(-1).innerHTML = i&&j ? "<input id='"+ letter+i +"'/>" : i||letter;
    }
}

const DATA={}, INPUTS=[].slice.call(document.querySelectorAll("input"));
INPUTS.forEach(function(elm) {
    elm.onfocus = function(e) {
        e.target.value = localStorage[e.target.id] || "";
    };
    elm.onblur = function(e) {
        localStorage[e.target.id] = e.target.value;
        computeAll();
    };
    let getter = function() {
        let value = localStorage[elm.id] || "";
        if (value.charAt(0) === "=") {
            with (DATA) return eval(value.substring(1));
        } else {
            return isNaN(parseFloat(value)) ? value : parseFloat(value);
        }
    };
    Object.defineProperty(DATA, elm.id, {get:getter});
    Object.defineProperty(DATA, elm.id.toLowerCase(), {get:getter});
});
(window.computeAll = function() {
    INPUTS.forEach(function(elm) { try { elm.value = DATA[elm.id]; } catch(e) {} });
})();