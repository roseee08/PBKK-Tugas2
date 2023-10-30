<link rel = "stylesheet" href="{{asset ('css/style.css') }}">

<h1>DAFTAR PENULIS</h1>
<h2><a href="{{ route('author.create') }}">Tambah</a>
    @if (session()-> has('pesan'))
        <div style="color:rgb(0, 0, 0)">
            {{session()->get('pesan')}}
    @endif </h2>
@show
@foreach ($authors as $Author) 
    <div class="author-item">
        <div>
            ID: {{ $Author->id }}
            <br>
            Nama Penulis: {{ $Author->name }}
            <br>
            Email: {{ $Author->email }}
            <br>
            Alamat: {{ $Author->address }}
        </div>
        <div>
            <a href="{{ route('author.show', $Author->id) }}">Lihat</a>
            <a href="{{ route('author.edit', $Author->id) }}">Edit</a>
           
            <form action="{{ route('author.destroy', $Author->id) }}" method="post" class="delete-form">
                @csrf
                @method('DELETE')
                <input type="submit" value="Hapus">
            </form>
        </div>
    </div>
    <hr>
@endforeach
