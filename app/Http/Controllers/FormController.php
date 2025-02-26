<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BankAccount;

class FormController extends Controller
{
    public function show()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        // **バリデーションを実行**
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'name_furigana' => 'required|string|max:255',
            'gender' => 'required|string|in:男性,女性',
            'birth_date' => 'required|date',
            'age' => 'required|integer|min:0|max:150',
            'line_name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'prefecture' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'residence' => 'required|string|in:実家,持家,社宅,社員寮,その他',
            'email' => 'required|email|max:255|unique:users',
            'contact_phone' => 'required|string|max:20',
            'company_name' => 'required|string|max:255',
            'work_postal_code' => 'required|string|max:10',
            'work_prefecture' => 'required|string|max:50',
            'work_address' => 'required|string|max:255',
            'employment_type' => 'required|string',
            'job_type' => 'required|string',
            'years_of_service' => 'required|string',
            'current_status' => 'required|string',
            'desired_resignation_date' => 'required|date',
            'final_work_date' => 'required|date',
            'paid_leave_preference' => 'required|string',
            'resignation_contact' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'account_type' => 'required|string',
            'account_number' => 'required|string|max:20|unique:bank_accounts',
            'account_holder' => 'required|string|max:255',
            'employment_contract_path' => 'required|file|mimes:pdf,png,jpg,jpeg|max:2048',
            'id_proof_path' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // **バリデーションエラー時にフォーム画面へリダイレクト**
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // **ファイルを storage/public に保存**
        $employmentContractPath = $request->file('employment_contract_path')->store('documents', 'public');
        $idProofPath = $request->file('id_proof_path')->store('documents', 'public');

        // **セッションに成功メッセージを設定し、同意画面へリダイレクト**
        return redirect()->route('consent.show')->with('success', 'フォームが送信されました');
    }
}
