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
    <title>Forum Komunitas - MindCare</title>
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
                <h4 style="font-weight: 700;">Kamu tidak sendiri.</h4>
                <p>MindCare hadir untuk mendukung kesehatan mentalmu.</p>
                <button class="btn-support">Butuh Dukungan?</button>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            
            <!-- TOP HEADER -->
            <div class="top-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                <div>
                    <h1 style="font-size: 22px; font-weight: 700; margin: 0 0 4px 0;">Forum Komunitas</h1>
                    <p style="font-size: 12px; color: var(--text-gray); margin: 0;">Berbagi cerita, saling mendukung, dan bertumbuh bersama komunitas MindCare.</p>
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

            <!-- CONTENT GRID LAYOUT -->
            <div class="content-grid-artikel">
                
                <!-- KOLOM UTAMA (KIRI) -->
                <div>
                    <!-- SEARCH & TOMBOL BUAT DISKUSI -->
                    <div class="forum-search-bar">
                        <div class="search-input-box">
                            <span>🔍</span>
                            <input type="text" placeholder="Cari topik atau diskusi...">
                        </div>
                        <button class="btn-green-main">➕ Buat Diskusi</button>
                    </div>

                    <!-- TOPIC CHIPS -->
                    <div class="topic-chips-wrapper">
                        <div class="chip-item active">⚙️ Semua</div>
                        <div class="chip-item">🧠 Kesehatan Mental</div>
                        <div class="chip-item">💭 Overthinking</div>
                        <div class="chip-item">😊 Anxiety</div>
                        <div class="chip-item">💖 Self Love</div>
                        <div class="chip-item">🎓 Kuliah</div>
                        <div class="chip-item">💼 Pekerjaan</div>
                        <div class="chip-item">👥 Relasi</div>
                    </div>

                    <!-- DISKUSI POPULER -->
                    <div class="section-header">
                        <h3>🔥 Diskusi Populer</h3>
                    </div>

                    <div class="popular-discuss-grid">
                        <!-- Card 1 (Klik Menuju Detail Forum) -->
                        <a href="detail-forum.php" class="discuss-card">
                            <div>
                                <div class="card-author-header">
                                    <div class="author-info">
                                        <div class="avatar-circle">👤</div>
                                        <div>
                                            <h5 style="margin: 0; font-size: 11px; font-weight: 600;">Anonim_01</h5>
                                            <p style="margin: 0; font-size: 9px; color: var(--text-gray);">2 jam yang lalu</p>
                                        </div>
                                    </div>
                                    <span class="badge-tag-mini tag-green">Kesehatan Mental</span>
                                </div>
                                <h4 class="discuss-title">Cara mengatasi overthinking sebelum tidur</h4>
                                <p class="discuss-excerpt">Setiap malam pikiran saya selalu berputar tidak berhenti. Ada tips agar bisa tidur lebih nyenyak?</p>
                            </div>
                            <div class="discuss-footer-meta">
                                <span>♡ 128</span>
                                <span>💬 45</span>
                                <span>👁 2.1K</span>
                            </div>
                        </a>

                        <!-- Card 2 -->
                        <a href="detail-forum." class="discuss-card">
                            <div>
                                <div class="card-author-header">
                                    <div class="author-info">
                                        <div class="avatar-circle" style="background: #f3e5f5;">👤</div>
                                        <div>
                                            <h5 style="margin: 0; font-size: 11px; font-weight: 600;">Anonim_02</h5>
                                            <p style="margin: 0; font-size: 9px; color: var(--text-gray);">5 jam yang lalu</p>
                                        </div>
                                    </div>
                                    <span class="badge-tag-mini tag-purple">Anxiety</span>
                                </div>
                                <h4 class="discuss-title">Merasa cemas saat presentasi, gimana ya?</h4>
                                <p class="discuss-excerpt">Setiap kali presentasi di depan kelas jantung berdebar dan tangan gemetar. Ada yang punya pengalaman serupa?</p>
                            </div>
                            <div class="discuss-footer-meta">
                                <span>♡ 96</span>
                                <span>💬 32</span>
                                <span>👁 1.6K</span>
                            </div>
                        </a>

                        <!-- Card 3 -->
                        <a href="detail-forum." class="discuss-card">
                            <div>
                                <div class="card-author-header">
                                    <div class="author-info">
                                        <div class="avatar-circle" style="background: #fce4ec;">👤</div>
                                        <div>
                                            <h5 style="margin: 0; font-size: 11px; font-weight: 600;">Anonim_03</h5>
                                            <p style="margin: 0; font-size: 9px; color: var(--text-gray);">1 hari yang lalu</p>
                                        </div>
                                    </div>
                                    <span class="badge-tag-mini tag-pink">Self Love</span>
                                </div>
                                <h4 class="discuss-title">Belajar mencintai diri sendiri dari hal kecil</h4>
                                <p class="discuss-excerpt">Yuk share hal-hal kecil yang kamu lakukan untuk mencintai dirimu sendiri hari ini!</p>
                            </div>
                            <div class="discuss-footer-meta">
                                <span>♡ 210</span>
                                <span>💬 68</span>
                                <span>👁 3.4K</span>
                            </div>
                        </a>
                    </div>

                    <!-- DISKUSI TERBARU -->
                    <div class="section-header">
                        <h3>Diskusi Terbaru</h3>
                        <a href="#">Lihat Semua</a>
                    </div>

                    <div class="latest-discuss-list">
                        <a href="detail-forum." class="latest-discuss-item">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div class="avatar-circle">👤</div>
                                <div>
                                    <h4 style="margin: 0; font-size: 12.5px; font-weight: 600;">Sulit fokus belajar karena kecemasan</h4>
                                    <p style="margin: 2px 0 0 0; font-size: 10px; color: var(--text-gray);">Anonim_04 • 1 jam yang lalu</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 16px;">
                                <span class="badge-tag-mini tag-orange">Kuliah</span>
                                <span style="font-size: 11px; color: var(--text-gray);">💬 12</span>
                                <span style="font-size: 11px; color: var(--text-gray);">👁 320</span>
                            </div>
                        </a>

                        <a href="detail-forum." class="latest-discuss-item">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div class="avatar-circle" style="background: #e3f2fd;">👤</div>
                                <div>
                                    <h4 style="margin: 0; font-size: 12.5px; font-weight: 600;">Burnout karena tugas menumpuk, bagaimana mengatasinya?</h4>
                                    <p style="margin: 2px 0 0 0; font-size: 10px; color: var(--text-gray);">Anonim_05 • 3 jam yang lalu</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 16px;">
                                <span class="badge-tag-mini tag-blue">Pekerjaan</span>
                                <span style="font-size: 11px; color: var(--text-gray);">💬 18</span>
                                <span style="font-size: 11px; color: var(--text-gray);">👁 540</span>
                            </div>
                        </a>

                        <a href="detail-forum.php" class="latest-discuss-item">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div class="avatar-circle" style="background: #fce4ec;">👤</div>
                                <div>
                                    <h4 style="margin: 0; font-size: 12.5px; font-weight: 600;">Tips membangun self confidence untuk pemula</h4>
                                    <p style="margin: 2px 0 0 0; font-size: 10px; color: var(--text-gray);">Anonim_06 • 4 jam yang lalu</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 16px;">
                                <span class="badge-tag-mini tag-pink">Self Love</span>
                                <span style="font-size: 11px; color: var(--text-gray);">💬 24</span>
                                <span style="font-size: 11px; color: var(--text-gray);">👁 724</span>
                            </div>
                        </a>
                    </div>

                    <button style="display: block; margin: 20px auto 0 auto; background: #ffffff; border: 1px solid var(--border-color); padding: 8px 20px; border-radius: 8px; font-size: 12px; cursor: pointer;">
                        Lihat Lebih Banyak ⌄
                    </button>
                </div>

                <!-- SIDEBAR KANAN FORUM -->
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    
                    <!-- Topik Populer -->
                    <div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: 14px; padding: 16px;">
                        <h4 style="font-size: 13px; font-weight: 700; margin: 0 0 14px 0;">📈 Topik Populer</h4>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px dashed var(--border-color); font-size: 11.5px;">
                            <span>😊 Anxiety</span>
                            <span style="color: var(--text-gray); font-size: 10px;">1.2K diskusi</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px dashed var(--border-color); font-size: 11.5px;">
                            <span>🔥 Burnout</span>
                            <span style="color: var(--text-gray); font-size: 10px;">980 diskusi</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px dashed var(--border-color); font-size: 11.5px;">
                            <span>💖 Self Love</span>
                            <span style="color: var(--text-gray); font-size: 10px;">876 diskusi</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; font-size: 11.5px;">
                            <span>💭 Overthinking</span>
                            <span style="color: var(--text-gray); font-size: 10px;">754 diskusi</span>
                        </div>

                        <a href="#" style="display: block; text-align: center; margin-top: 12px; font-size: 11px; color: var(--primary-green); text-decoration: none; font-weight: 600;">Lihat Semua Topik ➔</a>
                    </div>

                    <!-- Komunitas Aktif -->
                    <div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: 14px; padding: 16px;">
                        <h4 style="font-size: 13px; font-weight: 700; margin: 0 0 12px 0;">👥 Komunitas Aktif</h4>
                        <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 10px;">
                            <img src="https://via.placeholder.com/28" style="border-radius: 50%;" alt="A">
                            <img src="https://via.placeholder.com/28" style="border-radius: 50%;" alt="B">
                            <img src="https://via.placeholder.com/28" style="border-radius: 50%;" alt="C">
                            <img src="https://via.placeholder.com/28" style="border-radius: 50%;" alt="D">
                            <span style="background: #f0f0f0; padding: 4px 8px; border-radius: 12px; font-size: 10px; font-weight: 600;">+124</span>
                        </div>
                        <p style="margin: 0; font-size: 10px; color: var(--primary-green); font-weight: 500;">🟢 236 anggota aktif online</p>
                    </div>

                    <!-- Aturan Forum -->
                    <div style="background: #ffffff; border: 1px solid var(--border-color); border-radius: 14px; padding: 16px;">
                        <h4 style="font-size: 13px; font-weight: 700; margin: 0 0 10px 0;">🛡️ Aturan Forum</h4>
                        <ul style="font-size: 10.5px; color: var(--text-dark); line-height: 1.8; padding-left: 0; list-style: none;">
                            <li>✓ Jaga privasi diri sendiri dan orang lain</li>
                            <li>✓ Gunakan bahasa yang sopan dan positif</li>
                            <li>✓ Hindari konten menyakitkan atau SARA</li>
                            <li>✓ Dukung dan hargai setiap cerita</li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>