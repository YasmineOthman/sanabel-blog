<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="title is-2">Edit {{ $category->name }}</div>
      <form action="/categories/{{ $category->id }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="field">
          <label class="label">name</label>
          <div class="control">
            <input class="input @error('name')is-danger @enderror" name="name" type="text" value="{{ old('name') }}" placeholder="Category Name">
          </div>
          @error('name')
          <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">slug</label>
          <div class="control">
            <input class="input @error('slug')is-danger @enderror" name="slug" type="text" value="{{ old('slug') }}" placeholder="Slug">
          </div>
          @error('slug')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">Featured Image (URL)</label>
          <div class="control">
            <input class="input @error('icon')is-danger @enderror" name="icon" type="text" value="{{ old('icon') }}" placeholder="http://hi.com/pic.jpg">
          </div>
          @error('icon')
          <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link">Update Category</button>
          </div>
          <div class="control">
            <button class="button is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
