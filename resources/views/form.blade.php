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

                /* カメラプレビュー用 */
                .camera-container {
                    display: flex;
                    flex-direction: column;
                    /* ボタンとカメラの配置を統一 */
                    align-items: flex-start;
                    margin-top: 10px;
                }

                img {
                    display: block;
                    margin-top: 10px;
                }

                video {
                    width: 100%;
                    max-width: 300px;
                    /* 撮影画面を適切なサイズに */
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
            <!-- 雇用契約書（通常アップロード + カメラ撮影） -->
            <div class="mb-3">
                <label for="employment_contract" class="form-label">あなたの雇用契約書または労働条件通知書（撮影可）</label>
                <input type="file" class="form-control file-input" id="employment_contract" name="employment_contract"
                    accept=".pdf,.doc,.docx,image/*" required onchange="previewImage(event, 'preview_employment_contract')">

                <button type="button" class="btn btn-secondary mt-2" onclick="startCamera('employment_contract')">📷
                    カメラを起動</button>

                <div class="camera-container" id="cameraContainer_employment_contract" style="display: none;">
                    <video id="cameraView_employment_contract" autoplay playsinline></video>
                </div>

                <img id="preview_employment_contract" src="" alt="プレビュー"
                    style="display:none; max-width: 100%; margin-top: 10px;">

                <button type="button" class="btn btn-success mt-2 capture-btn" id="capture_employment_contract"
                    style="display:none;" onclick="captureImage('employment_contract')">📸 撮影</button>
                <button type="button" class="btn btn-danger mt-2 reset-btn" id="reset_employment_contract"
                    style="display:none;" onclick="resetImage('employment_contract')">🔄 やり直す</button>
            </div>
            <!-- 身分証明書（通常アップロード + カメラ撮影） -->
            <div class="mb-3">
                <label for="id_proof" class="form-label">あなたの身分証明書（撮影可）</label>
                <input type="file" class="form-control file-input" id="id_proof" name="id_proof" accept="image/*"
                    required onchange="previewImage(event, 'preview_id_proof')">

                <button type="button" class="btn btn-secondary mt-2" onclick="startCamera('id_proof')">📷
                    カメラを起動</button>

                <div class="camera-container" id="cameraContainer_id_proof" style="display: none;">
                    <video id="cameraView_id_proof" autoplay playsinline></video>
                </div>

                <img id="preview_id_proof" src="" alt="プレビュー"
                    style="display:none; max-width: 100%; margin-top: 10px;">

                <button type="button" class="btn btn-success mt-2 capture-btn" id="capture_id_proof"
                    style="display:none;" onclick="captureImage('id_proof')">📸 撮影</button>
                <button type="button" class="btn btn-danger mt-2 reset-btn" id="reset_id_proof" style="display:none;"
                    onclick="resetImage('id_proof')">🔄 やり直す</button>
            </div>
            <script>
                let videoStream = null;
                let currentTarget = '';

                // 📷 カメラを起動する関数（撮影欄ごとに個別に表示）
                function startCamera(target) {
                    // すでにカメラが起動している場合は停止
                    if (videoStream) {
                        stopCamera();
                    }

                    currentTarget = target; // 現在のターゲットをセット
                    const cameraView = document.getElementById(`cameraView_${target}`);
                    const cameraContainer = document.getElementById(`cameraContainer_${target}`);
                    const captureButton = document.getElementById(`capture_${target}`);

                    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                        navigator.mediaDevices.getUserMedia({
                                video: {
                                    facingMode: "environment"
                                }
                            })
                            .then(function(stream) {
                                videoStream = stream;
                                cameraView.srcObject = stream;
                                cameraContainer.style.display = "flex";
                                captureButton.style.display = "block"; // 📸 撮影ボタンを表示
                            })
                            .catch(function(error) {
                                alert("カメラの起動に失敗しました: " + error);
                            });
                    } else {
                        alert("このデバイスではカメラがサポートされていません");
                    }
                }

                // 📸 撮影して画像をプレビュー＆フォームにセット
                function captureImage(target) {
                    const cameraView = document.getElementById(`cameraView_${target}`);
                    const canvas = document.createElement('canvas');
                    const preview = document.getElementById(`preview_${target}`);
                    const fileInput = document.getElementById(target);
                    const resetButton = document.getElementById(`reset_${target}`);
                    const captureButton = document.getElementById(`capture_${target}`);

                    canvas.width = cameraView.videoWidth;
                    canvas.height = cameraView.videoHeight;
                    canvas.getContext('2d').drawImage(cameraView, 0, 0, canvas.width, canvas.height);

                    // 画像プレビュー表示
                    preview.src = canvas.toDataURL('image/png');
                    preview.style.display = "block";

                    // データをBlobに変換してファイルとしてフォームにセット
                    canvas.toBlob(function(blob) {
                        const file = new File([blob], `${target}.png`, {
                            type: "image/png"
                        });
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        fileInput.files = dataTransfer.files;
                    }, 'image/png');

                    // 撮影後に「やり直す」ボタンを表示
                    resetButton.style.display = "block";

                    // 撮影ボタンを非表示にする（撮影済みなので不要）
                    captureButton.style.display = "none";

                    // カメラ停止
                    stopCamera();
                }

                // 🔄 撮影画像をやり直す
                function resetImage(target) {
                    const preview = document.getElementById(`preview_${target}`);
                    const fileInput = document.getElementById(target);
                    const resetButton = document.getElementById(`reset_${target}`);
                    const captureButton = document.getElementById(`capture_${target}`);

                    // 画像プレビューをクリア
                    preview.src = "";
                    preview.style.display = "none";

                    // ファイル入力をリセット
                    fileInput.value = "";

                    // 「やり直す」ボタンを非表示
                    resetButton.style.display = "none";

                    // 撮影ボタンを非表示（カメラを起動するまで表示しない）
                    captureButton.style.display = "none";
                }

                // 🛑 カメラを停止する関数
                function stopCamera() {
                    if (videoStream) {
                        videoStream.getTracks().forEach(track => track.stop());
                        videoStream = null;
                    }

                    // すべてのカメラコンテナを非表示にする
                    document.querySelectorAll('.camera-container').forEach(container => {
                        container.style.display = "none";
                    });
                }
            </script>
            <button type="submit" class="btn btn-primary">確認</button>
        </form>
    </div>
@endsection
