<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>John Doe | Full-Stack Developer & UI/UX Designer</title>
    <meta name="description" content="Experienced full-stack developer specializing in React, Next.js, and modern web technologies. Available for freelance projects and full-time opportunities.">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#2465ED',
                            foreground: '#FFFFFF',
                        },
                        background: 'hsl(var(--background))',
                        foreground: 'hsl(var(--foreground))',
                        muted: {
                            DEFAULT: 'hsl(var(--muted))',
                            foreground: 'hsl(var(--muted-foreground))',
                        },
                        border: 'hsl(var(--border))',
                    },
                    fontFamily: {
                        mono: ['Monaco', 'Menlo', 'Ubuntu Mono', 'monospace'],
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 5px rgba(36, 101, 237, 0.5)' },
                            '100%': { boxShadow: '0 0 20px rgba(36, 101, 237, 0.8)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- CSS Variables and Custom Styles -->
    <style>
        :root {
            --background: 0 0% 100%;
            --foreground: 222.2 84% 4.9%;
            --muted: 210 40% 96.1%;
            --muted-foreground: 215.4 16.3% 46.9%;
            --border: 214.3 31.8% 91.4%;
        }

        .dark {
            --background: 222.2 84% 4.9%;
            --foreground: 210 40% 98%;
            --muted: 217.2 32.6% 17.5%;
            --muted-foreground: 215 20.2% 65.1%;
            --border: 217.2 32.6% 17.5%;
        }

        * {
            border-color: hsl(var(--border));
        }

        body {
            background-color: hsl(var(--background));
            color: hsl(var(--foreground));
        }

        /* Grid Background */
        .grid-background {
            background-image: 
                linear-gradient(to right, rgba(36, 101, 237, 0.2) 0.5px, transparent 0.5px),
                linear-gradient(to bottom, rgba(36, 101, 237, 0.2) 0.5px, transparent 0.5px);
            background-size: 80px 80px;
            mask-image: radial-gradient(circle at center, transparent 20%, black 70%);
            -webkit-mask-image: radial-gradient(circle at center, transparent 20%, black 70%);
        }

        .grid-gradient {
            background: radial-gradient(70% 70% at 50% 50%, transparent 0%, rgba(36, 101, 237, 0.05) 100%);
        }

        /* Spotlight Effects */
        .spotlight {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .spotlight-main {
            width: 1000px;
            height: 1000px;
            background: radial-gradient(circle, rgba(36, 101, 237, 0.2) 0%, transparent 70%);
            transform: translate(-50%, -50%);
        }

        .spotlight-secondary {
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.15) 0%, transparent 70%);
            animation: float 15s ease-in-out infinite;
        }

        .spotlight-tertiary {
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%);
            animation: float 18s ease-in-out infinite reverse;
        }

        /* Dark mode adjustments */
        .dark .spotlight-main {
            background: radial-gradient(circle, rgba(36, 101, 237, 0.25) 0%, transparent 70%);
        }

        .dark .spotlight-secondary {
            background: radial-gradient(circle, rgba(236, 72, 153, 0.2) 0%, transparent 70%);
        }

        .dark .spotlight-tertiary {
            background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, transparent 70%);
        }

        /* Typing Animation */
        .typing-cursor {
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }

        /* Progress Bar Animation */
        .progress-bar {
            transition: width 1s ease-in-out;
        }

        /* Card Hover Effects */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: hsl(var(--muted));
        }

        ::-webkit-scrollbar-thumb {
            background: #2465ED;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #1d4ed8;
        }

        /* Button Animations */
        .btn-glow {
            position: relative;
            overflow: hidden;
        }

        .btn-glow::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-glow:hover::before {
            left: 100%;
        }

        /* Modal Animations */
        .modal-backdrop {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .modal-content {
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Form Animations */
        .form-field {
            transition: all 0.3s ease;
        }

        .form-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(36, 101, 237, 0.15);
        }

        /* Navigation Active State */
        .nav-active {
            background: rgba(36, 101, 237, 0.1);
            color: #2465ED;
            border: 1px solid rgba(36, 101, 237, 0.2);
        }

        /* Loading Animation */
        .loading-spinner {
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 2px solid #ffffff;
            width: 16px;
            height: 16px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Project Filter Animation */
        .project-item {
            transition: all 0.3s ease;
        }

        .project-item.hidden {
            opacity: 0;
            transform: scale(0.8);
            pointer-events: none;
        }

        /* Skill Bar Animation */
        .skill-bar {
            position: relative;
            overflow: hidden;
        }

        .skill-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { width: 0; left: 0; }
            50% { width: 100%; left: 0; }
            100% { width: 0; left: 100%; }
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-sm border-b border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-4 flex items-center justify-between h-16">
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="4" y="3" width="16" height="18" rx="2" ry="2"></rect>
                    <line x1="8" y1="9" x2="16" y2="9"></line>
                    <line x1="8" y1="13" x2="16" y2="13"></line>
                    <line x1="8" y1="17" x2="16" y2="17"></line>
                </svg>
                <span class="text-xl font-mono font-bold">
                    <span class="text-primary">$</span> john_doe
                </span>
            </div>

            <div class="hidden md:flex gap-1" id="nav-links">
                <a href="#about" class="nav-link px-4 py-2 text-sm font-mono transition-all duration-300 rounded-md text-gray-600 hover:text-primary hover:bg-primary/5">.about()</a>
                <a href="#skills" class="nav-link px-4 py-2 text-sm font-mono transition-all duration-300 rounded-md text-gray-600 hover:text-primary hover:bg-primary/5">.skills()</a>
                <a href="#projects" class="nav-link px-4 py-2 text-sm font-mono transition-all duration-300 rounded-md text-gray-600 hover:text-primary hover:bg-primary/5">.projects()</a>
                <a href="#contact" class="nav-link px-4 py-2 text-sm font-mono transition-all duration-300 rounded-md text-gray-600 hover:text-primary hover:bg-primary/5">.contact()</a>
            </div>

            <div class="flex items-center gap-4">
                <button id="theme-toggle" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

                <a href="#contact" class="hidden md:flex items-center gap-2 px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-md font-mono text-sm btn-glow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="4" y="3" width="16" height="18" rx="2" ry="2"></rect>
                        <line x1="8" y1="9" x2="16" y2="9"></line>
                        <line x1="8" y1="13" x2="16" y2="13"></line>
                        <line x1="8" y1="17" x2="16" y2="17"></line>
                    </svg>
                    contact()
                </a>

                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
            <div class="px-4 py-4 space-y-2">
                <a href="#about" class="block px-4 py-2 text-lg font-mono hover:text-primary">.about()</a>
                <a href="#skills" class="block px-4 py-2 text-lg font-mono hover:text-primary">.skills()</a>
                <a href="#projects" class="block px-4 py-2 text-lg font-mono hover:text-primary">.projects()</a>
                <a href="#contact" class="block px-4 py-2 text-lg font-mono hover:text-primary">.contact()</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Grid Background -->
        <div class="absolute inset-0 grid-background opacity-40"></div>
        <div class="absolute inset-0 grid-gradient"></div>

        <!-- Spotlight Effects -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div id="spotlight-main" class="spotlight spotlight-main" style="left: 50%; top: 33%;"></div>
            <div class="spotlight spotlight-secondary" style="left: 20%; top: 30%;"></div>
            <div class="spotlight spotlight-tertiary" style="right: 20%; bottom: 30%;"></div>
        </div>

        <div class="container mx-auto px-4 py-16 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12 max-w-6xl mx-auto">
                <!-- Terminal -->
                <div class="flex-1 w-full">
                    <div class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6 font-mono text-sm">
                        <div class="flex items-center gap-2 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex gap-1">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                            </div>
                            <span class="text-gray-500">~/portfolio</span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <span class="text-primary">$</span>
                                <span class="text-gray-500">whoami</span>
                            </div>
                            <div>john_doe</div>

                            <div class="flex items-center gap-2 mt-4">
                                <span class="text-primary">$</span>
                                <span class="text-gray-500">cat about.txt</span>
                            </div>
                            <div>
                                <div>Name: John Doe</div>
                                <div>Role: Full-Stack Developer</div>
                               <!-- <div>Location: San Francisco, CA</div>-->
                                <div>Status: <span class="text-green-500">Available</span></div>
                            </div>

                            <div class="flex items-center gap-2 mt-4">
                                <span class="text-primary">$</span>
                                <span class="text-gray-500">ls skills/</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1">
                                <span class="text-blue-400">react.js</span>
                                <span class="text-green-400">node.js</span>
                                <span class="text-cyan-400">typescript</span>
                                <span class="text-purple-400">python</span>
                                <span class="text-orange-400">aws</span>
                                <span class="text-pink-400">docker</span>
                            </div>

                            <div class="flex items-center gap-2 mt-4">
                                <span class="text-primary">$</span>
                                <span class="text-green-500 typing-cursor">█</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile -->
                <div class="flex-1 text-center lg:text-left">
                    <div class="space-y-6">
                        <div>
                            <div class="inline-block rounded-lg bg-primary/10 border border-primary/20 px-3 py-1 text-sm font-mono mb-4">
                                <span class="text-primary">&lt;</span>developer<span class="text-primary">/&gt;</span>
                            </div>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-4">
                                <span class="font-mono text-gray-500 text-lg block mb-2">const developer = {</span>
                                <span class="block ml-4">name: <span class="text-primary">"John Doe"</span>,</span>
                                <span class="block ml-4">role: <span class="text-primary">"Full-Stack"</span></span>
                                <span class="font-mono text-gray-500 text-lg block mt-2">}</span>
                            </h1>
                            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mb-6">
                                I craft scalable web applications with clean code and modern technologies. Passionate about solving complex problems and creating exceptional user experiences.
                            </p>
                        </div>

                        <!-- Status and Social -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-center lg:justify-start gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-sm font-mono text-gray-500">
                                    status: <span class="text-green-500">available_for_hire</span>
                                </span>
                            </div>

                            <div class="flex justify-center lg:justify-start gap-3">
                                <a href="https://github.com" class="p-3 rounded-lg bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-200 dark:border-gray-700 hover:bg-primary hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </a>
                                <a href="https://linkedin.com" class="p-3 rounded-lg bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-200 dark:border-gray-700 hover:bg-primary hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="https://twitter.com" class="p-3 rounded-lg bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-200 dark:border-gray-700 hover:bg-primary hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                            <button class="flex items-center gap-2 px-6 py-3 bg-primary hover:bg-primary/90 text-white font-mono rounded-lg btn-glow transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                download_resume()
                            </button>
                            <a href="#contact" class="flex items-center justify-center gap-2 px-6 py-3 border border-gray-300 dark:border-gray-600 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 font-mono rounded-lg transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="4" y="3" width="16" height="18" rx="2" ry="2"></rect>
                                    <line x1="8" y1="9" x2="16" y2="9"></line>
                                    <line x1="8" y1="13" x2="16" y2="13"></line>
                                    <line x1="8" y1="17" x2="16" y2="17"></line>
                                </svg>
                                get_in_touch()
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interactive Command Line -->
            <div class="mt-16 max-w-3xl mx-auto">
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-primary/30 to-primary/30 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000"></div>
                    <div class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg">
                        <div class="flex items-center gap-2 px-4 py-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                            <div class="flex gap-1">
                                <div class="w-2 h-2 rounded-full bg-red-500"></div>
                                <div class="w-2 h-2 rounded-full bg-yellow-500"></div>
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                            </div>
                            <span class="text-xs font-mono text-gray-500">terminal</span>
                        </div>
                        <div class="flex items-center p-4">
                            <span class="text-primary font-mono mr-2">$</span>
                            <input id="typing-input" class="flex-1 bg-transparent font-mono text-sm focus:outline-none" readonly>
                            <span class="text-primary font-mono ml-1 typing-cursor">█</span>
                            <button class="ml-4 p-2 bg-primary/90 hover:bg-primary text-white rounded transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50/50 dark:bg-gray-900/50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
                <div class="inline-block rounded-lg bg-primary/10 border border-primary/20 px-3 py-1 text-sm font-mono mb-2">
                    <span class="text-primary">&lt;</span>about<span class="text-primary">/&gt;</span>
                </div>
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl">Developer Profile</h2>
                <p class="max-w-2xl text-gray-600 dark:text-gray-300 md:text-xl font-mono">
                    // Passionate about clean code and innovative solutions
                </p>
            </div>

            <div class="grid gap-6 lg:grid-cols-2 lg:gap-12 items-start max-w-6xl mx-auto">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Code Block Bio -->
                    <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6 card-hover">
                        <div class="font-mono text-sm space-y-2">
                            <div class="text-gray-500">// Professional Background</div>
                            <div><span class="text-purple-400">class</span> <span class="text-blue-400">Developer</span> <span class="text-gray-500">{</span></div>
                            <div class="ml-4">
                                <div><span class="text-green-400">experience</span>: <span class="text-orange-400">"5+ years"</span>,</div>
                                <div><span class="text-green-400">passion</span>: <span class="text-orange-400">"problem_solving"</span>,</div>
                                <div><span class="text-green-400">focus</span>: <span class="text-orange-400">"full_stack_development"</span>,</div>
                                <div><span class="text-green-400">specialty</span>: <span class="text-orange-400">"modern_web_technologies"</span></div>
                            </div>
                            <div class="text-gray-500">}</div>
                        </div>
                        <div class="mt-4 text-gray-600 dark:text-gray-300">
                            Started my journey with curiosity about how web applications work. Now I specialize in building scalable, efficient solutions using cutting-edge technologies.
                        </div>
                    </div>

                    <!-- Career Goals -->
                    <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6 card-hover">
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <h3 class="text-xl font-bold">Career Objectives</h3>
                        </div>
                        <div class="space-y-3 text-gray-600 dark:text-gray-300">
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-primary mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                                <span>Build innovative applications that solve real-world problems</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-primary mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span>Collaborate with talented teams on challenging projects</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-primary mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span>Continuously learn and adapt to emerging technologies</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Status Dashboard -->
                    <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6 card-hover">
                        <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            Current Status
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-100 dark:bg-gray-700/50">
                                <div class="flex items-center gap-3">
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    <span class="font-medium">Availability</span>
                                </div>
                                <span class="text-green-500 font-mono text-sm">OPEN_TO_WORK</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-100 dark:bg-gray-700/50">
                                <div class="flex items-center gap-3">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="font-medium">Location</span>
                                </div>
                                <span class="text-gray-600 dark:text-gray-300 font-mono text-sm">SF_BAY_AREA</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-100 dark:bg-gray-700/50">
                                <div class="flex items-center gap-3">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="font-medium">Start Date</span>
                                </div>
                                <span class="text-gray-600 dark:text-gray-300 font-mono text-sm">IMMEDIATE</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-100 dark:bg-gray-700/50">
                                <div class="flex items-center gap-3">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m8 6V9a2 2 0 00-2-2H10a2 2 0 00-2 2v3.1M21 21l-6-6m6 6v-4.5m0 4.5h-4.5"></path>
                                    </svg>
                                    <span class="font-medium">Work Type</span>
                                </div>
                                <span class="text-gray-600 dark:text-gray-300 font-mono text-sm">FULL_TIME | REMOTE</span>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Story -->
                    <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6 card-hover">
                        <h3 class="text-xl font-bold mb-4">Origin Story</h3>
                        <div class="space-y-4 text-gray-600 dark:text-gray-300">
                            <p>My coding journey began in college when I built my first website for a local business. The thrill of seeing code transform into a functional solution was addictive.</p>
                            <p>Since then, I've worked with startups and established companies, always focusing on writing maintainable code and creating exceptional user experiences.</p>
                            <div class="pt-4">
                                <button class="w-full font-mono border border-gray-300 dark:border-gray-600 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 px-4 py-2 rounded-lg transition-all duration-300 btn-glow">
                                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    download_resume.pdf()
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
                <div class="inline-block rounded-lg bg-primary/10 border border-primary/20 px-3 py-1 text-sm font-mono mb-2">
                    <span class="text-primary">&lt;</span>skills<span class="text-primary">/&gt;</span>
                </div>
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl">Technical Stack</h2>
                <p class="max-w-2xl text-gray-600 dark:text-gray-300 md:text-xl font-mono">
                    // Proficiency levels across different technologies
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-6xl mx-auto">
                <!-- Frontend -->
                <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6 card-hover">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-2xl">🎨</span>
                        <div>
                            <div class="font-mono text-lg font-bold">Frontend</div>
                            <div class="text-sm text-gray-500 font-mono">./frontend/</div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">React/Next.js</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">95%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-blue-500 rounded-full progress-bar" style="width: 0%" data-width="95"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">TypeScript</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">90%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-blue-600 rounded-full progress-bar" style="width: 0%" data-width="90"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">Tailwind CSS</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">88%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-cyan-500 rounded-full progress-bar" style="width: 0%" data-width="88"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">Vue.js</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">75%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-green-500 rounded-full progress-bar" style="width: 0%" data-width="75"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Backend -->
                <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6 card-hover">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-2xl">⚙️</span>
                        <div>
                            <div class="font-mono text-lg font-bold">Backend</div>
                            <div class="text-sm text-gray-500 font-mono">./backend/</div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">Node.js</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">92%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-green-600 rounded-full progress-bar" style="width: 0%" data-width="92"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">Python</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">85%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-yellow-500 rounded-full progress-bar" style="width: 0%" data-width="85"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">PostgreSQL</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">80%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-blue-700 rounded-full progress-bar" style="width: 0%" data-width="80"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">MongoDB</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">78%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-green-700 rounded-full progress-bar" style="width: 0%" data-width="78"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DevOps -->
                <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6 card-hover">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-2xl">🚀</span>
                        <div>
                            <div class="font-mono text-lg font-bold">DevOps</div>
                            <div class="text-sm text-gray-500 font-mono">./devops/</div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">Docker</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">85%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-blue-400 rounded-full progress-bar" style="width: 0%" data-width="85"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">AWS</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">80%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-orange-500 rounded-full progress-bar" style="width: 0%" data-width="80"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">Kubernetes</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">70%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-purple-500 rounded-full progress-bar" style="width: 0%" data-width="70"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">CI/CD</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">75%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-red-500 rounded-full progress-bar" style="width: 0%" data-width="75"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tools -->
                <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6 card-hover">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-2xl">🛠️</span>
                        <div>
                            <div class="font-mono text-lg font-bold">Tools</div>
                            <div class="text-sm text-gray-500 font-mono">./tools/</div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">Git</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">95%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-orange-600 rounded-full progress-bar" style="width: 0%" data-width="95"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">VS Code</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">90%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-blue-500 rounded-full progress-bar" style="width: 0%" data-width="90"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">Figma</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">85%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-purple-600 rounded-full progress-bar" style="width: 0%" data-width="85"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-mono text-sm">Postman</span>
                                <span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">88%</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden skill-bar">
                                <div class="h-full bg-orange-500 rounded-full progress-bar" style="width: 0%" data-width="88"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Technologies -->
            <div class="mt-12 text-center">
                <h3 class="text-xl font-bold mb-6 font-mono">
                    <span class="text-gray-500">// </span>Additional Technologies
                </h3>
                <div class="flex flex-wrap justify-center gap-2" id="tech-badges">
                    <!-- Tech badges will be populated by JavaScript -->
                </div>
            </div>

            <!-- Development Stats -->
            <div class="mt-12 max-w-4xl mx-auto">
                <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-4 font-mono text-center">
                        <span class="text-gray-500">// </span>Development Stats
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                        <div class="space-y-1">
                            <div class="text-2xl font-bold text-primary font-mono">50+</div>
                            <div class="text-sm text-gray-500 font-mono">Projects</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-2xl font-bold text-primary font-mono">5+</div>
                            <div class="text-sm text-gray-500 font-mono">Years</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-2xl font-bold text-primary font-mono">100K+</div>
                            <div class="text-sm text-gray-500 font-mono">Lines of Code</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-2xl font-bold text-primary font-mono">24/7</div>
                            <div class="text-sm text-gray-500 font-mono">Learning</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
                <div class="inline-block rounded-lg bg-primary/10 border border-primary/20 px-3 py-1 text-sm font-mono mb-2">
                    <span class="text-primary">&lt;</span>projects<span class="text-primary">/&gt;</span>
                </div>
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl">Featured Projects</h2>
                <p class="max-w-2xl text-gray-600 dark:text-gray-300 md:text-xl font-mono">
                    // A showcase of my recent work and personal projects
                </p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-2 mb-12" id="project-filters">
                <button class="filter-btn active px-4 py-2 bg-primary text-white rounded-lg font-mono text-sm transition-all duration-300" data-filter="all">all_projects()</button>
                <button class="filter-btn px-4 py-2 border border-gray-300 dark:border-gray-600 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg font-mono text-sm transition-all duration-300" data-filter="fullstack">fullstack()</button>
                <button class="filter-btn px-4 py-2 border border-gray-300 dark:border-gray-600 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg font-mono text-sm transition-all duration-300" data-filter="frontend">frontend()</button>
                <button class="filter-btn px-4 py-2 border border-gray-300 dark:border-gray-600 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg font-mono text-sm transition-all duration-300" data-filter="backend">backend()</button>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="projects-grid">
                <!-- Projects will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50/50 dark:bg-gray-900/50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
                <div class="inline-block rounded-lg bg-primary/10 border border-primary/20 px-3 py-1 text-sm font-mono mb-2">
                    <span class="text-primary">&lt;</span>contact<span class="text-primary">/&gt;</span>
                </div>
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl">Let's Work Together</h2>
                <p class="max-w-2xl text-gray-600 dark:text-gray-300 md:text-xl font-mono">
                    // Have a project in mind? Let's discuss it
                </p>
            </div>

            <div class="grid gap-6 lg:grid-cols-2 lg:gap-12 items-start max-w-6xl mx-auto">
                <!-- Contact Information -->
                <div class="space-y-6">
                    <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-4">Contact Information</h3>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <p class="font-medium">Email</p>
                                    <p class="text-gray-600 dark:text-gray-300">john.doe@example.com</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <div>
                                    <p class="font-medium">Phone</p>
                                    <p class="text-gray-600 dark:text-gray-300">+1 (555) 123-4567</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <p class="font-medium">Location</p>
                                    <p class="text-gray-600 dark:text-gray-300">San Francisco, CA</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <h3 class="font-semibold mb-4">Response Time</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            I typically respond to messages within 24 hours. For urgent inquiries, feel free to call or connect with me on LinkedIn.
                        </p>
                        <div class="flex gap-4">
                            <a href="https://linkedin.com" class="px-4 py-2 border border-gray-300 dark:border-gray-600 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg text-sm transition-all duration-300">LinkedIn</a>
                            <a href="https://github.com" class="px-4 py-2 border border-gray-300 dark:border-gray-600 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg text-sm transition-all duration-300">GitHub</a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-4">Send a Message</h3>
                    <form id="contact-form" class="space-y-4">
                        <!-- Honeypot field -->
                        <input type="text" name="honeypot" style="display: none;" tabindex="-1" autocomplete="off">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium mb-2">Name *</label>
                                <input type="text" id="name" name="name" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent form-field transition-all duration-300">
                                <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium mb-2">Email *</label>
                                <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent form-field transition-all duration-300">
                                <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium mb-2">Subject *</label>
                            <input type="text" id="subject" name="subject" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent form-field transition-all duration-300">
                            <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium mb-2">Message *</label>
                            <textarea id="message" name="message" rows="5" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent form-field transition-all duration-300 resize-none"></textarea>
                            <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                        </div>
                        
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-6 py-3 bg-primary hover:bg-primary/90 text-white font-mono rounded-lg btn-glow transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <span>send_message()</span>
                        </button>
                        
                        <p class="text-xs text-gray-500 text-center">
                            * Required fields. Your information will be kept private and secure.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-gray-200 dark:border-gray-800 py-12 md:py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <h3 class="text-lg font-bold">John Doe</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Full-stack developer passionate about creating innovative solutions and beautiful user experiences.
                    </p>
                </div>
                <div class="space-y-4">
                    <h3 class="text-sm font-bold">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#about" class="text-gray-600 dark:text-gray-300 hover:text-primary transition-colors">About Me</a></li>
                        <li><a href="#skills" class="text-gray-600 dark:text-gray-300 hover:text-primary transition-colors">Skills</a></li>
                        <li><a href="#projects" class="text-gray-600 dark:text-gray-300 hover:text-primary transition-colors">Projects</a></li>
                        <li><a href="#contact" class="text-gray-600 dark:text-gray-300 hover:text-primary transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div class="space-y-4">
                    <h3 class="text-sm font-bold">Services</h3>
                    <ul class="space-y-2 text-sm">
                        <li><span class="text-gray-600 dark:text-gray-300">Web Development</span></li>
                        <li><span class="text-gray-600 dark:text-gray-300">UI/UX Design</span></li>
                        <li><span class="text-gray-600 dark:text-gray-300">API Development</span></li>
                        <li><span class="text-gray-600 dark:text-gray-300">Consulting</span></li>
                    </ul>
                </div>
                <div class="space-y-4">
                    <h3 class="text-sm font-bold">Connect</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="mailto:john.doe@example.com" class="text-gray-600 dark:text-gray-300 hover:text-primary transition-colors">Email</a></li>
                        <li><a href="https://linkedin.com" class="text-gray-600 dark:text-gray-300 hover:text-primary transition-colors">LinkedIn</a></li>
                        <li><a href="https://github.com" class="text-gray-600 dark:text-gray-300 hover:text-primary transition-colors">GitHub</a></li>
                        <li><a href="/resume.pdf" class="text-gray-600 dark:text-gray-300 hover:text-primary transition-colors">Resume</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-600 dark:text-gray-300">© 2024 John Doe. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="/privacy" class="text-sm text-gray-600 dark:text-gray-300 hover:text-primary transition-colors">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Project Modal -->
    <div id="project-modal" class="fixed inset-0 z-50 hidden">
        <div class="modal-backdrop fixed inset-0 bg-black/50" id="modal-backdrop"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="modal-content bg-white dark:bg-gray-900 rounded-lg max-w-4xl max-h-[90vh] overflow-y-auto w-full">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 id="modal-title" class="text-2xl font-bold"></h3>
                        <div class="flex items-center gap-2">
                            <button id="prev-project" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button id="next-project" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                            <button id="close-modal" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div id="modal-content" class="space-y-6">
                        <!-- Modal content will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div id="success-message" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>Message sent successfully!</span>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        // Check for saved theme preference or default to 'light'
        const currentTheme = localStorage.getItem('theme') || 'light';
        html.classList.toggle('dark', currentTheme === 'dark');

        themeToggle.addEventListener('click', () => {
            const isDark = html.classList.contains('dark');
            html.classList.toggle('dark', !isDark);
            localStorage.setItem('theme', !isDark ? 'dark' : 'light');
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth Scrolling and Active Navigation
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('section[id]');

        function updateActiveNav() {
            const scrollPosition = window.scrollY + 100;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    navLinks.forEach(link => {
                        link.classList.remove('nav-active');
                        if (link.getAttribute('href') === `#${sectionId}`) {
                            link.classList.add('nav-active');
                        }
                    });
                }
            });
        }

        window.addEventListener('scroll', updateActiveNav);

        // Spotlight Mouse Follow
        const spotlightMain = document.getElementById('spotlight-main');
        const heroSection = document.getElementById('hero');

        let isMouseInHero = false;

        heroSection.addEventListener('mouseenter', () => {
            isMouseInHero = true;
        });

        heroSection.addEventListener('mouseleave', () => {
            isMouseInHero = false;
            // Return to center
            spotlightMain.style.left = '50%';
            spotlightMain.style.top = '33%';
        });

        heroSection.addEventListener('mousemove', (e) => {
            if (isMouseInHero) {
                const rect = heroSection.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                
                spotlightMain.style.left = `${x}%`;
                spotlightMain.style.top = `${y}%`;
            }
        });

        // Typing Animation
        const typingInput = document.getElementById('typing-input');
        const commands = [
            'git clone https://github.com/johndoe/awesome-project.git',
            'npm run build && npm run deploy --production',
            'docker-compose up -d --scale web=3',
            'kubectl apply -f deployment.yaml',
            'terraform plan && terraform apply',
            'python manage.py migrate && python manage.py runserver',
            'yarn test --coverage && yarn build'
        ];

        let currentCommandIndex = 0;
        let currentCharIndex = 0;
        let isTyping = true;

        function typeCommand() {
            const currentCommand = commands[currentCommandIndex];
            
            if (isTyping) {
                if (currentCharIndex < currentCommand.length) {
                    typingInput.value = currentCommand.substring(0, currentCharIndex + 1);
                    currentCharIndex++;
                    setTimeout(typeCommand, 80);
                } else {
                    setTimeout(() => {
                        isTyping = false;
                        typeCommand();
                    }, 3000);
                }
            } else {
                if (currentCharIndex > 0) {
                    typingInput.value = currentCommand.substring(0, currentCharIndex - 1);
                    currentCharIndex--;
                    setTimeout(typeCommand, 30);
                } else {
                    currentCommandIndex = (currentCommandIndex + 1) % commands.length;
                    isTyping = true;
                    setTimeout(typeCommand, 500);
                }
            }
        }

        typeCommand();

        // Skills Animation
        function animateSkills() {
            const skillBars = document.querySelectorAll('.progress-bar');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bar = entry.target;
                        const width = bar.getAttribute('data-width');
                        setTimeout(() => {
                            bar.style.width = width + '%';
                        }, 200);
                    }
                });
            }, { threshold: 0.5 });

            skillBars.forEach(bar => observer.observe(bar));
        }

        // Tech Badges
        const techBadges = [
            'GraphQL', 'Redux', 'Jest', 'Cypress', 'Webpack', 'Vite', 'Prisma',
            'Supabase', 'Vercel', 'Netlify', 'Stripe', 'Socket.io', 'Three.js',
            'Framer Motion', 'Storybook', 'ESLint'
        ];

        function createTechBadges() {
            const container = document.getElementById('tech-badges');
            techBadges.forEach((tech, index) => {
                const badge = document.createElement('span');
                badge.className = 'inline-block px-3 py-1 text-xs font-mono border border-gray-300 dark:border-gray-600 rounded-full hover:bg-primary hover:text-white hover:border-primary transition-all duration-300 cursor-default';
                badge.textContent = tech;
                badge.style.animationDelay = `${index * 0.05}s`;
                container.appendChild(badge);
            });
        }

        // Projects Data
        const projects = [
            {
                id: 1,
                title: 'E-Commerce Platform',
                category: 'fullstack',
                image: 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=300&fit=crop',
                description: 'A modern e-commerce platform built with Next.js and Stripe integration.',
                longDescription: 'This comprehensive e-commerce solution was built to handle high-traffic scenarios with optimized performance and SEO. The platform includes advanced features like inventory management, order tracking, customer reviews, and an admin dashboard for store management.',
                technologies: ['Next.js', 'TypeScript', 'Stripe', 'PostgreSQL', 'Tailwind CSS', 'Prisma'],
                liveUrl: 'https://example.com',
                githubUrl: 'https://github.com/example',
                featured: true
            },
            {
                id: 2,
                title: 'Task Management App',
                category: 'frontend',
                image: 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=400&h=300&fit=crop',
                description: 'A collaborative task management application with real-time updates.',
                longDescription: 'Built with React and Socket.io for real-time collaboration. The app features kanban boards, time tracking, file attachments, and team chat functionality. Designed with a focus on user experience and productivity.',
                technologies: ['React', 'Socket.io', 'Node.js', 'MongoDB', 'Material-UI'],
                liveUrl: 'https://example.com',
                githubUrl: 'https://github.com/example',
                featured: false
            },
            {
                id: 3,
                title: 'Weather Dashboard',
                category: 'frontend',
                image: 'https://images.unsplash.com/photo-1504608524841-42fe6f032b4b?w=400&h=300&fit=crop',
                description: 'A beautiful weather dashboard with location-based forecasts.',
                longDescription: 'This weather application provides comprehensive weather information with beautiful visualizations. Features include 7-day forecasts, weather maps, historical data, and customizable widgets for different weather metrics.',
                technologies: ['Vue.js', 'Chart.js', 'OpenWeather API', 'Mapbox', 'Vuetify'],
                liveUrl: 'https://example.com',
                githubUrl: 'https://github.com/example',
                featured: true
            },
            {
                id: 4,
                title: 'API Gateway Service',
                category: 'backend',
                image: 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=400&h=300&fit=crop',
                description: 'A scalable API gateway service with authentication and rate limiting.',
                longDescription: 'Enterprise-grade API gateway built with Node.js and Docker. Handles authentication, authorization, rate limiting, request/response transformation, and service discovery. Deployed on AWS with auto-scaling capabilities.',
                technologies: ['Node.js', 'Express', 'Redis', 'Docker', 'AWS', 'JWT'],
                liveUrl: 'https://example.com',
                githubUrl: 'https://github.com/example',
                featured: false
            },
            {
                id: 5,
                title: 'Portfolio Website',
                category: 'frontend',
                image: 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=400&h=300&fit=crop',
                description: 'A responsive portfolio website with modern animations.',
                longDescription: 'This portfolio showcases modern web development techniques with smooth animations, responsive design, and excellent performance scores. Built with accessibility in mind and optimized for SEO.',
                technologies: ['Next.js', 'Framer Motion', 'Tailwind CSS', 'TypeScript'],
                liveUrl: 'https://example.com',
                githubUrl: 'https://github.com/example',
                featured: false
            },
            {
                id: 6,
                title: 'Data Analytics Platform',
                category: 'fullstack',
                image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=300&fit=crop',
                description: 'A comprehensive data analytics platform with real-time dashboards.',
                longDescription: 'Enterprise data analytics solution with real-time data processing, interactive dashboards, and automated reporting. Handles large datasets with optimized queries and provides insights through various visualization types.',
                technologies: ['React', 'Python', 'FastAPI', 'PostgreSQL', 'D3.js', 'Docker'],
                liveUrl: 'https://example.com',
                githubUrl: 'https://github.com/example',
                featured: true
            }
        ];

        // Project Functions
        let currentFilter = 'all';
        let selectedProjectId = null;

        function createProjectCard(project) {
            return `
                <div class="project-item bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden card-hover cursor-pointer" data-category="${project.category}" data-id="${project.id}">
                    <div class="relative overflow-hidden">
                        <img src="${project.image}" alt="${project.title}" class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
                        ${project.featured ? '<div class="absolute top-2 right-2 bg-primary text-white px-2 py-1 rounded text-xs font-mono">Featured</div>' : ''}
                        <div class="absolute inset-0 bg-black/60 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white font-medium">View Details</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">${project.title}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-2">${project.description}</p>
                        <div class="flex flex-wrap gap-1 mb-4">
                            ${project.technologies.slice(0, 3).map(tech => 
                                `<span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">${tech}</span>`
                            ).join('')}
                            ${project.technologies.length > 3 ? 
                                `<span class="text-xs font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">+${project.technologies.length - 3}</span>` : ''
                            }
                        </div>
                    </div>
                </div>
            `;
        }

        function renderProjects() {
            const grid = document.getElementById('projects-grid');
            const filteredProjects = currentFilter === 'all' ? projects : projects.filter(p => p.category === currentFilter);
            
            grid.innerHTML = filteredProjects.map(createProjectCard).join('');
            
            // Add click listeners
            grid.querySelectorAll('.project-item').forEach(item => {
                item.addEventListener('click', () => {
                    const projectId = parseInt(item.getAttribute('data-id'));
                    openProjectModal(projectId);
                });
            });
        }

        function filterProjects(filter) {
            currentFilter = filter;
            
            // Update filter buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-primary', 'text-white');
                btn.classList.add('border', 'border-gray-300', 'dark:border-gray-600', 'bg-transparent');
                
                if (btn.getAttribute('data-filter') === filter) {
                    btn.classList.add('active', 'bg-primary', 'text-white');
                    btn.classList.remove('border', 'border-gray-300', 'dark:border-gray-600', 'bg-transparent');
                }
            });
            
            renderProjects();
        }

        function openProjectModal(projectId) {
            selectedProjectId = projectId;
            const project = projects.find(p => p.id === projectId);
            const modal = document.getElementById('project-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalContent = document.getElementById('modal-content');
            
            modalTitle.textContent = project.title;
            modalContent.innerHTML = `
                <img src="${project.image}" alt="${project.title}" class="w-full h-64 object-cover rounded-lg">
                <div class="space-y-4">
                    <p class="text-gray-600 dark:text-gray-300">${project.longDescription}</p>
                    <div>
                        <h4 class="font-semibold mb-2">Technologies Used:</h4>
                        <div class="flex flex-wrap gap-2">
                            ${project.technologies.map(tech => 
                                `<span class="text-xs font-mono border border-gray-300 dark:border-gray-600 px-2 py-1 rounded">${tech}</span>`
                            ).join('')}
                        </div>
                    </div>
                    <div class="flex gap-4 pt-4">
                        <a href="${project.liveUrl}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 px-6 py-3 bg-primary hover:bg-primary/90 text-white rounded-lg transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Live Demo
                        </a>
                        <a href="${project.githubUrl}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 px-6 py-3 border border-gray-300 dark:border-gray-600 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            View Code
                        </a>
                    </div>
                </div>
            `;
            
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProjectModal() {
            const modal = document.getElementById('project-modal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
            selectedProjectId = null;
        }

        function navigateProject(direction) {
            if (!selectedProjectId) return;
            
            const filteredProjects = currentFilter === 'all' ? projects : projects.filter(p => p.category === currentFilter);
            const currentIndex = filteredProjects.findIndex(p => p.id === selectedProjectId);
            
            let newIndex;
            if (direction === 'prev') {
                newIndex = currentIndex > 0 ? currentIndex - 1 : filteredProjects.length - 1;
            } else {
                newIndex = currentIndex < filteredProjects.length - 1 ? currentIndex + 1 : 0;
            }
            
            openProjectModal(filteredProjects[newIndex].id);
        }

        // Contact Form
        function validateForm(formData) {
            const errors = {};
            
            if (!formData.get('name').trim()) {
                errors.name = 'Name is required';
            }
            
            const email = formData.get('email').trim();
            if (!email) {
                errors.email = 'Email is required';
            } else if (!/\S+@\S+\.\S+/.test(email)) {
                errors.email = 'Email is invalid';
            }
            
            if (!formData.get('subject').trim()) {
                errors.subject = 'Subject is required';
            }
            
            if (!formData.get('message').trim()) {
                errors.message = 'Message is required';
            }
            
            return errors;
        }

        function showFormErrors(errors) {
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });
            
            // Show new errors
            Object.keys(errors).forEach(field => {
                const input = document.getElementById(field);
                const errorEl = input.parentNode.querySelector('.error-message');
                if (errorEl) {
                    errorEl.textContent = errors[field];
                    errorEl.classList.remove('hidden');
                    input.classList.add('border-red-500');
                }
            });
        }

        function clearFormErrors() {
            document.querySelectorAll('.error-message').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });
            document.querySelectorAll('.form-field').forEach(el => {
                el.classList.remove('border-red-500');
            });
        }

        function showSuccessMessage() {
            const successMessage = document.getElementById('success-message');
            successMessage.classList.remove('hidden');
            setTimeout(() => {
                successMessage.classList.add('hidden');
            }, 5000);
        }

        // Event Listeners
        document.addEventListener('DOMContentLoaded', () => {
            animateSkills();
            createTechBadges();
            renderProjects();
            
            // Project filter buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const filter = btn.getAttribute('data-filter');
                    filterProjects(filter);
                });
            });
            
            // Modal controls
            document.getElementById('close-modal').addEventListener('click', closeProjectModal);
            document.getElementById('modal-backdrop').addEventListener('click', closeProjectModal);
            document.getElementById('prev-project').addEventListener('click', () => navigateProject('prev'));
            document.getElementById('next-project').addEventListener('click', () => navigateProject('next'));
            
            // Contact form
            document.getElementById('contact-form').addEventListener('submit', async (e) => {
                e.preventDefault();
                
                const formData = new FormData(e.target);
                const submitBtn = e.target.querySelector('button[type="submit"]');
                const submitText = submitBtn.querySelector('span');
                
                // Check honeypot
                if (formData.get('honeypot')) {
                    return;
                }
                
                // Validate form
                const errors = validateForm(formData);
                if (Object.keys(errors).length > 0) {
                    showFormErrors(errors);
                    return;
                }
                
                clearFormErrors();
                
                // Show loading state
                submitBtn.disabled = true;
                submitText.textContent = 'sending...';
                submitBtn.insertAdjacentHTML('afterbegin', '<div class="loading-spinner mr-2"></div>');
                
                // Simulate form submission
                setTimeout(() => {
                    // Reset form
                    e.target.reset();
                    
                    // Reset button
                    submitBtn.disabled = false;
                    submitText.textContent = 'send_message()';
                    submitBtn.querySelector('.loading-spinner').remove();
                    
                    // Show success message
                    showSuccessMessage();
                }, 2000);
            });
            
            // Keyboard navigation for modal
            document.addEventListener('keydown', (e) => {
                if (selectedProjectId) {
                    if (e.key === 'Escape') {
                        closeProjectModal();
                    } else if (e.key === 'ArrowLeft') {
                        navigateProject('prev');
                    } else if (e.key === 'ArrowRight') {
                        navigateProject('next');
                    }
                }
            });
        });
    </script>
</body>
</html>