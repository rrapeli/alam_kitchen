<!-- SIDEBAR -->
<aside id="sidebar"
    class="w-64 fixed lg:static inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-50 flex flex-col justify-between bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 p-6">

    <!-- Logo & Brand -->
    <div>
        <div class="flex items-center gap-3 mb-10">
            <div class="w-10 h-10 bg-gradient-to-br from-emerald-700 to-emerald-500 rounded-xl flex items-center justify-center">
                <span class="text-white text-xl font-bold">K</span>
            </div>
            <h1 class="text-xl font-bold tracking-wide">Kalcer Cafe</h1>
        </div>

        <!-- Menu Section -->
        <div class="mb-8">
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-3">Menu</p>
            <nav class="space-y-1">

                @php
                    $navItems = [
                        ['url' => '/dashboard', 'label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
                        ['url' => '/menu',      'label' => 'Menu',      'route' => 'menu*',      'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'badge' => '24'],
                        ['url' => '/orders',   'label' => 'Orders',    'route' => 'orders*',    'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                        ['url' => '/customers','label' => 'Customers', 'route' => 'customers*', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                        ['url' => '/analytics','label' => 'Analytics', 'route' => 'analytics*', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                    ];
                @endphp

                @foreach ($navItems as $item)
                    @php $active = request()->routeIs($item['route']); @endphp
                    <a href="{{ url($item['url']) }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                            {{ $active
                                ? 'bg-emerald-700 text-white shadow-lg'
                                : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                        </svg>
                        <span class="font-medium">{{ $item['label'] }}</span>
                        @if (!empty($item['badge']))
                            <span class="ml-auto text-xs px-2 py-1 rounded-full
                                {{ $active
                                    ? 'bg-white/20 text-white'
                                    : 'bg-emerald-100 text-emerald-700' }}">
                                {{ $item['badge'] }}
                            </span>
                        @endif
                    </a>
                @endforeach

            </nav>
        </div>

        <!-- General Section -->
        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-3">General</p>
            <nav class="space-y-1">

                @php
                    $generalItems = [
                        ['url' => '/settings', 'label' => 'Settings', 'route' => 'settings*', 'icons' => [
                            'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z',
                            'M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                        ]],
                        ['url' => '/help', 'label' => 'Help', 'route' => 'help*', 'icons' => [
                            'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                        ]],
                    ];
                @endphp

                @foreach ($generalItems as $item)
                    @php $active = request()->routeIs($item['route']); @endphp
                    <a href="{{ url($item['url']) }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                            {{ $active
                                ? 'bg-emerald-700 text-white shadow-lg'
                                : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @foreach ($item['icons'] as $path)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"></path>
                            @endforeach
                        </svg>
                        <span class="font-medium">{{ $item['label'] }}</span>
                    </a>
                @endforeach

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

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 border border-red-300 text-red-600 rounded-xl hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</aside>

<!-- Sidebar Overlay for Mobile -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="toggleSidebar()"></div>
