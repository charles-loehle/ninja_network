<x-layout>
  <div class="index">
    <h2>Currently Available Ninjas</h2>

    <ul class="index__ninja-list">
      @foreach ($ninjas as $ninja)
        <li class="index__ninja-list-item">
          <x-card :highlight="$ninja['skill'] > 70" href="{{ route('ninjas.show', $ninja->id) }}">
            <div>
              <h3 class="index__card-title">{{ $ninja->name }}</h3>
              <p class="index__dojo-name">{{ $ninja->dojo->name }}</p>
            </div>
          </x-card>
        </li>
      @endforeach
    </ul>
  </div>

  {{ $ninjas->links() }}
</x-layout>
