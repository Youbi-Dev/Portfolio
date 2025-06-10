<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills Management - Admin</title>
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
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ isset($skill->id) ? 'Edit Skill' : 'Add New Skill' }}
                    </h2>
                    <a href="{{ route('admin.skills.index') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                        <i class="fas fa-arrow-left mr-1"></i> Back to Skills
                    </a>
                </div>

                <form action="{{ isset($skill->id) ? route('admin.skills.update', $skill) : route('admin.skills.store') }}" method="POST">
                    @csrf
                    @if(isset($skill->id))
                        @method('PUT')
                    @endif

                    <div class="space-y-6">
                        <!-- Basic Skill Information Section -->
                        <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Skill Information</h3>

                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <!-- Skill Name -->
                                <div class="sm:col-span-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Skill Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $skill->name ?? '') }}"
                                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        required>
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Proficiency -->
                                <div class="sm:col-span-2">
                                    <label for="proficiency" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Proficiency (%) <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" name="proficiency" id="proficiency" min="0" max="100" 
                                        value="{{ old('proficiency', $skill->proficiency ?? '') }}"
                                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        required>
                                    @error('proficiency')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-6">
                                <div class="sm:col-span-6">
                                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                                    <select name="category" id="category" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                                        <option value="">Select Category</option>
                                        <option value="Frontend" {{ old('category', $skill->category ?? '') == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                                        <option value="Backend" {{ old('category', $skill->category ?? '') == 'Backend' ? 'selected' : '' }}>Backend</option>
                                        <option value="DevOps" {{ old('category', $skill->category ?? '') == 'DevOps' ? 'selected' : '' }}>DevOps</option>
                                        <option value="Tools" {{ old('category', $skill->category ?? '') == 'Tools' ? 'selected' : '' }}>Tools</option>
                                    </select>
                                    @error('category')
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
                                    <label for="is_featured" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Visibility Status
                                    </label>
                                    <select name="is_featured" id="is_featured"
                                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <option value="1" {{ (old('is_featured', $skill->is_featured ?? 1) == 1) ? 'selected' : '' }}>Visible</option>
                                        <option value="0" {{ (old('is_featured', $skill->is_featured ?? 1) == 0) ? 'selected' : '' }}>Hidden</option>
                                    </select>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Choose whether this skill should be displayed on your portfolio</p>
                                    @error('is_featured')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Skill Preview Section -->
                        <div class="pb-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Skill Preview</h3>

                            <div class="border border-gray-200 dark:border-gray-700 rounded-md p-4 bg-gray-50 dark:bg-gray-800/50">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <span id="preview-name" class="text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $skill->name ?? 'Skill Name' }}
                                        </span>
                                        <span id="preview-category" class="text-xs text-gray-500 dark:text-gray-400 ml-2">
                                            {{ $skill->category ? '(' . $skill->category . ')' : '' }}
                                        </span>
                                    </div>
                                    <span id="preview-percentage" class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ $skill->proficiency ?? 0 }}%
                                    </span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div id="preview-bar" class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: {{ $skill->proficiency ?? 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('admin.skills.index') }}"
                            class="inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 py-2 px-4 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-indigo-700 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-900">
                            {{ isset($skill->id) ? 'Update Skill' : 'Add Skill' }}
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
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

        // Real-time preview functionality
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const categoryInput = document.getElementById('category');
            const proficiencyInput = document.getElementById('proficiency');

            const previewName = document.getElementById('preview-name');
            const previewCategory = document.getElementById('preview-category');
            const previewPercentage = document.getElementById('preview-percentage');
            const previewBar = document.getElementById('preview-bar');

            // Update preview when inputs change
            nameInput.addEventListener('input', function() {
                previewName.textContent = this.value || 'Skill Name';
            });

            categoryInput.addEventListener('change', function() {
                previewCategory.textContent = this.value ? '(' + this.value + ')' : '';
            });

            proficiencyInput.addEventListener('input', function() {
                const value = Math.max(0, Math.min(100, parseInt(this.value) || 0));
                previewPercentage.textContent = value + '%';
                previewBar.style.width = value + '%';
            });
        });
    </script>
</body>
</html>