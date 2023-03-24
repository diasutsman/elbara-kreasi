<nav aria-label="sidebar">
    <div
        class="fixed bottom-0 z-10 mt-12 h-20 w-full content-center bg-gray-800 shadow-xl md:relative md:h-screen md:w-48">

        <div
            class="content-center justify-between text-left md:fixed md:left-0 md:top-0 md:mt-12 md:w-48 md:content-start">
            <ul class="list-reset flex flex-row px-1 pt-3 text-center md:flex-col md:py-3 md:px-2 md:text-left">
                <li class="mr-3 flex-1">
                    <a class="@if (Request::is('admin')) border-b-2 border-blue-600 @endif block py-1 pl-1 align-middle text-white no-underline transition-colors duration-300 hover:text-white md:py-3"
                        href="{{ route('admin.dashboard') }}">
                        <i
                            class="bi @if (Request::is('admin')) bi-house-door-fill @else bi-house-door @endif @if (Request::is('admin')) text-blue-600 @endif pr-0 md:pr-3"></i><span
                            class="block pb-1 text-xs text-white md:inline-block md:pb-0 md:text-base md:text-white">Dashboard</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a class="@if (Request::is('admin/categories')) border-b-2 border-purple-500 @endif block border-b-2 border-gray-800 py-1 pl-1 align-middle text-white no-underline transition-colors duration-300 hover:border-purple-500 hover:text-white md:py-3"
                        href="{{ route('admin.categories.index') }}">
                        <i
                            class="bi @if (Request::is('admin/categories')) bi-bookmarks-fill @else bi-bookmarks @endif @if (Request::is('admin/categories')) text-purple-500 @endif pr-0 md:pr-3"></i><span
                            class="block pb-1 text-xs text-gray-400 md:inline-block md:pb-0 md:text-base md:text-gray-200">Categories</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a class="@if (Request::is('admin/products')) border-pink-500 @else border-gray-800 @endif block border-b-2 py-1 pl-1 align-middle text-white no-underline transition-colors duration-300 hover:border-pink-500 hover:text-white md:py-3"
                        href="{{ route('admin.products.index') }}">
                        <i
                            class="bi bi-card-list @if (Request::is('admin/products')) text-pink-500 @endif pr-0 md:pr-3"></i><span
                            class="block pb-1 text-xs text-gray-400 md:inline-block md:pb-0 md:text-base md:text-gray-200">Products</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a class="@if (Request::is('admin/portfolios')) border-yellow-500 @else border-gray-800 @endif block border-b-2 py-1 pl-1 align-middle text-white no-underline transition-colors duration-300 hover:border-yellow-500 hover:text-white md:py-3"
                        href="{{ route('admin.portfolios.index') }}">
                        <i
                            class="bi bi-images @if (Request::is('admin/portfolios')) text-yellow-500 @endif pr-0 md:pr-3"></i><span
                            class="block pb-1 text-xs text-gray-400 md:inline-block md:pb-0 md:text-base md:text-gray-200">Portfolios</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
