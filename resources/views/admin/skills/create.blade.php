
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Skill - Admin</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'sidebar-dark': '#111827',
                        'sidebar-light': '#ffffff',
                        'brand-blue': '#3b82f6',
                        'menu-hover': '#1e40af'
                    }
                }
            }
        }
        // Apply the theme when the page loads
        applyInitialTheme();
    </script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <div class="flex h-screen bg-gray-100 dark:bg-gray-900 relative">
        <!-- Mobile Sidebar Overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden"></div>
        
        <!-- Sidebar (Included Partial) -->
        @include('layouts.admin.sidebar')
        @include('layouts.admin.top-navigation')

        <!-- Main Content Area --> 
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-6 md:p-8">

            <div class="p-6 bg-white dark:bg-white/[0.03] rounded-lg shadow">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
                    Add New Skill
                </h2>

                <form action="{{ route('admin.skills.store') }}" method="POST"> 
                    @csrf
                    
                    <div class="space-y-6">
                        <!-- Basic Information Section -->
                        <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Skill Information</h3>

                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <!-- Skill Name -->
                                <div class="sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skill Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="sm:col-span-3">
                                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                                    <select name="category" id="category" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                                        <option value="">Select Category</option>
                                        <option value="Frontend" {{ old('category') == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                                        <option value="Backend" {{ old('category') == 'Backend' ? 'selected' : '' }}>Backend</option>
                                        <option value="DevOps" {{ old('category') == 'DevOps' ? 'selected' : '' }}>DevOps</option>
                                        <option value="Tools" {{ old('category') == 'Tools' ? 'selected' : '' }}>Tools</option>
                                    </select>
                                    @error('category')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Proficiency -->
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-6">
                                <div class="sm:col-span-4">
                                    <label for="proficiency" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Proficiency (%)</label>
                                    <input type="number" name="proficiency" id="proficiency" value="{{ old('proficiency', 0) }}" min="0" max="100" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                                    @error('proficiency') 
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Display Settings Section -->
 <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
 <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Display Settings</h3>

 <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
 <!-- Visibility Status -->
 <div class="sm:col-span-3">
 <label for="is_featured" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Visibility Status</label>
 <select id="is_featured" name="is_featured" class="mt-1 block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
 <option value="1" {{ old('is_featured', 1) == 1 ? 'selected' : '' }}>Visible</option>
 <option value="0" {{ old('is_featured', 1) == 0 ? 'selected' : '' }}>Hidden</option>
 </select>
 @error('is_featured')
 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
 @enderror
 </div>
 </div>
 </div>

                     </div>



                    <div class="mt-6 flex items-center justify-between">
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-indigo-700 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-900">
                            Add Skill
                        </button>
                        <a href="{{ route('admin.skills.index') }}" class="inline-block align-baseline font-medium text-sm text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>

@push('scripts')
<script>
    // Dark Mode Toggle
    const html = document.querySelector('html');
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeIcon = document.getElementById('darkModeIcon');

    const toggleDarkMode = () => {
        if (html.classList.contains('dark')) {
            // Switch to light mode
            html.classList.remove('dark');
            darkModeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />';
            localStorage.setItem('theme', 'light');
        } else {
            // Switch to dark mode
            html.classList.add('dark');
            darkModeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />';
            localStorage.setItem('theme', 'dark');
        }
    };

    darkModeToggle.addEventListener('click', toggleDarkMode);

    // Set initial theme based on local storage or system preference
    const applyInitialTheme = () => {
        const initialTheme = localStorage.getItem('theme');
        if (initialTheme === 'dark' || (!initialTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
            darkModeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />';
        } else {
            darkModeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />';
        }
    };

    // Mobile sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const openSidebarBtn = document.getElementById('openSidebar');
    const closeSidebarBtn = document.getElementById('closeSidebar');

    const openSidebar = () => {
        sidebar.classList.remove('-translate-x-full');
        sidebarOverlay.classList.remove('hidden');
    };

    const closeSidebar = () => {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
    };

    openSidebarBtn.addEventListener('click', openSidebar);
    closeSidebarBtn.addEventListener('click', closeSidebar);
    sidebarOverlay.addEventListener('click', closeSidebar);

    // Profile Dropdown functionality
    const profileDropdownBtn = document.getElementById('profileDropdownBtn');
    const profileDropdown = document.getElementById('profileDropdown');
    
    // Toggle dropdown visibility when profile button is clicked
    profileDropdownBtn.addEventListener('click', () => {
        profileDropdown.classList.toggle('hidden');
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!profileDropdownBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
            profileDropdown.classList.add('hidden');
        }
    });

    // Apply theme when page loads
    document.addEventListener('DOMContentLoaded', applyInitialTheme);
    // Apply theme immediately in case the script runs after DOMContentLoaded
    applyInitialTheme();

    // Handle window resize to adjust sidebar visibility
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) { // md breakpoint in Tailwind
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        } else {
            sidebar.classList.add('-translate-x-full');
        }
    });
</script>
@endpush

</body>
</html>