<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project - Admin</title>
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
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Edit Project: {{ $project->title }}
                    </h2>
                    <!--<div class="flex space-x-2">
                        <a href="{{ route('admin.projects.show', $project) }}" class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-eye mr-2"></i>
                            View Project
                        </a>
                    </div>-->
                </div>

                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <!-- Basic Information Section -->
                        <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Project Information</h3>

                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <!-- Project Title -->
                                <div class="sm:col-span-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Project Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                                    @error('title')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Project URL -->
                                <div class="sm:col-span-4">
                                    <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Project URL</label>
                                    <input type="url" name="project_url" id="url" value="{{ old('project_url', $project->project_url) }}" placeholder="https://example.com" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @error('project_url')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Project Description -->
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-6">
                                <div class="sm:col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                    <textarea name="description" id="description" rows="4" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Describe your project in detail..." required>{{ old('description', $project->description) }}</textarea>
                                    @error('description') 
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Technologies Used -->
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-6">
                                <div class="sm:col-span-6">
                                    <label for="technologies" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Technologies Used</label>
                                    <textarea name="technologies" id="technologies" rows="3" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="List the technologies, languages, and frameworks used (e.g., PHP, Laravel, JavaScript, MySQL, Tailwind CSS)">{{ old('technologies', $project->technologies) }}</textarea>
                                    @error('technologies') 
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Current Images Display -->
                        <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Current Images</h3>
                            
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                                <!-- Current Thumbnail -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Thumbnail</label>
                                    @if($project->thumbnail)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Current thumbnail" class="w-full h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600">
                                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-opacity rounded-lg flex items-center justify-center">
                                                <a href="{{ asset('storage/' . $project->thumbnail) }}" target="_blank" class="opacity-0 group-hover:opacity-100 text-white text-sm font-medium bg-black bg-opacity-50 px-3 py-1 rounded transition-opacity">
                                                    View Full Size
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-full h-48 bg-gray-100 dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-600 flex items-center justify-center">
                                            <div class="text-center">
                                                <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">No thumbnail uploaded</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Current Full Size Image -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Full Size Image</label>
                                    @if($project->full_image)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $project->full_image) }}" alt="Current full size image" class="w-full h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600">
                                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-opacity rounded-lg flex items-center justify-center">
                                                <a href="{{ asset('storage/' . $project->full_image) }}" target="_blank" class="opacity-0 group-hover:opacity-100 text-white text-sm font-medium bg-black bg-opacity-50 px-3 py-1 rounded transition-opacity">
                                                    View Full Size
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-full h-48 bg-gray-100 dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-600 flex items-center justify-center">
                                            <div class="text-center">
                                                <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">No full size image uploaded</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
                                Update Project Images
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">(Leave empty to keep current images)</span>
                            </h3>

                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <!-- Thumbnail Image -->
                                <div class="sm:col-span-3">
                                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Thumbnail Image</label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md hover:border-gray-400 dark:hover:border-gray-500 transition-colors">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                                <label for="thumbnail" class="relative cursor-pointer bg-white dark:bg-gray-700 rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="thumbnail" name="thumbnail" type="file" class="sr-only" accept="image/*">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                    </div>
                                    @error('thumbnail')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Full Size Image -->
                                <div class="sm:col-span-3">
                                    <label for="full_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Full Size Image</label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md hover:border-gray-400 dark:hover:border-gray-500 transition-colors">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                                <label for="full_image" class="relative cursor-pointer bg-white dark:bg-gray-700 rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="full_image" name="full_image" type="file" class="sr-only" accept="image/*">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                    </div>
                                    @error('full_image')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Display Settings Section -->
                        <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Display Settings</h3>

                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <!-- Featured Status -->
                                <div class="sm:col-span-3">
                                    <div class="flex items-center">
                                        <input id="featured" name="featured" type="checkbox" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600">
                                        <label for="featured" class="ml-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Featured Project
                                        </label>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Featured projects will be highlighted on the portfolio page.</p>
                                    @error('featured')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Project Metadata -->
                        <div class="pb-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Project Metadata</h3>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-2 sm:grid-cols-2">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Created</dt>
                                        <dd class="text-sm text-gray-900 dark:text-white">{{ $project->created_at->format('M j, Y \a\t g:i A') }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</dt>
                                        <dd class="text-sm text-gray-900 dark:text-white">{{ $project->updated_at->format('M j, Y \a\t g:i A') }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <div class="flex space-x-3">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-indigo-700 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-900">
                                <i class="fas fa-save mr-2"></i>
                                Update Project
                            </button>
                            <a href="{{ route('admin.projects.index') }}" class="inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 py-2 px-4 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Cancel
                            </a>
                        </div>
                        <!--<div class="flex space-x-2">
                            <a href="{{ route('admin.projects.index') }}" class="inline-block align-baseline font-medium text-sm text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">
                                Back to Projects
                            </a>
                        </div>-->
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

        if (darkModeToggle) {
            darkModeToggle.addEventListener('click', toggleDarkMode);
        }

        // Set initial theme based on local storage or system preference
        const applyInitialTheme = () => {
            const initialTheme = localStorage.getItem('theme');
            if (initialTheme === 'dark' || (!initialTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');
                if (darkModeIcon) {
                    darkModeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />';
                }
            } else {
                if (darkModeIcon) {
                    darkModeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />';
                }
            }
        };

        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const openSidebarBtn = document.getElementById('openSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');

        const openSidebar = () => {
            if (sidebar && sidebarOverlay) {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.remove('hidden');
            }
        };

        const closeSidebar = () => {
            if (sidebar && sidebarOverlay) {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            }
        };

        if (openSidebarBtn) openSidebarBtn.addEventListener('click', openSidebar);
        if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', closeSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);

        // Profile Dropdown functionality
        const profileDropdownBtn = document.getElementById('profileDropdownBtn');
        const profileDropdown = document.getElementById('profileDropdown');
        
        // Toggle dropdown visibility when profile button is clicked
        if (profileDropdownBtn && profileDropdown) {
            profileDropdownBtn.addEventListener('click', () => {
                profileDropdown.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', (event) => {
                if (!profileDropdownBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });
        }

        // Apply theme when page loads
        document.addEventListener('DOMContentLoaded', applyInitialTheme);
        // Apply theme immediately in case the script runs after DOMContentLoaded
        applyInitialTheme();

        // Handle window resize to adjust sidebar visibility
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) { // md breakpoint in Tailwind
                if (sidebar) sidebar.classList.remove('-translate-x-full');
                if (sidebarOverlay) sidebarOverlay.classList.add('hidden');
            } else {
                if (sidebar) sidebar.classList.add('-translate-x-full');
            }
        });

        // File upload preview functionality
        const handleFilePreview = (input, previewId) => {
            if (input) {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            // You can add image preview functionality here if needed
                            console.log('File selected:', file.name);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        };

        // Initialize file upload previews
        const thumbnailInput = document.getElementById('thumbnail');
        const fullSizeInput = document.getElementById('full_image');
        
        handleFilePreview(thumbnailInput, 'thumbnailPreview');
        handleFilePreview(fullSizeInput, 'fullSizePreview');
</script>

</body>
</html>