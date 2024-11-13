class Main {

    constructor() {
        console.log("Main called!");
        document.documentElement.style.setProperty('--pri-color', "yellow");
        console.log("lol");
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