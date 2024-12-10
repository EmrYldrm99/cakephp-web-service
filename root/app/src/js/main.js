class Main {

    constructor() {
        console.log("Main called!");
        document.documentElement.style.setProperty('--pri-color', "yellow");
        console.log("lol");

        document.addEventListener('DOMContentLoaded', () => {
            console.log('loaded')
            const storageKey = 'selectedCheckboxes';
            const checkboxes = document.querySelectorAll('.item-checkbox');
            console.log(checkboxes.size)
            const form = document.querySelector('form');
    
            // Zustände aus LocalStorage laden und anwenden
            const savedStates = JSON.parse(localStorage.getItem(storageKey)) || {};
    
            checkboxes.forEach(checkbox => {
                const id = checkbox.getAttribute('data-id');
                if (savedStates[id]) {
                    checkbox.checked = true;
                }
    
                // Event-Listener für Änderungen an Checkboxen
                checkbox.addEventListener('change', () => {
                    if (checkbox.checked) {
                        savedStates[id] = true; // Speichere die Checkbox als ausgewählt
                    } else {
                        delete savedStates[id]; // Entferne die Checkbox aus der Auswahl
                    }
                    localStorage.setItem(storageKey, JSON.stringify(savedStates));
                });
            });
    
            // Beim Absenden des Formulars die ausgewählten IDs als hidden-Felder hinzufügen
            form.addEventListener('submit', (event) => {
                // Alle aktuell ausgewählten Checkboxen ermitteln
                const selectedIds = Object.keys(savedStates);
    
                // Für jedes selektierte Element ein hidden Input erstellen
                selectedIds.forEach(id => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'account_ids[]';
                    hiddenInput.value = id;
    
                    form.appendChild(hiddenInput);
                    localStorage.removeItem(storageKey);
                });
            });
        });
    }
}


new Main();

function test() {
    let nextTheme = document.documentElement.getAttribute("theme") === "light" ? "dark" : "light";
    document.documentElement.setAttribute("theme", nextTheme);
    console.log("Hello World!");
    let element = document.getElementById("my-dialog");
    element.setAttribute("open", "");
}

function bla() {
    let element = document.getElementById("my-dialog");
    element.removeAttribute("open");
    console.log("hi");
}