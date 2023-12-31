<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt">{{ old('excerpt') }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body') }}</x-form.textarea>

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

            <x-submit-button name="post" />

        </form>
    </x-setting>
</x-layout>
