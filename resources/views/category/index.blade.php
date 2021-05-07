<x-layouts.app>
  Category INdex page
  this is where you will see all categories
  <ul>
    @foreach ($category->posts as $post)
      <li>{{ $post->title }}</li>
    @endforeach
  </ul>
</x-layouts.app>
