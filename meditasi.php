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
    <title>Meditasi - MindCare</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8faf9; margin: 0; }
        
        .dash-layout { display: flex; min-height: 100vh; }
        .main-content { flex: 1; padding: 25px 30px; overflow-y: auto; }

        /* Media Thumbnail Styling */
        .media-thumb {
            height: 140px;
            background-size: cover !important;
            background-position: center !important;
            position: relative;
            border-radius: 12px 12px 0 0;
        }

        /* Layout Grid Utama */
        .meditasi-row-1 { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 25px; }
        .meditasi-row-2 { display: grid; grid-template-columns: 1fr 2fr; gap: 20px; margin-bottom: 25px; align-items: start; }
        
        /* SEJAJAR DI ROW 3 */
        .meditasi-row-3 { 
            display: grid; 
            grid-template-columns: 1fr 1.5fr; 
            gap: 20px; 
            align-items: stretch;
        }

        .popular-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 20px; }

        /* Kategori Card */
        .kategori-card {
            background: #fff;
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid #e2ece3;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .kategori-card.active { border: 1px solid #2e7d32; background: #f4f9f4; }
    </style>
</head>
<body>

    <div class="dash-layout">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div>
                <!-- LOGO BESAR DAN SEJAJAR DENGAN TEKS MINDCARE -->
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
                    <a href="meditasi.php" class="menu-item active">🧘 Meditasi</a>
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
            </div>

            <!-- Support Sidebar Card -->
            <div class="support-sidebar-card" style="margin-top: auto;">
                <h4 style="font-weight: 700;">Butuh Dukungan?</h4>
                <p>Kamu tidak sendirian.<br>Kami siap membantu.</p>
                <button class="btn-support">Chat Sekarang</button>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <!-- HEADER -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; background: #fff; padding: 15px 20px; border-radius: 14px; border: 1px solid #e2ece3;">
                <div>
                    <h2 style="font-size: 20px; color: #2c3e50; margin-bottom: 2px;">Meditasi</h2>
                    <p style="font-size: 12px; color: #7f8c8d; margin: 0;">Luangkan beberapa menit untuk menenangkan pikiran dan menjaga keseimbangan emosimu.</p>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="font-size: 11px; background: #f1f8f2; padding: 6px 12px; border-radius: 20px; color: #2e7d32; font-weight: 500;">📅 Hari ini, 27 Juli 2026</div>
                    <div style="font-size: 18px; cursor: pointer; position: relative;">
                        🔔<span style="position: absolute; top: -2px; right: -2px; width: 7px; height: 7px; background: red; border-radius: 50%;"></span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px; border-left: 1px solid #e2ece3; padding-left: 15px;">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="<?php echo htmlspecialchars($nama_user); ?>" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                        <div style="line-height: 1.2;">
                            <div style="font-size: 12px; font-weight: 600; color: #333;"><?php echo htmlspecialchars($nama_user); ?></div>
                            <div style="font-size: 10px; color: #7f8c8d;">Pengguna Baru</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ROW 1: Hero Banner & Progress -->
            <div class="meditasi-row-1">
                <!-- Banner Kiri -->
                <div style="position: relative; background: linear-gradient(135deg, rgba(232, 245, 233, 0.95) 0%, rgba(200, 230, 201, 0.9) 100%), url('https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=800&q=80'); background-size: cover; background-position: center; padding: 25px 30px; border-radius: 16px; overflow: hidden; border: 1px solid #c8e6c9;">
                    <div style="display: inline-block; background: #c8e6c9; color: #2e7d32; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; margin-bottom: 10px;">✨ Meditasi Hari Ini</div>
                    <h2 style="font-size: 20px; color: #1e4620; margin-bottom: 6px;">10 Menit Relaksasi</h2>
                    <p style="font-size: 12px; color: #2c4a30; margin-bottom: 15px; max-width: 65%; line-height: 1.4; font-weight: 500;">Mulailah harimu dengan latihan pernapasan untuk membantu mengurangi stres.</p>
                    <button style="background: #2e7d32; color: white; border: none; padding: 8px 18px; border-radius: 8px; font-size: 11px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 10px rgba(46,125,50,0.2);">▶ Mulai Meditasi</button>
                    <div style="margin-top: 15px; font-size: 11px; color: #2c4a30; display: flex; gap: 10px; font-weight: 500;">
                        <span>🕒 10 Menit</span>
                        <span>•</span>
                        <span>Cocok untuk pemula</span>
                    </div>
                </div>

                <!-- Progress Kanan -->
                <div style="background: #fff; padding: 20px; border-radius: 16px; border: 1px solid #e2ece3; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <h3 style="font-size: 13px; font-weight: 600; color: #333; margin: 0;">Progress Minggu Ini</h3>
                            <span style="font-size: 11px; color: #7f8c8d; cursor: pointer;">ℹ️</span>
                        </div>
                        
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                            <div style="width: 45px; height: 45px; border-radius: 50%; background: #e8f5e9; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #2e7d32; font-size: 12px;">
                                70%
                            </div>
                            <div>
                                <h4 style="font-size: 14px; margin: 0 0 2px 0; color: #333;">5 dari 7 Hari</h4>
                                <p style="font-size: 10px; color: #7f8c8d; margin: 0;">Pertahankan konsistensimu!</p>
                            </div>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-between; text-align: center;">
                        <div><span style="font-size: 10px; color: #7f8c8d;">Sen</span><div style="background: #2e7d32; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 4px auto 0 auto;">✔</div></div>
                        <div><span style="font-size: 10px; color: #7f8c8d;">Sel</span><div style="background: #2e7d32; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 4px auto 0 auto;">✔</div></div>
                        <div><span style="font-size: 10px; color: #7f8c8d;">Rab</span><div style="background: #2e7d32; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 4px auto 0 auto;">✔</div></div>
                        <div><span style="font-size: 10px; color: #7f8c8d;">Kam</span><div style="background: #2e7d32; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 4px auto 0 auto;">✔</div></div>
                        <div><span style="font-size: 10px; color: #7f8c8d;">Jum</span><div style="background: #2e7d32; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 4px auto 0 auto;">✔</div></div>
                        <div><span style="font-size: 10px; color: #7f8c8d;">Sab</span><div style="background: #f1f1f1; color: #aaa; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 4px auto 0 auto;">-</div></div>
                        <div><span style="font-size: 10px; color: #7f8c8d;">Min</span><div style="background: #f1f1f1; color: #aaa; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 4px auto 0 auto;">-</div></div>
                    </div>
                </div>
            </div>

            <!-- ROW 2: Kategori & Populer -->
            <div class="meditasi-row-2">
                <!-- Kategori -->
                <div>
                    <h3 style="font-size: 13px; font-weight: 600; margin-bottom: 12px; color: #333;">Kategori Meditasi</h3>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <div class="kategori-card active">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="font-size: 16px;">☀️</span>
                                <h4 style="font-size: 12px; margin: 0; color: #2e7d32;">Pagi</h4>
                            </div>
                            <p style="font-size: 10px; color: #7f8c8d; margin: 4px 0 0 24px;">Awali harimu dengan tenang</p>
                        </div>
                        <div class="kategori-card">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="font-size: 16px;">🌙</span>
                                <h4 style="font-size: 12px; margin: 0; color: #333;">Tidur</h4>
                            </div>
                            <p style="font-size: 10px; color: #7f8c8d; margin: 4px 0 0 24px;">Tidur lebih nyenyak dan berkualitas</p>
                        </div>
                        <div class="kategori-card">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="font-size: 16px;">☁️</span>
                                <h4 style="font-size: 12px; margin: 0; color: #333;">Stres</h4>
                            </div>
                            <p style="font-size: 10px; color: #7f8c8d; margin: 4px 0 0 24px;">Redakan stres dan kecemasan</p>
                        </div>
                        <div class="kategori-card">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="font-size: 16px;">🎯</span>
                                <h4 style="font-size: 12px; margin: 0; color: #333;">Fokus</h4>
                            </div>
                            <p style="font-size: 10px; color: #7f8c8d; margin: 4px 0 0 24px;">Tingkatkan fokus dan produktivitas</p>
                        </div>
                    </div>
                </div>

                <!-- Populer -->
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <h3 style="font-size: 13px; font-weight: 600; color: #333; margin: 0;">Meditasi Populer</h3>
                        <a href="#" style="font-size: 11px; color: #2e7d32; text-decoration: none; font-weight: 600;">Lihat Semua</a>
                    </div>
                    <div class="popular-grid">
                        <!-- Card 1 -->
                        <div style="background: #fff; border-radius: 12px; overflow: hidden; border: 1px solid #e2ece3; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                            <div class="media-thumb" style="background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=400&q=80');">
                                <button style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border: none; border-radius: 50%; width: 32px; height: 32px; cursor: pointer; color: #2e7d32; font-size: 11px; font-weight: bold; display: flex; align-items: center; justify-content: center;">▶</button>
                            </div>
                            <div style="padding: 10px;">
                                <h4 style="font-size: 12px; font-weight: 600; margin: 0 0 3px 0; color: #333;">Mengurangi Overthinking</h4>
                                <p style="font-size: 10px; color: #7f8c8d; margin: 0 0 8px 0;">10 Menit</p>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="color: #FFC107; font-size: 10px;">★★★★★</span>
                                    <button style="background: #2e7d32; color: white; border: none; padding: 4px 8px; border-radius: 6px; font-size: 9px; cursor: pointer; font-weight: 600;">▶ Putar</button>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div style="background: #fff; border-radius: 12px; overflow: hidden; border: 1px solid #e2ece3; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                            <div class="media-thumb" style="background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('https://images.unsplash.com/photo-1511295742362-92c96b1fc48f?auto=format&fit=crop&w=400&q=80');">
                                <button style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border: none; border-radius: 50%; width: 32px; height: 32px; cursor: pointer; color: #2e7d32; font-size: 11px; font-weight: bold; display: flex; align-items: center; justify-content: center;">▶</button>
                            </div>
                            <div style="padding: 10px;">
                                <h4 style="font-size: 12px; font-weight: 600; margin: 0 0 3px 0; color: #333;">Tidur Lebih Nyenyak</h4>
                                <p style="font-size: 10px; color: #7f8c8d; margin: 0 0 8px 0;">15 Menit</p>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="color: #FFC107; font-size: 10px;">★★★★★</span>
                                    <button style="background: #2e7d32; color: white; border: none; padding: 4px 8px; border-radius: 6px; font-size: 9px; cursor: pointer; font-weight: 600;">▶ Putar</button>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div style="background: #fff; border-radius: 12px; overflow: hidden; border: 1px solid #e2ece3; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                            <div class="media-thumb" style="background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=400&q=80');">
                                <button style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border: none; border-radius: 50%; width: 32px; height: 32px; cursor: pointer; color: #2e7d32; font-weight: bold; display: flex; align-items: center; justify-content: center;">▶</button>
                            </div>
                            <div style="padding: 10px;">
                                <h4 style="font-size: 12px; font-weight: 600; margin: 0 0 3px 0; color: #333;">Menenangkan Pikiran</h4>
                                <p style="font-size: 10px; color: #7f8c8d; margin: 0 0 8px 0;">8 Menit</p>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="color: #FFC107; font-size: 10px;">★★★★★</span>
                                    <button style="background: #2e7d32; color: white; border: none; padding: 4px 8px; border-radius: 6px; font-size: 9px; cursor: pointer; font-weight: 600;">▶ Putar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ROW 3: Rekomendasi, Stats, History & Quote (Sejajar Sempurna) -->
            <div class="meditasi-row-3">
                <!-- Rekomendasi Kiri -->
                <div style="display: flex; flex-direction: column;">
                    <h3 style="font-size: 13px; font-weight: 600; margin-bottom: 2px; color: #333;">Rekomendasi Untukmu</h3>
                    <p style="font-size: 10px; color: #7f8c8d; margin-bottom: 12px;">Berdasarkan mood terakhirmu (Bahagia 😊)</p>
                    
                    <div style="display: flex; gap: 12px; padding: 15px; background: #fff; border-radius: 12px; border: 1px solid #e2ece3; align-items: center; flex: 1;">
                        <img src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?auto=format&fit=crop&w=200&q=80" alt="Anti Cemas" style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px; flex-shrink: 0;">
                        <div style="flex: 1;">
                            <h4 style="font-size: 12px; margin: 0 0 4px 0; color: #333;">Meditasi Anti Cemas</h4>
                            <p style="font-size: 10px; color: #7f8c8d; margin: 0 0 8px 0; line-height: 1.3;">Latihan pernapasan dan visualisasi untuk menenangkan pikiran.</p>
                            <div style="font-size: 9px; color: #7f8c8d; margin-bottom: 8px; display: flex; gap: 10px;">
                                <span>🕒 12 Menit</span>
                                <span>📊 Pemula</span>
                            </div>
                            <button style="background: #2e7d32; color: white; border: none; padding: 5px 12px; border-radius: 6px; font-size: 10px; font-weight: 600; cursor: pointer;">▶ Mulai</button>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan Bawah (Stats, History, Quote) -->
                <div style="display: flex; flex-direction: column;">
                    <!-- Stats Grid -->
                    <div class="stats-grid">
                        <div style="background: #fff; padding: 10px; border-radius: 10px; border: 1px solid #e2ece3; text-align: center;">
                            <div style="color: #4CAF50; background: #E8F5E9; width: 26px; height: 26px; border-radius: 6px; display: flex; align-items: center; justify-content: center; margin: 0 auto 4px auto; font-size: 12px;">🌿</div>
                            <p style="font-size: 9px; color: #7f8c8d; margin: 0;">Total Sesi</p>
                            <h5 style="font-size: 12px; margin: 2px 0 0 0; color: #333;">18</h5>
                        </div>
                        <div style="background: #fff; padding: 10px; border-radius: 10px; border: 1px solid #e2ece3; text-align: center;">
                            <div style="color: #2196F3; background: #E3F2FD; width: 26px; height: 26px; border-radius: 6px; display: flex; align-items: center; justify-content: center; margin: 0 auto 4px auto; font-size: 12px;">🕒</div>
                            <p style="font-size: 9px; color: #7f8c8d; margin: 0;">Total Menit</p>
                            <h5 style="font-size: 12px; margin: 2px 0 0 0; color: #333;">240</h5>
                        </div>
                        <div style="background: #fff; padding: 10px; border-radius: 10px; border: 1px solid #e2ece3; text-align: center;">
                            <div style="color: #FF9800; background: #FFF3E0; width: 26px; height: 26px; border-radius: 6px; display: flex; align-items: center; justify-content: center; margin: 0 auto 4px auto; font-size: 12px;">🔥</div>
                            <p style="font-size: 9px; color: #7f8c8d; margin: 0;">Streak</p>
                            <h5 style="font-size: 12px; margin: 2px 0 0 0; color: #333;">6</h5>
                        </div>
                        <div style="background: #fff; padding: 10px; border-radius: 10px; border: 1px solid #e2ece3; text-align: center;">
                            <div style="color: #9C27B0; background: #F3E5F5; width: 26px; height: 26px; border-radius: 6px; display: flex; align-items: center; justify-content: center; margin: 0 auto 4px auto; font-size: 12px;">💜</div>
                            <p style="font-size: 9px; color: #7f8c8d; margin: 0;">Favorit</p>
                            <h5 style="font-size: 11px; margin: 2px 0 0 0; color: #333;">Tidur</h5>
                        </div>
                    </div>

                    <!-- Split History & Quote -->
                    <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 15px; flex: 1;">
                        <!-- Riwayat -->
                        <div style="background: #fff; padding: 12px 15px; border-radius: 12px; border: 1px solid #e2ece3; display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                    <h3 style="font-size: 12px; font-weight: 600; color: #333; margin: 0;">Riwayat Meditasi</h3>
                                    <a href="#" style="font-size: 10px; color: #2e7d32; text-decoration: none; font-weight: 600;">Lihat Semua</a>
                                </div>
                                
                                <div style="padding: 5px 0; border-bottom: 1px solid #f1f1f1; display: flex; justify-content: space-between; align-items: center; font-size: 10px;">
                                    <div><b style="color: #333;">Relaksasi Pagi</b><br><span style="color: #7f8c8d;">Hari Ini, 10:30</span></div>
                                    <span style="color: #7f8c8d;">10 Menit</span>
                                </div>
                                <div style="padding: 5px 0; border-bottom: 1px solid #f1f1f1; display: flex; justify-content: space-between; align-items: center; font-size: 10px;">
                                    <div><b style="color: #333;">Tidur Nyenyak</b><br><span style="color: #7f8c8d;">Kemarin, 20:15</span></div>
                                    <span style="color: #7f8c8d;">15 Menit</span>
                                </div>
                            </div>
                            <div style="padding: 5px 0; display: flex; justify-content: space-between; align-items: center; font-size: 10px;">
                                <div><b style="color: #333;">Anti Overthinking</b><br><span style="color: #7f8c8d;">24 Juli, 21:00</span></div>
                                <span style="color: #7f8c8d;">8 Menit</span>
                            </div>
                        </div>

                        <!-- Quote Card -->
                        <div style="background: #e8f5e9; padding: 15px; border-radius: 12px; border: 1px solid #d4edda; position: relative; display: flex; align-items: center; justify-content: center; text-align: center;">
                            <span style="font-size: 35px; color: rgba(46, 125, 50, 0.15); position: absolute; top: 0px; left: 8px; font-family: serif;">"</span>
                            <p style="font-size: 11px; color: #2e7d32; font-style: italic; line-height: 1.4; margin: 0;">Tarik napas perlahan.<br>Tenangkan pikiran.<br>Nikmati setiap momen.<br>💚</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>