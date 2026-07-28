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
    <title>Self Check - MindCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="dash-layout">
        <!-- ================= SIDEBAR KIRI ================= -->
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
                <a href="self-check.php" class="menu-item active">📋 Self Check</a>
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
                <a href="bantuan.php" class="menu-item">⚠️ Bantuan Darurat</a>
            </div>

            <div class="menu-group">
                <div class="menu-label">PENGATURAN</div>
                <a href="profil.php" class="menu-item">👤 Profil</a>
                <a href="pengaturan.php" class="menu-item">⚙️ Pengaturan</a>
                <a href="logout.php" class="menu-item" style="color: #e74c3c;">🚪 Keluar</a>
            </div>

            <!-- Kartu Support sekarang SUDAH MASUK dengan benar di dalam Sidebar -->
            <div class="support-sidebar-card" style="margin-top: auto;">
                <h4 style="font-weight: 600;">Butuh Dukungan?</h4>
                <p>Kamu tidak sendirian.<br>Kami siap membantu.</p>
                <button class="btn-support">Chat Sekarang</button>
            </div>
        </div> <!-- PENUTUP SIDEBAR YANG BENAR -->

        <!-- ================= MAIN CONTENT KANAN ================= -->
        <div class="main-content">
            <!-- HEADER -->
            <div class="top-nav">
                <div>
                    <h2 style="font-size: 20px; font-weight: 700; color: var(--text-dark); margin: 0 0 4px 0;">Self Mental Check</h2>
                    <p style="font-size: 12px; color: var(--text-gray); margin: 0;">Selangkah lebih dekat memahami dirimu.</p>
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

            <!-- GRID KONTEN SELF CHECK (Ditambah align-items: start) -->
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: start;">
                
                <!-- KOLOM KIRI: KARTU PERTANYAAN -->
                <div class="dash-card white-bg" style="padding: 30px;">
                    <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 500; margin-bottom: 8px;">
                        <span>Pertanyaan 3 dari 10</span>
                        <span style="color: var(--text-gray);">30%</span>
                    </div>

                    <div class="progress-container">
                        <div class="progress-bar-bg">
                            <div class="progress-bar-fill"></div>
                        </div>
                    </div>

                    <div style="font-size: 12px; color: var(--primary-green); font-weight: 600; margin-bottom: 6px;">Dalam dua minggu terakhir,</div>
                    <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 24px; color: var(--text-dark);">
                        Seberapa sering kamu merasa sulit menikmati aktivitas yang biasanya kamu sukai?
                    </h3>

                    <!-- Pilihan Opsi -->
                    <div class="option-card">
                        <div class="radio-custom"></div>
                        <div>
                            <div style="font-size: 13px; font-weight: 600;">Tidak Pernah</div>
                            <div style="font-size: 11px; color: var(--text-gray);">Tidak pernah merasa demikian</div>
                        </div>
                    </div>

                    <div class="option-card">
                        <div class="radio-custom"></div>
                        <div>
                            <div style="font-size: 13px; font-weight: 600;">Jarang</div>
                            <div style="font-size: 11px; color: var(--text-gray);">1-2 hari dalam seminggu</div>
                        </div>
                    </div>

                    <div class="option-card">
                        <div class="radio-custom"></div>
                        <div>
                            <div style="font-size: 13px; font-weight: 600;">Kadang - Kadang</div>
                            <div style="font-size: 11px; color: var(--text-gray);">3-4 hari dalam seminggu</div>
                        </div>
                    </div>

                    <div class="option-card">
                        <div class="radio-custom"></div>
                        <div>
                            <div style="font-size: 13px; font-weight: 600;">Sering</div>
                            <div style="font-size: 11px; color: var(--text-gray);">5-6 hari setiap minggu</div>
                        </div>
                    </div>

                    <!-- Selected State Example -->
                    <div class="option-card selected">
                        <div class="radio-custom"></div>
                        <div>
                            <div style="font-size: 13px; font-weight: 600;">Hampir Selalu</div>
                            <div style="font-size: 11px; color: var(--text-gray);">Hampir setiap hari</div>
                        </div>
                    </div>

                    <!-- Navigasi Bawah -->
                    <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                        <button class="btn btn-outline" style="padding: 10px 20px;">&larr; Sebelumnya</button>
                        <button class="btn btn-primary" style="padding: 10px 24px;">Selanjutnya &rarr;</button>
                    </div>
                </div>

                <!-- KOLOM KANAN: SIDE PANELS -->
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <!-- Panel 1 -->
                    <div class="dash-card" style="text-align: center; padding: 24px;">
                        <div style="font-size: 40px; margin-bottom: 15px;">💖</div>
                        <h3 style="font-size: 16px; font-weight: 700; margin-bottom: 10px;">Kamu Tidak Sendirian</h3>
                        <p style="font-size: 12px; color: var(--text-gray); line-height: 1.5; margin: 0;">
                            Self Check adalah langkah awal untuk memahami diri dan menjaga kesehatan mentalmu. 💚
                        </p>
                    </div>

                    <!-- Panel 2 -->
                    <div class="dash-card white-bg" style="padding: 24px;">
                        <h4 style="font-size: 13px; font-weight: 700; margin-bottom: 16px; color: var(--text-dark);">Sebelum Memulai</h4>
                        
                        <div style="display: flex; flex-direction: column; gap: 16px;">
                            <div style="display: flex; gap: 12px; align-items: flex-start;">
                                <div style="background: var(--light-green); padding: 8px; border-radius: 8px; font-size: 14px;">📋</div>
                                <div style="font-size: 11px; color: var(--text-gray); line-height: 1.4;">Jawablah sesuai kondisi yang kamu rasakan. Tidak ada jawaban yang benar atau salah.</div>
                            </div>
                            <hr style="border: none; border-top: 1px dashed var(--border-color); margin: 0;">
                            
                            <div style="display: flex; gap: 12px; align-items: flex-start;">
                                <div style="background: var(--light-green); padding: 8px; border-radius: 8px; font-size: 14px;">📊</div>
                                <div style="font-size: 11px; color: var(--text-gray); line-height: 1.4;">Hasil hanya digunakan sebagai gambaran awal kondisi mentalmu.</div>
                            </div>
                            <hr style="border: none; border-top: 1px dashed var(--border-color); margin: 0;">

                            <div style="display: flex; gap: 12px; align-items: flex-start;">
                                <div style="background: var(--light-green); padding: 8px; border-radius: 8px; font-size: 14px;">🔒</div>
                                <div style="font-size: 11px; color: var(--text-gray); line-height: 1.4;">Semua jawaban bersifat rahasia dan aman, kami menjaga privasimu.</div>
                            </div>
                            <hr style="border: none; border-top: 1px dashed var(--border-color); margin: 0;">

                            <div style="display: flex; gap: 12px; align-items: flex-start;">
                                <div style="background: var(--light-green); padding: 8px; border-radius: 8px; font-size: 14px;">⏱️</div>
                                <div style="font-size: 11px; color: var(--text-gray); line-height: 1.4;">Waktu pengerjaan sekitar 10 menit.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- PENUTUP GRID -->

            <!-- QUOTE BANNER BOTTOM -->
            <div class="quote-banner">
                🍀 Ingat, merawat kesehatan mental adalah bentuk cinta terbaik untuk diri sendiri. 💚
            </div>
        </div> <!-- PENUTUP MAIN CONTENT -->
    </div> <!-- PENUTUP DASH LAYOUT -->

    <!-- JANGAN LUPA PANGGIL SCRIPT.JS -->
    <script src="script.js"></script>
</body>
</html>