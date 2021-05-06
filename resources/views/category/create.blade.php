<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="title is-2">Create New Category</div>
      <form action="{{ route('categories.store') }}" method="POST">
        @csrf
            <div class="field">
              <label class="label">Category Name</label>
              <div class="control">
                <input class="input @error('name')is-danger @enderror" name="name" type="text" value="{{ old('name') }}" placeholder="name">
              </div>
              @error('name')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>

        <div class="field">
          <label class="label">Category Icon</label>
          <div class="control">
            <input class="input @error('icon')is-danger @enderror" name="icon" type="text" value="{{ old('icon') }}" placeholder="http://hi.com/icon.jpg">
          </div>
          @error('icon')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link">Create new Category</button>
          </div>
          <div class="control">
            <button class="button is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
