<header
    class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 px-4 sm:px-8 py-4 sticky top-0 z-30">
    <div class="flex items-center justify-between gap-4">

        <!-- Mobile Menu Button -->
        <button onclick="toggleSidebar()"
            class="lg:hidden p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
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
                    <p class="text-sm font-semibold">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-xs text-gray-500">{{ Auth::user()->email ?? '' }}</p>
                </div>
                @php
                    $initials = collect(explode(' ', Auth::user()->name ?? 'U'))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('');
                @endphp
                <div
                    class="w-10 h-10 bg-gradient-to-br from-emerald-600 to-emerald-400 rounded-full flex items-center justify-center text-white font-semibold">
                    {{ $initials }}
                </div>
            </div>
        </div>
    </div>
</header>
