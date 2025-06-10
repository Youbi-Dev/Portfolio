document.addEventListener('DOMContentLoaded', () => {
    // Dark mode toggle
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    // Apply initial theme
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme) {
        body.classList.add(storedTheme);
    } else {
        // Default to light mode if no theme is stored
        body.classList.add('light');
    }

    themeToggle.addEventListener('click', () => {
        if (body.classList.contains('dark')) {
            body.classList.remove('dark');
            body.classList.add('light');
            localStorage.setItem('theme', 'light');
        } else {
            body.classList.remove('light');
            body.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });

    // Mobile sidebar toggle
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        mainContent.classList.toggle('ml-64');
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', (event) => {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnSidebarToggle = sidebarToggle.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnSidebarToggle && !sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.add('-translate-x-full');
            mainContent.classList.remove('ml-64');
        }
    });

    // Profile dropdown
    const profileDropdownToggle = document.getElementById('profile-dropdown-toggle');
    const profileDropdown = document.getElementById('profile-dropdown');

    if (profileDropdownToggle && profileDropdown) {
        profileDropdownToggle.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            const isClickInsideDropdown = profileDropdown.contains(event.target);
            const isClickOnToggle = profileDropdownToggle.contains(event.target);

            if (!isClickInsideDropdown && !isClickOnToggle && !profileDropdown.classList.contains('hidden')) {
                profileDropdown.classList.add('hidden');
            }
        });

        // Close dropdown on ESC key press
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !profileDropdown.classList.contains('hidden')) {
                profileDropdown.classList.add('hidden');
            }
        });
    }

    // Close modals when clicking outside or pressing ESC
    // Add similar logic here for any modals you implement
});