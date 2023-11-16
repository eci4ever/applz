@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Kategori Aduan UPPA List</div>
    <div class="card-body">
        @can('create-aduanuppa')
            <a href="{{ route('kategoriaduanuppas.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Tambah Kategori Aduan</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoriaduanuppas as $kategoriaduanuppa)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $kategoriaduanuppa->nama }}</td>
                    <td>
                        <form action="{{ route('kategoriaduanuppas.destroy', $kategoriaduanuppa->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            @can('edit-aduanuppa')
                                <a href="{{ route('kategoriaduanuppas.edit', $kategoriaduanuppa->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-aduanuppa')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this kategoriaduanuppa?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="3">
                        <span class="text-danger">
                            <strong>Tiada Jenis Aset Dijumpai!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $kategoriaduanuppas->links() }}

    </div>
</div>
@endsection