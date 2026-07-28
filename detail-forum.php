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
    <title>Detail Diskusi - MindCare</title>
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
                <a href="forum.php" class="menu-item active">🗣️ Forum</a>
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

        <!-- ================= MAIN CONTENT ================= -->
        <div class="main-content">
            <!-- BREADCRUMB -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">
                    Forum &nbsp;&gt;&nbsp; Kesehatan Mental &nbsp;&gt;&nbsp; Cara Mengatasi Overthinking Sebelum Tidur
                </p>
                <!-- INFO PROFIL LOGIN DI ATAS -->
                <div style="font-size: 12px; font-weight: 600; color: var(--text-dark);">
                    Halo, <span><?php echo htmlspecialchars($nama_user); ?></span> 👋
                </div>
            </div>

            <div class="content-grid-artikel">
                <!-- UTAMA (POSTINGAN & KOMENTAR) -->
                <div>
                    <!-- Post Utama -->
                    <div class="comment-box-card">
                        <div class="card-author-header">
                            <div class="author-info">
                                <div class="avatar-circle">👤</div>
                                <div>
                                    <h4 style="margin: 0; font-size: 12px; font-weight: 600;">Anonim_01 <span class="badge-tag-mini tag-green">Kesehatan Mental</span></h4>
                                    <p style="margin: 2px 0 0 0; font-size: 9.5px; color: var(--text-gray);">2 jam yang lalu</p>
                                </div>
                            </div>
                            <span style="cursor: pointer; color: var(--text-gray);">⋮</span>
                        </div>

                        <h2 style="font-size: 18px; font-weight: 700; margin: 12px 0 10px 0;">Cara Mengatasi Overthinking Sebelum Tidur</h2>
                        <p style="font-size: 12px; color: var(--text-dark); line-height: 1.6; margin-bottom: 16px;">
                            Halo semua, aku sering banget overthinking sebelum tidur. Pikiran jadi kemana-mana, memikirkan hal yang belum terjadi atau kesalahan di masa lalu. Akhirnya susah tidur dan bangun pun masih merasa lelah.<br><br>
                            Kira-kira ada tips atau cara yang bisa kalian lakukan untuk menenangkan pikiran sebelum tidur? Boleh dong berbagi pengalaman atau kebiasaan yang membantu kalian. Terima kasih banyak! 💚
                        </p>

                        <div style="display: flex; gap: 8px; margin-bottom: 16px;">
                            <span style="background: #f0f0f0; padding: 4px 10px; border-radius: 12px; font-size: 10px;">overthinking</span>
                            <span style="background: #f0f0f0; padding: 4px 10px; border-radius: 12px; font-size: 10px;">tidur</span>
                            <span style="background: #f0f0f0; padding: 4px 10px; border-radius: 12px; font-size: 10px;">kesehatan mental</span>
                        </div>

                        <div style="display: flex; gap: 12px; font-size: 11.5px; border-top: 1px solid #f0f0f0; padding-top: 12px;">
                            <button style="background: #f7fafc; border: 1px solid var(--border-color); padding: 6px 14px; border-radius: 20px; cursor: pointer;">♡ 128</button>
                            <button style="background: #f7fafc; border: 1px solid var(--border-color); padding: 6px 14px; border-radius: 20px; cursor: pointer;">💬 45</button>
                            <button style="background: #f7fafc; border: 1px solid var(--border-color); padding: 6px 14px; border-radius: 20px; cursor: pointer;">🔖 Simpan</button>
                            <button style="background: #f7fafc; border: 1px solid var(--border-color); padding: 6px 14px; border-radius: 20px; cursor: pointer;">🔗 Bagikan</button>
                        </div>
                    </div>

                    <!-- Section Komentar -->
                    <div class="comment-box-card">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <h4 style="font-size: 13px; margin: 0;">Komentar (45)</h4>
                            <span style="font-size: 11px; color: var(--text-gray);">Urutkan: <strong>Terbaru ⌄</strong></span>
                        </div>

                        <!-- Komentar Item 1 -->
                        <div class="comment-item">
                            <div class="avatar-circle" style="background: #f3e5f5;">👤</div>
                            <div style="flex: 1;">
                                <div style="display: flex; justify-content: space-between;">
                                    <h5 style="margin: 0; font-size: 11.5px;">Anonim_02 <span style="font-size: 9.5px; color: var(--text-gray); font-weight: normal;">• 1 jam yang lalu</span></h5>
                                    <span style="font-size: 10px; color: var(--text-gray);">♡ 23</span>
                                </div>
                                <p style="font-size: 11.5px; color: var(--text-dark); margin: 6px 0;">Aku biasanya tulis semua pikiran di jurnal sebelum tidur. Beneran membantu banget, pikiran jadi lebih lega.</p>
                                <span style="font-size: 10px; color: var(--primary-green); cursor: pointer; font-weight: 600;">Balas</span>
                            </div>
                        </div>

                        <!-- Balasan Penulis (Indent) -->
                        <div class="reply-indent">
                            <div style="display: flex; gap: 10px;">
                                <div class="avatar-circle">👤</div>
                                <div style="flex: 1;">
                                    <h5 style="margin: 0; font-size: 11.5px;">Anonim_01 <span style="background: #2e7d32; color: white; padding: 2px 6px; border-radius: 4px; font-size: 8px;">Penulis</span></h5>
                                    <p style="font-size: 11px; color: var(--text-dark); margin: 4px 0;">Wah, ide bagus! Aku mau coba deh mulai tulis jurnal. Makasih yaa 💚</p>
                                </div>
                            </div>
                        </div>

                        <!-- Komentar Item 2 -->
                        <div class="comment-item" style="margin-top: 10px;">
                            <div class="avatar-circle" style="background: #ffecb3;">👤</div>
                            <div style="flex: 1;">
                                <div style="display: flex; justify-content: space-between;">
                                    <h5 style="margin: 0; font-size: 11.5px;">Anonim_03 <span style="font-size: 9.5px; color: var(--text-gray); font-weight: normal;">• 45 menit yang lalu</span></h5>
                                    <span style="font-size: 10px; color: var(--text-gray);">♡ 17</span>
                                </div>
                                <p style="font-size: 11.5px; color: var(--text-dark); margin: 6px 0;">Coba teknik 4-7-8 breathing, tarik napas 4 detik, tahan 7 detik, hembuskan 8 detik. Bikin rileks!</p>
                                <span style="font-size: 10px; color: var(--primary-green); cursor: pointer; font-weight: 600;">Balas</span>
                            </div>
                        </div>

                        <!-- Input Form Kirim Komentar -->
                        <div style="margin-top: 20px; padding-top: 16px; border-top: 1px solid var(--border-color);">
                            <div style="display: flex; gap: 10px; background: #f7fafc; padding: 10px; border-radius: 20px; border: 1px solid var(--border-color); align-items: center;">
                                <input type="text" placeholder="Tulis komentar..." style="flex: 1; border: none; background: transparent; outline: none; font-size: 12px;">
                                <span style="cursor: pointer;">😊</span>
                                <label style="font-size: 10px; color: var(--text-gray); display: flex; align-items: center; gap: 4px;"><input type="checkbox" checked> Kirim sebagai anonim</label>
                                <button class="btn-green-main" style="padding: 6px 14px; font-size: 11px;">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR KANAN -->
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <!-- Diskusi Terkait -->
                    <div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: 14px; padding: 16px;">
                        <h4 style="font-size: 12.5px; font-weight: 700; margin: 0 0 12px 0;">Diskusi Terkait</h4>
                        <div style="margin-bottom: 10px; font-size: 11px;">
                            <a href="#" style="font-weight: 600; color: var(--text-dark); display: block; margin-bottom: 2px; text-decoration: none;">Sulit fokus belajar karena kecemasan</a>
                            <span style="color: var(--text-gray); font-size: 9.5px;">💬 32 Komentar</span>
                        </div>
                        <div style="font-size: 11px;">
                            <a href="#" style="font-weight: 600; color: var(--text-dark); display: block; margin-bottom: 2px; text-decoration: none;">Tips tidur nyenyak untuk kesehatan mental</a>
                            <span style="color: var(--text-gray); font-size: 9.5px;">💬 41 Komentar</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>