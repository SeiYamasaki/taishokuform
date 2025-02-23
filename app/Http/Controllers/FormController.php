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
            'name_furigana' => 'required|string|max:255',
            'gender' => 'required|string|in:男性,女性',
            'birth_date' => 'required|date',
            'age' => 'nullable|integer|min:0|max:150', // 自動計算される
            'line_name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'prefecture' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'residence' => 'required|string|in:実家,持家,社宅,社員寮,その他',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'work_postal_code' => 'nullable|string|max:10',
            'work_prefecture' => 'nullable|string|max:50',
            'work_address' => 'nullable|string|max:255',
            'employment_type' => 'required|string|in:正社員,契約社員,派遣社員,準社員,アルバイト,社保パート,その他',
            'job_type' => 'required|string|in:飲食業,サービス業,販売業,建築業,運送業,不動産業,製造業,保険,金融,営業,教育関連,美容関連,医療関連,介護関連,事務関連,IT関連',
            'years_of_service' => 'required|string|in:6ヶ月未満,1年未満,2年未満,3年未満,10年未満,10年以上',
            'current_status' => 'required|string|in:公休,この後勤務,バックレ状態,勤務中',
            'desired_resignation_date' => 'required|date',
            'final_work_date' => 'required|date',
            'paid_leave_preference' => 'required|string|in:希望する,希望するが残日数が分からない,希望しない',
            'resignation_contact' => 'nullable|string|max:255',
            'employment_contract' => 'required|file|mimes:pdf,png,jpg,jpeg|max:2048',
            'id_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // **ファイルを storage/public に保存**
        $employmentContractPath = $request->file('employment_contract')->store('documents', 'public');
        $idProofPath = $request->file('id_proof')->store('documents', 'public');

        // **セッションに成功メッセージを設定し、同意画面へリダイレクト**
        return redirect()->route('consent.show')->with('success', 'フォームが送信されました');
    }
}
