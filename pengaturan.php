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
    <title>Pengaturan - MindCare</title>
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
                <a href="pengaturan.php" class="menu-item active">⚙️ Pengaturan</a>
                <a href="logout.php" class="menu-item" style="color: #e74c3c;">🚪 Keluar</a>
            </div>

            <div class="support-sidebar-card" style="margin-top: auto;">
                <h4 style="font-weight: 700;">Butuh Dukungan?</h4>
                <p>Kamu tidak sendirian.<br>Kami siap membantu.</p>
                <button class="btn-support">Chat Sekarang</button>
            </div>
        </div>

        <div class="main-content">
            
            <div class="top-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                <div>
                    <h1 style="font-size: 22px; font-weight: 700; margin: 0 0 4px 0;">Pengaturan</h1>
                    <p style="font-size: 12px; color: var(--text-gray); margin: 0;">Kelola akun, preferensi notifikasi, dan keamanan sistem Anda.</p>
                </div>
                
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="font-size: 18px; position: relative; cursor: pointer;">🔔 <span style="position: absolute; top: -2px; right: -2px; background: red; color: white; font-size: 9px; width: 12px; height: 12px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">2</span></div>
                    <div style="display: flex; align-items: center; gap: 8px; cursor: pointer; background: #ffffff; padding: 6px 12px; border-radius: 20px; border: 1px solid var(--border-color);">
                        <img src="https://via.placeholder.com/34" alt="<?php echo htmlspecialchars($nama_user); ?>" style="border-radius: 50%;">
                        <span style="font-size: 12px; font-weight: 600;"><?php echo htmlspecialchars($nama_user); ?> ⌄</span>
                    </div>
                </div>
            </div>

            <div class="settings-container">
                <div class="settings-nav">
                    <button class="settings-nav-btn active" onclick="switchTab('akun', this)">
                        <span>👤</span> Pengaturan Akun
                    </button>
                    <button class="settings-nav-btn" onclick="switchTab('notifikasi', this)">
                        <span>🔔</span> Notifikasi
                    </button>
                    <button class="settings-nav-btn" onclick="switchTab('privasi', this)">
                        <span>🔒</span> Privasi & Keamanan
                    </button>
                    <button class="settings-nav-btn" onclick="switchTab('tampilan', this)">
                        <span>🎨</span> Tampilan & Tema
                    </button>
                    <button class="settings-nav-btn" onclick="switchTab('bantuan', this)">
                        <span>❓</span> Bantuan & Dukungan
                    </button>
                </div>

                <div class="settings-content-card">
                    
                    <div id="tab-akun" class="tab-pane active">
                        <h3 class="settings-section-title">Informasi Akun</h3>
                        <p class="settings-section-desc">Perbarui detail personal dan kontak akun Anda.</p>

                        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid #f0f0f0;">
                            <img src="https://via.placeholder.com/64" alt="<?php echo htmlspecialchars($nama_user); ?>" style="border-radius: 50%;">
                            <div>
                                <h4 style="font-size: 14px; font-weight: 700; margin: 0 0 4px 0;"><?php echo htmlspecialchars($nama_user); ?></h4>
                                <span style="font-size: 11px; color: var(--text-gray);"><?php echo htmlspecialchars($email_user); ?> &bull; Terverifikasi</span>
                            </div>
                        </div>

                        <form onsubmit="event.preventDefault(); alert('Perubahan akun berhasil disimpan!');">
                            <div class="form-grid-2">
                                <div class="form-group-custom">
                                    <label>Nama Lengkap</label>
                                    <input type="text" value="<?php echo htmlspecialchars($nama_user); ?>" required>
                                </div>
                                <div class="form-group-custom">
                                    <label>Username</label>
                                    <input type="text" value="@<?php echo strtolower(str_replace(' ', '', $nama_user)); ?>" required>
                                </div>
                            </div>

                            <div class="form-grid-2">
                                <div class="form-group-custom">
                                    <label>Alamat Email</label>
                                    <input type="email" value="<?php echo htmlspecialchars($email_user); ?>" required>
                                </div>
                                <div class="form-group-custom">
                                    <label>Nomor Telepon</label>
                                    <input type="tel" value="+62 812-3456-7890">
                                </div>
                            </div>

                            <div style="border-top: 1px solid #f0f0f0; margin-top: 20px; padding-top: 20px;">
                                <h3 class="settings-section-title">Ubah Kata Sandi</h3>
                                <p class="settings-section-desc">Pastikan kata sandi Anda kuat untuk keamanan akun.</p>

                                <div class="form-group-custom">
                                    <label>Kata Sandi Saat Ini</label>
                                    <input type="password" placeholder="••••••••">
                                </div>
                                <div class="form-grid-2">
                                    <div class="form-group-custom">
                                        <label>Kata Sandi Baru</label>
                                        <input type="password" placeholder="Minimal 8 karakter">
                                    </div>
                                    <div class="form-group-custom">
                                        <label>Konfirmasi Kata Sandi Baru</label>
                                        <input type="password" placeholder="Ulangi kata sandi baru">
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: right; margin-top: 20px;">
                                <button type="submit" class="btn-action" style="padding: 10px 24px;">Simpan Perubahan</button>
                            </div>
                        </form>

                        <div class="danger-zone-card">
                            <div>
                                <h4 style="font-size: 13px; font-weight: 700; color: #d32f2f; margin: 0 0 4px 0;">Hapus Akun</h4>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Tindakan ini permanen dan akan menghapus semua riwayat medis/aktivitas Anda.</p>
                            </div>
                            <button class="btn-outline-cancel" style="color: #d32f2f; border-color: #ffcdd2; font-size: 11px;" onclick="confirm('Apakah Anda yakin ingin menghapus akun ini secara permanen?')">Hapus Akun</button>
                        </div>
                    </div>

                    <div id="tab-notifikasi" class="tab-pane">
                        <h3 class="settings-section-title">Preferensi Notifikasi</h3>
                        <p class="settings-section-desc">Atur bagaimana dan kapan Anda menerima kabar dari MindCare.</p>

                        <div class="setting-toggle-item">
                            <div>
                                <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 2px 0;">Notifikasi Email</h4>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Terima rangkuman mingguan dan artikel edukasi melalui email.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="setting-toggle-item">
                            <div>
                                <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 2px 0;">Notifikasi Aplikasi</h4>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Terima pengingat harian dan notifikasi konsultasi psikolog.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="setting-toggle-item">
                            <div>
                                <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 2px 0;">Pengingat Mood & Meditasi</h4>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Ingatkan saya untuk mengisi Mood Tracker setiap malam.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="setting-toggle-item">
                            <div>
                                <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 2px 0;">Promosi & Event</h4>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Dapatkan penawaran khusus webinar dan event kesehatan mental.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>

                    <div id="tab-privasi" class="tab-pane">
                        <h3 class="settings-section-title">Privasi Data</h3>
                        <p class="settings-section-desc">Kontrol siapa saja yang dapat melihat data aktivitas Anda.</p>

                        <div class="setting-toggle-item">
                            <div>
                                <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 2px 0;">Mode Privasi Komunitas</h4>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Sembunyikan nama asli saya saat memposting di Forum Komunitas.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="setting-toggle-item">
                            <div>
                                <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 2px 0;">Autentikasi Dua Langkah (2FA)</h4>
                                <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Amankan akun dengan verifikasi tambahan lewat WhatsApp/SMS.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div style="margin-top: 24px;">
                            <h4 style="font-size: 13px; font-weight: 700; margin-bottom: 12px;">Perangkat Aktif Saat Ini</h4>
                            <div style="background: #f8faf8; border: 1px solid var(--border-color); border-radius: 10px; padding: 12px; display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <div style="font-size: 12px; font-weight: 600;">💻 Chrome - Windows 11</div>
                                    <div style="font-size: 10px; color: var(--text-gray);">Jakarta, Indonesia &bull; Aktif Sekarang</div>
                                </div>
                                <span style="font-size: 11px; color: var(--primary-green); font-weight: 600;">Perangkat Ini</span>
                            </div>
                        </div>
                    </div>

                    <div id="tab-tampilan" class="tab-pane">
                        <h3 class="settings-section-title">Preferensi Tampilan</h3>
                        <p class="settings-section-desc">Sesuaikan kenyamanan visual aplikasi MindCare sesuai selera Anda.</p>

                        <div class="form-group-custom">
                            <label>Pilihan Mode Warna</label>
                            <select>
                                <option value="light">☀️ Mode Terang (Default)</option>
                                <option value="dark">🌙 Mode Gelap</option>
                                <option value="system">🖥️ Ikuti Sistem HP/Komputer</option>
                            </select>
                        </div>

                        <div class="form-group-custom" style="margin-top: 16px;">
                            <label>Ukuran Teks / Font</label>
                            <select>
                                <option value="normal">Standar (Rekomendasi)</option>
                                <option value="large">Besar</option>
                                <option value="small">Kecil</option>
                            </select>
                        </div>
                    </div>

                    <div id="tab-bantuan" class="tab-pane">
                        <h3 class="settings-section-title">Bantuan & Dukungan</h3>
                        <p class="settings-section-desc">Ada kendala saat menggunakan aplikasi? Kami siap membantu.</p>

                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            <a href="#faq" class="btn-outline-cancel" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: var(--text-dark); padding: 12px 16px;">
                                <span>❓ Pertanyaan Sering Diajukan (FAQ)</span>
                                <span>➔</span>
                            </a>
                            <a href="mailto:support@mindcare.id" class="btn-outline-cancel" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: var(--text-dark); padding: 12px 16px;">
                                <span>✉️ Hubungi Tim Support via Email</span>
                                <span>➔</span>
                            </a>
                            <a href="#" class="btn-outline-cancel" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: var(--text-dark); padding: 12px 16px;">
                                <span>📜 Syarat & Ketentuan Layanan</span>
                                <span>➔</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        function switchTab(tabName, btnElement) {
            const tabs = document.querySelectorAll('.tab-pane');
            tabs.forEach(tab => tab.classList.remove('active'));

            const btns = document.querySelectorAll('.settings-nav-btn');
            btns.forEach(btn => btn.classList.remove('active'));

            document.getElementById('tab-' + tabName).classList.add('active');
            btnElement.classList.add('active');
        }
    </script>
    <script src="script.js"></script>
</body>
</html>