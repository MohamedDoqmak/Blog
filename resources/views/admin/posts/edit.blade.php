<x-layout>
    <x-setting :heading="'Edit Post: '.$post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">

            <x-form.input name="title" :value="old('title',$post->title)" />
            <x-form.input name="slug" :value="old('slug',$post->slug)" />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->slug)" />
                </div>

                <div>
                    <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" width="120" class="rounded-xl ml-6">
                </div>
            </div>

            <x-form.textarea name="excerpt">{{ old('excerpt',$post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body',$post->body) }}</x-form.textarea>

            <x-form.section>
                <x-form.lable name="category" />

                <select id="category_id" name="category_id">
                    @php
                    $categories= \App\Models\Category::all()
                    @endphp

                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id',$post->category_id) == $category->id ?
                        'selected':''}}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.section>

            <x-submit-button name="Update" />

        </form>
    </x-setting>
</x-layout>
