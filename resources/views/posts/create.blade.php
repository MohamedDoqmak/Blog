<x-layout>
    <section class="px-6 py-8">
        <x-box class="max-w-sm mx-auto">
            <form method="POST" action="/admin/posts">
                @csrf
                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="title">
                        {{ __('title') }}
                    </label>

                    <input class="w-full p-2 border border-gray-400 rounded" type="text" id="title" name="title"
                        value="{{ old('title') }}" required>
                    @error('title')
                    <span class="text-xs text-red-600 font-semibold">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="slug">
                        {{ __('slug') }}
                    </label>

                    <input class="w-full p-2 border border-gray-400 rounded" type="text" id="slug" name="slug"
                        value="{{ old('slug') }}" required>
                    @error('slug')
                    <span class="text-xs text-red-600 font-semibold">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="excerpt">
                        {{ __('excerpt') }}
                    </label>

                    <textarea class="w-full p-2 border border-gray-400 rounded" id="excerpt" name="excerpt" value=""
                        required>
                    </textarea>
                    @error('excerpt')
                    <span class="text-xs text-red-600 font-semibold">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="body">
                        {{ __('body') }}
                    </label>

                    <textarea class="w-full p-2 border border-gray-400 rounded" id="body" name="body" value="" required>
                    </textarea>

                    @error('body')
                    <span class="text-xs text-red-600 font-semibold">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="category_id">
                        {{ __('category') }}
                    </label>

                    <select id="category_id" name="category_id">
                        @php
                        $categories= \App\Models\Category::all()
                        @endphp

                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected':''}}>
                            {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <span class="text-xs text-red-600 font-semibold">{{ $message }}</span>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>

            </form>

        </x-box>
    </section>
</x-layout>
