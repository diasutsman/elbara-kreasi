import "./bootstrap";

// dark mode
// On page load or when changing themes, best to add inline in `head` to avoid FOUC
const darkModeBtn = document.getElementById("dark-mode-toggle");
const mainIcon = document.querySelector("link[rel~='icon']");
const lightUrl = mainIcon.href;
const darkUrl = document.getElementById("darkUrl").href;
if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
    darkModeBtn.checked = true;
    mainIcon.href = darkUrl;
} else {
    document.documentElement.classList.remove("dark");
}

darkModeBtn.addEventListener("change", () => {
    localStorage.theme = document.querySelector("html").classList.toggle("dark")
        ? "dark"
        : "light";

    mainIcon.href = localStorage.theme === "dark" ? darkUrl : lightUrl;
});

// Hamburger
const hamburger = document.getElementById("hamburger");
const navMenu = document.getElementById("nav-menu");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("hamburger-active");
    navMenu.classList.toggle("max-h-40");
    navMenu.classList.toggle("max-h-0");
});

// search
const searchForm = document.getElementById("search-form");
const search = document.getElementById("search");
const searchBtn = document.getElementById("search-btn");
const navItems = document.getElementById("nav-items");

searchBtn.addEventListener("click", () => {
    if (hamburger.classList.contains("hamburger-active")) hamburger.click();
    search.focus();
    searchForm.classList.toggle("-z-10");
    searchForm.classList.toggle("opacity-0");
    Array.from(searchBtn.children).forEach((child) =>
        child.classList.toggle("opacity-0")
    );
});

// dropdown
const contactBtn = document.getElementById("contact-btn");
const dropdown = document.querySelector("#menu-dropdown");
contactBtn.addEventListener("click", () => {
    contactBtn.querySelector("svg").classList.toggle("rotate-180");
    if (contactBtn.ariaExpanded === "false") {
        dropdown.classList.add("z-10");
        dropdown.classList.remove(
            ..."opacity-0 scale-95 ease-out duration-100".split(" ")
        );
        dropdown.classList.add(
            ..."opacity-100 scale-100 ease-in duration-75".split(" ")
        );
        contactBtn.ariaExpanded = "true";
    } else {
        dropdown.classList.remove(
            ..."opacity-100 scale-100 ease-in duration-75".split(" ")
        );
        dropdown.classList.add(
            ..."opacity-0 scale-95 ease-out duration-100".split(" ")
        );
        contactBtn.ariaExpanded = "false";
        const fun = () => {
            dropdown.classList.remove("z-10");
            dropdown.removeEventListener("transitionend", fun);
        };
        dropdown.addEventListener("transitionend", fun);
    }
});

// Click outside some elements
window.addEventListener("click", (event) => {
    if (
        !dropdown.contains(event.target) &&
        !contactBtn.contains(event.target)
    ) {
        if (contactBtn.ariaExpanded === "true") contactBtn.click();
    }
});
