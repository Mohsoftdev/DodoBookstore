<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="w-1/2"></div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="{{Auth::user()->profile_photo_url}}">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
            <a href="{{ route('profile.show') }}" class="block px-4 py-2 account-link hover:text-white">Account</a>
            <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
            <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
        </div>
    </div>
</header>

<!-- Mobile Header & Nav -->
<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="bx bx-bars"></i>
            <i x-show="isOpen" class="bx bx-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <a href="{{route('admin.index')}} " class="flex items-center {{ request()->is('admin') ? 'active-nav-link' : ''}} text-white py-2 pl-6 nav-item">
            <i class='bx bx-tachometer text-xl me-1'></i>
            Dashboard
        </a>
        <a href="{{route('admin.books.index')}}" class="flex items-center {{ request()->is('admin/books') ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-2 pl-6 nav-item">
            <i class='bx bxs-book text-xl me-1'></i>
            Books
        </a>
        <a href="{{route('categories.list')}}" class="flex items-center {{ request()->is('admin/categories') ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-2 pl-6 nav-item">
            <i class='bx bx-list-ul text-xl me-1'></i>
            Categories
        </a>
        <a href="forms.html" class="flex items-center text-white {{ request()->is('admin/authors') ? 'active-nav-link' : ''}} opacity-75 hover:opacity-100 py-2 pl-6 nav-item">
            <i class='bx bxs-edit text-xl me-1'></i>
            Authors
        </a>
        <a href="tabs.html" class="flex items-center text-white {{ request()->is('admin/publishers') ? 'active-nav-link' : ''}} opacity-75 hover:opacity-100 py-2 pl-6 nav-item">
            <i class='bx bx-table text-xl me-1'></i>
            Publishers
        </a>
        <a href="calendar.html" class="flex items-center {{ request()->is('admin/users') ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-2 pl-6 nav-item">
            <i class='bx bxs-user text-xl me-1'></i>
            Users
        </a>
        <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class='bx bx-up-arrow-circle text-xl me-1'></i> Upgrade to Pro!
        </button>
    </nav>
    <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
</header>
