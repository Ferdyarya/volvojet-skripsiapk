<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    {{-- Dashboard --}}
    @if (Auth::user()->hakakses('superadmin'))
    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endif
    {{-- Dashboard/ --}}

    {{-- Master Data --}}

    <button type="button"
        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
        <svg aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"></path>
        </svg>
        <span class="flex-1 ml-1 text-left whitespace-nowrap">Master Data</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul id="dropdown-example" class="hidden py-2 space-y-2">

        @if (Auth::user()->hakakses('adminservice') || Auth::user()->hakakses('adminwarehouse')||
        Auth::user()->hakakses('adminsales')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('unit.index') }}" :active="request()->routeIs('unit.index')">
                    {{ __('Data Unit') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminsales')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('salesmaster.index') }}"
                    :active="request()->routeIs('salesmaster.index')">
                    {{ __('Data Sales') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminservice') || Auth::user()->hakakses('adminwarehouse')||
        Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('customermaster.index') }}"
                    :active="request()->routeIs('customermaster.index')">
                    {{ __("Data Customer") }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminservice') || Auth::user()->hakakses('adminwarehouse')||
        Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('supplier.index') }}" :active="request()->routeIs('supplier.index')">
                    {{ __('Data Supplier') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif
    </ul>
    </li>
    {{-- Master Data / --}}

    {{-- Data Tables --}}

    <button type="button"
        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
        aria-controls="dropdown-example" data-collapse-toggle="dropdown-data">
        <svg aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"></path>
        </svg>
        <span class="flex-1 ml-1 text-left whitespace-nowrap">Data Tables</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul id="dropdown-data" class="hidden py-2 space-y-2">
        @if (Auth::user()->hakakses('adminservice') || Auth::user()->hakakses('adminwarehouse')||
        Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('product.index') }}" :active="request()->routeIs('product.index')">
                    {{ __('Part Order Service') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminsales')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('sales.index') }}" :active="request()->routeIs('sales.index')">
                    {{ __('Penjualan Unit Sales') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminservice')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('customer.index') }}" :active="request()->routeIs('customer.index')">
                    {{ __('Customers Service Component') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminwarehouse')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('brgmsk.index') }}" :active="request()->routeIs('brgmsk.index')">
                    {{ __('Barang Masuk') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminwarehouse')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('brgkeluar.index') }}" :active="request()->routeIs('brgkeluar.index')">
                    {{ __('Barang Keluar') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminservice') || Auth::user()->hakakses('adminwarehouse')||
        Auth::user()->hakakses('adminsales')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('custorder.index') }}" :active="request()->routeIs('custorder.index')">
                    {{ __('Customers Order') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminservice') || Auth::user()->hakakses('adminwarehouse')||
        Auth::user()->hakakses('adminsales')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('transorder.index') }}" :active="request()->routeIs('transorder.index')">
                    {{ __('Transfer Order For Customer') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminsales') || Auth::user()->hakakses('adminwarehouse')||
        Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('partretur.index') }}" :active="request()->routeIs('partretur.index')">
                    {{ __('Part Retur') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

    </ul>

    <button type="button"
        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
        aria-controls="dropdown-example" data-collapse-toggle="dropdown-rekap">
        <svg aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"></path>
        </svg>
        <span class="flex-1 ml-1 text-left whitespace-nowrap">Rekap Report <br> Penjualan Sales</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul id="dropdown-rekap" class="hidden py-2 space-y-2">
        @if (Auth::user()->hakakses('adminsales')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('pernama') }}" :active="request()->routeIs('pernama')">
                    {{ __('Rekap Penjualan Sales Berdasarkan Nama') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminsales')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('perbulan') }}" :active="request()->routeIs('perbulan')">
                    {{ __('Rekap Penjualan Sales Pertahun/Perbulan') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif

        @if (Auth::user()->hakakses('adminsales')|| Auth::user()->hakakses('superadmin'))
        <li>
            <div
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <x-jet-nav-link href="{{ route('notapembelian') }}" :active="request()->routeIs('notapembelian')">
                    {{ __('Report Nota Pembelian') }}
                </x-jet-nav-link>
            </div>
        </li>
        @endif
    </ul>
    {{-- Data Tables --}}

























    {{-- Examples --}}

    {{--
    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')" />
    --}}

    {{-- <x-sidebar.dropdown title="Buttons" :active="Str::startsWith(request()->route()->uri(), 'buttons')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Text button" href="{{ route('buttons.text') }}"
            :active="request()->routeIs('buttons.text')" />
        <x-sidebar.sublink title="Icon button" href="{{ route('buttons.icon') }}"
            :active="request()->routeIs('buttons.icon')" />
        <x-sidebar.sublink title="Text with icon" href="{{ route('buttons.text-icon') }}"
            :active="request()->routeIs('buttons.text-icon')" />
    </x-sidebar.dropdown> --}}
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</x-perfect-scrollbar>
