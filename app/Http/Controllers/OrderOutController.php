<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\ResponseResult\ResultMessage;
use App\OrderOut;
use App\OrderOutDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderOutController extends Controller
{
    public function index()
    {
        return OrderOut::with(["orderOutDetail", "Customer"])
            ->orderBy('OrdOutID', "desc")
            ->paginate(10);
    }

    public function order(Request $request)
    {
        $result = new ResultMessage();
        DB::beginTransaction();
        try {
            $customer = $request["customer"];
            $savedCustomer = Customer::firstOrcreate($customer);
            $order = new OrderOut();
            $order->CusID = $savedCustomer->CusID;
            $order->DateOut = Carbon::today();
            $order->status = 'Pending';
            $order->save();
            $orderDetails = $request["OrderDetail"];
            foreach ($orderDetails as $orderDetail) {
                $orderDetail["OrdOutID"] = $order->OrdOutID;
                OrderOutDetail::create($orderDetail);
            }

            $result->setMessage("Order successfully!");
            $result->setError(false);
            DB::commit();
        } catch (\Exception $exception) {
            $result->setMessage($exception->getMessage());
            $result->setError(true);
            DB::rollBack();
        }

        return response()->json($result);
    }

    public function orderDetail($id)
    {
        return OrderOut::findOrFail($id)->orderOutDetail()->get()->load("product", "parcel");
    }
}
