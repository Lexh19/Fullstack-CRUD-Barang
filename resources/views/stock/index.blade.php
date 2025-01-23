@extends('welcome')

@section('content')
<div class="container">
    <h1>Daftar Stok</h1>
    <table id="stock-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Qty</th>
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
    $(document).ready(function () {
        $('#stock-table').DataTable({
            ajax: '{{ url("/api/stock") }}',
            columns: [
                { data: 'kodebrg' },
                { data: 'qty' }
            ]
        });
    });
</script>
@endpush
