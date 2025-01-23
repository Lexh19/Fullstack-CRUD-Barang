@extends('welcome')

@section('content')
<div class="container">
    <div class="content">

    <h1>Data Suplier</h1>
    <table id="suplier-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Suplier</th>
                <th>Nama Suplier</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data akan dimuat menggunakan AJAX -->
        </tbody>
    </table>
    </div>
</div>
@endsection
@push('scripts')

@push('scripts')

<script>
    $(document).ready(function () {
        $('#suplier-table').DataTable({
            ajax: '/api/suplier',
            columns: [
                { data: 'id' },
                { data: 'kodespl' },
                { data: 'namaspl' }
            ]
        });
    });
</script>
@endpush


