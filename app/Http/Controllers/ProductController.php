<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        DB::table('products')->insert([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }


    // Inside ProductController.php or create a new controller if needed
public function saleTransactionHistory()
{
    $sales = Sale::latest()->paginate(10); // Assuming Sale is the model representing sale transactions

    return view('sales.transaction_history', compact('sales'));
}


public function dashboard()
{
    // Calculate sales figures for today, yesterday, this month, and last month
    $todaySales = $this->getSalesForDate(now()->toDateString());
    $yesterdaySales = $this->getSalesForDate(now()->subDay()->toDateString());
    $thisMonthSales = $this->getSalesForMonth(now()->format('Y-m'));
    $lastMonthSales = $this->getSalesForMonth(now()->subMonth()->format('Y-m'));

    return view('dashboard', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
}

private function getSalesForDate($date)
{
    return Sale::whereDate('created_at', $date)->sum('amount');
}

private function getSalesForMonth($month)
{
    return Sale::whereYear('created_at', substr($month, 0, 4))
        ->whereMonth('created_at', substr($month, 5, 2))
        ->sum('amount');
}


}
