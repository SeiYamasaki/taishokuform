@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">情報入力</h2>
        <!-- バリデーションエラー表示 -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <style>
                .form-control {
                    border: 2px solid #000 !important;
                    width: 600px;
                    max-width: 100%;
                }

                .small-input {
                    width: 200px;
                }

                .file-input {
                    width: 450px;
                }

                h4 {
                    margin-top: 20px;
                    padding: 5px;
                    font-weight: bold;
                }

                .section-personal {
                    color: blue;
                }

                .section-contact {
                    color: green;
                }

                .section-work {
                    color: orange;
                }

                .section-resignation {
                    color: red;
                }

                .section-file {
                    color: purple;
                }
            </style>

            <h4 class="section-personal">個人情報</h4>
            <div class="mb-3">
                <label for="name" class="form-label">あなたの名前</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">あなたの住所の郵便番号</label>
                <input type="text" class="form-control small-input" id="postal_code" name="postal_code" required>
            </div>
            <div class="mb-3">
                <label for="prefecture" class="form-label">あなたの住所の都道府県</label>
                <select class="form-control small-input" id="prefecture" name="prefecture" required>
                    <option value="">選択してください</option>
                    @foreach (['北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'] as $prefecture)
                        <option value="{{ $prefecture }}">{{ $prefecture }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">あなたの住所</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <h4 class="section-contact">連絡先</h4>
            <div class="mb-3">
                <label for="contact_email" class="form-label">あなたの連絡先メールアドレス</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" required>
            </div>
            <div class="mb-3">
                <label for="contact_phone" class="form-label">あなたの連絡先電話番号</label>
                <input type="tel" class="form-control small-input" id="contact_phone" name="contact_phone" required>
            </div>

            <h4 class="section-work">勤務先情報</h4>
            <div class="mb-3">
                <label for="company_name" class="form-label">勤務先法人名</label>
                <input type="text" class="form-control" id="company_name" name="company_name">
            </div>
            <div class="mb-3">
                <label for="work_postal_code" class="form-label">勤務先の住所の郵便番号</label>
                <input type="text" class="form-control small-input" id="work_postal_code" name="work_postal_code">
            </div>
            <div class="mb-3">
                <label for="work_prefecture" class="form-label">勤務先の住所の都道府県</label>
                <select class="form-control small-input" id="work_prefecture" name="work_prefecture">
                    <option value="">選択してください</option>
                    @foreach (['北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'] as $prefecture)
                        <option value="{{ $prefecture }}">{{ $prefecture }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="work_address" class="form-label">勤務先の住所</label>
                <input type="text" class="form-control" id="work_address" name="work_address">
            </div>

            <h4 class="section-resignation">退職関連</h4>
            <div class="mb-3">
                <label for="resignation_contact" class="form-label">退職を伝えるべき勤務先の人の名前</label>
                <input type="text" class="form-control" id="resignation_contact" name="resignation_contact">
            </div>

            <h4 class="section-file">ファイルアップロード</h4>
            <div class="mb-3">
                <label for="employment_contract" class="form-label">あなたの雇用契約書または労働条件通知書</label>
                <input type="file" class="form-control file-input" id="employment_contract" name="employment_contract"
                    required>
            </div>
            <div class="mb-3">
                <label for="id_proof" class="form-label">あなたの身分証明書</label>
                <input type="file" class="form-control file-input" id="id_proof" name="id_proof" required>
            </div>

            <button type="submit" class="btn btn-primary">確認</button>
        </form>
    </div>
@endsection
