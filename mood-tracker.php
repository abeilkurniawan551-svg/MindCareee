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
    <title>Mood Tracker - MindCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="dash-layout">
        <!-- ================= SIDEBAR ================= -->
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
                <a href="mood-tracker.php" class="menu-item active">😊 Mood Tracker</a>
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
                <a href="konsultasi-psikolog.php" class="menu-item">🧠 Konsultasi Psikolog</a>
            </div>

            <div class="menu-group">
                <div class="menu-label">PENGATURAN</div>
                <a href="profil.php" class="menu-item">👤 Profil</a>
                <a href="pengaturan.php" class="menu-item">⚙️ Pengaturan</a>
                <a href="logout.php" class="menu-item" style="color: #e74c3c;">🚪 Keluar</a>
            </div>
            
            <!-- Posisi Kartu Support yang Benar (Masuk di dalam Sidebar) -->
            <div class="support-sidebar-card" style="margin-top: auto;">
                <h4 style="font-weight: 600;">Butuh Dukungan?</h4>
                <p>Kamu tidak sendirian.<br>Kami siap membantu.</p>
                <button class="btn-support">Chat Sekarang</button>
            </div>
        </div> <!-- PENUTUP SIDEBAR YANG BENAR -->

        <!-- ================= MAIN CONTENT ================= -->
        <div class="main-content">
            <!-- HEADER -->
            <div class="top-nav">
                <div>
                    <h2 style="font-size: 20px; color: var(--text-dark); margin: 0 0 4px 0; font-weight: 700;">Mood Tracker</h2>
                    <p style="font-size: 12px; color: var(--text-gray); margin: 0;">Catat suasana hatimu setiap hari untuk memahami dirimu lebih baik.</p>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="font-size: 20px; cursor: pointer;">🔔</div>
                    <div class="user-info">
                        <img src="https://via.placeholder.com/35" alt="<?php echo htmlspecialchars($nama_user); ?>">
                        <div style="line-height: 1.2; padding-right: 15px;">
                            <div style="font-size: 13px; font-weight: 600;"><?php echo htmlspecialchars($nama_user); ?></div>
                            <div style="font-size: 10px; color: var(--text-gray);">Pengguna Baru</div>
                        </div>
                        <span style="font-size: 10px; padding-right: 5px;">⌄</span>
                    </div>
                </div>
            </div>

            <!-- GRID MOOD TRACKER (Ditambah align-items: start) -->
            <div style="display: grid; grid-template-columns: 2.2fr 1fr; gap: 24px; align-items: start;">
                
                <!-- KOLOM KIRI: FORM CATAT MOOD -->
                <div class="dash-card white-bg" style="padding: 28px;">
                    
                    <!-- 1. Pilihan Mood -->
                    <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 16px;">Bagaimana perasaanmu hari ini?</h4>
                    <div class="mood-grid">
                        <div class="mood-card">
                            <span class="mood-emoji">😭</span>
                            <span class="mood-label">Sangat Buruk</span>
                        </div>
                        <div class="mood-card">
                            <span class="mood-emoji">😩</span>
                            <span class="mood-label">Buruk</span>
                        </div>
                        <div class="mood-card">
                            <span class="mood-emoji">😐</span>
                            <span class="mood-label">Biasa Saja</span>
                        </div>
                        <div class="mood-card">
                            <span class="mood-emoji">😀</span>
                            <span class="mood-label">Baik</span>
                        </div>
                        <div class="mood-card">
                            <span class="mood-emoji">😂</span>
                            <span class="mood-label">Sangat Baik</span>
                        </div>
                    </div>

                    <!-- 2. Slider Pengaruh -->
                    <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 16px;">Seberapa besar pengaruhnya hari ini?</h4>
                    <div class="range-container">
                        <input type="range" min="1" max="10" value="5" class="range-slider">
                        <div class="range-ticks">
                            <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 10px; color: var(--text-gray); margin-top: 4px;">
                            <span>Tidak berpengaruh</span>
                            <span>Sangat berpengaruh</span>
                        </div>
                    </div>

                    <!-- 3. Tags Penyebab -->
                    <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 12px;">
                        Apa yang mempengaruhi perasaanmu hari ini? <span style="font-weight: 400; font-size: 12px; color: var(--text-gray);">(Pilih bisa lebih dari satu)</span>
                    </h4>
                    <div class="tags-container">
                        <button class="tag-btn">💼 Pekerjaan</button>
                        <button class="tag-btn">🎓 Kuliah</button>
                        <button class="tag-btn">👨‍👩‍👧‍👦 Keluarga</button>
                        <button class="tag-btn">👥 Teman</button>
                        <button class="tag-btn">🏥 Kesehatan</button>
                        <button class="tag-btn">💬 Lainnya</button>
                    </div>

                    <!-- 4. Textarea -->
                    <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 12px;">
                        Tuliskan sedikit tentang harimu... <span style="font-weight: 400; font-size: 12px; color: var(--text-gray);">(Opsional)</span>
                    </h4>
                    <div class="textarea-wrapper" style="margin-bottom: 24px;">
                        <textarea placeholder="Ceritakan apa yang kamu rasakan hari ini..."></textarea>
                        <div class="char-counter">0/500</div>
                    </div>

                    <!-- Button Simpan -->
                    <button class="btn btn-primary" style="padding: 12px 30px;">Simpan Mood</button>
                </div>

                <!-- KOLOM KANAN: SIDEBAR INFO -->
                <div class="dash-card white-bg" style="padding: 24px;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <div style="font-size: 40px; margin-bottom: 10px;">📊</div>
                        <h4 style="font-size: 15px; font-weight: 600; margin-top: 10px;">Belum ada riwayat mood</h4>
                        <p style="font-size: 11px; color: var(--text-gray); line-height: 1.4; margin-top: 6px;">
                            Yuk mulai mencatat perasaanmu hari ini agar kami dapat menampilkan perkembangan emosimu dari waktu ke waktu.
                        </p>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 16px; margin-top: 20px;">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <div style="background: var(--light-green); padding: 8px; border-radius: 8px; font-size: 14px;">📅</div>
                            <div>
                                <h5 style="font-size: 12px; font-weight: 600; margin: 0 0 2px 0;">Catat mood setiap hari</h5>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Hanya butuh 1 menit setiap hari.</p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <div style="background: var(--light-green); padding: 8px; border-radius: 8px; font-size: 14px;">📈</div>
                            <div>
                                <h5 style="font-size: 12px; font-weight: 600; margin: 0 0 2px 0;">Lihat perkembangan emosimu</h5>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Grafik akan muncul ketika kamu mulai mencatat mood.</p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <div style="background: var(--light-green); padding: 8px; border-radius: 8px; font-size: 14px;">💡</div>
                            <div>
                                <h5 style="font-size: 12px; font-weight: 600; margin: 0 0 2px 0;">Dapatkan insight bermanfaat</h5>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Kami akan memberikan insight untuk membantumu memahami diri sendiri.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Security Box -->
                    <div style="background: #E8F5E9; padding: 12px; border-radius: 10px; display: flex; gap: 10px; align-items: center; margin-top: 24px;">
                        <span style="font-size: 16px;">🔒</span>
                        <span style="font-size: 11px; font-weight: 600; color: var(--text-dark); line-height: 1.4;">Data pribadimu aman dan hanya dilihat oleh dirimu sendiri.</span>
                    </div>
                </div>

            </div> <!-- PENUTUP GRID -->

        </div> <!-- PENUTUP MAIN CONTENT -->
    </div> <!-- PENUTUP DASH LAYOUT -->

    <!-- SCRIPT -->
    <script src="script.js"></script>
</body>
</html>