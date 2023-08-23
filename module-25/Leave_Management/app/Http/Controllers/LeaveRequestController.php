<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Models\LeaveCategory;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::all();

        return view('leave-requests.index', compact('leaveRequests'));
    }

    public function create()
    {
        $leaveCategories = LeaveCategory::all();

        return view('leave-requests.create', compact('leaveCategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'leave_category_id' => 'required',
            'leave_start_date' => 'required|date',
            'leave_end_date' => 'required|date',
            'reason' => 'required',
        ]);

        $leaveRequest = LeaveRequest::create($request->all());

        return redirect()->route('leave-requests.index')->with('success', 'Leave request created successfully.');
    }

    public function show(LeaveRequest $leaveRequest)
    {
        return view('leave-requests.show', compact('leaveRequest'));
    }

    public function edit(LeaveRequest $leaveRequest)
    {
        $leaveCategories = LeaveCategory::all();

        return view('leave-requests.edit', compact('leaveRequest', 'leaveCategories'));
    }

    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'leave_category_id' => 'required',
            'leave_start_date' => 'required|date',
            'leave_end_date' => 'required|date',
            'reason' => 'required',
        ]);

        $leaveRequest->update($request->all());

        return redirect()->route('leave-requests.index')->with('success', 'Leave request updated successfully.');
    }

    public function destroy(LeaveRequest $leaveRequest)
    {
        // Check if the user is authorized to delete the leave request.
        if ($leaveRequest->employee_id !== auth()->user()->id)
        {
            return abort(403);
        }

        // Delete the leave request.
        $leaveRequest->delete();

        // Redirect the user to the leave requests page.
        return redirect()->route('leave-requests.index')->with('success', 'Leave request deleted successfully.');
    }
}