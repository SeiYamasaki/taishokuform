<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'prefecture' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'work_postal_code' => 'nullable|string|max:10',
            'work_prefecture' => 'nullable|string|max:50',
            'work_address' => 'nullable|string|max:255',
            'work_email' => 'nullable|email|max:255',
            'work_phone' => 'nullable|string|max:20',
            'resignation_contact' => 'nullable|string|max:255',
            'employment_contract' => 'required|file|mimes:pdf,png,jpg,jpeg|max:2048',
            'id_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // **バリデーションエラーがあれば自動的に `form.blade.php` に戻る**
        // `withErrors($errors)` を確認してください

        // **ファイルを storage に保存**
        $employmentContractPath = $request->file('employment_contract')->store('documents');
        $idProofPath = $request->file('id_proof')->store('documents');

        // **同意画面へリダイレクト**
        return redirect()->route('consent.show')->with('success', 'フォームが送信されました');
    }
}
