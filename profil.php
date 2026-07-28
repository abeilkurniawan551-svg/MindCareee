<?php
session_start();

// Cek apakah user sudah login, jika belum arahkan kembali ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: masuk.html");
    exit;
}

$nama_user = $_SESSION['nama'];
$email_user = isset($_SESSION['email']) ? $_SESSION['email'] : 'aisyha@email.com';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - MindCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="dash-layout">
        <!-- SIDEBAR KIRI -->
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
                <a href="konsultasi-psikolog.php" class="menu-item">🧠 Konsultasi Psikolog</a>
            </div>

            <div class="menu-group">
                <div class="menu-label">PENGATURAN</div>
                <a href="profil.php" class="menu-item active">👤 Profil</a>
                <a href="pengaturan.php" class="menu-item">⚙️ Pengaturan</a>
                <a href="logout.php" class="menu-item" style="color: #e74c3c;">🚪 Keluar</a>
            </div>

            <div class="support-sidebar-card" style="margin-top: auto;">
                <h4 style="font-weight: 700;">Butuh Dukungan?</h4>
                <p>Kamu tidak sendirian.<br>Kami siap membantu.</p>
                <button class="btn-support">Chat Sekarang</button>
            </div>
        </div>

        <!-- MAIN CONTENT KANAN -->
        <div class="main-content">
            
            <!-- HEADER TOP NAV -->
            <div class="top-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                <div>
                    <h1 style="font-size: 22px; font-weight: 700; margin: 0 0 4px 0;">Profil Saya</h1>
                    <p style="font-size: 12px; color: var(--text-gray); margin: 0;">Kelola informasi akun dan pantau aktivitasmu.</p>
                </div>
                
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="font-size: 18px; position: relative; cursor: pointer;">🔔 <span style="position: absolute; top: -2px; right: -2px; background: red; color: white; font-size: 9px; width: 12px; height: 12px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">2</span></div>
                    <div style="display: flex; align-items: center; gap: 8px; cursor: pointer; background: #ffffff; padding: 6px 12px; border-radius: 20px; border: 1px solid var(--border-color);">
                        <img src="https://via.placeholder.com/34" alt="<?php echo htmlspecialchars($nama_user); ?>" style="border-radius: 50%;">
                        <span style="font-size: 12px; font-weight: 600;"><?php echo htmlspecialchars($nama_user); ?> ⌄</span>
                    </div>
                </div>
            </div>

            <!-- ROW 1: USER AVATAR & INFORMASI PRIBADI -->
            <div class="profile-grid-top">
                <!-- User Card -->
                <div class="profile-card-user">
                    <span style="position: absolute; top: 16px; right: 16px; cursor: pointer; color: var(--text-gray);">•••</span>
                    <div class="avatar-wrapper">
                        <img src="https://via.placeholder.com/100" alt="<?php echo htmlspecialchars($nama_user); ?>">
                        <div class="cam-badge">📷</div>
                    </div>
                    <h3 style="font-size: 16px; font-weight: 700; margin: 0;"><?php echo htmlspecialchars($nama_user); ?></h3>
                    <div class="badge-active-user">✔ Pengguna Aktif</div>
                    
                    <button class="btn-outline-cancel" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 16px; font-size: 11px;">
                        📷 Ubah Foto
                    </button>
                </div>

                <!-- Informasi Pribadi -->
                <div class="profile-card-info">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <span style="color: var(--primary-green); font-size: 18px;">👤</span>
                        <h3 style="font-size: 14px; font-weight: 700; margin: 0;">Informasi Pribadi</h3>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Nama Lengkap</span>
                        <div class="info-val-wrap">
                            <span><?php echo htmlspecialchars($nama_user); ?></span>
                            <div class="info-icon-bg">👤</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Email</span>
                        <div class="info-val-wrap">
                            <span><?php echo htmlspecialchars($email_user); ?></span>
                            <div class="info-icon-bg">✉️</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Nomor Telepon</span>
                        <div class="info-val-wrap">
                            <span>+62 812-3456-7890</span>
                            <div class="info-icon-bg">📞</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Tanggal Lahir</span>
                        <div class="info-val-wrap">
                            <span>15 Mei 2003</span>
                            <div class="info-icon-bg">📅</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Jenis Kelamin</span>
                        <div class="info-val-wrap">
                            <span>Perempuan</span>
                            <div class="info-icon-bg">🚻</div>
                        </div>
                    </div>

                    <div style="text-align: right; margin-top: 14px;">
                        <button class="btn-action" style="padding: 8px 18px; font-size: 11.5px;">✏️ Edit Profil</button>
                    </div>
                </div>
            </div>

            <!-- ROW 2: AKTIVITAS & PENCAPAIAN -->
            <div class="profile-grid-mid">
                <!-- Aktivitas MindCare -->
                <div class="card-white" style="margin-bottom: 0;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: var(--primary-green); font-size: 18px;">📊</span>
                        <h3 style="font-size: 14px; font-weight: 700; margin: 0;">Aktivitas MindCare</h3>
                    </div>

                    <div class="stat-activity-grid">
                        <div class="stat-act-box">
                            <div class="stat-act-icon">📋</div>
                            <span style="font-size: 10px; color: var(--text-gray); font-weight: 600;">Self Check</span>
                            <h4 style="font-size: 16px; font-weight: 700; margin: 4px 0 0 0;"><span style="color: var(--primary-green);">5</span> <span style="font-size: 10px; font-weight: normal; color: var(--text-gray);">Kali</span></h4>
                        </div>

                        <div class="stat-act-box">
                            <div class="stat-act-icon">😊</div>
                            <span style="font-size: 10px; color: var(--text-gray); font-weight: 600;">Mood Tracker</span>
                            <h4 style="font-size: 16px; font-weight: 700; margin: 4px 0 0 0;"><span style="color: var(--primary-green);">21</span> <span style="font-size: 10px; font-weight: normal; color: var(--text-gray);">Hari</span></h4>
                        </div>

                        <div class="stat-act-box">
                            <div class="stat-act-icon">🧘</div>
                            <span style="font-size: 10px; color: var(--text-gray); font-weight: 600;">Meditasi</span>
                            <h4 style="font-size: 16px; font-weight: 700; margin: 4px 0 0 0;"><span style="color: var(--primary-green);">18</span> <span style="font-size: 10px; font-weight: normal; color: var(--text-gray);">Sesi</span></h4>
                        </div>

                        <div class="stat-act-box">
                            <div class="stat-act-icon">📄</div>
                            <span style="font-size: 10px; color: var(--text-gray); font-weight: 600;">Artikel Dibaca</span>
                            <h4 style="font-size: 16px; font-weight: 700; margin: 4px 0 0 0;"><span style="color: var(--primary-green);">12</span></h4>
                        </div>
                    </div>
                </div>

                <!-- Pencapaian -->
                <div class="card-white" style="margin-bottom: 0;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #f59e0b; font-size: 18px;">🏆</span>
                        <h3 style="font-size: 14px; font-weight: 700; margin: 0;">Pencapaian</h3>
                    </div>

                    <div class="badge-achieve-grid">
                        <div class="achieve-card orange">
                            <span style="font-size: 20px;">🔥</span>
                            <span style="font-size: 10px; font-weight: 700; margin-top: 4px;">Streak</span>
                            <span style="font-size: 11px; color: var(--text-dark); font-weight: 600;">7 Hari</span>
                        </div>

                        <div class="achieve-card green">
                            <span style="font-size: 20px;">💚</span>
                            <span style="font-size: 10px; font-weight: 700; margin-top: 4px;">Konsisten</span>
                            <span style="font-size: 9px; color: var(--text-gray); line-height: 1.2;">Kebiasaan baik yang terjaga</span>
                        </div>

                        <div class="achieve-card purple">
                            <span style="font-size: 20px;">🧘</span>
                            <span style="font-size: 10px; font-weight: 700; margin-top: 4px;">Meditasi Aktif</span>
                            <span style="font-size: 9px; color: var(--text-gray); line-height: 1.2;">Terus jaga konsistensimu</span>
                        </div>

                        <div class="achieve-card yellow">
                            <span style="font-size: 20px;">🙂</span>
                            <span style="font-size: 10px; font-weight: 700; margin-top: 4px;">Mood Positif</span>
                            <span style="font-size: 9px; color: var(--text-gray); line-height: 1.2;">Pertahankan energi baikmu</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ROW 3: RIWAYAT AKTIVITAS & BANNER CALLOUT -->
            <div class="profile-grid-bot">
                <!-- Riwayat Aktivitas -->
                <div class="card-white" style="margin-bottom: 0;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: var(--primary-green); font-size: 18px;">🕒</span>
                        <h3 style="font-size: 14px; font-weight: 700; margin: 0;">Riwayat Aktivitas</h3>
                    </div>

                    <div class="timeline-list">
                        <!-- Item 1 -->
                        <div class="timeline-item">
                            <div class="timeline-check-icon">✓</div>
                            <div style="flex: 1; display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <div style="font-size: 9.5px; color: var(--text-gray); font-weight: 600;">Hari ini &nbsp;•&nbsp; 10.30 WIB</div>
                                    <h4 style="font-size: 11.5px; font-weight: 700; margin: 2px 0 0 0;">Mengisi Mood Tracker</h4>
                                    <p style="font-size: 10px; color: var(--text-gray); margin: 0;">Terima kasih sudah mencatat perasaanmu hari ini!</p>
                                </div>
                                <span style="cursor: pointer; color: var(--text-gray);">›</span>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="timeline-item">
                            <div class="timeline-check-icon">✓</div>
                            <div style="flex: 1; display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <div style="font-size: 9.5px; color: var(--text-gray); font-weight: 600;">Kemarin &nbsp;•&nbsp; 21.15 WIB</div>
                                    <h4 style="font-size: 11.5px; font-weight: 700; margin: 2px 0 0 0;">Menyelesaikan Meditasi</h4>
                                    <p style="font-size: 10px; color: var(--text-gray); margin: 0;">Meditasi "Relaksasi Malam" selama 15 menit</p>
                                </div>
                                <span style="cursor: pointer; color: var(--text-gray);">›</span>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="timeline-item">
                            <div class="timeline-check-icon">✓</div>
                            <div style="flex: 1; display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <div style="font-size: 9.5px; color: var(--text-gray); font-weight: 600;">20 Juli 2026 &nbsp;•&nbsp; 19.45 WIB</div>
                                    <h4 style="font-size: 11.5px; font-weight: 700; margin: 2px 0 0 0;">Self Check</h4>
                                    <p style="font-size: 10px; color: var(--text-gray); margin: 0;">Kamu menyelesaikan tes kesehatan mental</p>
                                </div>
                                <span style="cursor: pointer; color: var(--text-gray);">›</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner Callout -->
                <div class="profile-banner-callout">
                    <div style="max-width: 60%; z-index: 2;">
                        <h3 style="font-size: 16px; font-weight: 700; margin: 0 0 8px 0; line-height: 1.3;">Terus jaga kesehatan mentalmu.</h3>
                        <p style="font-size: 11px; color: var(--text-dark); margin: 0 0 16px 0; line-height: 1.5;">Langkah kecil setiap hari membawa perubahan besar.</p>
                        <a href="self-check.html" class="btn-action" style="display: inline-flex; align-items: center; gap: 6px; font-size: 11px;">Mulai Self Check ➔</a>
                    </div>
                    <div style="font-size: 80px; position: absolute; right: 10px; bottom: -10px; opacity: 0.8; z-index: 1;">
                        🧘‍♀️
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>