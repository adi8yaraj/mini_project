document.addEventListener("DOMContentLoaded", function(event) {
    
    // Sidebar toggle
    const sidebarCollapseBtn = document.getElementById('sidebarCollapse');
    const sidebar = document.getElementById('sidebar');
    
    if(sidebarCollapseBtn && sidebar) {
        sidebarCollapseBtn.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    }

    // Theme toggle (Dark / Light Mode)
    const themeToggleBtn = document.getElementById('themeToggle');
    const htmlElement = document.documentElement;
    const themeIcon = themeToggleBtn ? themeToggleBtn.querySelector('i') : null;

    // Check local storage for theme preference
    const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

    if (currentTheme) {
        htmlElement.setAttribute('data-bs-theme', currentTheme);
        if (currentTheme === 'dark' && themeIcon) {
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        }
    }

    if(themeToggleBtn) {
        themeToggleBtn.addEventListener('click', function() {
            let theme = htmlElement.getAttribute('data-bs-theme');
            if (theme === 'dark') {
                htmlElement.setAttribute('data-bs-theme', 'light');
                localStorage.setItem('theme', 'light');
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            } else {
                htmlElement.setAttribute('data-bs-theme', 'dark');
                localStorage.setItem('theme', 'dark');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
            
            // Re-render charts if they exist and need theme updates
            if(window.Chart && window.updateChartTheme) {
                window.updateChartTheme(htmlElement.getAttribute('data-bs-theme'));
            }
        });
    }
});
