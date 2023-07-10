@extends('template.gawan')

@php
$title = 'Data Kucing';
$pretitle = 'Ubah Data Kucing';
@endphp

@section('konten')
<div class="card">
    <div class="card-body">
        <form class="card" action="{{ route('cats.berubah', $cat->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h3 class="card-title">Ubah Data</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">Nama Kucing</label>
                    <div>
                        <input type="name" name="nama_cat" class="form-control 
                        @error('nama_cat') 
                        is-invalid
                        @enderror" value="{{ old('nama_cat') ?? $cat->nama_cat }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Jenis Kucing</label>
                    <div>
                        <input type="name" name="jenis_cat" class="form-control 
                        @error('jenis_cat') 
                        is-invalid
                        @enderror" value="{{ old('jenis_cat') ?? $cat->jenis_cat }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Umur Kucing</label>
                    <div>
                        <input type="name" name="umur_cat" class="form-control 
                        @error('umur_cat') 
                        is-invalid
                        @enderror" value="{{ old('umur_cat') ?? $cat->umur_cat }}">
                    </div>
                </div>

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>
@endsection