@extends('welcome')

@section('content')
<div class="container">
    <h1>Daftar Pembelian</h1>
    <table id="pembelian-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No Transaksi</th>
                <th>Kode Supplier</th>
                <th>Tanggal Pembelian</th>
                <th>Detail Pembelian</th>
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
        $('#pembelian-table').DataTable({
            ajax: '{{ url("/api/pembelian") }}',
            columns: [
                { data: 'notransaksi' },
                { data: 'kodespl' },
                { data: 'tglbeli' },
                {
                    data: 'details',
                    render: function (data) {
                        return data.map(d => `Barang: ${d.barang.namabrg}, Qty: ${d.qty}`).join('<br>');
                    }
                }
            ]
        });
    });
</script>
@endpush
