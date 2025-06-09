<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AdministratorController extends Controller
{
    public function getChangeAdminPassword()
    {
        return view('admin.administrator.adminChangePassword');
    }

    public function postChangeAdminPassword(Request $request)
    {
        $v = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($v->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $v->errors(),
            ], 422);

        }

        $adminId = User::where('id', Auth::guard('admin')->id())->first();
        if (!Hash::check($request->old_password, $adminId->password)) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'old_password' => ['Please enter correct old password.']
                ]
            ], 422);
        }

        if (Hash::check($request->new_password, $adminId->password)) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'new_password' => ["same as old password please use other"],
                ]
            ], 422);
        }

        if ($request->old_password === $request->new_password) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'new_password' => ['The new password must be different from the current password.']
                ]
            ], 422);
        }

        User::where('id', Auth::guard('admin')->id())->update(
            [
                'password' => Hash::make($request->new_password)
            ]
        );

        return response()->json([
            'status' => true,
            'message' => 'Admin Password updated successfully.'
        ]);
    }

    public function getContactUs(Request $request)
    {
        $query = ContactUs::query();

        if ($request->read === 'read') {
            $query->whereNotNull('read_at');
        } elseif ($request->read === 'unread') {
            $query->whereNull('read_at');
        }

        if ($request->status === 'resolved') {
            $query->where('is_resolved', 1);
        } elseif ($request->status === 'unresolved') {
            $query->where('is_resolved', '!=', 1)->orWhereNull('is_resolved');
        }

        $messages = $query->orderByDesc('created_at')->paginate(10);
        return view('admin.administrator.contact_us', compact('messages'));
    }

    public function showMessage(ContactUs $message)
    {
        return view('admin.administrator.show_message', compact('message'));
    }

    public function markAsRead(ContactUs $message)
    {
        $message->update(['read_at' => now()]);
        return back()->with('success', 'Marked as read.');
    }

    public function toggleResolved(ContactUs $message)
    {
        $message->update(['is_resolved' => !$message->is_resolved]);
        return back()->with('success', 'Resolved status updated.');
    }

    public function deleteMessage(ContactUs $message)
    {
        $message->delete();
        return back()->with('success', 'Message deleted.');
    }

}