@extends('layout')

@section('content')
    <div class="container">
        <center>
            <h1>CHECKSHEET FINISH GOOD RECORD</h1>
            <center><h2>BF 23 TR 1 - INSPECTION</h2></center>
        </center>
        <div class="col-md-6">
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah</a>
            <button id="export-filtered" class="btn btn-success mb-3">Excel</button>
        </div>
        <div class="col-md-6">
            <input type="text" id="date-range-picker" placeholder="Select Date Range">
        </div>
        <br></br>
        <table id="products-table" class="products-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari Tanggal</th>
                    <th>Shift Grup</th>
                    <th>Part No</th>
                    <th>Customer</th>
                    <th>QTY</th>
                    <th>Jam</th>
                    <th>BOP</th>
                    <th>Leader</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d-m-Y') }}</td>
                        <td>{{ $product->shift }}</td>
                        <td>{{ $product->part->name }}</td>
                        <td>{{ $product->customer->name }}</td>
                        <td>{{ $product->qty->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($product->created_at)->timezone('Asia/Jakarta')->format(' H:i') }}</td>
                        <td>{{ $product->bop }}</td>
                        <td>{{ $product->leader }}</td>
                        <td>{{ $product->keterangan }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirmAction('menghapus')">Delete</button>
                            </form>
                            <script>
                                function confirmAction(action) {
                                    return confirm(`Apakah anda yakin ingin ${action} data?`);
                                }
                            </script>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
