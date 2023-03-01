import { drop } from "lodash";
import "./bootstrap";

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
        if(contactBtn.ariaExpanded === "true")contactBtn.click();
    }
});

// dark mode
const darkModeBtn = document.getElementById("dark-mode-toggle");
darkModeBtn.addEventListener("change", () => {
    document.querySelector("html").classList.toggle("dark");
});
