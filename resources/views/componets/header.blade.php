<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">CRUD App</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Barang</a></li>
            <li class="{{ request()->is('suplier') ? 'active' : '' }}"><a href="/suplier">Suplier</a></li>
            <li class="{{ request()->is('pembelian') ? 'active' : '' }}"><a href="/pembelian">Pembelian</a></li>
            <li class="{{ request()->is('stock') ? 'active' : '' }}"><a href="/stock">Stock</a></li>
        </ul>
    </div>
</nav>
