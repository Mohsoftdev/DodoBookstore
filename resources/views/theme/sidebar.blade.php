<aside class="relative bg-sidebar h-screen w-80 hidden sm:block shadow-xl">
<div class="bg-logo p-3 flex items-center"><x-logo/><h1 class="font-bold text-white">DoDoBookstore</h1></div>
    <div class="p-6">


        <a href="{{route('admin.index')}}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class='bx bx-plus font-bold text-xl'></i> New Report
        </button> -->
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{route('admin.index')}} " class="flex items-center {{ request()->is('admin') ? 'active-nav-link' : ''}} text-white py-4 pl-6 nav-item">
            <i class='bx bx-tachometer text-xl me-1'></i>
            Dashboard
        </a>
        <a href="{{route('admin.books.index')}}" class="flex items-center {{ request()->is('admin/books') ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class='bx bxs-book text-xl me-1'></i>
            Books
        </a>
        <a href="{{route('categories.list')}}" class="flex items-center {{ request()->is('admin/categories') ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class='bx bx-list-ul text-xl me-1'></i>
            Categories
        </a>
        <a href="forms.html" class="flex items-center text-white {{ request()->is('admin/authors') ? 'active-nav-link' : ''}} opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class='bx bxs-edit text-xl me-1'></i>
            Authors
        </a>
        <a href="tabs.html" class="flex items-center text-white {{ request()->is('admin/publishers') ? 'active-nav-link' : ''}} opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class='bx bx-table text-xl me-1'></i>
            Publishers
        </a>
        <a href="calendar.html" class="flex items-center {{ request()->is('admin/users') ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class='bx bxs-user text-xl me-1'></i>
            Users
        </a>
    </nav>
    <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
       &copy; Mohamedelfatih 2024
    </a>
</aside>
