<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderData;
use App\Models\Product;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {

        $totalUsers = User::where('role', '!=', '0')->count();
        $totalProducts = Product::all()->count();

        $unCanceledOrder = Order::where('status', '!=', 'canceled')->count();

        $totalOrders = Order::all();

        $recentOrders = OrderData::latest()->take(5)->with('product')->with('order')->get();

        $totalRevenue = Order::where('status', '!=', 'canceled')->sum('total_amount');

        $adminDetails = User::where('id', Auth::guard('admin')->id())->first();

        // Monthly Revenue Chart
        $monthlyRevenue = Order::selectRaw("MONTH(created_at) as month, sum(total_amount) as revenue")
            ->where('status', '!=', 'canceled')
            ->groupByRaw("MONTH(created_at)")
            ->pluck("revenue", "month");

        $months = [];
        $revenues = [];

        for ($i = 1; $i < 12; $i++) {
            $months[] = Carbon::create()->month($i)->format('M');
            $revenues[] = $monthlyRevenue->get($i, 0);
        }

        // Statistic Analyasis Chart
        $stats =
            DB::table('orders')
                ->join('order_data', 'orders.id', '=', 'order_data.order_id')
                ->selectRaw("MONTH(orders.created_at) as month , SUM(order_data.quantity) as total_sales, SUM(orders.total_amount) as total_sale_revenue")
                ->where('status', '!=', 'canceled')
                ->groupByRaw('MONTH(created_at)')
                ->orderByRaw('MONTH(created_at)')
                ->get();

        $sales = array_fill(1, 12, 0);
        $salesRevenues = array_fill(1, 12, 0);

        foreach ($stats as $sale) {
            $sales[$sale->month] = (int) $sale->total_sales;
            $salesRevenues[$sale->month] = (int) $sale->total_sale_revenue;
        }

        $sales = array_values($sales);
        $salesRevenues = array_values($salesRevenues);

        return view('admin.adminDashboard', compact('adminDetails', 'unCanceledOrder', 'totalRevenue', 'totalProducts', 'totalUsers', 'totalOrders', 'recentOrders', 'months', 'revenues', 'sales', 'salesRevenues'));
    }

}