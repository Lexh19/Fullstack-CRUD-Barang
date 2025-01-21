@extends('welcome')

@section('content')
<div class="container">
    <h1>Daftar Barang</h1>
    <table id="barang-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga Beli</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data akan dimuat menggunakan AJAX -->
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#barang-table').DataTable({
            ajax: '{{ url("/api/barang") }}', 
            columns: [
                { data: 'id' },
                { data: 'kodebrg' },
                { data: 'namabrg' },
                { data: 'satuan' },
                { data: 'hargabeli' }
            ]
        });
    });
</script>
@endpush
