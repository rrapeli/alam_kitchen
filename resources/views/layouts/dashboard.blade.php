<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalcer Cafe - Dashboard</title>
    @vite('resources/css/app.css')



    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
        }

        .pattern-dots {
            background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(0, 0, 0, .05) 10px, rgba(0, 0, 0, .05) 20px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-950 text-gray-800 dark:text-gray-200 transition duration-300">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside id="sidebar"
            class="w-64 fixed lg:static inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-50 flex flex-col justify-between bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 p-6">

            <!-- Logo & Brand -->
            <div>
                <div class="flex items-center gap-3 mb-10">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-emerald-700 to-emerald-500 rounded-xl flex items-center justify-center">
                        <span class="text-white text-xl font-bold">K</span>
                    </div>
                    <h1 class="text-xl font-bold tracking-wide">Kalcer Cafe</h1>
                </div>

                <!-- Menu Section -->
                <div class="mb-8">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-3">Menu</p>
                    <nav class="space-y-1">
                        <a href="dashboard.html"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-700 text-white shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="font-medium">Dashboard</span>
                        </a>

                        <a href="{{ url('/menu') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                            <span class="font-medium">Menu</span>
                            <span
                                class="ml-auto bg-emerald-100 text-emerald-700 text-xs px-2 py-1 rounded-full">24</span>
                        </a>

                        <a href="#"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            <span class="font-medium">Orders</span>
                        </a>

                        <a href="#"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <span class="font-medium">Customers</span>
                        </a>

                        <a href="#"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            <span class="font-medium">Analytics</span>
                        </a>
                    </nav>
                </div>

                <!-- General Section -->
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-3">General</p>
                    <nav class="space-y-1">
                        <a href="#"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="font-medium">Settings</span>
                        </a>

                        <a href="#"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <span class="font-medium">Help</span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Dark Mode Toggle & Logout -->
            <div class="space-y-3">
                <button onclick="toggleDarkMode()"
                    class="w-full flex items-center gap-3 px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                    <span id="dark-mode-icon">🌙</span>
                    <span class="font-medium">Dark Mode</span>
                </button>

                <button
                    class="w-full flex items-center gap-3 px-4 py-3 border border-red-300 text-red-600 rounded-xl hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span class="font-medium">Logout</span>
                </button>
            </div>
        </aside>

        <!-- Sidebar Overlay for Mobile -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="toggleSidebar()">
        </div>

        <!-- MAIN CONTENT -->
        <main class="flex-1 flex flex-col min-h-screen">

            <!-- TOP NAVBAR -->
            <header
                class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 px-4 sm:px-8 py-4 sticky top-0 z-30">
                <div class="flex items-center justify-between gap-4">

                    <!-- Mobile Menu Button -->
                    <button onclick="toggleSidebar()"
                        class="lg:hidden p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Search Bar -->
                    <div class="flex-1 max-w-md">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" placeholder="Search task"
                                class="w-full pl-10 pr-4 py-2 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500" />
                            <kbd
                                class="hidden sm:block absolute right-3 top-1/2 -translate-y-1/2 px-2 py-1 text-xs bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded">⌘F</kbd>
                        </div>
                    </div>

                    <!-- Right Side Icons & Profile -->
                    <div class="flex items-center gap-3">
                        <!-- Email Icon -->
                        <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </button>

                        <!-- Notification Icon -->
                        <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- Profile -->
                        <div class="flex items-center gap-3 pl-3 border-l border-gray-200 dark:border-gray-700">
                            <div class="hidden sm:block text-right">
                                <p class="text-sm font-semibold">Admin Cafe</p>
                                <p class="text-xs text-gray-500">admin@kalcer.com</p>
                            </div>
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-emerald-600 to-emerald-400 rounded-full flex items-center justify-center text-white font-semibold">
                                AC
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- DASHBOARD CONTENT -->
            <div class="flex-1 p-4 sm:p-8">

                <!-- Page Header -->
                <div
                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 animate-fadeIn">
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-bold mb-2">Dashboard</h2>
                        <p class="text-gray-500 dark:text-gray-400">Plan, prioritize, and accomplish your tasks with
                            ease.</p>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="openAddModal()"
                            class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-3 rounded-xl font-medium shadow-lg hover:shadow-xl transition flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Menu
                        </button>
                        <button
                            class="border border-gray-300 dark:border-gray-700 px-6 py-3 rounded-xl font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            Import Data
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8 animate-fadeIn">
                    <!-- Total Menu Card -->
                    <div
                        class="bg-gradient-to-br from-emerald-700 to-emerald-600 text-white p-6 rounded-3xl shadow-lg relative overflow-hidden">
                        <div class="pattern-dots absolute inset-0 opacity-10"></div>
                        <div class="relative z-10">
                            <div class="flex justify-between items-start mb-4">
                                <p class="text-emerald-100 font-medium">Total Menu</p>
                                <button
                                    class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                            <h3 class="text-5xl font-bold mb-2">24</h3>
                            <div class="flex items-center gap-2 text-sm">
                                <span class="bg-emerald-500/30 px-2 py-1 rounded-lg flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    <span>Increased from last month</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Today Card -->
                    <div
                        class="bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
                        <div class="flex justify-between items-start mb-4">
                            <p class="text-gray-600 dark:text-gray-400 font-medium">Orders Today</p>
                            <button
                                class="w-8 h-8 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                        <h3 class="text-5xl font-bold mb-2">18</h3>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <span
                                class="bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-300 px-2 py-1 rounded-lg flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span>+12% from yesterday</span>
                            </span>
                        </div>
                    </div>

                    <!-- Running Orders Card -->
                    <div
                        class="bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
                        <div class="flex justify-between items-start mb-4">
                            <p class="text-gray-600 dark:text-gray-400 font-medium">Running Orders</p>
                            <button
                                class="w-8 h-8 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                        <h3 class="text-5xl font-bold mb-2">12</h3>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <span
                                class="bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300 px-2 py-1 rounded-lg">
                                In Progress
                            </span>
                        </div>
                    </div>

                    <!-- Pending Orders Card -->
                    <div
                        class="bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
                        <div class="flex justify-between items-start mb-4">
                            <p class="text-gray-600 dark:text-gray-400 font-medium">Pending Orders</p>
                            <button
                                class="w-8 h-8 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                        <h3 class="text-5xl font-bold mb-2">5</h3>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <span
                                class="bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300 px-2 py-1 rounded-lg">
                                On Discuss
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Charts & Widgets Row -->
                <div class="grid lg:grid-cols-3 gap-6 mb-8 animate-fadeIn">

                    <!-- Sales Analytics Chart -->
                    <div
                        class="lg:col-span-2 bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold">Sales Analytics</h3>
                            <select
                                class="px-4 py-2 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm">
                                <option>This Week</option>
                                <option>This Month</option>
                                <option>This Year</option>
                            </select>
                        </div>

                        <!-- Chart Bars -->
                        <div class="flex items-end justify-between gap-2 h-64">
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full h-20 bg-gray-200 dark:bg-gray-800 pattern-dots rounded-t-xl"></div>
                                <p class="text-xs text-gray-500 mt-2">S</p>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full h-32 bg-emerald-600 rounded-t-xl"></div>
                                <p class="text-xs text-gray-500 mt-2">M</p>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full h-28 bg-emerald-500 rounded-t-xl"></div>
                                <p class="text-xs text-gray-500 mt-2">T</p>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full h-48 bg-emerald-700 rounded-t-xl relative">
                                    <span
                                        class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs font-semibold bg-emerald-700 text-white px-2 py-1 rounded">75%</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">W</p>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full h-24 bg-gray-200 dark:bg-gray-800 pattern-dots rounded-t-xl"></div>
                                <p class="text-xs text-gray-500 mt-2">T</p>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full h-16 bg-gray-200 dark:bg-gray-800 pattern-dots rounded-t-xl"></div>
                                <p class="text-xs text-gray-500 mt-2">F</p>
                            </div>
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full h-12 bg-gray-200 dark:bg-gray-800 pattern-dots rounded-t-xl"></div>
                                <p class="text-xs text-gray-500 mt-2">S</p>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Card -->
                    <div
                        class="bg-gradient-to-br from-emerald-700 to-emerald-600 text-white p-6 rounded-3xl shadow-lg relative overflow-hidden">
                        <div class="pattern-dots absolute inset-0 opacity-10"></div>
                        <div class="relative z-10">
                            <h3 class="text-lg font-semibold mb-2">Total Revenue</h3>
                            <p class="text-4xl font-bold mb-6">Rp 45.2M</p>

                            <!-- Progress Circle -->
                            <div class="relative w-32 h-32 mx-auto mb-6">
                                <svg class="w-full h-full transform -rotate-90">
                                    <circle cx="64" cy="64" r="56" stroke="rgba(255,255,255,0.2)"
                                        stroke-width="8" fill="none" />
                                    <circle cx="64" cy="64" r="56" stroke="white" stroke-width="8"
                                        fill="none" stroke-dasharray="352" stroke-dashoffset="88"
                                        stroke-linecap="round" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-3xl font-bold">75%</span>
                                </div>
                            </div>

                            <p class="text-sm text-emerald-100 text-center">Target achieved</p>
                        </div>
                    </div>
                </div>

                <!-- Bottom Row -->
                <div class="grid lg:grid-cols-3 gap-6 animate-fadeIn">

                    <!-- Recent Orders -->
                    <div
                        class="lg:col-span-2 bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold">Recent Orders</h3>
                            <button class="text-sm text-emerald-600 hover:text-emerald-700">View All</button>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl">
                                <div
                                    class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-xl flex items-center justify-center">
                                    <span class="text-2xl">☕</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold">Caramel Latte</h4>
                                    <p class="text-sm text-gray-500">Order #12345 • Table 5</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold">Rp 32.000</p>
                                    <span
                                        class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">Completed</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl">
                                <div
                                    class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-xl flex items-center justify-center">
                                    <span class="text-2xl">🍝</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold">Spaghetti Carbonara</h4>
                                    <p class="text-sm text-gray-500">Order #12346 • Table 3</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold">Rp 45.000</p>
                                    <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">In
                                        Progress</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl">
                                <div
                                    class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-xl flex items-center justify-center">
                                    <span class="text-2xl">🍵</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold">Matcha Latte</h4>
                                    <p class="text-sm text-gray-500">Order #12347 • Table 8</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold">Rp 30.000</p>
                                    <span
                                        class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">Pending</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div
                        class="bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold">Quick Actions</h3>
                            <button
                                class="w-8 h-8 bg-emerald-100 dark:bg-emerald-900 text-emerald-700 dark:text-emerald-300 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="space-y-3">
                            <button
                                class="w-full flex items-center gap-3 p-4 bg-emerald-700 text-white rounded-xl hover:bg-emerald-800 transition">
                                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">New Order</span>
                            </button>

                            <button
                                class="w-full flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <div
                                    class="w-10 h-10 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-medium">View Menu</span>
                            </button>

                            <button
                                class="w-full flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <div
                                    class="w-10 h-10 bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-medium">Manage Staff</span>
                            </button>

                            <button
                                class="w-full flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <div
                                    class="w-10 h-10 bg-orange-100 dark:bg-orange-900 text-orange-600 dark:text-orange-300 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-medium">View Reports</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        // Dark Mode Toggle
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            const isDark = document.documentElement.classList.contains('dark');
            localStorage.setItem('darkMode', isDark);
            document.getElementById('dark-mode-icon').textContent = isDark ? '☀️' : '🌙';
        }

        // Load Dark Mode Preference
        function loadDarkMode() {
            const isDark = localStorage.getItem('darkMode') === 'true';
            if (isDark) {
                document.documentElement.classList.add('dark');
                document.getElementById('dark-mode-icon').textContent = '☀️';
            }
        }

        // Toggle Mobile Sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Open Add Modal (placeholder)
        function openAddModal() {
            alert('Add Menu Modal - Will be implemented in the menu page');
            window.location.href = 'menu.html';
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            loadDarkMode();
        });
    </script>

</body>

</html>
