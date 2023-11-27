@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold pb-2 mb-6 border-b">
        {{ $heading }}
    </h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-6">Links</h4>
            <ul>
                <li>
                    <a href="/admin/posts/create"
                        class="{{ request()->is('admin/posts/create') ? 'text-blue-500':'' }}">New Post</a>
                </li>
                <li>
                    <a href="/admin/posts"
                        class="{{ request()->is('admin/posts') ? 'text-blue-500':'' }}">All Posts</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-box>
                {{ $slot }}
            </x-box>
        </main>
    </div>
</section>
