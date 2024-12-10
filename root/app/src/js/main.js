class Main {

    constructor() {
        console.log("Main called!");
        document.documentElement.style.setProperty('--pri-color', "yellow");
        console.log("lol");

        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('playersForm');
            const selectedIdsInput = document.getElementById('selectedIds');
            const checkboxes = document.querySelectorAll('.player-checkbox');
        
            // Restore IDs from hidden input
            let selectedIds = selectedIdsInput.value ? selectedIdsInput.value.split(',') : [];
        
            // Mark checkboxes as checked based on selected IDs
            checkboxes.forEach((checkbox) => {
                if (selectedIds.includes(checkbox.value)) {
                    checkbox.checked = true;
                }
        
                // Update selected IDs on checkbox toggle
                checkbox.addEventListener('change', () => {
                    if (checkbox.checked) {
                        if (!selectedIds.includes(checkbox.value)) {
                            selectedIds.push(checkbox.value);
                        }
                    } else {
                        selectedIds = selectedIds.filter(id => id !== checkbox.value);
                    }
                    selectedIdsInput.value = selectedIds.join(',');
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