<?php
session_start();

// Cek apakah user sudah login, jika belum arahkan kembali ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: masuk.html");
    exit;
}

$nama_user = $_SESSION['nama'];
$email_user = isset($_SESSION['email']) ? $_SESSION['email'] : 'aisya@gmail.com';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event - MindCare</title>
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
                    <span style="font-size: 9px; font-weight: 400; color: var(--text-gray); display: block; margin-top: 3px;">Mental Health Platform<br>For Everyone</span>
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
            
            <!-- TOP NAV HEADER -->
            <div class="top-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                <div>
                    <h1 id="pageTitle" style="font-size: 22px; font-weight: 700; margin: 0 0 4px 0;">Daftar Event</h1>
                    <p id="pageSubtitle" style="font-size: 12px; color: var(--text-gray); margin: 0;">Lengkapi daftar diri untuk mendaftar event ini</p>
                </div>
                
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="font-size: 18px; position: relative; cursor: pointer;">🔔</div>
                    <div style="display: flex; align-items: center; gap: 8px; cursor: pointer; background: #ffffff; padding: 6px 12px; border-radius: 20px; border: 1px solid var(--border-color);">
                        <img src="https://via.placeholder.com/34" alt="<?php echo htmlspecialchars($nama_user); ?>" style="border-radius: 50%;">
                        <div>
                            <div style="font-size: 12px; font-weight: 700;"><?php echo htmlspecialchars($nama_user); ?></div>
                            <div style="font-size: 9px; color: var(--text-gray);">Pengguna Baru</div>
                        </div>
                        <span style="font-size: 10px;">⌄</span>
                    </div>
                </div>
            </div>

            <!-- ================= STEP 1: FORM ISIAN DATA ================= -->
            <div id="step1" class="step-pane active">
                <form onsubmit="goToConfirmStep(event)">
                    <div class="event-form-container">
                        <div class="form-group-custom" style="margin-bottom: 20px;">
                            <label>Nama Lengkap</label>
                            <input type="text" id="inputNama" value="<?php echo htmlspecialchars($nama_user); ?>" placeholder="Masukkan nama lengkap" required style="background: #ffffff; padding: 12px 16px; border-radius: 12px; border: none;">
                        </div>

                        <div class="form-group-custom" style="margin-bottom: 20px;">
                            <label>Email</label>
                            <input type="email" id="inputEmail" value="<?php echo htmlspecialchars($email_user); ?>" placeholder="Masukkan email aktif" required style="background: #ffffff; padding: 12px 16px; border-radius: 12px; border: none;">
                        </div>

                        <div class="form-group-custom" style="margin-bottom: 20px;">
                            <label>Nomor Whatsapp</label>
                            <input type="tel" id="inputHp" value="+6281234567890" placeholder="Masukkan nomor whatsapp" required style="background: #ffffff; padding: 12px 16px; border-radius: 12px; border: none;">
                        </div>

                        <div class="form-row-inline" style="margin-bottom: 20px;">
                            <div class="form-group-custom" style="width: 160px; margin: 0;">
                                <label>Usia</label>
                                <input type="number" id="inputUsia" value="21" placeholder="Usia" required style="background: #ffffff; padding: 12px 16px; border-radius: 12px; border: none;">
                            </div>

                            <div class="form-group-custom" style="margin: 0;">
                                <label>Jenis Kelamin</label>
                                <div class="radio-gender-group" style="margin-top: 10px;">
                                    <label class="radio-gender-item">
                                        <input type="radio" name="gender" value="Laki-Laki"> Laki -Laki
                                    </label>
                                    <label class="radio-gender-item">
                                        <input type="radio" name="gender" value="Perempuan" checked> Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-custom" style="width: 220px; margin-bottom: 20px;">
                            <label>Profesi</label>
                            <input type="text" id="inputProfesi" value="Mahasiswa" placeholder="Profesi" required style="background: #ffffff; padding: 12px 16px; border-radius: 12px; border: none;">
                        </div>

                        <div class="form-group-custom" style="margin-bottom: 0;">
                            <label>Alasan mengikuti webinar (opsional)</label>
                            <textarea id="inputAlasan" rows="4" placeholder="Tuliskan alasan kamu..." style="background: #ffffff; padding: 12px 16px; border-radius: 12px; border: none; resize: none; width: 100%; box-sizing: border-box;">Ingin belajar mengelola stres saat mengerjakan tugas perkuliahan.</textarea>
                        </div>
                    </div>

                    <!-- Checkbox Syarat & Ketentuan -->
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 28px;">
                        <input type="checkbox" id="checkTerms" required style="width: 18px; height: 18px; accent-color: var(--primary-green); cursor: pointer;">
                        <label for="checkTerms" style="font-size: 13px; color: var(--text-dark); cursor: pointer;">
                            Saya menyutujui <a href="#" style="color: var(--primary-green); font-weight: 700; text-decoration: none;">syarat dan ketentuan</a> yang berlaku
                        </label>
                    </div>

                    <div style="text-align: right;">
                        <button type="submit" class="btn-action" style="padding: 12px 32px; font-size: 13px;">Lanjut Konfirmasi ➔</button>
                    </div>
                </form>
            </div>

            <!-- ================= STEP 2: KONFIRMASI PENDAFTARAN ================= -->
            <div id="step2" class="step-pane">
                <div class="event-form-container">
                    
                    <div class="confirm-grid-top">
                        <div>
                            <h3 style="font-size: 14px; font-weight: 700; margin: 0 0 12px 0; color: var(--text-dark);">Data Peserta</h3>
                            
                            <div class="recap-card">
                                <a href="javascript:void(0)" onclick="backToStep1()" style="position: absolute; top: 16px; right: 16px; color: var(--primary-green); font-size: 12px; font-weight: 600; text-decoration: none;">
                                    ✏️ Ubah
                                </a>

                                <div class="recap-row">
                                    <span class="recap-label">Nama Lengkap</span>
                                    <span class="recap-val" id="recapNama">Aisya</span>
                                </div>
                                <div class="recap-row">
                                    <span class="recap-label">Email</span>
                                    <span class="recap-val" id="recapEmail">aisya@gmail.com</span>
                                </div>
                                <div class="recap-row">
                                    <span class="recap-label">Nomor Handphone</span>
                                    <span class="recap-val" id="recapHp">+6281234567890</span>
                                </div>
                                <div class="recap-row">
                                    <span class="recap-label">Usia</span>
                                    <span class="recap-val" id="recapUsia">21 tahun</span>
                                </div>
                                <div class="recap-row">
                                    <span class="recap-label">Jenis Kelamin</span>
                                    <span class="recap-val" id="recapGender">Perempuan</span>
                                </div>
                                <div class="recap-row">
                                    <span class="recap-label">Profesi</span>
                                    <span class="recap-val" id="recapProfesi">Mahasiswa</span>
                                </div>
                                <div class="recap-row">
                                    <span class="recap-label">Alasan</span>
                                    <span class="recap-val" id="recapAlasan">Ingin belajar mengelola stres...</span>
                                </div>
                            </div>
                        </div>

                        <div style="text-align: center;">
                            <img src="https://illustrations.puchu.id/placeholder-hug.png" alt="Self Love Illustration" style="width: 220px; height: auto;" onerror="this.src='https://via.placeholder.com/220x220/e8f5e9/2e7d32?text=MindCare+Love'">
                        </div>
                    </div>

                    <h3 style="font-size: 14px; font-weight: 700; margin: 0 0 12px 0; color: var(--text-dark);">Informasi Event</h3>
                    
                    <div class="event-info-confirm-card">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=400" class="event-thumb-img" alt="Webinar Stres">
                        
                        <div style="flex: 1;">
                            <span style="font-size: 11px; color: var(--text-gray); font-weight: 600;">Webinar</span>
                            <h2 style="font-size: 16px; font-weight: 700; margin: 2px 0 12px 0; color: var(--text-dark);">
                                Kenali Stres, Kelola Diri dengan Bijak
                            </h2>

                            <div style="display: flex; flex-direction: column; gap: 6px; font-size: 12px; color: var(--text-dark);">
                                <div>📅 <strong>Tanggal:</strong> Sabtu, 25 Juli 2026</div>
                                <div>⏰ <strong>Waktu:</strong> 09.00 - 12.00 WIB</div>
                                <div>📍 <strong>Lokasi:</strong> Bandar Lampung, Lampung / Zoom Meeting</div>
                            </div>
                        </div>

                        <div>
                            <div class="badge-gratis-box">Gratis</div>
                        </div>
                    </div>

                    <div style="background: #ffffff; border-radius: 12px; padding: 16px 20px;">
                        <span style="font-size: 11px; color: var(--text-gray); font-weight: 600; display: block;">Harga Event</span>
                        <div style="font-size: 20px; font-weight: 800; color: var(--primary-green); margin: 2px 0;">GRATIS</div>
                        <p style="font-size: 11px; color: var(--text-gray); margin: 0;">Tidak ada biaya pendaftaran untuk event ini</p>
                    </div>

                </div>

                <div style="display: flex; justify-content: flex-end; gap: 16px; margin-top: 24px;">
                    <a href="event.php" class="btn-outline-cancel" style="padding: 12px 32px; background: #ffffff; text-decoration: none; color: var(--text-dark); border-radius: 10px; font-weight: 600;">
                        Batal
                    </a>
                    <button type="button" onclick="goToStep3()" class="btn-action" style="padding: 12px 32px; font-size: 13px;">
                        Konfirmasi Pendaftaran ➔
                    </button>
                </div>
            </div>

            <!-- ================= STEP 3: TIKET / SUKSES ================= -->
            <div id="step3" class="step-pane">
                <div class="card-white" style="text-align: center; padding: 48px 24px;">
                    <div style="font-size: 56px; margin-bottom: 12px;">🎉</div>
                    <h2 style="font-size: 22px; font-weight: 700; color: var(--primary-green); margin-bottom: 8px;">Pendaftaran Berhasil!</h2>
                    <p style="font-size: 12.5px; color: var(--text-gray); max-width: 480px; margin: 0 auto 28px auto; line-height: 1.6;">
                        Selamat, data pendaftaranmu telah terkonfirmasi. Tautan Zoom dan e-ticket telah dikirimkan ke email <strong id="successEmail">aisya@gmail.com</strong>.
                    </p>

                    <div style="background: #f8faf8; border: 1.5px dashed var(--primary-green); padding: 24px; border-radius: 16px; max-width: 420px; margin: 0 auto 32px auto; text-align: left;">
                        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e0e0e0; padding-bottom: 10px; margin-bottom: 12px;">
                            <span style="font-weight: 700; color: var(--primary-green); font-size: 13px;">💚 E-TICKET WEBINAR</span>
                            <span style="font-size: 10px; background: #e8f5e9; color: var(--primary-green); padding: 3px 8px; border-radius: 6px; font-weight: 700;">TERKONFIRMASI</span>
                        </div>
                        <h4 style="margin: 0 0 6px 0; font-size: 13.5px; color: var(--text-dark);">Kenali Stres, Kelola Diri dengan Bijak</h4>
                        <p style="margin: 0; font-size: 11px; color: var(--text-gray);"><strong>Peserta:</strong> <span id="ticketNama">Aisya</span></p>
                        <p style="margin: 4px 0 0 0; font-size: 11px; color: var(--text-gray);"><strong>Waktu:</strong> Sabtu, 25 Juli 2026 (09.00 WIB)</p>
                        <p style="margin: 4px 0 0 0; font-size: 11px; color: var(--text-gray);"><strong>Kode Tiket:</strong> #MC-EVT-2026725</p>
                    </div>

                    <div style="display: flex; justify-content: center; gap: 16px;">
                        <a href="event.php" class="btn-outline-cancel" style="text-decoration: none; padding: 12px 24px;">Kembali ke Event</a>
                        <button onclick="alert('E-ticket berhasil diunduh dalam format PDF!')" class="btn-action" style="padding: 12px 28px;">📥 Unduh E-Ticket</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- SCRIPT ALUR PINDAH STEP -->
    <script>
        function goToConfirmStep(e) {
            e.preventDefault();

            const nama = document.getElementById('inputNama').value;
            const email = document.getElementById('inputEmail').value;
            const hp = document.getElementById('inputHp').value;
            const usia = document.getElementById('inputUsia').value;
            const gender = document.querySelector('input[name="gender"]:checked').value;
            const profesi = document.getElementById('inputProfesi').value;
            const alasan = document.getElementById('inputAlasan').value;

            document.getElementById('recapNama').innerText = nama;
            document.getElementById('recapEmail').innerText = email;
            document.getElementById('recapHp').innerText = hp;
            document.getElementById('recapUsia').innerText = usia + ' tahun';
            document.getElementById('recapGender').innerText = gender;
            document.getElementById('recapProfesi').innerText = profesi;
            document.getElementById('recapAlasan').innerText = alasan || '-';

            document.getElementById('step1').classList.remove('active');
            document.getElementById('step2').classList.add('active');

            document.getElementById('pageTitle').innerText = 'Konfirmasi Pendaftaran';
            document.getElementById('pageSubtitle').innerText = 'Periksa kembali data dan konfirmasi pendaftaranmu';

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function backToStep1() {
            document.getElementById('step2').classList.remove('active');
            document.getElementById('step1').classList.add('active');

            document.getElementById('pageTitle').innerText = 'Daftar Event';
            document.getElementById('pageSubtitle').innerText = 'Lengkapi daftar diri untuk mendaftar event ini';

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function goToStep3() {
            const email = document.getElementById('inputEmail').value;
            const nama = document.getElementById('inputNama').value;

            document.getElementById('successEmail').innerText = email;
            document.getElementById('ticketNama').innerText = nama;

            document.getElementById('step2').classList.remove('active');
            document.getElementById('step3').classList.add('active');

            document.getElementById('pageTitle').innerText = 'Tiket Pendaftaran';
            document.getElementById('pageSubtitle').innerText = 'Bukti keikutsertaan acara MindCare';

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
    <script src="script.js"></script>
</body>
</html>