<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Part;
use App\Models\Customer;
use App\Models\QTY;
use App\Models\PartCustomerQTYRelasi;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {

        // Get the current date and month
        $currentDate = now()->format('d');
        $currentMonth = now()->format('m');
        
        // Determine the current time slot based on the current time
        $currentTime = now()->format('H:i');
        $currentTimeSlot = $this->calculateTimeSlot($currentTime);
        
        // Fetch product count from the database for the determined time slot and add 1 for the next product to be inputted
        $productCount = Product::where('time_slot_id', $currentTimeSlot)->count() + 1;
        
        $parts = Part::all();
        $customers = Customer::all();
        $qtys = QTY::all();
        $relations = PartCustomerQTYRelasi::all();
        
        // Return the view with the current date, month, product count, current time slot, and other data
        return view('products.create', compact('currentDate', 'currentMonth', 'parts', 'customers', 'qtys', 'currentTimeSlot', 'productCount', 'relations'));
    }
        
    
    public function getProductCount(Request $request)
    {
        try {
            // Get the product ID from the request query parameters
            $productId = $request->query('product_id');
    
            // Query the timeslot table to count the number of records with the given product ID
            $productCount = Product::where('time_slot_id', $productId)->count();
    
            // Return the product count for the given product ID
            return response()->json(['productCount' => $productCount], 200);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Failed to fetch product count'], 500);
        }
    }    
    
private function calculateTimeSlot($currentTime)
{
    // Get the last product entry
    $lastProduct = Product::latest()->first();

    // Reset product count if the date has changed
    if ($lastProduct && $lastProduct->created_at->format('Y-m-d') !== now()->format('Y-m-d')) {
        Product::query()->update(['time_slot_id' => 0]);
    }

    $timeSlot = 5; // Default time slot if no match found

    // Convert current time to minutes for comparison
    list($hours, $minutes) = explode(':', $currentTime);
    $currentMinutes = (int)$hours * 60 + (int)$minutes;

    // Define time slot ranges
    $timeSlotRanges = [
        ['start' => 6 * 60 + 30, 'end' => 12 * 60],    // Time slot 1: 06:30 - 12:00
        ['start' => 12 * 60, 'end' => 19 * 60 + 30],   // Time slot 2: 12:00 - 19:30
        ['start' => 19 * 60 + 30, 'end' => 24 * 60],   // Time slot 3: 19:30 - 24:00
        ['start' => 0, 'end' => 6 * 60 + 30],          // Time slot 4: 00:00 - 06:30
    ];    

    // Determine the current time slot
    foreach ($timeSlotRanges as $index => $range) {
        if ($currentMinutes >= $range['start'] && $currentMinutes <= $range['end']) {
            $timeSlot = $index + 1; // Correctly adjust for one-based time slot numbering
            break;
        }
    }

    return $timeSlot;
}


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'shift' => 'required|in:A,B,C',
        'part_id' => 'required',
        'customer_id' => 'required',
        'qty_id' => 'required',
        'bop' => 'required|string',
        'leader' => 'required|string',
        'keterangan' => 'required|string',
    ]);

    // Determine the current date
    $currentDate = now()->format('d-m');

    // Determine the current time slot based on the current time
    $currentTime = now()->format('H:i');
    $currentTimeSlot = $this->calculateTimeSlot($currentTime);

    // Fetch the product count for the current time slot
    $productCount = Product::where('time_slot_id', $currentTimeSlot)->count() + 1;

    // Reset product count to 1 if the date has changed
    $lastProduct = Product::latest()->first();
    if ($lastProduct && $lastProduct->created_at->format('d-m') !== $currentDate) {
        $productCount = 1;
    }

    // Create a new Product instance and assign values
    $product = new Product;
    $product->shift = $request->shift;
    $product->part_id = $request->part_id;
    $product->customer_id = $request->customer_id;
    $product->qty_id = $request->qty_id;
    $product->bop = $request->bop;
    $product->leader = $request->leader;
    $product->keterangan = "$currentDate-H $currentTimeSlot-$productCount";
    $product->time_slot_id = $currentTimeSlot;
    $product->save();

    return redirect()->route('products.index')->with('success', 'Data berhasil disimpan');
}

          

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $parts = Part::all();
        $customers = Customer::all();
        $qtys = QTY::all();
        $relations = PartCustomerQTYRelasi::all();
        return view('products.edit', compact('product', 'parts', 'customers', 'qtys', 'relations'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'shift' => 'required',
            'part_id' => 'required',
            'customer_id' => 'required',
            'qty_id' => 'required',
            'bop' => 'required|string',
            'leader' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}