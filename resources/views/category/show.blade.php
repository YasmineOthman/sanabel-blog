<x-layouts.app>
  <h2 class="title is-2">{{ $category->name }}</h2>
  <ul>
    @foreach ($category->posts as $post)
      <li>{{ $post->title }}</li>
    @endforeach
  </ul>
</x-layouts.app>
