const toggleSwitch = document.getElementById('themeButton');
var currentTheme = localStorage.getItem('theme');

if (currentTheme) {
    if (currentTheme === 'dark') {
        setDark();
    } else{
        setLight();
    }
}

async function switchTheme() {
    if (currentTheme === 'light') {
        await setDark();
        currentTheme = localStorage.getItem('theme');
    } else {
        await setLight();
        currentTheme = localStorage.getItem('theme');
    }
}

toggleSwitch.addEventListener('click', switchTheme);

function setDark() {
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem('theme', 'dark');

    toggleSwitch.src = 'https://i.imgur.com/XY0D1ZK.png'
    toggleSwitch.alt = "Change to Light Mode";
}

function setLight() {
    document.documentElement.setAttribute('data-theme', 'light');
    localStorage.setItem('theme', 'light');
    
    toggleSwitch.src = 'https://i.imgur.com/PWAzExk.png';
    toggleSwitch.alt = "Change to Dark Mode";
}