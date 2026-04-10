<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LopHocController extends Controller
{
    public function index()
    {
        $lopHocs = LopHoc::orderByDesc('created_at')->paginate(6);

        return view('lop_hocs.index', compact('lopHocs'));
    }

    public function create()
    {
        return view('lop_hocs.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateLopHoc($request);

        LopHoc::create($data);

        return redirect()
            ->route('lop-hoc.index')
            ->with('success', 'Them lop hoc thanh cong.');
    }

    public function edit(LopHoc $lopHoc)
    {
        return view('lop_hocs.edit', compact('lopHoc'));
    }

    public function update(Request $request, LopHoc $lopHoc)
    {
        $data = $this->validateLopHoc($request, $lopHoc);

        $lopHoc->update($data);

        return redirect()
            ->route('lop-hoc.index')
            ->with('success', 'Cap nhat lop hoc thanh cong.');
    }

    public function destroy(LopHoc $lopHoc)
    {
        $lopHoc->delete();

        return redirect()
            ->route('lop-hoc.index')
            ->with('success', 'Xoa lop hoc thanh cong.');
    }

    protected function validateLopHoc(Request $request, ?LopHoc $lopHoc = null): array
    {
        return $request->validate(
            [
                'ma_lop' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('lop_hocs', 'ma_lop')->ignore($lopHoc?->id),
                ],
                'ten_lop' => ['required', 'string', 'max:255'],
                'si_so' => ['required', 'integer', 'min:1'],
            ],
            [
                'ma_lop.required' => 'Vui long nhap ma lop.',
                'ma_lop.max' => 'Ma lop khong duoc vuot qua 50 ky tu.',
                'ma_lop.unique' => 'Ma lop da ton tai.',
                'ten_lop.required' => 'Vui long nhap ten lop.',
                'ten_lop.max' => 'Ten lop khong duoc vuot qua 255 ky tu.',
                'si_so.required' => 'Vui long nhap si so.',
                'si_so.integer' => 'Si so phai la so nguyen.',
                'si_so.min' => 'Si so phai lon hon hoac bang 1.',
            ]
        );
    }
}