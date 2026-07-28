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
    <title>Dashboard - MindCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="dash-layout">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="sidebar-logo" style="display: flex; align-items: center; gap: 12px; margin-bottom: 25px;">
                <img src="logo.png" alt="MindCare Logo" style="height: 42px; width: auto; object-fit: contain;">
                <div>
                    <strong style="font-size: 18px; color: var(--primary-green); display: block; line-height: 1.1;">MindCare</strong>
                    <span style="font-size: 9px; font-weight: 400; color: var(--text-gray); display: block; margin-top: 3px;">Mental Health Platform<br>for Everyone</span>
                </div>
            </div>
            
            <div class="menu-group" style="margin-top: 10px;">
                <a href="dashboard.php" class="menu-item active">🏠 Dashboard</a>
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
            <!-- HEADER -->
            <div class="top-nav">
                <div>
                    <h2 style="font-size: 22px; color: var(--text-dark);">Halo, <?php echo htmlspecialchars($nama_user); ?>! 👋</h2>
                    <p style="font-size: 13px; color: var(--text-dark);">Selamat datang, Yuk jaga kesehatan mentalmu hari ini 💚</p>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="font-size: 20px; cursor: pointer;">🔔</div>
                    <div class="user-info">
                        <img src="https://via.placeholder.com/35" alt="<?php echo htmlspecialchars($nama_user); ?>">
                        <div style="line-height: 1.2; padding-right: 15px;">
                            <div style="font-size: 13px; font-weight: 600;"><?php echo htmlspecialchars($nama_user); ?></div>
                            <div style="font-size: 10px; color: var(--text-gray);">Pengguna Baru</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3 KARTU ATAS -->
            <div class="grid-3" style="margin-bottom: 24px;">
                <div class="dash-card">
                    <div class="card-title">Mood Hari Ini</div>
                    <h3 style="text-align: center; margin: 25px 0 15px; font-size: 28px; color: var(--text-dark);">Senang</h3>
                    <p style="text-align: center; font-size: 11px; color: var(--text-gray); margin-bottom: 15px;">Bagaimana perasaanmu hari ini?</p>
                    <button class="btn btn-primary btn-block">Catat Mood</button>
                </div>
                
                <div class="dash-card">
                    <div class="card-title" style="margin-bottom: 20px;">Aktivitas Hari ini</div>
                    <div class="checkbox-list">
                        <label><input type="checkbox" checked> Isi Mood Tracker</label>
                        <hr style="border: none; border-top: 1px solid rgba(0,0,0,0.05); margin: 8px 0;">
                        <label><input type="checkbox"> Meditasi 10 Menit</label>
                        <hr style="border: none; border-top: 1px solid rgba(0,0,0,0.05); margin: 8px 0;">
                        <label><input type="checkbox"> Baca Artikel</label>
                        <hr style="border: none; border-top: 1px solid rgba(0,0,0,0.05); margin: 8px 0;">
                        <label><input type="checkbox"> Jalan Kaki 15 Menit</label>
                    </div>
                </div>

                <div class="dash-card">
                    <div class="card-title">Happines Score</div>
                    <div style="display: flex; gap: 15px; margin: 20px 0 15px;">
                        <div style="font-size: 24px; color: var(--primary-green);">💚</div>
                        <div style="font-size: 12px; line-height: 1.4;">
                            <strong style="color: var(--text-dark); font-size: 13px;">Belum tersedia</strong><br>
                            <span style="color: var(--text-gray);">Mulailah mengisi mood harian agar kami dapat menganalisis perkembangan kesehatan mentalmu.</span>
                        </div>
                    </div>
                    <button class="btn btn-primary" style="margin-top: auto; display: block;">Mulai Sekarang</button>
                </div>
            </div>

            <!-- KARTU REKOMENDASI TENGAH -->
            <div class="dash-card" style="margin-bottom: 24px;">
                <div class="card-header">
                    <h3 style="font-size: 15px;">Rekomendasi Untukmu</h3>
                    <a href="#" class="link-green">Lihat Semua &rarr;</a>
                </div>
                <div class="grid-4">
                    <div class="recom-card">
                        <img src="meditasi.jpg" class="recom-img" alt="Meditasi Dasar">
                        <div class="recom-text">
                            <h4>Meditasi Dasar</h4>
                            <p>Relaksasi pikiran dalam 10 menit</p>
                        </div>
                        <span style="margin-left: auto; color: var(--text-gray); font-size: 16px;">&rarr;</span>
                    </div>
                    <div class="recom-card">
                        <img src="arikelpilihan.jpg" class="recom-img" alt="Artikel">
                        <div class="recom-text">
                            <h4>Mengenal Kesehatan Mental</h4>
                            <p>Artikel edukasi untuk pemula.</p>
                        </div>
                        <span style="margin-left: auto; color: var(--text-gray); font-size: 16px;">&rarr;</span>
                    </div>
                    <div class="recom-card">
                        <img src="AI.png" class="recom-img" alt="AI Chat">
                        <div class="recom-text">
                            <h4>Kenalan dengan AI chat</h4>
                            <p>Curhat kapan saja kami siap mendengar.</p>
                        </div>
                        <span style="margin-left: auto; color: var(--text-gray); font-size: 16px;">&rarr;</span>
                    </div>
                    <div class="recom-card">
                        <img src="konsultasipsikolog.jpg" class="recom-img" alt="Konsultasi">
                        <div class="recom-text">
                            <h4>Tips mengelola emosi</h4>
                            <p>Panduan praktis untuk hidup lebih tenang.</p>
                        </div>
                        <span style="margin-left: auto; color: var(--text-gray); font-size: 16px;">&rarr;</span>
                    </div>
                </div>
            </div>

            <!-- 3 KOLOM BAWAH -->
            <div class="grid-3">
                <!-- Meditasi Populer -->
                <div class="dash-card">
                    <div class="card-header">
                        <h3 style="font-size: 14px;">Meditasi Populer</h3>
                        <a href="#" class="link-green">Lihat Semua &rarr;</a>
                    </div>
                    <div class="list-item">
                        <div class="list-content">
                            <img src="e.jpg" class="list-img" alt="Meditasi">
                            <div class="list-text">
                                <h4>Meredakan stres & cemas</h4>
                                <p>10 menit</p>
                            </div>
                        </div>
                        <button class="icon-btn">▶️</button>
                    </div>
                    <div class="list-item">
                        <div class="list-content">
                            <img src="c.jpg" class="list-img" alt="Meditasi">
                            <div class="list-text">
                                <h4>Tidur Lebih Nyenyak</h4>
                                <p>15 menit</p>
                            </div>
                        </div>
                        <button class="icon-btn">▶️</button>
                    </div>
                    <div class="list-item">
                        <div class="list-content">
                            <img src="b.jpg" class="list-img" alt="Meditasi">
                            <div class="list-text">
                                <h4>Fokus & Produktivitas</h4>
                                <p>10 menit</p>
                            </div>
                        </div>
                        <button class="icon-btn">▶️</button>
                    </div>
                </div>

                <!-- Artikel Terbaru -->
                <div class="dash-card">
                    <div class="card-header">
                        <h3 style="font-size: 14px;">Artikel Terbaru</h3>
                        <a href="#" class="link-green">Lihat Semua &rarr;</a>
                    </div>
                    <div class="list-item">
                        <div class="list-content">
                            <img src="h.jpg" class="list-img" alt="Artikel">
                            <div class="list-text">
                                <h4>Overthinking? Ini cara mengatasinya</h4>
                                <p>5 Menit baca</p>
                            </div>
                        </div>
                        <button class="icon-btn" style="font-size: 14px;">&rarr;</button>
                    </div>
                    <div class="list-item">
                        <div class="list-content">
                            <img src="d.jpg" class="list-img" alt="Artikel">
                            <div class="list-text">
                                <h4>5 cara meningkatkan self love</h4>
                                <p>6 Menit baca</p>
                            </div>
                        </div>
                        <button class="icon-btn" style="font-size: 14px;">&rarr;</button>
                    </div>
                    <div class="list-item">
                        <div class="list-content">
                            <img src="a.jpg" class="list-img" alt="Artikel">
                            <div class="list-text">
                                <h4>Tips menjaga kesehatan mental saat sibuk</h4>
                                <p>6 Menit baca</p>
                            </div>
                        </div>
                        <button class="icon-btn" style="font-size: 14px;">&rarr;</button>
                    </div>
                </div>

                <!-- Event Mendatang -->
                <div class="dash-card">
                    <div class="card-header">
                        <h3 style="font-size: 14px;">Event Mendatang</h3>
                        <a href="#" class="link-green">Lihat Semua &rarr;</a>
                    </div>
                    <div class="list-item">
                        <div class="list-content">
                            <div class="date-box"><strong>20</strong><span>Mei</span></div>
                            <div class="list-text">
                                <h4>Webinar : Mengelola stres di Era Modern</h4>
                                <p>Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="list-content">
                            <div class="date-box"><strong>10</strong><span>Juni</span></div>
                            <div class="list-text">
                                <h4>Workshop Mindfulness untuk pemula</h4>
                                <p>Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="list-content">
                            <div class="date-box"><strong>14</strong><span>Juli</span></div>
                            <div class="list-text">
                                <h4>Kampanye kesehatan mental</h4>
                                <p>Online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>