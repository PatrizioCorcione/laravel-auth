@extends('layouts.admin')
@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="col-6">

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

        @if (session('deleted'))
          <div class="alert alert-primary" role='alert'>
            {{ session('deleted') }}
          </div>
        @endif

        <form action="{{ route('admin.technologies.store') }}" method="POST">
          @csrf
          <input type="text" name="technologies" id="">
          <button type="submit">Invia</button>
        </form>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Tecnologia</th>
              <th scope="col">Azioni</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($techno as $item)
              <tr>
                <form action="{{ route('admin.technologies.update', $item) }}" method="POST"
                  id="form-tech-{{ $item->id }}">
                  @csrf
                  @method('PUT')

                  <td>
                    <input type="text" value="{{ $item->technologies }}" name="technologies">
                  </td>
                </form>
                <td>
                  <button class="btn btn-warning " onclick="submitForm('form-tech-{{ $item->id }}')">
                    <i class="fa-solid fa-pen-nib text-black "></i></a>
                  </button>
                  <form class="d-inline-block" action="{{ route('admin.technologies.destroy', $item->id) }}"
                    method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger  index-btn"><i
                        class="fa-solid fa-circle-xmark"></i></button>
                  </form>
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
      <div class="col-6">
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

        @if (session('deleted'))
          <div class="alert alert-primary" role='alert'>
            {{ session('deleted') }}
          </div>
        @endif

        <form action="{{ route('admin.technologies.index') }}" method="POST">
          @csrf
          <input type="text" name="type" id="">
          <button type="submit">Invia</button>
        </form>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Tipi</th>
              <th scope="col">Azioni</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($type as $item)
              <tr>
                <form action="{{ route('admin.technologies.update', $item) }}" method="POST"
                  id="form-tech-{{ $item->id }}">
                  @csrf
                  @method('PUT')

                  <td>
                    <input type="text" value="{{ $item->type }}" name="technologies">
                  </td>
                </form>
                <td>
                  <button class="btn btn-warning " onclick="submitForm('form-tech-{{ $item->id }}')">
                    <i class="fa-solid fa-pen-nib text-black "></i></a>
                  </button>
                  <form class="d-inline-block" action="{{ route('admin.technologies.destroy', $item->id) }}"
                    method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo tipo ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger  index-btn"><i
                        class="fa-solid fa-circle-xmark"></i></button>
                  </form>
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
    </div>
  </div>
  </div>

@endsection
