<x-layouts.app>
  Category INdex page
  this is where you will see all categories
  <ul>
    @foreach ($categories as $category)
      <li>{{ $category->name }}</li>
    @endforeach
  </ul>
</x-layouts.app>
