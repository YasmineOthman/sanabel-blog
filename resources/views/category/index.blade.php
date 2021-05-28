<x-layouts.app>

<section class="section">
    <div class="container">
      <div class="title is-3 has-text-centered">
        Categories
      </div>

<div class="columns is-mobile is-multiline is-centered">
  @foreach ($categories as $category)
  <div class="column is-narrow">
    <p class="bd-notification is-primary">
      
          <button class="button" class="button is-success">  {{ $category->name }} </button>
          <button class="button" class="button is-success">
          <a href="{{ route('posts_category',$category) }}"><b> POSTS</b></a></button>
            
        @auth <button class="button" class="button is-success">
          <a href="{{ route('categories.edit', $category) }}"><b>edit</b></a></button> @endauth

    </p>
  </div>
   @endforeach
   
</div>
</div>
</section>
</x-layouts.app>
