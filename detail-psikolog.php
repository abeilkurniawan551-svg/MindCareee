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
    <title>Detail Psikolog - MindCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dash-layout">
        <!-- SIDEBAR -->
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
                <a href="konsultasi-psikolog.php" class="menu-item active">🧠 Konsultasi Psikolog</a>
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
            <!-- Breadcrumbs -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">
                    Konsultasi Psikolog &nbsp;&gt;&nbsp; <strong style="color: var(--text-dark);">Lihat Profil Psikolog</strong>
                </p>
                <!-- NAMA USER DINAMIS DI POJOK KANAN ATAS -->
                <div style="display: flex; align-items: center; gap: 8px; background: #ffffff; padding: 6px 12px; border-radius: 20px; border: 1px solid var(--border-color);">
                    <img src="https://via.placeholder.com/30" alt="<?php echo htmlspecialchars($nama_user); ?>" style="border-radius: 50%;">
                    <div style="font-size: 11px; font-weight: 700;"><?php echo htmlspecialchars($nama_user); ?></div>
                </div>
            </div>

            <a href="konsultasi-psikolog.php" style="font-size: 12px; font-weight: 600; color: var(--text-dark); text-decoration: none; margin-bottom: 20px; display: inline-block;">&lt; Kembali</a>

            <div class="layout-detail-psikolog">
                <!-- KOLOM KIRI (Profil & Detail) -->
                <div>
                    <!-- Profil Header -->
                    <div class="card-white" style="display: flex; gap: 20px; padding: 24px; position: relative;">
                        <div style="width: 140px; height: 160px; border-radius: 12px; overflow: hidden; background: #f0f0f0;">
                            <img src="https://dummyimage.com/200x250/e0e0e0/666666&text=Dr.+Amanda" style="width: 100%; height: 100%; object-fit: cover;" alt="Dr. Amanda Putri">
                            <span class="psy-badge-online">Online</span>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div>
                                    <h2 style="font-size: 18px; font-weight: 700; margin: 0 0 4px 0;">Dr. Amanda Putri, M.Psi., Psikolog <span style="color: var(--primary-green); font-size: 14px;">✔️</span></h2>
                                    <p style="font-size: 12px; color: var(--text-gray); margin: 0 0 12px 0;">Psikolog Klinis</p>
                                </div>
                                <div style="background: #f8faf8; border: 1px solid var(--border-color); padding: 8px 12px; border-radius: 8px; font-size: 10px; min-width: 150px;">
                                    <div style="font-weight: 600; margin-bottom: 6px;">📅 Jadwal Praktik</div>
                                    <div style="display: flex; justify-content: space-between; margin-bottom: 2px;"><span>Senin - Jumat</span><span>08.00 - 20.00 WIB</span></div>
                                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;"><span>Sabtu</span><span>08.00 - 16.00 WIB</span></div>
                                    <div style="color: var(--primary-green); font-weight: 600;">🟢 Tersedia Hari Ini</div>
                                </div>
                            </div>
                            
                            <div style="font-size: 11.5px; margin-bottom: 12px;">⭐ <strong>4.9</strong> (1.250 ulasan) &nbsp;•&nbsp; <span style="color: var(--primary-green); font-weight: 600;">8 Tahun Pengalaman</span></div>
                            
                            <p style="font-size: 11px; font-weight: 600; margin: 0 0 6px 0;">Spesialisasi</p>
                            <div style="display: flex; gap: 8px; font-size: 10px; margin-bottom: 16px;">
                                <span style="background: #e8f5e9; padding: 4px 10px; border-radius: 12px; color: var(--primary-green);">✔️ Kecemasan</span>
                                <span style="background: #e8f5e9; padding: 4px 10px; border-radius: 12px; color: var(--primary-green);">✔️ Stres</span>
                                <span style="background: #e8f5e9; padding: 4px 10px; border-radius: 12px; color: var(--primary-green);">✔️ Overthinking</span>
                                <span style="background: #e8f5e9; padding: 4px 10px; border-radius: 12px; color: var(--primary-green);">✔️ Burnout</span>
                            </div>

                            <div style="background: #f7fafc; padding: 12px 16px; border-radius: 12px; font-style: italic; font-size: 11px; color: var(--text-dark); border-left: 3px solid var(--primary-green);">
                                "Setiap langkah kecil menuju perubahan adalah langkah besar untuk versi terbaik dari dirimu."
                            </div>
                        </div>
                    </div>

                    <!-- Tabs -->
                    <div class="detail-tabs">
                        <button class="tab-item active">Tentang</button>
                        <button class="tab-item">Paket Konsultasi</button>
                        <button class="tab-item">Ulasan</button>
                        <button class="tab-item">FAQ Konsultasi</button>
                    </div>

                    <!-- Tentang Section -->
                    <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 24px; margin-bottom: 32px;">
                        <div class="info-section">
                            <h3>Tentang Dr. Amanda Putri</h3>
                            <p>Dr. Amanda Putri, M.Psi., Psikolog adalah psikolog klinis profesional yang berpengalaman dalam membantu individu mengelola masalah kesehatan mental, khususnya kecemasan, stres, dan overthinking. Dengan pendekatan yang empatik dan berbasis sains, beliau berkomitmen untuk mendampingi setiap klien menemukan ketenangan dan keseimbangan hidup.</p>
                        </div>
                        <div class="info-section">
                            <h3 style="font-size: 12px;">🎓 Pendidikan & Sertifikasi</h3>
                            <ul class="psy-list" style="font-size: 11px; line-height: 1.8;">
                                <li>S1 Psikologi - Universitas Indonesia</li>
                                <li>S2 Profesi Psikolog - Universitas Gadjah Mada</li>
                                <li>Sertifikasi Psikolog Klinis</li>
                                <li>Anggota HIMPSI</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Paket Konsultasi -->
                    <h3>Paket Konsultasi</h3>
                    <div class="paket-grid">
                        <div class="paket-card">
                            <h4 style="font-size: 13px; font-weight: 600; text-align: center; color: var(--primary-green); margin: 0;">🌱 Paket Reguler</h4>
                            <div class="paket-price" style="text-align: center;">Rp75.000 <span style="font-size: 11px; font-weight: 400; color: var(--text-gray);">/ sesi (30 menit)</span></div>
                            <ul class="psy-list" style="font-size: 11px; margin-top: 10px; flex: 1;">
                                <li>Konsultasi online</li>
                                <li>Durasi 30 menit</li>
                                <li>Sesi tanya jawab & konseling awal</li>
                                <li>Rekomendasi dasar untuk kondisi Anda</li>
                                <li>Cocok untuk konsultasi pertama</li>
                            </ul>
                            <button class="btn-outline" style="width: 100%; border-color: var(--primary-green); color: var(--primary-green); font-size: 11px;">Pilih Paket Reguler</button>
                        </div>

                        <div class="paket-card premium">
                            <div class="paket-badge">⭐ Paket Terbaik</div>
                            <h4 style="font-size: 13px; font-weight: 600; text-align: center; color: #d97706; margin: 0; padding-top: 10px;">🏆 Paket Premium</h4>
                            <div class="paket-price" style="text-align: center;">Rp150.000 <span style="font-size: 11px; font-weight: 400; color: var(--text-gray);">/ sesi (60 menit)</span></div>
                            <ul class="psy-list" style="font-size: 11px; margin-top: 10px; flex: 1;">
                                <li>Konsultasi online / offline</li>
                                <li>Durasi 60 menit</li>
                                <li>Analisis kondisi lebih mendalam</li>
                                <li>Rencana penanganan pribadi</li>
                                <li>Follow up melalui chat selama 3 hari</li>
                                <li>Prioritas penjadwalan</li>
                                <li>Cocok untuk terapi berkelanjutan</li>
                            </ul>
                            <button class="btn-green-main" style="width: 100%; justify-content: center; font-size: 11px;">Pilih Paket Premium</button>
                        </div>
                    </div>

                    <!-- Ulasan Klien -->
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border-color); padding-top: 24px; margin-bottom: 16px;">
                        <h3 style="margin: 0; font-size: 14px;">Ulasan Klien</h3>
                        <a href="#" style="font-size: 11px; color: var(--primary-green); font-weight: 600; text-decoration: none;">Lihat Semua ></a>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 40px;">
                        <div style="border: 1px solid var(--border-color); border-radius: 12px; padding: 12px; background: #ffffff;">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <img src="https://via.placeholder.com/30" style="border-radius: 50%;" alt="Aulia">
                                <div><div style="font-size: 11px; font-weight: 600;">Aulia</div><div style="font-size: 9px; color: #f59e0b;">⭐⭐⭐⭐⭐ 5.0</div></div>
                            </div>
                            <p style="font-size: 10px; margin: 0; font-style: italic;">"Sangat membantu! Dokternya ramah dan membuat saya merasa nyaman."</p>
                        </div>
                        <div style="border: 1px solid var(--border-color); border-radius: 12px; padding: 12px; background: #ffffff;">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <img src="https://via.placeholder.com/30" style="border-radius: 50%;" alt="Raka">
                                <div><div style="font-size: 11px; font-weight: 600;">Raka</div><div style="font-size: 9px; color: #f59e0b;">⭐⭐⭐⭐⭐ 4.9</div></div>
                            </div>
                            <p style="font-size: 10px; margin: 0; font-style: italic;">"Penjelasan yang diberikan mudah dipahami dan bikin saya jauh lebih tenang."</p>
                        </div>
                        <div style="border: 1px solid var(--border-color); border-radius: 12px; padding: 12px; background: #ffffff;">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <img src="https://via.placeholder.com/30" style="border-radius: 50%;" alt="Nadia">
                                <div><div style="font-size: 11px; font-weight: 600;">Nadia</div><div style="font-size: 9px; color: #f59e0b;">⭐⭐⭐⭐⭐ 5.0</div></div>
                            </div>
                            <p style="font-size: 10px; margin: 0; font-style: italic;">"Sesi premium benar-benar worth it. Hidup saya terasa lebih ringan."</p>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN (Booking Panel) -->
                <div>
                    <div class="booking-panel">
                        <h3 style="font-size: 14px; font-weight: 700; margin: 0 0 4px 0;">Daftar Konsultasi</h3>
                        <p style="font-size: 10px; color: var(--text-gray); margin: 0 0 16px 0;">Jadwalkan sesi konsultasi Anda sekarang</p>
                        
                        <div class="booking-stepper">
                            <span class="step active"><span class="step-num">1</span> Paket</span>
                            <span class="step"><span class="step-num">2</span> Jadwal</span>
                            <span class="step"><span class="step-num">3</span> Konfirmasi</span>
                        </div>

                        <div class="booking-form-group">
                            <label>Pilih Paket Konsultasi</label>
                            <div class="radio-select-box active">
                                <div style="display: flex; align-items: center; gap: 8px;"><input type="radio" checked> 🌱 <strong>Reguler</strong></div>
                                <span>Rp75.000 / 30 menit</span>
                            </div>
                            <div class="radio-select-box">
                                <div style="display: flex; align-items: center; gap: 8px;"><input type="radio"> 🏆 <strong>Premium</strong></div>
                                <span>Rp150.000 / 60 menit</span>
                            </div>
                        </div>

                        <div class="booking-form-group">
                            <label>Jenis Konsultasi</label>
                            <div style="display: flex; gap: 12px; font-size: 11px;">
                                <label style="display: flex; align-items: center; gap: 6px;"><input type="radio" checked> Online (Google Meet)</label>
                                <label style="display: flex; align-items: center; gap: 6px; color: var(--text-gray);"><input type="radio" disabled> Offline (Tatap Muka)</label>
                            </div>
                        </div>

                        <div class="booking-form-group">
                            <label>Pilih Tanggal</label>
                            <div style="border: 1px solid var(--border-color); padding: 10px 12px; border-radius: 8px; font-size: 11.5px; display: flex; justify-content: space-between;">
                                <span>📅 Sabtu, 26 Juli 2026</span><span>🗓️</span>
                            </div>
                        </div>

                        <div class="booking-form-group">
                            <label>Pilih Jam</label>
                            <select style="width: 100%; border: 1px solid var(--border-color); padding: 10px 12px; border-radius: 8px; font-size: 11.5px; outline: none;">
                                <option>10.00 - 10.30 WIB</option>
                                <option>11.00 - 11.30 WIB</option>
                            </select>
                        </div>

                        <div class="booking-form-group">
                            <label>Keluhan / Catatan (Opsional)</label>
                            <textarea rows="3" style="width: 100%; border: 1px solid var(--border-color); padding: 10px 12px; border-radius: 8px; font-size: 11px; outline: none; resize: none; box-sizing: border-box;" placeholder="Ceritakan singkat yang sedang Anda rasakan..."></textarea>
                        </div>

                        <div style="background: #f1f8e9; border: 1px solid #c8e6c9; padding: 10px; border-radius: 8px; display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
                            <span style="color: var(--primary-green); font-size: 18px;">🛡️</span>
                            <div>
                                <div style="font-size: 10px; font-weight: 600;">Pembayaran Aman</div>
                                <div style="font-size: 9px; color: var(--text-gray);">Data dan privasi Anda terjamin.</div>
                            </div>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <span style="font-size: 12px; font-weight: 600;">Total Pembayaran</span>
                            <span style="font-size: 16px; font-weight: 700; color: var(--primary-green);">Rp75.000</span>
                        </div>

                        <button class="btn-green-main" style="width: 100%; justify-content: center; margin-bottom: 16px;">Lanjut ke Pembayaran ➔</button>

                        <div style="display: flex; gap: 8px; justify-content: center;">
                            <span style="color: var(--primary-green);">💚</span>
                            <div style="font-size: 9px; color: var(--text-gray);">
                                <strong>Semua sesi bersifat rahasia.</strong><br>Kamu tidak sendiri, MindCare bersama kamu.
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