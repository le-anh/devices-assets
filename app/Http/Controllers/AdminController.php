<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        self::StatisticSellByMonth();
        $countBill = Bill::all()->count() ?? 0;
        $countOrdering = Order::all()->where('status', 0)->count() ?? 0;
        $countProduct = Product::all()->count() ?? 0;
        $countCustomer = Customer::all()->count() ?? 0;

        $productList = Product::all();
        $customerList = Customer::all();
        
        $statisticSellByMonth = json_encode(self::StatisticSellByMonth());

        return view('admin.index', compact('countBill', 'countOrdering', 'countProduct', 'countCustomer', 'productList', 'customerList', 'statisticSellByMonth'));
    }

    public static function StatisticSellByMonth()
    {
        $resultStatstic = [];
        $dateStart = date('Y-m-01');
        $dateEnd = Date('Y-m-d');

        for($i = 0; $i < 12; $i++)
        {
            $totalGrandSell = Bill::where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->sum('total');
            array_push($resultStatstic, ['month' => date('m-Y', strtotime($dateStart)), 'total' => $totalGrandSell ?? 0]);

            $dateStart = date('Y-m-01', strtotime($dateStart . '-1 month') );
            $dateEnd = date('Y-m-t', strtotime($dateStart));
        }

        return(json_encode($resultStatstic));

        return $resultStatstic;
    }
}
