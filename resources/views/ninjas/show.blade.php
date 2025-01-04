<x-layout>
  <div class="show">
    <h2 class="show__title">Ninja: {{ $ninja->name }}</h2>

    <div class="show__description bg-gray-200 p-4 rounded">
      <p><strong>Skill level:</strong> {{ $ninja->skill }}</p>
      <p><strong>About me:</strong></p>
      <p class="show__bio">{{ $ninja->bio }}</p>
    </div>

    <div class="show__dojo-info border-dashed bg-white px-4 pb-4 my-4 rounded">
      <p><strong>Dojo name:</strong> {{ $ninja->dojo->name }}</p>
      <p><strong>Location:</strong> {{ $ninja->dojo->location }}</p>
      <p><strong>About:</strong>{{ $ninja->dojo->description }}</p>
    </div>

    <form action="{{ route('ninjas.destroy', $ninja->id) }}" method="POST">
      @csrf
      @method('DELETE')

      <button type="submit" class="btn my-4">Delete</button>
    </form>
  </div>
</x-layout>
