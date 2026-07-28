<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - MindCare</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .auth-logo-img {
            height: 36px;
            width: auto;
            object-fit: contain;
        }
    </style>
</head>
<body>

    <div class="auth-wrapper">
        <div class="auth-bg">
            <!-- LOGO & TEKS KE BAWAH -->
            <div style="position: absolute; top: 40px; left: 40px; display: flex; flex-direction: column; gap: 4px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <img src="logo.png" alt="MindCare Logo" class="auth-logo-img">
                    <span style="font-size: 22px; font-weight: 700; color: var(--primary-green);">MindCare</span>
                </div>
                <span style="font-size: 11px; color: var(--text-gray); font-weight: 400; display: block; margin-top: 2px;">Mental Health for a Better Tomorrow</span>
            </div>

            <h1 style="margin-top: 80px;">Selamat Datang<br><span style="color: var(--primary-green);">Kembali!</span></h1>
            <p style="font-size: 14px;">Masuk untuk melanjutkan perjalanan<br>menjaga kesehatan mentalmu.</p>
            <div class="auth-badge">
                <span style="font-size: 20px;">💚</span>
                <div>Kesehatan mental adalah langkah pertama untuk hidup lebih baik</div>
            </div>
        </div>
        
        <div class="auth-form-container">
            <div style="position: absolute; top: 40px; right: 40px; font-size: 14px; font-weight: 500;">
                Belum punya akun? <a href="daftar.php" style="color: var(--primary-green);">Daftar</a>
            </div>
            
            <div class="auth-box">
                <h2 style="margin-bottom: 5px;">Masuk ke MindCare</h2>
                <p style="color: var(--text-gray); font-size: 13px; margin-bottom: 30px;">Senang melihatmu kembali!</p>
                
                <form action="process-masuk.php" method="POST">
                    <div class="form-group">
                        <label>Email atau Nomor Telepon</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 15px; top: 12px; color: var(--text-gray);">👤</span>
                            <input type="text" name="email" placeholder="Masukkan Email atau Nomor Telpon" style="padding-left: 45px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kata Sandi</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 15px; top: 12px; color: var(--text-gray);">🔒</span>
                            <input type="password" name="password" placeholder="Masukkan Kata Sandi" style="padding-left: 45px;" required>
                            <span style="position: absolute; right: 15px; top: 12px; color: var(--text-gray); cursor: pointer;">👁️</span>
                        </div>
                    </div>
                    
                    <div style="text-align: right; margin-bottom: 20px;">
                        <a href="#" style="font-size: 12px; color: var(--text-dark); font-weight: 500;">Lupa Kata Sandi?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block" style="padding: 14px;">Masuk</button>
                    
                    <div class="divider">atau daftar dengan</div>
                    
                    <div style="display: flex; gap: 15px;">
                        <button type="button" class="btn btn-outline" style="flex: 1;"><span style="color: #DB4437; font-weight: bold;">G</span> Lanjutkan dengan Google</button>
                        <button type="button" class="btn btn-outline" style="flex: 1;">🍎 Lanjutkan dengan Apple</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="auth-footer" style="position: fixed; bottom: 20px; width: 100%;">
        🛡️ Kami menjaga data pribadi anda dengan aman
    </div>
    
    <script src="script.js"></script>
</body>
</html>