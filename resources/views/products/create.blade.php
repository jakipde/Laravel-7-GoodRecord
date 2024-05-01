@extends('layout')

@section('content')
    <div class="container">
        <center><h1>Tambah Data</h1></center>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <button id="refresh-bht" type="button" class="btn btn-info mb-3">Refresh BHT</button>            
            <meta name="fetch-bht-data-url" content="{{ route('fetch-bht-data') }}">            
            <br></br>
            <div class="form-group">
                <label for="shift">Shift</label>
                <select name="shift" id="shift" class="form-control">
                    <option value="">-- Shift --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>                      
            <div class="form-group">
                <label for="part_id">Part Model</label>
                <select name="part_id" id="parts" class="form-control select2">
                    <option value="">-- Part Model --</option>
                    @foreach ($parts as $part)
                        <option value="{{ $part->id }}">{{ $part->name }}</option>
                    @endforeach
                </select>            
            </div>
            <div class="form-group">
                <label for="customer_id">Customer:</label>
                <select name="customer_id" id="customers" class="form-control select2">
                    <option value="">-- Select Customer --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>            
            <div class="form-group">
                <label for="qty_id">QTY</label>
                <select name="qty_id" id="qty" class="form-control select2">
                    <option value="">-- Select QTY --</option>
                    @foreach ($qtys as $qty)
                    <option value="{{ $qty->id }}">{{ $qty->name }}</option>
                     @endforeach                   
                </select>                
            </div>
            <div class="form-group">
                <label for="bop">BOP</label>
                <input type="text" class="form-control" id="bop" name="bop">
            </div>
            <div class="form-group">
                <label for="leader">Leader</label>
                <input type="text" class="form-control" id="leader" name="leader">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan">{{ $currentDate }}-{{ $currentMonth }}-H {{ $currentTimeSlot }}-{{ $productCount }}</textarea>
            </div>            
            <button type="submit" class="btn btn-primary" onclick="return confirmAction('menambahkan')">Submit</button>
        </form>
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