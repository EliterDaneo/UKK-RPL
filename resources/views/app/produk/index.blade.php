@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card shadow-sm">
                <div class="card-header">
                    <a href="{{ route('produk.create') }}" class="btn btn-outline-primary">Tambah Produk</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Stok Produk</th>
                                <th scope="col">Gambar Produk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produks as $no => $product)
                                <tr>
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td><img src="{{ asset('storage/public/' . $product->image ?? 'Tidak ada Gambar') }}"
                                            alt="profile" width="60px"></td>
                                    <td>
                                        <a href="{{ route('produk.edit', $product->id) }}"
                                            class="btn btn-outline-primary">Edit</a>
                                        <form action="{{ route('produk.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
