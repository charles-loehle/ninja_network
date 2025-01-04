<x-layout>
  <div class="create">
    <form action="{{ route('ninjas.store') }}" method="post">
      @csrf

      <h2>Create New Ninja</h2>

      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" required>

      <label for="skill">Skill (0-100)</label>
      <input type="number" name="skill" id="skill" value="{{ old('skill') }}" required>

      <label for="bio">Bio</label>
      <textarea name="bio" id="bio" rows="5" required>{{ old('bio') }}</textarea>

      <label for="dojo_id">Dojo ID</label>
      <select name="dojo_id" id="dojo_id">
        <option value="" disabled selected></option>
        @foreach ($dojos as $dojo)
          <option value="{{ $dojo->id }}" {{ $dojo->id == old('dojo_id') ? 'selected' : '' }}>
            {{ $dojo->name }}
          </option>
        @endforeach
      </select>

      <button type="submit" class="btn mt-4">Create Ninja</button>
    </form>

    <!--  validation errors -->
    @if ($errors->any())
      <ul class="px-4 py-2 bg-red-100">
        @foreach ($errors->all() as $error)
          <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach
      </ul>
    @endif

  </div>
</x-layout>
