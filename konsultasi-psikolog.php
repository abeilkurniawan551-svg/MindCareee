<?php
session_start();

// Cek apakah user sudah login, jika belum arahkan kembali ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: masuk.html");
    exit;
}

$nama_user = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi Psikolog - MindCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dash-layout">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <!-- LOGO DIBUAT LEBIH BESAR DAN SEJAJAR DENGAN TEKS MINDCARE -->
            <div class="sidebar-logo" style="display: flex; align-items: center; gap: 12px; margin-bottom: 25px;">
                <img src="logo.png" alt="MindCare Logo" style="height: 42px; width: auto; object-fit: contain;">
                <div>
                    <strong style="font-size: 18px; color: var(--primary-green); display: block; line-height: 1.1;">MindCare</strong>
                    <span style="font-size: 9px; font-weight: 400; color: var(--text-gray); display: block; margin-top: 3px;">Mental Health Platform<br>for Everyone</span>
                </div>
            </div>
            
            <div class="menu-group" style="margin-top: 10px;">
                <a href="dashboard.php" class="menu-item">🏠 Dashboard</a>
            </div>
            
            <div class="menu-group">
                <div class="menu-label">KESEHATAN MENTAL</div>
                <a href="self-check.php" class="menu-item">📋 Self Check</a>
                <a href="mood-tracker.php" class="menu-item">😊 Mood Tracker</a>
                <a href="meditasi.php" class="menu-item">🧘 Meditasi</a>
                <a href="chatbot.php" class="menu-item">🤖 AI Chatbot</a>
            </div>

            <div class="menu-group">
                <div class="menu-label">EDUKASI</div>
                <a href="artikel.php" class="menu-item">📄 Artikel</a>
                <a href="event.php" class="menu-item">📅 Event</a>
            </div>

            <div class="menu-group">
                <div class="menu-label">KOMUNITAS</div>
                <a href="forum.php" class="menu-item">🗣️ Forum</a>
            </div>

            <div class="menu-group">
                <div class="menu-label">BANTUAN</div>
                <a href="konsultasi-psikolog.php" class="menu-item active">🧠 Konsultasi Psikolog</a>
            </div>

            <div class="menu-group">
                <div class="menu-label">PENGATURAN</div>
                <a href="profil.php" class="menu-item">👤 Profil</a>
                <a href="pengaturan.php" class="menu-item">⚙️ Pengaturan</a>
                <a href="logout.php" class="menu-item" style="color: #e74c3c;">🚪 Keluar</a>
            </div>

            <div class="support-sidebar-card" style="margin-top: auto;">
                <h4 style="font-weight: 700;">Butuh Dukungan?</h4>
                <p>Kamu tidak sendirian.<br>Kami siap membantu.</p>
                <button class="btn-support">Chat Sekarang</button>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="top-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                <div>
                    <h1 style="font-size: 22px; font-weight: 700; margin: 0 0 4px 0;">Lihat Psikolog</h1>
                    <p style="font-size: 12px; color: var(--text-gray); margin: 0;">Temukan psikolog profesional yang siap membantu kamu.</p>
                </div>
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="font-size: 18px; position: relative; cursor: pointer;">🔔 <span style="position: absolute; top: -2px; right: -2px; background: red; color: white; font-size: 9px; width: 12px; height: 12px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">3</span></div>
                    <div style="font-size: 18px; cursor: pointer;">✉️</div>
                    <div style="display: flex; align-items: center; gap: 8px; cursor: pointer; background: #ffffff; padding: 6px 12px; border-radius: 20px; border: 1px solid var(--border-color);">
                        <img src="https://via.placeholder.com/34" alt="<?php echo htmlspecialchars($nama_user); ?>" style="border-radius: 50%;">
                        <span style="font-size: 12px; font-weight: 600;"><?php echo htmlspecialchars($nama_user); ?> ⌄</span>
                    </div>
                </div>
            </div>

            <div class="search-input-box" style="margin-bottom: 16px; max-width: 100%;">
                <span>🔍</span>
                <input type="text" placeholder="Cari nama psikolog atau spesialisasi...">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <h4 style="font-size: 12px; font-weight: 600; margin: 0;">Kategori Spesialisasi</h4>
                <div style="font-size: 11px; display: flex; align-items: center; gap: 8px;">
                    <span style="color: var(--text-gray);">Urutkan</span>
                    <select style="border: 1px solid var(--border-color); padding: 4px 8px; border-radius: 6px; outline: none;"><option>Paling Populer</option></select>
                </div>
            </div>

            <div class="specialty-chips">
                <div class="chip-spec active">⚙️ Semua</div>
                <div class="chip-spec">😊 Kecemasan</div>
                <div class="chip-spec">🌧️ Depresi</div>
                <div class="chip-spec">☁️ Stres</div>
                <div class="chip-spec">🤝 Relationship</div>
                <div class="chip-spec">💖 Self Love</div>
                <div class="chip-spec">🩹 Trauma</div>
                <div class="chip-spec">🎓 Remaja</div>
                <div class="chip-spec">></div>
            </div>

            <!-- Grid Psikolog -->
            <div class="psychologist-grid">
                <!-- Card 1 -->
                <div class="psy-card">
                    <div class="psy-img-box">
                        <img src="https://dummyimage.com/300x300/e0e0e0/666666&text=Dr.+Amanda" alt="Dr. Amanda">
                        <span class="psy-badge-online">Online</span>
                        <div class="psy-fav-btn">♡</div>
                    </div>
                    <div class="psy-body">
                        <h4 class="psy-name">Dr. Amanda Putri, M.Psi.</h4>
                        <p class="psy-title">Psikolog Klinis</p>
                        <div class="psy-rating">⭐ <strong>4.9</strong> (1.250 ulasan)</div>
                        <p class="psy-list-title">Spesialisasi</p>
                        <ul class="psy-list"><li>Kecemasan</li><li>Stres</li><li>Overthinking</li></ul>
                        <p class="psy-list-title" style="margin-top: 8px;">Pengalaman</p>
                        <p style="font-size: 10px; margin: 0 0 12px 0;">🏛️ 8 Tahun</p>
                        
                        <div class="psy-pricing">
                            <div class="price-box">
                                <div class="price-box-title">Sedang</div>
                                <div class="price-box-val">Rp75.000</div>
                                <div class="price-box-dur">/ sesi (30 menit)</div>
                            </div>
                            <div class="price-box premium">
                                <div class="price-box-title">⭐ Terbaik</div>
                                <div class="price-box-val">Rp150.000</div>
                                <div class="price-box-dur">/ sesi (60 menit)</div>
                            </div>
                        </div>
                        <a href="konsultasi-psikolog-detail.php" class="btn-green-main" style="width: 100%; justify-content: center; padding: 8px; font-size: 11px;">Lihat Profil</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="psy-card">
                    <div class="psy-img-box">
                        <img src="https://dummyimage.com/300x300/e0e0e0/666666&text=Dr.+Rina" alt="Dr. Rina">
                        <span class="psy-badge-online">Online</span>
                        <div class="psy-fav-btn">♡</div>
                    </div>
                    <div class="psy-body">
                        <h4 class="psy-name">Dr. Rina Safitri, M.Psi.</h4>
                        <p class="psy-title">Psikolog Klinis</p>
                        <div class="psy-rating">⭐ <strong>4.8</strong> (980 ulasan)</div>
                        <p class="psy-list-title">Spesialisasi</p>
                        <ul class="psy-list"><li>Depresi</li><li>Self Love</li><li>Trauma</li></ul>
                        <p class="psy-list-title" style="margin-top: 8px;">Pengalaman</p>
                        <p style="font-size: 10px; margin: 0 0 12px 0;">🏛️ 7 Tahun</p>
                        
                        <div class="psy-pricing">
                            <div class="price-box"><div class="price-box-title">Sedang</div><div class="price-box-val">Rp80.000</div><div class="price-box-dur">/ sesi (30 menit)</div></div>
                            <div class="price-box premium"><div class="price-box-title">⭐ Terbaik</div><div class="price-box-val">Rp160.000</div><div class="price-box-dur">/ sesi (60 menit)</div></div>
                        </div>
                        <a href="konsultasi-psikolog-detail.php" class="btn-green-main" style="width: 100%; justify-content: center; padding: 8px; font-size: 11px;">Lihat Profil</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="psy-card">
                    <div class="psy-img-box">
                        <img src="https://dummyimage.com/300x300/e0e0e0/666666&text=Dr.+Fajar" alt="Dr. Fajar">
                        <span class="psy-badge-online">Online</span>
                        <div class="psy-fav-btn">♡</div>
                    </div>
                    <div class="psy-body">
                        <h4 class="psy-name">Dr. Fajar Nugroho, M.Psi.</h4>
                        <p class="psy-title">Psikolog Klinis</p>
                        <div class="psy-rating">⭐ <strong>4.8</strong> (875 ulasan)</div>
                        <p class="psy-list-title">Spesialisasi</p>
                        <ul class="psy-list"><li>Manajemen Stres</li><li>Burnout</li><li>Pengembangan Diri</li></ul>
                        <p class="psy-list-title" style="margin-top: 8px;">Pengalaman</p>
                        <p style="font-size: 10px; margin: 0 0 12px 0;">🏛️ 6 Tahun</p>
                        
                        <div class="psy-pricing">
                            <div class="price-box"><div class="price-box-title">Sedang</div><div class="price-box-val">Rp85.000</div><div class="price-box-dur">/ sesi (30 menit)</div></div>
                            <div class="price-box premium"><div class="price-box-title">⭐ Terbaik</div><div class="price-box-val">Rp170.000</div><div class="price-box-dur">/ sesi (60 menit)</div></div>
                        </div>
                        <a href="konsultasi-psikolog-detail.php" class="btn-green-main" style="width: 100%; justify-content: center; padding: 8px; font-size: 11px;">Lihat Profil</a>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="psy-card">
                    <div class="psy-img-box">
                        <img src="https://dummyimage.com/300x300/e0e0e0/666666&text=Dr.+Nadya" alt="Dr. Nadya">
                        <span class="psy-badge-online">Online</span>
                        <div class="psy-fav-btn">♡</div>
                    </div>
                    <div class="psy-body">
                        <h4 class="psy-name">Dr. Nadya Maharani, M.Psi.</h4>
                        <p class="psy-title">Psikolog Klinis</p>
                        <div class="psy-rating">⭐ <strong>4.9</strong> (1.150 ulasan)</div>
                        <p class="psy-list-title">Spesialisasi</p>
                        <ul class="psy-list"><li>Anxiety</li><li>Relationship</li><li>Konseling Remaja</li></ul>
                        <p class="psy-list-title" style="margin-top: 8px;">Pengalaman</p>
                        <p style="font-size: 10px; margin: 0 0 12px 0;">🏛️ 9 Tahun</p>
                        
                        <div class="psy-pricing">
                            <div class="price-box"><div class="price-box-title">Sedang</div><div class="price-box-val">Rp90.000</div><div class="price-box-dur">/ sesi (30 menit)</div></div>
                            <div class="price-box premium"><div class="price-box-title">⭐ Terbaik</div><div class="price-box-val">Rp180.000</div><div class="price-box-dur">/ sesi (60 menit)</div></div>
                        </div>
                        <a href="konsultasi-psikolog-detail.php" class="btn-green-main" style="width: 100%; justify-content: center; padding: 8px; font-size: 11px;">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <!-- Privacy Banner -->
            <div class="privacy-banner">
                <div class="privacy-banner-left">
                    <div style="font-size: 24px; color: var(--primary-green);">🛡️</div>
                    <div>
                        <h4>Privasi kamu aman bersama kami</h4>
                        <p>Semua konsultasi bersifat rahasia dan hanya dapat diakses oleh kamu dan psikolog yang kamu pilih.</p>
                    </div>
                </div>
                <a href="#" style="font-size: 11px; font-weight: 600; color: var(--primary-green); text-decoration: none;">Pelajari lebih lanjut ></a>
            </div>

        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>