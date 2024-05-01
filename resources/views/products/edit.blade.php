@extends('layout')

@section('content')
    <div class="container">
        <h1>Edit Data</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="shift">Shift</label>
                <select name="shift" id="shift" class="form-control">
                    <option value="">-- Shift --</option>
                    <option value="A" {{ $product->shift == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $product->shift == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ $product->shift == 'C' ? 'selected' : '' }}>C</option>
                </select>
            </div>            
            <div class="form-group">
                <label for="part_id">Part Model</label>
                <select name="part_id" id="parts" class="form-control select2">
                    @foreach ($parts as $part)
                        <option value="{{ $part->id }}" {{ $part->id == $product->part_id ? 'selected' : '' }}>{{ $part->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customers" class="form-control select2">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $customer->id == $product->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="qty_id">QTY</label>
                <select name="qty_id" id="qty" class="form-control select2">
                    @foreach ($qtys as $qty)
                    <option value="{{ $qty->id }}" {{ $qty->id == $product->qty_id ? 'selected' : '' }}>{{ $qty->name }}</option>
                     @endforeach                   
                </select> 
            </div>
            <div class="form-group">
                <label for="bop">BOP</label>
                <input type="text" name="bop" id="bop" class="form-control" value="{{ $product->bop }}">
            </div>
            <div class="form-group">
                <label for="leader">Leader</label>
                <input type="text" name="leader" id="leader" class="form-control" value="{{ $product->leader }}">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $product->keterangan }}">
            </div>
            <button type="submit" class="btn btn-primary" onclick="return confirmAction('mengedit')">Submit</button>
        </form>
        <script>
            function confirmAction(action) {
                return confirm(`Apakah anda yakin ingin ${action} data?`);
            }
        </script>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/select2-init.js') }}"></script>
<script src="{{ asset('js/refresh-bht.js') }}"></script>
<script src="{{ asset('js/autofillketerangan.js') }}"></script>
<script>
</script>
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
    var relations = {!! json_encode($relations) !!};
    var customers = {!! json_encode($customers) !!};
    var qtys = {!! json_encode($qtys) !!};
    function confirmAction(action) {
            var partName = $('#parts option:selected').text();
            return confirm(`Apakah anda yakin ingin ${action} data untuk Part ${partName} ?`);
        }
    </script>
@endsection