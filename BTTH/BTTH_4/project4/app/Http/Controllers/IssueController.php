<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Hiển thị danh sách các đồ án có kiểu phân trang dùng paginatepaginate.
     */
    public function index()
    {
        
        $issues = Issue::with('computer')->get();
        return view('issues.index', compact('issues'));
    }

    /**
     * Hiển thị form tạo đồ án mới.
     */
    public function create()
    {
        $computers = Computer :: all();
        return view('issues.create', compact('computers'));
    }

    /**
     * Lưu đồ án mới.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        Issue::create($request->all());
        session()->flash('success', 'Bạn đã thêm thành công.');
        return redirect()->route('issues.index');
    }

    /**
     * .
     */
    public function show(string $id)
    {
      //
    }

    /**
     * Hiển thị form chỉnh sửa đồ án.
     */
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all(); // Lấy tất cả máy tính
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Cập nhật thông tin đồ ánán.
     */
    public function update(Request $request, string $id)
    {
       
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($request->all());
        session()->flash('success', 'Bạn đã cập nhật thành công.');
        return redirect()->route('issues.index');
    }

    /**
     * Xóa đồ án.
     */
    public function destroy(string $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Xóa thành công!');
    }
}
