@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Registrasi Calon Peserta</h2>

    <form method="POST" action="">
        @csrf

        <div class="mb-3">
            <label>NUPTK</label>
            <input type="text" name="nuptk" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Cek Data
        </button>
    </form>
</div>
@endsection