<?php

namespace App\Http\Controllers;

use App\Exports\ExportUsers;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Export users data to Excel.
     */
    public function export()
    {
        try {
            return Excel::download(new ExportUsers, 'users.xlsx');
        } catch (\Exception $e) {
            Log::error('Failed to export users data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to export users data.');
        }
    }

    /**
     * Fetch payment receiver names for autocomplete.
     */
    public function payments(Request $request)
    {
        try {
            $query = $request->input('query');
            $received = User::where('payment_reciver_name', 'like', '%' . $query . '%')
                ->distinct('payment_reciver_name')
                ->pluck('payment_reciver_name');

            return response()->json($received);
        } catch (\Exception $e) {
            Log::error('Failed to fetch payment receivers: ' . $e->getMessage());
            return response()->json([], 500);
        }
    }

    /**
     * Display a listing of users.
     */
    public function index()
    {
        try {
            $users = User::latest()->get();
            // $data = User::orderBy('matu_date', 'DESC')->get();
            // $data = User::orderByRaw("STR_TO_DATE(matu_date, '%Y-%m-%d') DESC")->get();

            $today = Carbon::today();
            // Query to retrieve data ordered by the difference between 'matu_date' and today's date
            $data = User::orderByRaw("ABS(DATEDIFF(matu_date, '{$today->toDateString()}'))")->get();

            return view('users.index', compact('users', 'data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to fetch users.');
        }
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(/* CreateUserRequest */Request $request)
    {
        try {
            DB::beginTransaction();
            // $validator = Validator::make($request->all(), [
            //     'account_number' => 'required',
            // ]);

            // if ($validator->fails()) {
            //     return redirect()->back()->withErrors($validator);
            // }

            $user = new User($request->all());
            $user->save();
            DB::commit();

            return redirect()->route('users.index')->with('success', 'Customer created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create customer.');
        }
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'account_number' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $user = User::findOrFail($id);
            $user->update($request->all());
            DB::commit();

            return redirect()->route('users.index')->with('success', 'Customer updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update customer.');
        }
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();

            return redirect()->route('users.index')->with('success', 'Customer deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete customer.');
        }
    }
}
