<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Admin</title>
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
        {{ isset($profile->id) ? 'Edit Your Profile' : 'Create Your Profile' }}
    </h2>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            <!-- Basic Information Section -->
            <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Basic Information</h3>

                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <!-- First Name -->
                    <div class="sm:col-span-3">
                        <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $profile->first_name ?? '') }}" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="sm:col-span-3">
                        <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $profile->last_name ?? '') }}" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Title -->
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-6">
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $profile->title ?? '') }}" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @error('title') 
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Bio -->
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-6">
                    <div class="sm:col-span-6">
                        <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
                        <textarea name="bio" id="bio" rows="4" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Media and Files Section -->
            <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Media & Files</h3>

                <!-- Profile Image -->
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                    <div class="sm:col-span-6">
                        <label for="profile_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Profile Image
                            <span class="text-gray-500 dark:text-gray-400 text-xs ml-2">(Choose an image file)</span>
                        </label>
                        <input type="file" name="profile_image" id="profile_image" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @if (isset($profile->profile_image) && $profile->profile_image)
                            <div class="mt-2 flex items-center">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mr-2">Current Image:</p>
                                <img src="{{ Storage::url($profile->profile_image) }}" alt="Current Profile" class="h-16 w-16 object-cover rounded-full">
                                <a href="{{ Storage::url($profile->profile_image) }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline ml-2">View Full Size</a>
                            </div>
                        @endif
                        @error('profile_image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Resume File Upload -->
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 border border-gray-200 dark:border-gray-700 rounded-md p-4 mt-4">
                    <div class="sm:col-span-6">
                        <label for="resume_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Resume/CV
                            <span class="text-gray-500 dark:text-gray-400 text-xs ml-2">(PDF, DOC, DOCX formats only)</span>
                        </label>
                        <input type="file" name="resume_file" id="resume_file" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @if (isset($profile->resume_file) && $profile->resume_file)
                            <div class="mt-2 flex items-center">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mr-2">Current Resume:</p>
                                <a href="{{ Storage::url($profile->resume_file) }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">View File</a>
                            </div>
                        @endif
                        @error('resume_file')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Social Media Links Section -->
            <div class="pb-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Social Media Links</h3>
                
                <div id="social-media-links-container" class="space-y-4">
                    @if(isset($profile->social_media_links) && is_array($profile->social_media_links) && count($profile->social_media_links) > 0)
                        @foreach($profile->social_media_links as $index => $link)
                            <div class="grid grid-cols-1 gap-y-4 gap-x-4 sm:grid-cols-6 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                                <div class="sm:col-span-2">
                                    <label for="social_media_links_{{ $index }}_platform" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Platform</label>
                                    <div class="relative">
                                        <select name="social_media_links[{{ $index }}][platform]" id="social_media_links_{{ $index }}_platform" class="social-media-select mt-1 block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <option value="">Select Platform</option>
                                            <!-- Options will be populated by JavaScript -->
                                        </select>
                                        <input type="hidden" name="social_media_links[{{ $index }}][icon_class]" id="social_media_links_{{ $index }}_icon_class" value="{{ old('social_media_links.'.$index.'.icon_class', $link['icon_class'] ?? '') }}">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="social_media_links_{{ $index }}_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL</label>
                                    <input type="url" name="social_media_links[{{ $index }}][url]" id="social_media_links_{{ $index }}_url" value="{{ old('social_media_links.'.$index.'.url', $link['url'] ?? '') }}" class="mt-1 block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                                <div class="sm:col-span-1 flex items-end">
                                    <div class="text-center">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Preview</label>
                                        <div class="icon-preview w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-gray-600 rounded-md">
                                            @if(isset($link['icon_class']) && $link['icon_class'])
                                                <i class="{{ $link['icon_class'] }} text-xl text-gray-600 dark:text-gray-300"></i>
                                            @else
                                                <span class="text-gray-400 text-xs">Icon</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Remove Button -->
                                <div class="sm:col-span-6 flex justify-end mt-2">
                                    <button type="button" class="remove-social-media-link text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600 text-sm">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default empty field if no social media links exist -->
                        <div class="grid grid-cols-1 gap-y-4 gap-x-4 sm:grid-cols-6 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                            <div class="sm:col-span-2">
                                <label for="social_media_links_0_platform" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Platform</label>
                                <div class="relative">
                                    <select name="social_media_links[0][platform]" id="social_media_links_0_platform" class="social-media-select mt-1 block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <option value="">Select Platform</option>
                                        <!-- Options will be populated by JavaScript -->
                                    </select>
                                    <input type="hidden" name="social_media_links[0][icon_class]" id="social_media_links_0_icon_class" value="">
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="social_media_links_0_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL</label>
                                <input type="url" name="social_media_links[0][url]" id="social_media_links_0_url" value="" class="mt-1 block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            <div class="sm:col-span-1 flex items-end">
                                <div class="text-center">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Preview</label>
                                    <div class="icon-preview w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-gray-600 rounded-md">
                                        <span class="text-gray-400 text-xs">Icon</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Remove Button -->
                            <div class="sm:col-span-6 flex justify-end mt-2">
                                <button type="button" class="remove-social-media-link text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600 text-sm">Remove</button>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Button to add more social media links -->
                <button type="button" id="add-social-media-link" class="mt-4 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-900">
                    Add Another Link
                </button>
            </div>

            <!-- Availability Status Section -->
            <div class="pb-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Availability Status</h3>

                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="availability_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Availability Status</label>
                        <select id="availability_status" name="availability_status" class="mt-1 block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="1" {{ (isset($profile->availability_status) && $profile->availability_status == 1) ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ (isset($profile->availability_status) && $profile->availability_status == 0) ? 'selected' : '' }}>Unavailable</option>
                        </select>
                        @error('availability_status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-indigo-700 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-900">
                {{ isset($profile->id) ? 'Update Profile' : 'Create Profile' }}
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Social Media Icons Library
    const socialMediaIcons = {
        'Facebook': 'fab fa-facebook-f',
        'Twitter': 'fab fa-twitter',
        'Instagram': 'fab fa-instagram',
        'LinkedIn': 'fab fa-linkedin-in',
        'YouTube': 'fab fa-youtube',
        'TikTok': 'fab fa-tiktok',
        'Snapchat': 'fab fa-snapchat-ghost',
        'Pinterest': 'fab fa-pinterest-p',
        'WhatsApp': 'fab fa-whatsapp',
        'Telegram': 'fab fa-telegram-plane',
        'Discord': 'fab fa-discord',
        'Twitch': 'fab fa-twitch',
        'Reddit': 'fab fa-reddit-alien',
        'Tumblr': 'fab fa-tumblr',
        'Flickr': 'fab fa-flickr',
        'Vimeo': 'fab fa-vimeo-v',
        'Dribbble': 'fab fa-dribbble',
        'Behance': 'fab fa-behance',
        'GitHub': 'fab fa-github',
        'GitLab': 'fab fa-gitlab',
        'Stack Overflow': 'fab fa-stack-overflow',
        'Medium': 'fab fa-medium-m',
        'Dev.to': 'fab fa-dev',
        'CodePen': 'fab fa-codepen',
        'Spotify': 'fab fa-spotify',
        'SoundCloud': 'fab fa-soundcloud',
        'Apple Music': 'fab fa-apple',
        'Skype': 'fab fa-skype',
        'Slack': 'fab fa-slack',
        'Microsoft Teams': 'fab fa-microsoft',
        'Zoom': 'fas fa-video',
        'Email': 'fas fa-envelope',
        'Website': 'fas fa-globe',
        'Phone': 'fas fa-phone',
        'RSS': 'fas fa-rss'
    };

    // Function to get available icons (not already selected)
    function getAvailableIcons(currentSelect = null) {
        const selectedIcons = [];
        document.querySelectorAll('.social-media-select').forEach(select => {
            if (select !== currentSelect && select.value) {
                selectedIcons.push(select.value);
            }
        });
        
        const availableIcons = {};
        Object.keys(socialMediaIcons).forEach(platform => {
            if (!selectedIcons.includes(platform)) {
                availableIcons[platform] = socialMediaIcons[platform];
            }
        });
        
        return availableIcons;
    }

    // Function to populate select options
    function populateSelectOptions(select, selectedValue = '') {
        const availableIcons = getAvailableIcons(select);
        
        // Clear existing options except the first one
        select.innerHTML = '<option value="">Select Platform</option>';
        
        // Add available options
        Object.keys(availableIcons).forEach(platform => {
            const option = document.createElement('option');
            option.value = platform;
            option.textContent = platform;
            if (platform === selectedValue) {
                option.selected = true;
            }
            select.appendChild(option);
        });
        
        // If the selected value is not available anymore, add it as disabled
        if (selectedValue && !availableIcons[selectedValue]) {
            const option = document.createElement('option');
            option.value = selectedValue;
            option.textContent = selectedValue + ' (Already selected)';
            option.selected = true;
            option.disabled = true;
            select.appendChild(option);
        }
    }

    // Function to update icon preview
    function updateIconPreview(select) {
        const container = select.closest('.grid');
        const iconPreview = container.querySelector('.icon-preview');
        const hiddenInput = container.querySelector('input[type="hidden"]');
        
        if (select.value && socialMediaIcons[select.value]) {
            const iconClass = socialMediaIcons[select.value];
            iconPreview.innerHTML = `<i class="${iconClass} text-xl text-gray-600 dark:text-gray-300"></i>`;
            hiddenInput.value = iconClass;
        } else {
            iconPreview.innerHTML = '<span class="text-gray-400 text-xs">Icon</span>';
            hiddenInput.value = '';
        }
    }

    // Function to refresh all selects
    function refreshAllSelects() {
        document.querySelectorAll('.social-media-select').forEach(select => {
            const currentValue = select.value;
            populateSelectOptions(select, currentValue);
        });
    }

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
    
    if (profileDropdownBtn && profileDropdown) {
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

    document.addEventListener('DOMContentLoaded', function() {
        // Social Media Links - Add and Remove Functionality
        const socialMediaLinksContainer = document.getElementById('social-media-links-container');
        const addSocialMediaLinkButton = document.getElementById('add-social-media-link');

        if (addSocialMediaLinkButton && socialMediaLinksContainer) {
            // Initialize existing selects
            document.querySelectorAll('.social-media-select').forEach(select => {
                // Get the current selected value from the hidden input or data attribute
                const container = select.closest('.grid');
                const hiddenInput = container.querySelector('input[type="hidden"]');
                let selectedPlatform = '';
                
                // Find platform by icon class
                if (hiddenInput && hiddenInput.value) {
                    Object.keys(socialMediaIcons).forEach(platform => {
                        if (socialMediaIcons[platform] === hiddenInput.value) {
                            selectedPlatform = platform;
                        }
                    });
                }
                
                populateSelectOptions(select, selectedPlatform);
                updateIconPreview(select);
                
                // Add change event listener
                select.addEventListener('change', function() {
                    updateIconPreview(this);
                    refreshAllSelects();
                });
            });

            // Function to update indices after adding or removing
            function updateSocialMediaLinkIndices() {
                const items = socialMediaLinksContainer.querySelectorAll('.grid');
                items.forEach((item, index) => {
                    item.querySelectorAll('input, select, textarea').forEach(input => {
                        const name = input.getAttribute('name');
                        if (name) {
                            input.setAttribute('name', name.replace(/social_media_links\[\d+\]/, `social_media_links[${index}]`));
                        }
                        const id = input.getAttribute('id');
                        if (id) {
                            input.setAttribute('id', id.replace(/social_media_links_\d+_/, `social_media_links_${index}_`));
                        }
                    });
                });
            }

            // Function to add remove button listener
            function addRemoveButtonListener(button) {
                button.addEventListener('click', function() {
                    // If this is the last social media link, clear the fields instead of removing
                    if (socialMediaLinksContainer.querySelectorAll('.grid').length === 1) {
                        const container = this.closest('.grid');
                        const select = container.querySelector('.social-media-select');
                        const urlInput = container.querySelector('input[type="url"]');
                        const hiddenInput = container.querySelector('input[type="hidden"]');
                        const iconPreview = container.querySelector('.icon-preview');
                        
                        select.value = '';
                        urlInput.value = '';
                        hiddenInput.value = '';
                        iconPreview.innerHTML = '<span class="text-gray-400 text-xs">Icon</span>';
                        
                        refreshAllSelects();
                    } else {
                        this.closest('.grid').remove();
                        updateSocialMediaLinkIndices();
                        refreshAllSelects();
                    }
                });
            }

            // Add event listeners to existing remove buttons
            document.querySelectorAll('.remove-social-media-link').forEach(button => {
                addRemoveButtonListener(button);
            });

            // Add new social media link
            addSocialMediaLinkButton.addEventListener('click', function() {
                const items = socialMediaLinksContainer.querySelectorAll('.grid');
                const newIndex = items.length;
                
                const newItem = document.createElement('div');
                newItem.classList.add('grid', 'grid-cols-1', 'gap-y-4', 'gap-x-4', 'sm:grid-cols-6', 'border', 'border-gray-200', 'dark:border-gray-700', 'rounded-md', 'p-4');
                
                newItem.innerHTML = `
                    <div class="sm:col-span-2">
                        <label for="social_media_links_${newIndex}_platform" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Platform</label>
                        <div class="relative">
                            <select name="social_media_links[${newIndex}][platform]" id="social_media_links_${newIndex}_platform" class="social-media-select mt-1 block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="">Select Platform</option>
                            </select>
                            <input type="hidden" name="social_media_links[${newIndex}][icon_class]" id="social_media_links_${newIndex}_icon_class" value="">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="social_media_links_${newIndex}_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL</label>
                        <input type="url" name="social_media_links[${newIndex}][url]" id="social_media_links_${newIndex}_url" value="" class="mt-1 block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                    <div class="sm:col-span-1 flex items-end">
                        <div class="text-center">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Preview</label>
                            <div class="icon-preview w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-gray-600 rounded-md">
                                <span class="text-gray-400 text-xs">Icon</span>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-6 flex justify-end mt-2">
                        <button type="button" class="remove-social-media-link text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600 text-sm">Remove</button>
                    </div>
                `;
                
                socialMediaLinksContainer.appendChild(newItem);
                
                // Initialize the new select
                const newSelect = newItem.querySelector('.social-media-select');
                populateSelectOptions(newSelect);
                
                // Add event listeners
                newSelect.addEventListener('change', function() {
                    updateIconPreview(this);
                    refreshAllSelects();
                });
                
                addRemoveButtonListener(newItem.querySelector('.remove-social-media-link'));
            });
        }
    });
</script>

</body>
</html>