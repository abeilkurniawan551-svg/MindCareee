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
    <title>Event & Webinar - MindCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="dash-layout">
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
                <a href="event.php" class="menu-item active">📅 Event</a>
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

            <div class="support-sidebar-card" style="margin-top: auto;">
                <h4 style="font-weight: 700;">Butuh Dukungan?</h4>
                <p>Kamu tidak sendirian.<br>Kami siap membantu.</p>
                <button class="btn-support">Chat Sekarang</button>
            </div>
        </div>

        <div class="main-content">
            
            <div class="top-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                <div>
                    <h1 style="font-size: 22px; font-weight: 700; margin: 0 0 4px 0;">Event & Webinar</h1>
                    <p style="font-size: 12px; color: var(--text-gray); margin: 0;">Ikuti workshop dan webinar kesehatan mental bersama para ahli.</p>
                </div>
                
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="font-size: 18px; position: relative; cursor: pointer;">🔔 <span style="position: absolute; top: -2px; right: -2px; background: red; color: white; font-size: 9px; width: 12px; height: 12px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">2</span></div>
                    
                    <!-- NAMA USER DINAMIS DI POJOK KANAN ATAS -->
                    <div style="display: flex; align-items: center; gap: 8px; cursor: pointer; background: #ffffff; padding: 6px 12px; border-radius: 20px; border: 1px solid var(--border-color);">
                        <img src="https://via.placeholder.com/34" alt="<?php echo htmlspecialchars($nama_user); ?>" style="border-radius: 50%;">
                        <span style="font-size: 12px; font-weight: 600;"><?php echo htmlspecialchars($nama_user); ?> ⌄</span>
                    </div>
                </div>
            </div>

            <div class="event-filter-bar">
                <button class="event-filter-btn active">Semua Event</button>
                <button class="event-filter-btn">Webinar Online</button>
                <button class="event-filter-btn">Workshop & Training</button>
                <button class="event-filter-btn">Sesi Meditasi Bersama</button>
                <button class="event-filter-btn">Gratis</button>
            </div>

            <div class="event-hero-banner">
                <div>
                    <span style="background: #e8f5e9; color: var(--primary-green); font-size: 10px; font-weight: 700; padding: 4px 10px; border-radius: 12px;">EVENT UTAMA BULAN INI</span>
                    <h2 style="font-size: 20px; font-weight: 700; margin: 10px 0 8px 0; line-height: 1.3;">Managing Burnout & Building Resilience in Digital Era</h2>
                    <p style="font-size: 12px; color: var(--text-gray); margin: 0 0 16px 0;">Pelajari strategi praktis mengatasi kelelahan mental kerja dan menjaga keseimbangan hidup bersama Psikolog Klinis profesional.</p>
                    
                    <div style="display: flex; gap: 20px; font-size: 11px; color: var(--text-dark); margin-bottom: 20px;">
                        <span>📅 Sabtu, 15 Agustus 2026</span>
                        <span>⏰ 13.00 - 15.30 WIB</span>
                        <span>💻 Zoom Meeting</span>
                    </div>

                    <a href="event-detail.php" class="btn-action" style="padding: 10px 20px; text-decoration: none; display: inline-block;">Lihat Detail & Daftar ➔</a>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=500" class="hero-event-img" alt="Event Utama">
                </div>
            </div>

            <h3 style="font-size: 15px; font-weight: 700; margin-bottom: 16px;">Pilihan Event Mendatang</h3>
            
            <div class="event-grid">
                <div class="event-card">
                    <div style="position: relative;">
                        <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=400" class="event-card-img" alt="Event 1">
                        <span class="event-badge-tag">Webinar</span>
                    </div>
                    <div class="event-card-body">
                        <div class="event-meta-info">
                            <span>📅 20 Ags 2026</span>
                            <span>•</span>
                            <span>⏰ 19.00 WIB</span>
                        </div>
                        <h4 style="font-size: 13px; font-weight: 700; margin: 0 0 6px 0; line-height: 1.4;">Overcoming Anxiety: Menaklukkan Rasa Cemas Berlebih</h4>
                        <p style="font-size: 11px; color: var(--text-gray); margin: 0 0 16px 0; line-height: 1.4; flex: 1;">Teknik Relaksasi & Mindful Thinking bersama Dr. Anita Wijaya, M.Psi.</p>

                        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f0f0f0; padding-top: 12px;">
                            <span style="font-size: 13px; font-weight: 700; color: var(--primary-green);">Rp 49.000</span>
                            <a href="event-detail.php" class="btn-action" style="padding: 6px 14px; font-size: 11px; text-decoration: none;">Daftar</a>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div style="position: relative;">
                        <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=400" class="event-card-img" alt="Event 2">
                        <span class="event-badge-tag" style="color: #2563eb;">Workshop</span>
                    </div>
                    <div class="event-card-body">
                        <div class="event-meta-info">
                            <span>📅 25 Ags 2026</span>
                            <span>•</span>
                            <span>⏰ 10.00 WIB</span>
                        </div>
                        <h4 style="font-size: 13px; font-weight: 700; margin: 0 0 6px 0; line-height: 1.4;">Art Therapy: Mengekspresikan Emosi Lewat Seni</h4>
                        <p style="font-size: 11px; color: var(--text-gray); margin: 0 0 16px 0; line-height: 1.4; flex: 1;">Sesi interaktif melukis ekspresif untuk merilis stres dan trauma.</p>

                        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f0f0f0; padding-top: 12px;">
                            <span style="font-size: 13px; font-weight: 700; color: var(--primary-green);">GRATIS</span>
                            <a href="event-detail.php" class="btn-action" style="padding: 6px 14px; font-size: 11px; text-decoration: none;">Daftar</a>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div style="position: relative;">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400" class="event-card-img" alt="Event 3">
                        <span class="event-badge-tag" style="color: #7c3aed;">Meditasi</span>
                    </div>
                    <div class="event-card-body">
                        <div class="event-meta-info">
                            <span>📅 28 Ags 2026</span>
                            <span>•</span>
                            <span>⏰ 20.00 WIB</span>
                        </div>
                        <h4 style="font-size: 13px; font-weight: 700; margin: 0 0 6px 0; line-height: 1.4;">Deep Sleep Meditation & Guided Relaxation</h4>
                        <p style="font-size: 11px; color: var(--text-gray); margin: 0 0 16px 0; line-height: 1.4; flex: 1;">Sesi meditasi panduan malam hari untuk meningkatkan kualitas tidur.</p>

                        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f0f0f0; padding-top: 12px;">
                            <span style="font-size: 13px; font-weight: 700; color: var(--primary-green);">Rp 25.000</span>
                            <a href="event-detail.php" class="btn-action" style="padding: 6px 14px; font-size: 11px; text-decoration: none;">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>