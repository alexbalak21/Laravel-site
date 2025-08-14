// Simple theme toggle
const themeToggle = document.getElementById('theme-toggle');
const html = document.documentElement;

// Check for saved theme preference
const savedTheme = localStorage.getItem('theme') || 'light';
if (savedTheme === 'dark') {
    html.classList.add('dark');
}

// Toggle theme on button click
themeToggle?.addEventListener('click', () => {
    html.classList.toggle('dark');
    const isDark = html.classList.contains('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    console.log('Theme toggled to:', isDark ? 'dark' : 'light');
});

console.log("test");
