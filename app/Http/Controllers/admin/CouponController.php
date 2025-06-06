<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;

class CouponController extends Controller
{
    public function renderCoupons()
    {
        $coupons = Coupon::orderBy('created_at', 'desc')->get();
        return view('admin.coupon.addCoupons', compact('coupons'));
    }

    public function postCouponsMethod(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:coupons,code|max:50',
            'type' => 'required|in:percent,fixed',
            'value' => 'required|numeric|min:1',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'usage_limit' => 'required|integer|min:1',
            'min_amount' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ], [
            'code.required' => 'Coupon code is required.',
            'code.string' => 'Coupon code must be a valid text.',
            'code.unique' => 'This coupon code already exists.',
            'code.max' => 'Coupon code must not exceed 50 characters.',

            'type.required' => 'Discount type is required.',
            'type.in' => 'Invalid discount type selected.',

            'value.required' => 'Discount value is required.',
            'value.numeric' => 'Discount value must be a number.',
            'value.min' => 'Discount value must be at least 1.',

            'start_date.required' => 'Start date is required.',
            'start_date.date' => 'Invalid start date format.',
            'start_date.after_or_equal' => 'Start date must be today or later.',

            'end_date.required' => 'End date is required.',
            'end_date.date' => 'Invalid end date format.',
            'end_date.after' => 'End date must be after the start date.',

            'usage_limit.integer' => 'Usage limit must be a whole number.',
            'usage_limit.min' => 'Usage limit must be at least 1.',

            'min_amount.numeric' => 'Minimum spend must be a number.',
            'min_amount.min' => 'Minimum spend cannot be negative.',

            'is_active.boolean' => 'Invalid active coupon value.',
        ]);

        $c = new Coupon();
        $c->code = $request->code;
        $c->type = $request->type;
        $c->value = $request->value;
        $c->start_date = $request->start_date;
        $c->end_date = $request->end_date;
        $c->usage_limit = $request->usage_limit;
        $c->min_amount = $request->min_amount;
        $c->is_active = $request->is_active;
        $c->used_count = 0;
        $c->save();
        $couponText = $c->code . ' Coupon created successfully';
        return redirect()->route('coupons')->with('success', $couponText);
    }

    public function renderEditCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->start_date = Carbon::parse($coupon->start_date)->format('Y-m-d');
        $coupon->end_date = Carbon::parse($coupon->end_date)->format('Y-m-d');
        return view('admin.coupon.editCoupons', compact('coupon'));
    }
    public function editCoupon($id, Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50',
            'type' => 'required|in:percent,fixed',
            'value' => 'required|numeric|min:1',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'usage_limit' => 'required|integer|min:1',
            'min_amount' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ], [
            'code.required' => 'Coupon code is required.',
            'code.string' => 'Coupon code must be a valid text.',
            'code.unique' => 'This coupon code already exists.',
            'code.max' => 'Coupon code must not exceed 50 characters.',

            'type.required' => 'Discount type is required.',
            'type.in' => 'Invalid discount type selected.',

            'value.required' => 'Discount value is required.',
            'value.numeric' => 'Discount value must be a number.',
            'value.min' => 'Discount value must be at least 1.',

            'start_date.required' => 'Start date is required.',
            'start_date.date' => 'Invalid start date format.',
            'start_date.after_or_equal' => 'Start date must be today or later.',

            'end_date.required' => 'End date is required.',
            'end_date.date' => 'Invalid end date format.',
            'end_date.after' => 'End date must be after the start date.',

            'usage_limit.integer' => 'Usage limit must be a whole number.',
            'usage_limit.min' => 'Usage limit must be at least 1.',

            'min_amount.numeric' => 'Minimum spend must be a number.',
            'min_amount.min' => 'Minimum spend cannot be negative.',

            'is_active.boolean' => 'Invalid active coupon value.',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->usage_limit = $request->usage_limit;
        $coupon->min_amount = $request->min_amount;
        $coupon->is_active = $request->is_active;
        $coupon->used_count = 0;
        $coupon->save();
        $couponText = $coupon->code . ' Coupon Update successfully';
        return redirect()->route('coupons')->with('success', $couponText);
    }

    public function deleteCouponById($id)
    {
        $getCouponId = Coupon::findOrFail($id);
        $deleteMessage = "" . $getCouponId->code . " Coupon Deleted Successfully";
        $getCouponId->delete();
        return redirect()->route('coupons')->with('success', $deleteMessage);
    }

}