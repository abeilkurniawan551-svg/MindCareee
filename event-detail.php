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
    <title>Detail Event - MindCare</title>
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

        <!-- MAIN CONTENT KANAN -->
        <div class="main-content">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <a href="event.php" style="text-decoration: none; color: var(--text-gray); font-size: 12px; display: inline-flex; align-items: center; gap: 6px;">
                    ⬅️ Kembali ke Daftar Event
                </a>

                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="font-size: 18px; position: relative; cursor: pointer;">🔔 <span style="position: absolute; top: -2px; right: -2px; background: red; color: white; font-size: 9px; width: 12px; height: 12px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">2</span></div>
                    <div style="display: flex; align-items: center; gap: 8px; cursor: pointer; background: #ffffff; padding: 6px 12px; border-radius: 20px; border: 1px solid var(--border-color);">
                        <img src="https://via.placeholder.com/34" alt="<?php echo htmlspecialchars($nama_user); ?>" style="border-radius: 50%;">
                        <span style="font-size: 12px; font-weight: 600;"><?php echo htmlspecialchars($nama_user); ?> ⌄</span>
                    </div>
                </div>
            </div>

            <div class="event-detail-grid">
                
                <!-- KONTEN UTAMA (KIRI) -->
                <div>
                    <div style="position: relative; margin-bottom: 20px;">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800" style="width: 100%; height: 280px; object-fit: cover; border-radius: 16px;" alt="Banner Detail Event">
                        <span style="position: absolute; top: 16px; left: 16px; background: #ffffff; color: var(--primary-green); font-size: 11px; font-weight: 700; padding: 6px 14px; border-radius: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                            WEBINAR INTERAKTIF
                        </span>
                    </div>

                    <h1 style="font-size: 22px; font-weight: 700; margin: 0 0 16px 0; line-height: 1.3;">
                        Managing Burnout & Building Resilience in Digital Era
                    </h1>

                    <div class="speaker-box">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=150" class="speaker-avatar" alt="Dr. Amanda Setiawan">
                        <div>
                            <span style="font-size: 10px; color: var(--primary-green); font-weight: 700; letter-spacing: 0.5px;">NARA SUMBER / PEMBICARA</span>
                            <h4 style="font-size: 14px; font-weight: 700; margin: 2px 0 4px 0;">Dr. Amanda Setiawan, M.Psi.</h4>
                            <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Psikolog Klinis Spesialis Stres Kerja & Mental Wellbeing Specialist</p>
                        </div>
                    </div>

                    <div class="card-white" style="margin-bottom: 20px;">
                        <h3 style="font-size: 14px; font-weight: 700; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                            <span>📝</span> Deskripsi Acara
                        </h3>
                        <p style="font-size: 12px; color: var(--text-dark); line-height: 1.6; margin-bottom: 12px;">
                            Tekanan pekerjaan dan tuntutan ritme hidup serba cepat di era digital sering kali membuat seseorang mengalami kelelahan mental ekstrem (*burnout*). Jika dibiarkan, kondisi ini dapat berdampak buruk pada kesehatan fisik maupun emosional.
                        </p>
                        <p style="font-size: 12px; color: var(--text-dark); line-height: 1.6; margin: 0;">
                            Dalam webinar interaktif ini, Anda akan diajak memahami akar penyebab burnout, mengenali gejala awalnya, serta mempelajari langkah-langkah konkret (*mindful coping strategies*) untuk membangun ketahanan diri (*resilience*) di tempat kerja dan kehidupan sehari-hari.
                        </p>
                    </div>

                    <div class="card-white" style="margin-bottom: 20px;">
                        <h3 style="font-size: 14px; font-weight: 700; margin-bottom: 14px; display: flex; align-items: center; gap: 8px;">
                            <span>🕒</span> Rangkaian Acara (Rundown)
                        </h3>
                        <div class="schedule-list">
                            <div class="schedule-item">
                                <span style="font-weight: 700; width: 110px; color: var(--primary-green);">13.00 - 13.15</span>
                                <div><strong>Pembukaan & Pre-Test</strong><br><span style="color: var(--text-gray); font-size: 11px;">Registrasi ulang peserta dan sambutan moderator</span></div>
                            </div>
                            <div class="schedule-item">
                                <span style="font-weight: 700; width: 110px; color: var(--primary-green);">13.15 - 14.15</span>
                                <div><strong>Penyampaian Materi Utama</strong><br><span style="color: var(--text-gray); font-size: 11px;">Mengenali Burnout & Trik Membangun Ketahanan Mental oleh Dr. Amanda</span></div>
                            </div>
                            <div class="schedule-item">
                                <span style="font-weight: 700; width: 110px; color: var(--primary-green);">14.15 - 15.00</span>
                                <div><strong>Sesi Tanya Jawab (Q&A) Interaktif</strong><br><span style="color: var(--text-gray); font-size: 11px;">Konsultasi langsung dan diskusi kasus bersama peserta</span></div>
                            </div>
                            <div class="schedule-item">
                                <span style="font-weight: 700; width: 110px; color: var(--primary-green);">15.00 - 15.30</span>
                                <div><strong>Penutupan & Post-Test</strong><br><span style="color: var(--text-gray); font-size: 11px;">Foto bersama dan informasi klaim E-Sertifikat</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-white" style="margin-bottom: 0;">
                        <h3 style="font-size: 14px; font-weight: 700; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                            <span>🎁</span> Fasilitas yang Didapatkan
                        </h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 12px;">
                            <div style="display: flex; align-items: center; gap: 8px; background: #f8faf8; padding: 10px; border-radius: 8px;">
                                <span>📜</span> <strong>E-Sertifikat Resmi</strong>
                            </div>
                            <div style="display: flex; align-items: center; gap: 8px; background: #f8faf8; padding: 10px; border-radius: 8px;">
                                <span>📚</span> <strong>Modul & Slide Materi PDF</strong>
                            </div>
                            <div style="display: flex; align-items: center; gap: 8px; background: #f8faf8; padding: 10px; border-radius: 8px;">
                                <span>🎥</span> <strong>Akses Rekaman Video Sesi</strong>
                            </div>
                            <div style="display: flex; align-items: center; gap: 8px; background: #f8faf8; padding: 10px; border-radius: 8px;">
                                <span>👥</span> <strong>Akses Komunitas MindCare</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR TIKET & PENDAFTARAN (KANAN) -->
                <div class="ticket-sidebar-card">
                    <h3 style="font-size: 15px; font-weight: 700; margin: 0 0 16px 0;">Detail Tiket & Pelaksanaan</h3>
                    
                    <div style="background: #f1f8e9; border-radius: 12px; padding: 16px; margin-bottom: 20px; text-align: center;">
                        <span style="font-size: 11px; color: var(--text-gray); font-weight: 600;">HARGA TIKET</span>
                        <div style="font-size: 24px; font-weight: 700; color: var(--primary-green); margin-top: 2px;">
                            Rp 49.000
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 14px; font-size: 12px; color: var(--text-dark); margin-bottom: 24px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <span style="font-size: 16px;">📅</span>
                            <div>
                                <strong style="display: block; font-size: 11px; color: var(--text-gray);">TANGGAL ACARA</strong>
                                Sabtu, 15 Agustus 2026
                            </div>
                        </div>

                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <span style="font-size: 16px;">⏰</span>
                            <div>
                                <strong style="display: block; font-size: 11px; color: var(--text-gray);">WAKTU</strong>
                                13.00 - 15.30 WIB
                            </div>
                        </div>

                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <span style="font-size: 16px;">💻</span>
                            <div>
                                <strong style="display: block; font-size: 11px; color: var(--text-gray);">LOKASI / PLATFORM</strong>
                                Online via Zoom Meeting
                            </div>
                        </div>

                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <span style="font-size: 16px;">🎟️</span>
                            <div>
                                <strong style="display: block; font-size: 11px; color: var(--text-gray);">STATUS KUOTA</strong>
                                <span style="color: #d32f2f; font-weight: 700;">Tersisa 12 Kursi Lagi!</span>
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL YANG MENGARAH LANGSUNG KE DAFTAR-EVENT.PHP -->
                    <a href="event.php" class="btn-action" style="width: 100%; padding: 12px; font-size: 13px; font-weight: 600; text-align: center; text-decoration: none; display: inline-block; box-sizing: border-box;">
                        Daftar Sekarang ➔
                    </a>
                    
                    <p style="font-size: 10px; color: var(--text-gray); text-align: center; margin: 12px 0 0 0;">
                        🔒 Pembayaran aman & verifikasi pendaftaran otomatis.
                    </p>
                </div>

            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>