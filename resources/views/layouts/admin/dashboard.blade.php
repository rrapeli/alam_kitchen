@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
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
        <div class="bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
            <div class="flex justify-between items-start mb-4">
                <p class="text-gray-600 dark:text-gray-400 font-medium">Orders Today</p>
                <button
                    class="w-8 h-8 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
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
        <div class="bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
            <div class="flex justify-between items-start mb-4">
                <p class="text-gray-600 dark:text-gray-400 font-medium">Running Orders</p>
                <button
                    class="w-8 h-8 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
            <h3 class="text-5xl font-bold mb-2">12</h3>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <span class="bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300 px-2 py-1 rounded-lg">
                    In Progress
                </span>
            </div>
        </div>

        <!-- Pending Orders Card -->
        <div class="bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
            <div class="flex justify-between items-start mb-4">
                <p class="text-gray-600 dark:text-gray-400 font-medium">Pending Orders</p>
                <button
                    class="w-8 h-8 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
            <h3 class="text-5xl font-bold mb-2">5</h3>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <span class="bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300 px-2 py-1 rounded-lg">
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
                        <circle cx="64" cy="64" r="56" stroke="rgba(255,255,255,0.2)" stroke-width="8"
                            fill="none" />
                        <circle cx="64" cy="64" r="56" stroke="white" stroke-width="8" fill="none"
                            stroke-dasharray="352" stroke-dashoffset="88" stroke-linecap="round" />
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
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-xl flex items-center justify-center">
                        <span class="text-2xl">☕</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold">Caramel Latte</h4>
                        <p class="text-sm text-gray-500">Order #12345 • Table 5</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold">Rp 32.000</p>
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">Completed</span>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-xl flex items-center justify-center">
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
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-xl flex items-center justify-center">
                        <span class="text-2xl">🍵</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold">Matcha Latte</h4>
                        <p class="text-sm text-gray-500">Order #12347 • Table 8</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold">Rp 30.000</p>
                        <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">Pending</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white dark:bg-gray-900 p-6 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Quick Actions</h3>
                <button
                    class="w-8 h-8 bg-emerald-100 dark:bg-emerald-900 text-emerald-700 dark:text-emerald-300 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </button>
            </div>

            <div class="space-y-3">
                <button
                    class="w-full flex items-center gap-3 p-4 bg-emerald-700 text-white rounded-xl hover:bg-emerald-800 transition">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
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
@endsection
