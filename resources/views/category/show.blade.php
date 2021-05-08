<x-layouts.app>
  <div class="container">
    <h2 class="title is-2">{{ $category->name }}</h2>
    <div class="columns is-multiline">
      @foreach ($category->posts as $post)
      <div class="column is-4">
        <a href="{{ route('posts.show', $post) }}">
          <div class="card" style="height: 100%;">
            <div class="card-image">
              <figure class="image is-4by3">
                <img src="{{ $post->featured_image }}" alt="Placeholder image">
              </figure>
            </div>
            <div class="card-content">
              <div class="media">
                <div class="media-left">
                  <figure class="image is-48x48">
                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                  </figure>
                </div>
                <div class="media-content">
                  <p class="title is-4">{{ $post->title }}</p>
                  <p class="subtitle is-6">@johnsmith</p>
                </div>
              </div>
              <div class="content">
                {{-- {{ $post->content }} --}}
                {{ Str::limit($post->content, 80) }} ...
                <br>
                <a href="{{ route('posts.show', $post) }}">
                  read more
                </a>
                <br>
                <time datetime="2016-1-1">{{ $post->created_at }}</time>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</x-layouts.app>
