<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalcer Cafe - Menu Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'primary': '#065f46',
                        'primary-light': '#10b981',
                    }
                }
            }
        }
    </script>

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

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .animate-slideIn {
            animation: slideIn 0.3s ease-out;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-950 text-gray-800 dark:text-gray-200 transition duration-300">

    <div class="flex min-h-screen">

        <!-- SIDEBAR (Same as dashboard) -->
        <aside id="sidebar"
            class="w-64 fixed lg:static inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-50 flex flex-col justify-between bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 p-6">

            <div>
                <div class="flex items-center gap-3 mb-10">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-emerald-700 to-emerald-500 rounded-xl flex items-center justify-center">
                        <span class="text-white text-xl font-bold">K</span>
                    </div>
                    <h1 class="text-xl font-bold tracking-wide">Kalcer Cafe</h1>
                </div>

                <div class="mb-8">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-3">Menu</p>
                    <nav class="space-y-1">
                        <a href="{{ url('/dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="font-medium">Dashboard</span>
                        </a>

                        <a href="menu.html"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-700 text-white shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                            <span class="font-medium">Menu</span>
                            <span id="menu-count"
                                class="ml-auto bg-white text-emerald-700 text-xs px-2 py-1 rounded-full">24</span>
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

        <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="toggleSidebar()">
        </div>

        <!-- MAIN CONTENT -->
        <main class="flex-1 flex flex-col min-h-screen">

            <!-- TOP NAVBAR -->
            <header
                class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 px-4 sm:px-8 py-4 sticky top-0 z-30">
                <div class="flex items-center justify-between gap-4">
                    <button onclick="toggleSidebar()"
                        class="lg:hidden p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <div class="flex-1 max-w-md">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input id="search-menu" type="text" placeholder="Search menu..."
                                onkeyup="searchMenu()"
                                class="w-full pl-10 pr-4 py-2 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500" />
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </button>

                        <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

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

            <!-- MENU MANAGEMENT CONTENT -->
            <div class="flex-1 p-4 sm:p-8">

                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-bold mb-2">Menu Management</h2>
                        <p class="text-gray-500 dark:text-gray-400">Manage your cafe menu items efficiently</p>
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
                            class="border border-gray-300 dark:border-gray-700 px-6 py-3 rounded-xl font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>

                <!-- Filter Tabs -->
                <div class="flex gap-2 mb-6 overflow-x-auto pb-2">
                    <button onclick="filterMenu('all')"
                        class="filter-btn px-6 py-2 bg-emerald-700 text-white rounded-full font-medium whitespace-nowrap">
                        All (<span id="count-all">0</span>)
                    </button>
                    <button onclick="filterMenu('drink')"
                        class="filter-btn px-6 py-2 bg-gray-200 dark:bg-gray-800 rounded-full font-medium hover:bg-gray-300 dark:hover:bg-gray-700 transition whitespace-nowrap">
                        Drinks (<span id="count-drink">0</span>)
                    </button>
                    <button onclick="filterMenu('food')"
                        class="filter-btn px-6 py-2 bg-gray-200 dark:bg-gray-800 rounded-full font-medium hover:bg-gray-300 dark:hover:bg-gray-700 transition whitespace-nowrap">
                        Food (<span id="count-food">0</span>)
                    </button>
                    <button onclick="filterMenu('dessert')"
                        class="filter-btn px-6 py-2 bg-gray-200 dark:bg-gray-800 rounded-full font-medium hover:bg-gray-300 dark:hover:bg-gray-700 transition whitespace-nowrap">
                        Dessert (<span id="count-dessert">0</span>)
                    </button>
                    <button onclick="filterMenu('snack')"
                        class="filter-btn px-6 py-2 bg-gray-200 dark:bg-gray-800 rounded-full font-medium hover:bg-gray-300 dark:hover:bg-gray-700 transition whitespace-nowrap">
                        Snacks (<span id="count-snack">0</span>)
                    </button>
                </div>

                <!-- Table -->
                <div
                    class="bg-white dark:bg-gray-900 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <tr>
                                    <th class="px-6 py-4 text-sm font-semibold">
                                        <input type="checkbox" onclick="toggleSelectAll(this)"
                                            class="w-4 h-4 rounded border-gray-300">
                                    </th>
                                    <th class="px-6 py-4 text-sm font-semibold">Menu Item</th>
                                    <th class="px-6 py-4 text-sm font-semibold">Category</th>
                                    <th class="px-6 py-4 text-sm font-semibold">Price</th>
                                    <th class="px-6 py-4 text-sm font-semibold">Stock</th>
                                    <th class="px-6 py-4 text-sm font-semibold">Status</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="menu-table-body" class="divide-y divide-gray-200 dark:divide-gray-800">
                                <!-- Menu items will be populated by JavaScript -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Empty State -->
                    <div id="empty-state" class="hidden p-12 text-center">
                        <div
                            class="w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">No menu items found</h3>
                        <p class="text-gray-500 mb-4">Start by adding your first menu item</p>
                        <button onclick="openAddModal()"
                            class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2 rounded-xl font-medium transition">
                            Add Menu Item
                        </button>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-6">
                    <p class="text-sm text-gray-500">
                        Showing <span id="showing-from">1</span> to <span id="showing-to">10</span> of <span
                            id="total-items">0</span> items
                    </p>
                    <div class="flex gap-2">
                        <button
                            class="px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            Previous
                        </button>
                        <button class="px-4 py-2 bg-emerald-700 text-white rounded-lg">1</button>
                        <button
                            class="px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition">2</button>
                        <button
                            class="px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition">3</button>
                        <button
                            class="px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            Next
                        </button>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Add/Edit Modal -->
    <div id="menu-modal"
        class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div
            class="bg-white dark:bg-gray-900 rounded-3xl max-w-2xl w-full p-6 sm:p-8 max-h-[90vh] overflow-y-auto animate-slideIn">
            <div class="flex justify-between items-center mb-6">
                <h3 id="modal-title" class="text-2xl font-bold">Add New Menu Item</h3>
                <button onclick="closeModal()"
                    class="w-10 h-10 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg flex items-center justify-center transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="menu-form" class="space-y-4">
                <input type="hidden" id="menu-id" />

                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-2">Menu Name *</label>
                        <input type="text" id="menu-name" required
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500"
                            placeholder="e.g. Caramel Latte" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Category *</label>
                        <select id="menu-category" required
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="">Select category</option>
                            <option value="drink">Drink</option>
                            <option value="food">Food</option>
                            <option value="dessert">Dessert</option>
                            <option value="snack">Snack</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Price (Rp) *</label>
                        <input type="number" id="menu-price" required min="0"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500"
                            placeholder="25000" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Stock</label>
                        <input type="number" id="menu-stock" min="0" value="0"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500"
                            placeholder="100" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Status *</label>
                        <select id="menu-status" required
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="available">Available</option>
                            <option value="out-of-stock">Out of Stock</option>
                            <option value="discontinued">Discontinued</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-2">Description</label>
                        <textarea id="menu-description" rows="3"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500"
                            placeholder="Brief description of the menu item..."></textarea>
                    </div>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit"
                        class="flex-1 bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-3 rounded-xl font-semibold transition">
                        Save Menu Item
                    </button>
                    <button type="button" onclick="closeModal()"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-700 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal"
        class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-900 rounded-3xl max-w-md w-full p-6 sm:p-8">
            <div class="text-center mb-6">
                <div
                    class="w-16 h-16 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Delete Menu Item</h3>
                <p class="text-gray-500">Are you sure you want to delete this menu item? This action cannot be undone.
                </p>
            </div>

            <div class="flex gap-3">
                <button onclick="confirmDelete()"
                    class="flex-1 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold transition">
                    Delete
                </button>
                <button onclick="closeDeleteModal()"
                    class="flex-1 border border-gray-300 dark:border-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- Notification Toast -->
    <div id="notification"
        class="hidden fixed top-24 right-4 bg-emerald-600 text-white px-6 py-4 rounded-2xl shadow-lg z-50 flex items-center gap-3 animate-slideIn">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <p id="notification-message">Success!</p>
    </div>

    <script src="menu-management.js"></script>
    <script>
        // ============================================
        // Kalcer Cafe - Menu Management JavaScript
        // ============================================

        // Sample Menu Data
        let menuItems = [{
                id: 1,
                name: "Caramel Latte",
                category: "drink",
                price: 32000,
                stock: 50,
                status: "available",
                description: "Rich espresso with caramel syrup and steamed milk"
            },
            {
                id: 2,
                name: "Matcha Latte",
                category: "drink",
                price: 30000,
                stock: 45,
                status: "available",
                description: "Premium Japanese matcha with steamed milk"
            },
            {
                id: 3,
                name: "Cappuccino",
                category: "drink",
                price: 28000,
                stock: 60,
                status: "available",
                description: "Classic Italian coffee with milk foam"
            },
            {
                id: 4,
                name: "Espresso",
                category: "drink",
                price: 20000,
                stock: 100,
                status: "available",
                description: "Strong concentrated coffee shot"
            },
            {
                id: 5,
                name: "Spaghetti Carbonara",
                category: "food",
                price: 45000,
                stock: 0,
                status: "out-of-stock",
                description: "Creamy pasta with bacon and parmesan"
            },
            {
                id: 6,
                name: "Beef Burger",
                category: "food",
                price: 55000,
                stock: 25,
                status: "available",
                description: "Juicy beef patty with cheese and vegetables"
            },
            {
                id: 7,
                name: "Caesar Salad",
                category: "food",
                price: 35000,
                stock: 30,
                status: "available",
                description: "Fresh romaine lettuce with caesar dressing"
            },
            {
                id: 8,
                name: "Grilled Chicken",
                category: "food",
                price: 48000,
                stock: 20,
                status: "available",
                description: "Tender grilled chicken with herbs"
            },
            {
                id: 9,
                name: "Chocolate Cake",
                category: "dessert",
                price: 38000,
                stock: 15,
                status: "available",
                description: "Rich chocolate cake with ganache"
            },
            {
                id: 10,
                name: "Tiramisu",
                category: "dessert",
                price: 42000,
                stock: 12,
                status: "available",
                description: "Classic Italian dessert with coffee flavor"
            },
            {
                id: 11,
                name: "Cheesecake",
                category: "dessert",
                price: 40000,
                stock: 18,
                status: "available",
                description: "Creamy New York style cheesecake"
            },
            {
                id: 12,
                name: "French Fries",
                category: "snack",
                price: 22000,
                stock: 50,
                status: "available",
                description: "Crispy golden french fries"
            },
            {
                id: 13,
                name: "Chicken Wings",
                category: "snack",
                price: 38000,
                stock: 35,
                status: "available",
                description: "Spicy buffalo chicken wings"
            },
            {
                id: 14,
                name: "Nachos",
                category: "snack",
                price: 32000,
                stock: 28,
                status: "available",
                description: "Tortilla chips with cheese and salsa"
            },
            {
                id: 15,
                name: "Croissant",
                category: "snack",
                price: 18000,
                stock: 40,
                status: "available",
                description: "Buttery French pastry"
            }
        ];

        let currentFilter = 'all';
        let deleteItemId = null;
        let editItemId = null;

        // ============================================
        // Initialize
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            loadMenuFromStorage();
            renderMenu();
            updateCounts();
            loadDarkMode();

            // Form submit event
            document.getElementById('menu-form').addEventListener('submit', handleFormSubmit);
        });

        // ============================================
        // LocalStorage Functions
        // ============================================
        function saveMenuToStorage() {
            localStorage.setItem('cafeMenuItems', JSON.stringify(menuItems));
        }

        function loadMenuFromStorage() {
            const saved = localStorage.getItem('cafeMenuItems');
            if (saved) {
                menuItems = JSON.parse(saved);
            }
        }

        // ============================================
        // Render Menu Table
        // ============================================
        function renderMenu() {
            const tbody = document.getElementById('menu-table-body');
            const emptyState = document.getElementById('empty-state');

            // Filter menu items
            let filtered = menuItems;
            if (currentFilter !== 'all') {
                filtered = menuItems.filter(item => item.category === currentFilter);
            }

            // Search filter
            const searchQuery = document.getElementById('search-menu')?.value.toLowerCase() || '';
            if (searchQuery) {
                filtered = filtered.filter(item =>
                    item.name.toLowerCase().includes(searchQuery) ||
                    item.category.toLowerCase().includes(searchQuery) ||
                    item.description.toLowerCase().includes(searchQuery)
                );
            }

            // Show/hide empty state
            if (filtered.length === 0) {
                tbody.innerHTML = '';
                emptyState.classList.remove('hidden');
                return;
            } else {
                emptyState.classList.add('hidden');
            }

            // Render rows
            tbody.innerHTML = filtered.map(item => `
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
            <td class="px-6 py-4">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300">
            </td>
            <td class="px-6 py-4">
                <div>
                    <p class="font-semibold">${item.name}</p>
                    <p class="text-sm text-gray-500 line-clamp-1">${item.description || ''}</p>
                </div>
            </td>
            <td class="px-6 py-4">
                <span class="px-3 py-1 rounded-full text-xs font-medium ${getCategoryColor(item.category)}">
                    ${capitalizeFirst(item.category)}
                </span>
            </td>
            <td class="px-6 py-4 font-semibold">
                Rp ${formatPrice(item.price)}
            </td>
            <td class="px-6 py-4">
                <span class="${item.stock > 10 ? 'text-emerald-600' : item.stock > 0 ? 'text-yellow-600' : 'text-red-600'}">
                    ${item.stock} units
                </span>
            </td>
            <td class="px-6 py-4">
                ${getStatusBadge(item.status)}
            </td>
            <td class="px-6 py-4 text-right">
                <div class="flex justify-end gap-2">
                    <button onclick="openEditModal(${item.id})" class="px-4 py-2 bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-300 rounded-xl text-sm font-medium hover:bg-emerald-200 dark:hover:bg-emerald-800 transition">
                        Edit
                    </button>
                    <button onclick="openDeleteModal(${item.id})" class="px-4 py-2 bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 rounded-xl text-sm font-medium hover:bg-red-200 dark:hover:bg-red-800 transition">
                        Delete
                    </button>
                </div>
            </td>
        </tr>
    `).join('');

            updatePagination(filtered.length);
        }

        // ============================================
        // Helper Functions
        // ============================================
        function getCategoryColor(category) {
            const colors = {
                drink: 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300',
                food: 'bg-orange-100 text-orange-700 dark:bg-orange-900 dark:text-orange-300',
                dessert: 'bg-pink-100 text-pink-700 dark:bg-pink-900 dark:text-pink-300',
                snack: 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300'
            };
            return colors[category] || 'bg-gray-100 text-gray-700';
        }

        function getStatusBadge(status) {
            const badges = {
                'available': '<span class="px-3 py-1 bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 rounded-full text-xs font-medium">Available</span>',
                'out-of-stock': '<span class="px-3 py-1 bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300 rounded-full text-xs font-medium">Out of Stock</span>',
                'discontinued': '<span class="px-3 py-1 bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 rounded-full text-xs font-medium">Discontinued</span>'
            };
            return badges[status] || badges['available'];
        }

        function formatPrice(price) {
            return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function capitalizeFirst(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        // ============================================
        // Update Counts
        // ============================================
        function updateCounts() {
            const counts = {
                all: menuItems.length,
                drink: menuItems.filter(i => i.category === 'drink').length,
                food: menuItems.filter(i => i.category === 'food').length,
                dessert: menuItems.filter(i => i.category === 'dessert').length,
                snack: menuItems.filter(i => i.category === 'snack').length
            };

            Object.keys(counts).forEach(key => {
                const el = document.getElementById(`count-${key}`);
                if (el) el.textContent = counts[key];
            });

            const menuCountEl = document.getElementById('menu-count');
            if (menuCountEl) menuCountEl.textContent = counts.all;
        }

        function updatePagination(total) {
            document.getElementById('showing-from').textContent = total > 0 ? 1 : 0;
            document.getElementById('showing-to').textContent = Math.min(10, total);
            document.getElementById('total-items').textContent = total;
        }

        // ============================================
        // Filter Menu
        // ============================================
        function filterMenu(category) {
            currentFilter = category;

            // Update button styles
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => {
                btn.classList.remove('bg-emerald-700', 'text-white');
                btn.classList.add('bg-gray-200', 'dark:bg-gray-800');
            });

            event.target.classList.remove('bg-gray-200', 'dark:bg-gray-800');
            event.target.classList.add('bg-emerald-700', 'text-white');

            renderMenu();
        }

        // ============================================
        // Search Menu
        // ============================================
        function searchMenu() {
            renderMenu();
        }

        // ============================================
        // Modal Functions
        // ============================================
        function openAddModal() {
            editItemId = null;
            document.getElementById('modal-title').textContent = 'Add New Menu Item';
            document.getElementById('menu-form').reset();
            document.getElementById('menu-id').value = '';
            document.getElementById('menu-modal').classList.remove('hidden');
        }

        function openEditModal(id) {
            editItemId = id;
            const item = menuItems.find(i => i.id === id);
            if (!item) return;

            document.getElementById('modal-title').textContent = 'Edit Menu Item';
            document.getElementById('menu-id').value = item.id;
            document.getElementById('menu-name').value = item.name;
            document.getElementById('menu-category').value = item.category;
            document.getElementById('menu-price').value = item.price;
            document.getElementById('menu-stock').value = item.stock;
            document.getElementById('menu-status').value = item.status;
            document.getElementById('menu-description').value = item.description || '';

            document.getElementById('menu-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('menu-modal').classList.add('hidden');
            editItemId = null;
        }

        function openDeleteModal(id) {
            deleteItemId = id;
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
            deleteItemId = null;
        }

        // ============================================
        // CRUD Operations
        // ============================================
        function handleFormSubmit(e) {
            e.preventDefault();

            const formData = {
                name: document.getElementById('menu-name').value,
                category: document.getElementById('menu-category').value,
                price: parseInt(document.getElementById('menu-price').value),
                stock: parseInt(document.getElementById('menu-stock').value) || 0,
                status: document.getElementById('menu-status').value,
                description: document.getElementById('menu-description').value
            };

            if (editItemId) {
                // Update existing item
                const index = menuItems.findIndex(i => i.id === editItemId);
                if (index !== -1) {
                    menuItems[index] = {
                        ...menuItems[index],
                        ...formData
                    };
                    showNotification('Menu item updated successfully!');
                }
            } else {
                // Add new item
                const newItem = {
                    id: Date.now(),
                    ...formData
                };
                menuItems.push(newItem);
                showNotification('Menu item added successfully!');
            }

            saveMenuToStorage();
            renderMenu();
            updateCounts();
            closeModal();
        }

        function confirmDelete() {
            if (!deleteItemId) return;

            const index = menuItems.findIndex(i => i.id === deleteItemId);
            if (index !== -1) {
                menuItems.splice(index, 1);
                saveMenuToStorage();
                renderMenu();
                updateCounts();
                showNotification('Menu item deleted successfully!');
            }

            closeDeleteModal();
        }

        // ============================================
        // Select All Checkbox
        // ============================================
        function toggleSelectAll(checkbox) {
            const checkboxes = document.querySelectorAll('#menu-table-body input[type="checkbox"]');
            checkboxes.forEach(cb => cb.checked = checkbox.checked);
        }

        // ============================================
        // Notification
        // ============================================
        function showNotification(message) {
            const notification = document.getElementById('notification');
            const messageEl = document.getElementById('notification-message');

            messageEl.textContent = message;
            notification.classList.remove('hidden');

            setTimeout(() => {
                notification.classList.add('hidden');
            }, 3000);
        }

        // ============================================
        // Dark Mode
        // ============================================
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            const isDark = document.documentElement.classList.contains('dark');
            localStorage.setItem('darkMode', isDark);
            document.getElementById('dark-mode-icon').textContent = isDark ? '☀️' : '🌙';
        }

        function loadDarkMode() {
            const isDark = localStorage.getItem('darkMode') === 'true';
            if (isDark) {
                document.documentElement.classList.add('dark');
                document.getElementById('dark-mode-icon').textContent = '☀️';
            }
        }

        // ============================================
        // Toggle Mobile Sidebar
        // ============================================
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // ============================================
        // Export Functions (for external use)
        // ============================================
        if (typeof module !== 'undefined' && module.exports) {
            module.exports = {
                menuItems,
                filterMenu,
                searchMenu,
                openAddModal,
                openEditModal,
                confirmDelete
            };
        }
    </script>

</body>

</html>
