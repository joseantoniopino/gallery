<nav class="w-30 h-screen py-3 left-0 bg-slate-400 dark:bg-custom-600 dark:text-slate-200 text-[#5A5A5A] shadow-md shadow-gray-800">
    <div class="flex flex-col space-y-4 p-3">
        <div><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div><a href="{{ route('posts.index') }}">Posts</a></div>
        <div><a href="{{ route('cars.index') }}">Cars</a></div>
        <div><a href="{{ route('authors.index') }}">Authors</a></div>
        <div><a href="{{ route('locations.index') }}">Locations</a></div>
    </div>
</nav>
