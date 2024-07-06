import './bootstrap';

function onThemeSystemChanged(e) {
  if (localStorage.getItem("color-theme") !== "system") return;
  setTheme(e.matches ? "dark" : "light");
}
window
  .matchMedia("(prefers-color-scheme: dark)")
  .addEventListener("change", onThemeSystemChanged);

const themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
const themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

function setTheme(option) {
  if (option === "light") {
    themeToggleLightIcon?.classList.remove("tw-hidden");
    themeToggleDarkIcon?.classList.add("tw-hidden");
    document.documentElement.classList.remove("tw-dark");
    document.documentElement.setAttribute("data-bs-theme", "light");
  } else {
    themeToggleLightIcon?.classList.add("tw-hidden");
    themeToggleDarkIcon?.classList.remove("tw-hidden");
    document.documentElement.classList.add("tw-dark");
    document.documentElement.setAttribute("data-bs-theme", "dark");
  }
}

if (!("color-theme" in localStorage)) {
  setTheme("system");
} else {
  setTheme(localStorage.getItem("color-theme"));
}

function toggleTheme(option) {
  if (option === localStorage.getItem("color-theme")) return;
  localStorage.setItem("color-theme", option);
  let selectedTheme = localStorage.getItem("color-theme");

  if (option === "system")
    selectedTheme = window.matchMedia("(prefers-color-scheme: dark)")
      .matches
      ? "dark"
      : "light";

  setTheme(selectedTheme);
}
const listThemeItem = document.querySelectorAll(
  ".dropdown-menu > li > input[type=radio]",
);

for (const input of listThemeItem) {
  if (
    input.value === localStorage.getItem("color-theme") ||
    (input.value === "system" && !("color-theme" in localStorage))
  )
    input.checked = true;
  input.addEventListener("change", (e) => {
    toggleTheme(e.currentTarget.value);
  });
}


