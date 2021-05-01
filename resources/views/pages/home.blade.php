<x-layouts.app>
  <section class="hero is-large is-primary">
    <div class="container">
      <div class="hero-body has-text-centered">
        <p class="title">
          Sanabel Blog
        </p>
        <p class="subtitle">
          Welcome to our Blog, here you will learn about Laravel
        </p>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="title is-3 has-text-centered">
        Our Latest Posts
      </div>
      {{-- row --}}
      <div class="columns">
        @foreach ($posts as $post)
        <div class="column">
          <a href="{{ route('posts.show', $post) }}">
            <div class="card">
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
                  {{ $post->content }}
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
  </section>
</x-layouts.app>
