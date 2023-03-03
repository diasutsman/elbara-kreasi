<nav aria-label="sidebar">
    <div
        class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">

        <div
            class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <a href="{{ route('admin.dashboard') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white @if (Request::is('admin')) border-b-2 border-blue-600 @endif transition-colors duration-300">
                        <i class="bi @if (Request::is('admin')) bi-house-door-fill @else bi-house-door @endif pr-0 md:pr-3 @if (Request::is('admin')) text-blue-600 @endif"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Dashboard</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('admin.categories.index') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500 transition-colors duration-300 @if (Request::is('admin/categories')) border-b-2 border-purple-500 @endif">
                        <i class="bi @if (Request::is('admin/categories')) bi-bookmarks-fill @else bi-bookmarks @endif pr-0 md:pr-3 @if (Request::is('admin/categories')) text-purple-500 @endif"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Categories</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('admin.products.index') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 hover:border-pink-500 @if (Request::is('admin/products')) border-pink-500 @else border-gray-800 @endif transition-colors duration-300">
                        <i class="bi bi-card-list pr-0 md:pr-3 @if (Request::is('admin/products')) text-pink-500 @endif"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Products</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#"
                        class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500 transition-colors duration-300">
                        <i class="fa fa-wallet pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Payments</span>
                    </a>
                </li>
            </ul>
        </div>


    </div>
</nav>
