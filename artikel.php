<?php
session_start();

// Cek apakah user sudah login, jika belum arahkan kembali ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: masuk.php");
    exit;
}

$nama_user = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel - MindCare</title>
    <!-- LINK KE STYLE.CSS UTAMA -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="dash-layout">
        <!-- ================= SIDEBAR KIRI ================= -->
        <div class="sidebar">
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
                <a href="artikel.php" class="menu-item active">📄 Artikel</a>
                <a href="event.php" class="menu-item">📅 Event</a>
            </div>

            <div class="menu-group">
                <div class="menu-label">KOMUNITAS</div>
                <a href="forum.php" class="menu-item">👥 Forum</a>
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

            <div class="support-sidebar-card">
                <h4 style="font-weight: 700;">Butuh Dukungan?</h4>
                <p>Kamu tidak sendirian.<br>Kami siap membantu.</p>
                <button class="btn-support">Chat Sekarang</button>
            </div>
        </div>

        <!-- ================= MAIN CONTENT ================= -->
        <div class="main-content">
            
            <!-- TOP HEADER NAV -->
            <div class="top-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                <div>
                    <h1 style="font-size: 24px; font-weight: 700; margin: 0 0 8px 0;">Artikel</h1>
                    <p style="font-size: 13px; color: var(--text-gray); margin: 0;">Temukan informasi dan tips bermanfaat untuk kesehatan mentalmu.</p>
                </div>
                
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="display: flex; align-items: center; background: #f7fafc; border: 1px solid var(--border-color); padding: 8px 14px; border-radius: 10px; width: 200px;">
                        <input type="text" placeholder="Cari artikel..." style="border: none; background: transparent; outline: none; font-size: 12px; width: 100%;">
                        <span style="color: var(--text-gray); font-size: 12px;">🔍</span>
                    </div>

                    <select style="background: #f7fafc; border: 1px solid var(--border-color); padding: 8px 12px; border-radius: 10px; font-size: 12px; outline: none; color: var(--text-dark);">
                        <option>Semua Topik</option>
                        <option>Kecemasan</option>
                        <option>Self Care</option>
                        <option>Stres</option>
                    </select>

                    <div style="display: flex; align-items: center; gap: 12px; margin-left: 8px;">
                        <div style="font-size: 20px; position: relative; cursor: pointer;">🔔</div>
                        <div style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <img src="https://via.placeholder.com/36" alt="<?php echo htmlspecialchars($nama_user); ?>" style="border-radius: 50%;">
                            <div>
                                <!-- NAMA USER DINAMIS DI POJOK KANAN ATAS -->
                                <h4 style="margin: 0; font-size: 13px;"><?php echo htmlspecialchars($nama_user); ?></h4>
                                <p style="margin: 0; font-size: 10px; color: var(--text-gray);">Pengguna</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MAIN CONTENT GRID LAYOUT -->
            <div class="content-grid-artikel">
                
                <!-- KOLOM KIRI (ARTIKEL PILIHAN & LIST ARTIKEL) -->
                <div>
                    <!-- HERO BANNER ARTIKEL PILIHAN -->
                    <div class="hero-banner">
                        <div class="hero-left">
                            <span class="hero-badge" style="color: #d69e2e;">⭐ Artikel Pilihan</span>
                            <h2 class="hero-title">Kenali, Pahami, dan Jaga Kesehatan Mentalmu</h2>
                            <p class="hero-desc">Informasi terpercaya untuk membantu kamu menjalani hidup yang lebih sehat dan seimbang.</p>
                            <a href="#" class="btn-hero">Baca Selengkapnya ➔</a>
                        </div>
                        <img src="z.png" style="max-height: 160px; object-fit: contain;" alt="Illustration">
                    </div>

                    <!-- ARTIKEL TERBARU -->
                    <div class="section-header">
                        <h3>Artikel Terbaru</h3>
                    </div>

                    <div class="articles-grid">
                        <!-- Card 1 -->
                        <div class="article-card">
                            <div class="article-img-box">
                                <img src="kecemasan.jpg" alt="Kecemasan">
                                <span class="badge-type" style="color: #d69e2e;">Kecemasan</span>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title">5 Cara Mengatasi Kecemasan Berlebihan</h4>
                                <p class="article-desc">Tips sederhana yang bisa kamu lakukan ketika pikiran terasa cemas dan tidak tenang.</p>
                                <div class="article-footer">
                                    <span>🕒 5 menit baca • 25 Jul 2026</span>
                                    <span>🔖</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="article-card">
                            <div class="article-img-box">
                                <img src="selflove.jpg" alt="Self Care">
                                <span class="badge-type" style="color: #38a169;">Self Care</span>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title">Pentingnya Self Love dalam Kesehatan Mental</h4>
                                <p class="article-desc">Mencintai diri sendiri adalah langkah awal untuk hidup yang lebih bahagia.</p>
                                <div class="article-footer">
                                    <span>🕒 6 menit baca • 24 Jul 2026</span>
                                    <span>🔖</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="article-card">
                            <div class="article-img-box">
                                <img src="kelolastres.jpg" alt="Stres">
                                <span class="badge-type" style="color: #319795;">Stres</span>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title">Kelola Stres dengan Teknik Pernapasan 4-7-8</h4>
                                <p class="article-desc">Teknik pernapasan sederhana yang dapat membantu menenangkan pikiran.</p>
                                <div class="article-footer">
                                    <span>🕒 4 menit baca • 23 Jul 2026</span>
                                    <span>🔖</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="article-card">
                            <div class="article-img-box">
                                <img src="b.jpg" alt="Motivasi">
                                <span class="badge-type" style="color: #dd6b20;">Motivasi</span>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title">Cara Membangun Motivasi Setiap Hari</h4>
                                <p class="article-desc">Bangun kebiasaan kecil untuk menjaga semangat dan produktivitas harianmu.</p>
                                <div class="article-footer">
                                    <span>🕒 6 menit baca • 22 Jul 2026</span>
                                    <span>🔖</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card 5 -->
                        <div class="article-card">
                            <div class="article-img-box">
                                <img src="tidur.jpg" alt="Tidur">
                                <span class="badge-type" style="color: #3182ce;">Tidur</span>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title">Tidur Berkualitas untuk Hidup yang Lebih Sehat</h4>
                                <p class="article-desc">Pahami pentingnya tidur berkualitas dan cara meningkatkannya.</p>
                                <div class="article-footer">
                                    <span>🕒 5 menit baca • 21 Jul 2026</span>
                                    <span>🔖</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card 6 -->
                        <div class="article-card">
                            <div class="article-img-box">
                                <img src="burnout.jpg" alt="Kesehatan Mental">
                                <span class="badge-type" style="color: #e53e3e;">Kesehatan Mental</span>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title">Mengenal Burnout: Tanda, Penyebab, dan Cara Mengatasi</h4>
                                <p class="article-desc">Kenali gejala burnout lebih awal dan temukan cara untuk mengatasinya.</p>
                                <div class="article-footer">
                                    <span>🕒 7 menit baca • 20 Jul 2026</span>
                                    <span>🔖</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button style="display: block; margin: 20px auto 0 auto; background: #ffffff; border: 1px solid var(--border-color); padding: 8px 20px; border-radius: 8px; font-size: 12px; cursor: pointer; font-weight: 500;">
                        Muat Lebih Banyak ⌄
                    </button>
                </div>

                <!-- KOLOM KANAN (SIDEBAR ARTIKEL) -->
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    
                    <!-- Widget 1: Artikel Rekomendasi -->
                    <div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: 14px; padding: 16px;">
                        <h4 style="font-size: 13px; font-weight: 700; margin: 0 0 14px 0;">Artikel Rekomendasi</h4>
                        
                        <div style="display: flex; gap: 10px; margin-bottom: 12px; cursor: pointer;">
                            <img src="https://dummyimage.com/100x100/dcfce7/15803d&text=Journal" style="width: 46px; height: 46px; border-radius: 8px; object-fit: cover;" alt="Journaling">
                            <div>
                                <h5 style="margin: 0 0 2px 0; font-size: 11px; font-weight: 600; line-height: 1.3;">Journaling: Cara Sederhana Melepas Emosi</h5>
                                <p style="margin: 0; font-size: 9.5px; color: var(--text-gray);">4 menit baca</p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 10px; margin-bottom: 12px; cursor: pointer;">
                            <img src="https://dummyimage.com/100x100/dbeafe/1d4ed8&text=Mindful" style="width: 46px; height: 46px; border-radius: 8px; object-fit: cover;" alt="Mindfulness">
                            <div>
                                <h5 style="margin: 0 0 2px 0; font-size: 11px; font-weight: 600; line-height: 1.3;">Mindfulness untuk Pemula: Mulai Langkah Kecil</h5>
                                <p style="margin: 0; font-size: 9.5px; color: var(--text-gray);">5 menit baca</p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 10px; cursor: pointer;">
                            <img src="https://dummyimage.com/100x100/ffedd5/c2410c&text=Morning" style="width: 46px; height: 46px; border-radius: 8px; object-fit: cover;" alt="Morning">
                            <div>
                                <h5 style="margin: 0 0 2px 0; font-size: 11px; font-weight: 600; line-height: 1.3;">Bangun Rutinitas Pagi yang Sehat</h5>
                                <p style="margin: 0; font-size: 9.5px; color: var(--text-gray);">6 menit baca</p>
                            </div>
                        </div>
                    </div>

                    <!-- Widget 2: Kategori Artikel -->
                    <div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: 14px; padding: 16px;">
                        <h4 style="font-size: 13px; font-weight: 700; margin: 0 0 10px 0;">Kategori Artikel</h4>

                        <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed var(--border-color); font-size: 11px;">
                            <span>😊 Kecemasan</span>
                            <span style="color: var(--text-gray);">12</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed var(--border-color); font-size: 11px;">
                            <span>☁️ Stres</span>
                            <span style="color: var(--text-gray);">10</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed var(--border-color); font-size: 11px;">
                            <span>💖 Self Care</span>
                            <span style="color: var(--text-gray);">14</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding: 8px 0; font-size: 11px;">
                            <span>⭐ Motivasi</span>
                            <span style="color: var(--text-gray);">11</span>
                        </div>

                        <a href="#" style="display: block; text-align: center; margin-top: 12px; font-size: 11px; color: var(--primary-green); text-decoration: none; font-weight: 600;">Lihat Semua Kategori ➔</a>
                    </div>

                    <!-- Widget 3: Quote Card -->
                    <div style="background: #f1f8e9; border: 1px solid #c8e6c9; border-radius: 14px; padding: 16px;">
                        <div style="font-size: 28px; color: var(--primary-green); line-height: 1;">“</div>
                        <p style="font-size: 11px; color: var(--text-dark); line-height: 1.5; margin: 4px 0 8px 0; font-weight: 500;">Pengetahuan adalah langkah pertama menuju perubahan.</p>
                        <p style="font-size: 10px; color: var(--text-gray); margin: 0;">Terus belajar dan rawat dirimu. 💚</p>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- PANGGIL SCRIPT.JS DI BAGIAN BAWAH -->
    <script src="script.js"></script>
</body>
</html>