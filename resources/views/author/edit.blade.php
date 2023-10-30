<form action="{{ route('author.update', $Author->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <div>
        <label for="id">ID:</label>
        <input type="text" name="id" value="{{ old('id', $Author->id) }}" />
        <br>
        @error('id')
            <p>{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        Nama Penulis:
        <input type="text" name="name" value="{{ old('name', $Author->name) }}" />
        <br>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        Email:
        <input type="text" name="email" value="{{ old('email', $Author->email) }}" />
        <br>
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        Alamat:
        <textarea name="address">{{ old('address',$Author->address) }}</textarea>
        <br>
        @error('address')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <input type="submit" value="Simpan">
    </div>
    <br>
</form>

