@extends('layout')

@section('content')
    <div class="container">
        <h1>Data Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Hari Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th scope="row">Shift Grup</th>
                    <td>{{ $product->shift }}</td>
                </tr>
                <tr>
                    <th scope="row">Part No</th>
                    <td>{{ $product->part->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Customer</th>
                    <td>{{ $product->customer->name }}</td>
                </tr>
                <tr>
                    <th scope="row">QTY</th>
                    <td>{{ $product->qty }}</td>
                </tr>
                <tr>
                    <th scope="row">Jam</th>
                    <td>{{ \Carbon\Carbon::parse($product->created_at)->timezone('Asia/Jakarta')->format('H:i') }}</td>
                </tr>
                <tr>
                    <th scope="row">BOP</th>
                    <td>{{ $product->bop }}</td>
                </tr>
                <tr>
                    <th scope="row">Leader</th>
                    <td>{{ $product->leader }}</td>
                </tr>
                <tr>
                    <th scope="row">Keterangan</th>
                    <td>{{ $product->keterangan }}</td>
                </tr>
                <tr>
                    <th scope="row">Dibuat Pada</th>
                    <td>{{ \Carbon\Carbon::parse($product->created_at)->timezone('Asia/Jakarta')->format('Y/m/d - H:i') }}</td>
                </tr>
                <tr>
                    <th scope="row">Diubah Pada</th>
                    <td>{{ \Carbon\Carbon::parse($product->updated_at)->timezone('Asia/Jakarta')->format('Y/m/d - H:i') }}</td>                </tr>
            </tbody>
        </table>
    </div>
@endsection
