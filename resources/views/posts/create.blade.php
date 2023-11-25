<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-box>
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="thumbnail" type="file" />
                <x-form.input name="excerpt" />
                <x-form.textarea name="body" />

                <x-form.section>
                    <x-form.lable name="category" />

                    <select id="category_id" name="category_id">
                        @php
                        $categories= \App\Models\Category::all()
                        @endphp

                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected':''}}>
                            {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="category" />
                </x-form.section>

                <x-submit-button name="post"/>

            </form>

        </x-box>
    </section>
</x-layout>
