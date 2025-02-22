<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsentController extends Controller
{
    public function show()
    {
        return view('consent');
    }

    public function submit(Request $request)
    {
        // 同意がチェックされているか確認
        $request->validate([
            'consent' => 'required',
        ]);

        return redirect()->route('form.show')->with('success', '同意が完了しました');
    }
}
