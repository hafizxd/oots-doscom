@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Data Product</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('products.create') }}" type="button" class="btn btn-primary">Tambah</a>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->description }}</td>
                                        <td>{{ $value->stock }}</td>
                                        <td>Rp. {{ number_format($value->price, 2, '.', ',') }}</td>
                                        <td>
                                            <div style="display: flex; gap: 5px;">
                                                <a href="{{ route('products.edit', $value->id) }}" type="button" class="btn btn-warning">Edit</a>
                                                {{-- <button onclick="document.querySelector('#form-delete-{{ $value->id }}').submit();" class="btn btn-danger">Hapus</button> --}}
                                                <form method="POST" action="{{ route('products.delete', $value->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger" value="Hapus">
                                                </form>
                                                {{-- <a href="{{ route('products.delete', $value->id) }}" type="button" class="btn btn-dangert">Hapus</a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
