@extends('template.gawan')

@php
$title = 'Data Kucing';
$pretitle = 'Tambah Data Kucing';
@endphp

@section('konten')
<div class="card">
    <div class="card-body">
        <form class="card" action="{{ route('cats.store') }}" method="post">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Isi Data</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama Kucing</label>
                    <div>
                        <input type="name" name="nama_cat" class="form-control 
                        @error('nama_cat') 
                            is-invalid
                        @enderror" value="{{old('nama_cat')}}">
                        @error('nama_cat')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kucing</label>
                    <div>
                        <input type="name" name="jenis_cat" class="form-control 
                        @error('jenis_cat') 
                            is-invalid
                        @enderror" value="{{old('jenis_cat')}}">
                        @error('jenis_cat')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Umur Kucing</label>
                    <div>
                        <input type="name" name="umur_cat" class="form-control
                        @error('umur_cat') 
                            is-invalid
                        @enderror" value="{{old('umur_cat')}}">
                        @error('umur_cat')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection