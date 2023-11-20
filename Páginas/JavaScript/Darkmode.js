const dark = document.getElementById('dark');
const storedDarkMode = localStorage.getItem("darkMode");
if (storedDarkMode === "true") {
    document.body.classList.add("darkmode");
}

dark.addEventListener('click', () => {
    document.body.classList.toggle('darkmode');
    const isDarkMode = document.body.classList.contains('darkmode');
    localStorage.setItem('darkMode', isDarkMode);
});