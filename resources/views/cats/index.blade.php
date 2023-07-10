@extends('template.gawan')

@php
$title = 'Data Kucing';
$pretitle = 'Semua Data Kucing';
@endphp

@push('page-action')
<a href="{{ route('cats.new') }}" class="btn btn-info">Tambah Data</a>
@endpush

@section('konten')
<div class="card">
  <div class="table-responsive">
    <table class="table table-vcenter card-table">
      <thead>
        <tr>
          <th>Nama Kucing</th>
          <th>Jenis Kucing</th>
          <th>Umur Kucing</th>
          <th>Aksi</th>
          <th class="w-1"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cats as $cat)
        <tr>
          <td>{{$cat->nama_cat}}</td>
          <td>{{$cat->jenis_cat}}</td>
          <td>{{$cat->umur_cat}}</td>
          <td>
            <a href="{{ route ('cats.ubah', $cat->id )}}" class="btn btn-orange btn-sm mb-1">Ubah</a>
            <form action="{{ route ('cats.hapus', $cat->id )}}" method="post">
              @csrf
              @method('DELETE')
              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
@endsection