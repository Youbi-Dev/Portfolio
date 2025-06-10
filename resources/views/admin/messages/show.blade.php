<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Details - Admin</title>
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

            <!-- Success Message -->
            @if (session('success'))
            <div class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('messages.index') }}" class="inline-flex items-center text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-150">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Messages
                </a>
            </div>

            <div class="p-6 bg-white dark:bg-white/[0.03] rounded-lg shadow">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                            Message Details
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            Viewing message from {{ $contactMessage->name }}
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="flex space-x-2">
                        @if ($contactMessage->read)
                            <form action="{{ route('messages.markAsUnread', $contactMessage->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 dark:focus:ring-offset-gray-900 transition-colors duration-150">
                                    <i class="fas fa-envelope mr-1"></i> Mark as Unread
                                </button>
                            </form>
                        @else
                            <form action="{{ route('messages.markAsRead', $contactMessage->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-900 transition-colors duration-150">
                                    <i class="fas fa-check-circle mr-1"></i> Mark as Read
                                </button>
                            </form>
                        @endif

                        <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-900 transition-colors duration-150"
                                onclick="openDeleteModal({{ $contactMessage->id }}, '{{ addslashes($contactMessage->name) }}', '{{ addslashes($contactMessage->subject) }}')">
                            <i class="fas fa-trash mr-1"></i> Delete Message
                        </button>

                        {{-- Optionally add a Reply button if you implement reply functionality --}}
                        {{-- <a href="{{ route('messages.reply', $contactMessage->id) }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900 transition-colors duration-150">
                            <i class="fas fa-reply mr-1"></i> Reply
                        </a> --}}
                    </div>
                </div>

                <!-- Message Details -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 flex items-center">
                                <i class="fas fa-user mr-2 text-gray-400"></i> Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2 sm:mt-0 font-medium">{{ $contactMessage->name }}</dd>
                        </div>
                        <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 flex items-center">
                                <i class="fas fa-envelope mr-2 text-gray-400"></i> Email Address
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2 sm:mt-0">
                                <a href="mailto:{{ $contactMessage->email }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors duration-150">
                                    {{ $contactMessage->email }}
                                </a>
                            </dd>
                        </div>
                        <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 flex items-center">
                                <i class="fas fa-subject mr-2 text-gray-400"></i> Subject
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2 sm:mt-0 font-medium">{{ $contactMessage->subject }}</dd>
                        </div>
                        <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 flex items-center">
                                <i class="fas fa-clock mr-2 text-gray-400"></i> Received At
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2 sm:mt-0">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                    <span class="font-medium">{{ $contactMessage->created_at->format('M d, Y') }}</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $contactMessage->created_at->format('g:i A') }}</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">({{ $contactMessage->created_at->diffForHumans() }})</span>
                                </div>
                            </dd>
                        </div>
                        <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 flex items-start">
                                <i class="fas fa-comment-alt mr-2 text-gray-400 mt-0.5"></i> Message
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2 sm:mt-0">
                                <div class="bg-gray-50 dark:bg-gray-800/50 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                                    <p class="whitespace-pre-wrap leading-relaxed">{{ $contactMessage->message }}</p>
                                </div>
                            </dd>
                        </div>
                        <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 flex items-center">
                                <i class="fas fa-info-circle mr-2 text-gray-400"></i> Status
                            </dt>
                            <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">
                                @if ($contactMessage->read)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                        <i class="fas fa-check-circle mr-1"></i> Read
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                        <i class="fas fa-exclamation-circle mr-1"></i> Unread
                                    </span>
                                @endif
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </main>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background backdrop -->
        <div class="fixed inset-0 bg-gray-500/75 dark:bg-gray-900/75 transition-opacity duration-300 ease-out opacity-0" id="modalBackdrop"></div>
        
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!-- Modal panel -->
                <div id="modalPanel" class="relative transform overflow-hidden rounded-lg bg-white dark:bg-gray-800 text-left shadow-xl transition-all duration-300 ease-out opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/20 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-base font-semibold text-gray-900 dark:text-white" id="modal-title">Delete Message</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-300">
                                        Are you sure you want to delete the message from <span id="messageName" class="font-medium"></span> with subject <span id="messageSubject" class="font-medium"></span>? This action cannot be undone and the message will be permanently removed.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <form id="deleteForm" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 sm:ml-3 sm:w-auto transition-colors duration-150">
                                <i class="fas fa-trash mr-2"></i> Delete Message
                            </button>
                        </form>
                        <button type="button" onclick="closeDeleteModal()" class="mt-3 inline-flex w-full justify-center rounded-md bg-white dark:bg-gray-600 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-white shadow-sm ring-1 ring-gray-300 dark:ring-gray-500 hover:bg-gray-50 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-400 sm:mt-0 sm:w-auto transition-colors duration-150">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
        function applyInitialTheme() {
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
        }

        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const openSidebarBtn = document.getElementById('openSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');

        const openSidebar = () => {
            if (sidebar) sidebar.classList.remove('-translate-x-full');
            if (sidebarOverlay) sidebarOverlay.classList.remove('hidden');
        };

        const closeSidebar = () => {
            if (sidebar) sidebar.classList.add('-translate-x-full');
            if (sidebarOverlay) sidebarOverlay.classList.add('hidden');
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

        // Delete Modal Functions
        function openDeleteModal(messageId, messageName, messageSubject) {
            const modal = document.getElementById('deleteModal');
            const backdrop = document.getElementById('modalBackdrop');
            const panel = document.getElementById('modalPanel');
            const form = document.getElementById('deleteForm');
            const nameSpan = document.getElementById('messageName');
            const subjectSpan = document.getElementById('messageSubject');

            // Set the form action URL
            form.action = `/admin/messages/${messageId}`;

            // Set the message details in the modal
            nameSpan.textContent = messageName;
            subjectSpan.textContent = `"${messageSubject}"`;

            // Show modal with animation
            modal.classList.remove('hidden');

            // Trigger animations
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                panel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
                panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
            }, 10);
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const backdrop = document.getElementById('modalBackdrop');
            const panel = document.getElementById('modalPanel');

            // Hide with animation
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
            panel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Close modal when clicking backdrop
        const modalBackdrop = document.getElementById('modalBackdrop');
        if (modalBackdrop) {
            modalBackdrop.addEventListener('click', closeDeleteModal);
        }

        // Close modal with Escape key
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                const modal = document.getElementById('deleteModal');
                if (modal && !modal.classList.contains('hidden')) {
                    closeDeleteModal();
                }
            }
        });

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
    </script>
</body>
</html>