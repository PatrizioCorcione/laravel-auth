@extends('layouts.admin')
@section('content')
  <div class="container my-5">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger " role='alert'>
        <ul>
          @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('admin.project.store') }}" method="POST">
      @csrf
      <input type="text" name="title" id="">
      <input type="text" name="description" id="">
      <button type="submit">Invia</button>
    </form>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Titolo</th>
          <th scope="col">Descrizione</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($project as $item)
          <tr>
            <form action="{{ route('admin.project.update', $item) }}" method="POST" id="form-edit-{{ $item->id }}">
              @csrf
              @method('PUT')

              <td>
                <input type="text" value="{{ $item->title }}" name="title">
              </td>
              <td>
                <input type="text" value="{{ $item->description }}" name="description">
              </td>
            </form>
            <td>
              <button class="btn btn-warning " onclick="submitForm('form-edit-{{ $item->id }}')">
                <i class="fa-solid fa-pen-nib text-black "></i></a>
              </button>
              <button class="btn btn-danger ">
                {{-- <a href="{{ route('admin.project.destroy') }}" --}}><i class="fa-solid fa-delete-left text-black "></i></a>
              </button>
            </td>
          </tr>
        @empty
          <h2>Nessun elemento presente</h2>
        @endforelse
      </tbody>
    </table>
  </div>
  <script>
    function submitForm(id) {
      const form = document.getElementById(id)

      form.submit();
    }
  </script>
@endsection
