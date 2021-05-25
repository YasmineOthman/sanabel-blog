<x-layouts.app>
  <x-slot name="styles">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  </x-slot>
  <x-slot name="scripts">
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
      var quill = new Quill('#editor', {
        theme: 'snow'
      })

      quill.on('text-change', function(delta, source) {
        document.getElementById('content').value = quill.root.innerHTML
      })
    </script>
  </x-slot>
  <section class="section">
    <div class="container">
      <div class="title is-2">Create New Post</div>
      <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="field">
          <label class="label">Title</label>
          <div class="control">
            <input class="input @error('title')is-danger @enderror" name="title" type="text" value="{{ old('title') }}" placeholder="Post Title">
          </div>
          @error('title')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">slug</label>
          <div class="control">
            <input class="input @error('slug')is-danger @enderror" name="slug" type="text" value="{{ old('slug') }}" placeholder="Post Slug">
          </div>
          @error('slug')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>


        <div class="field">
          <label class="label">Category</label>

          <div class="control">
            <div class="select @error('category_id')is-danger @enderror">
              <select name="category_id" value="{{ old('category_id') }}">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('category_id')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">Tags</label>

          <div class="control">
            <div class="select is-multiple @error('tags')is-danger @enderror">
              <select name="tags[]" multiple>
                @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('tags')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">Featured Image (URL)</label>
          <div class="control">
            <input class="input @error('featured_image_url')is-danger @enderror" name="featured_image_url" type="text" value="{{ old('featured_image_url') }}" placeholder="http://hi.com/pic.jpg">
          </div>
          @error('featured_image_url')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">Featured Image (upload)</label>
          <div class="file">
            <label class="file-label">
              <input class="file-input" type="file" name="featured_image_upload" accept="image/*">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose an image…
                </span>
              </span>
            </label>
          </div>
          @error('featured_image_upload')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">Content</label>
          <div class="control">
            <div id="editor" class="textarea @error('content')is-danger @enderror" name="content" placeholder="Post Content">{{ old('content') }}</div>
            <input type="hidden" name="content" id="content">
          </div>
          @error('content')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link">Create new post</button>
          </div>
          <div class="control">
            <button class="button is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
