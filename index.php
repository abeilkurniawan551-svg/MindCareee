<?php
session_start();
$sudah_login = isset($_SESSION['login']);
$nama_user = $sudah_login ? $_SESSION['nama'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindCare - Jaga Pikiran, Bangun Hari Yang Lebih Baik</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Aksen Khusus Background Hero dari Gambar bg-aksen.jpeg */
        .hero {
            position: relative;
            background: linear-gradient(135deg, rgba(232, 245, 233, 0.88), rgba(255, 255, 255, 0.95)), 
                        url('bg-body.png') no-repeat center center / cover;
            overflow: hidden;
        }

        /* Penyesuaian Logo Image */
        .logo-img {
            height: 38px;
            width: auto;
            vertical-align: middle;
            object-fit: contain;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo" style="display: flex; align-items: center; gap: 10px;">
            <img src="logo.png" alt="MindCare Logo" class="logo-img">
            <span style="font-weight: 700; font-size: 22px; color: var(--primary-green);">MindCare</span>
        </div>
        <div class="nav-links">
            <a href="index.php" style="color: var(--primary-green); font-weight: 600;">Home</a>
            <a href="#tentang">Tentang</a>
            <a href="#psikolog">Psikolog</a>
            <a href="#testimoni">Testimoni</a>
            <a href="#faq">FAQ</a>
        </div>
        
        <!-- TOMBOL DINAMIS: JIKA SUDAH LOGIN KE DASHBOARD, JIKA BELUM KE MASUK.HTML -->
        <?php if ($sudah_login): ?>
            <div style="display: flex; align-items: center; gap: 10px;">
                <a href="dashboard.php" class="btn btn-primary" style="border-radius: 20px; font-weight: 600; padding: 8px 18px; font-size: 13px;">Halo, <?php echo htmlspecialchars($nama_user); ?>! 🏠</a>
                <a href="logout.php" style="font-size: 12px; color: #e74c3c; text-decoration: none; font-weight: 600;">Keluar</a>
            </div>
        <?php else: ?>
            <a href="masuk.php" class="btn btn-outline" style="border-radius: 20px; font-weight: 600;">Masuk / Daftar</a>
        <?php endif; ?>
    </nav>

    <section class="hero">
        <div class="hero-text">
            <h1 style="font-size: 42px; line-height: 1.2; margin-bottom: 20px;">Jaga Pikiran,<br><span style="color: var(--primary-green);">Bangun Hari Yang</span><br>Lebih Baik</h1>
            <p style="font-size: 16px; color: var(--text-gray); margin-bottom: 30px;">MindCare hadir untuk membantumu menjaga kesehatan mental dalam setiap langkah hidup, lebih seimbang dan bahagia.</p>
            <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                <a href="self-check.php" class="btn btn-primary" style="padding: 12px 24px;">Mulai Self Check</a>
                <a href="chatbot.php" class="btn btn-outline" style="background: white; padding: 12px 24px;">🤖 Chat dengan AI</a>
            </div>
        </div>
        
        <div class="hero-image" style="display: flex; justify-content: center; align-items: center;">
            <div class="hero-card" style="background: #ffffff; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); width: 100%; max-width: 320px; text-align: center; border: 1px solid rgba(46,125,50,0.1);">
                <div style="display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 10px;">
                    <span style="font-size: 20px;">😊</span>
                    <span style="font-size: 15px; font-weight: 600; color: var(--text-dark);">Happiness Score</span>
                </div>
                <div style="font-size: 48px; font-weight: 800; color: var(--primary-green); margin: 5px 0; line-height: 1;">
                    82 <span style="font-size: 16px; color: var(--text-gray); font-weight: 500;">/100</span>
                </div>
                <p style="font-size: 13px; color: var(--text-gray); margin: 15px 0 20px 0; line-height: 1.4;">Kamu sedang baik!<br>Pertahankan terus ya..</p>
                <a href="dashboard.php" class="btn btn-outline btn-block" style="font-size: 13px; padding: 10px; border-radius: 12px; font-weight: 600;">Lihat Detail &rarr;</a>
            </div>
        </div>
    </section>

    <div class="stats-bar">
        <div class="stat-item">
            <div class="stat-icon">👥</div>
            <div><h3 style="font-size: 20px; font-weight: 700;">10K+</h3><p style="font-size: 12px; color: var(--text-gray);">Pengguna Aktif</p></div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">👩‍⚕️</div>
            <div><h3 style="font-size: 20px; font-weight: 700;">100+</h3><p style="font-size: 12px; color: var(--text-gray);">Psikolog Terdaftar</p></div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">📄</div>
            <div><h3 style="font-size: 20px; font-weight: 700;">300+</h3><p style="font-size: 12px; color: var(--text-gray);">Artikel Edukasi</p></div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">😊</div>
            <div><h3 style="font-size: 20px; font-weight: 700;">98%</h3><p style="font-size: 12px; color: var(--text-gray);">Tingkat Kepuasan</p></div>
        </div>
    </div>

    <section id="tentang" class="section-padding">
        <div class="grid-2" style="align-items: center;">
            <div>
                <div class="section-tag">TENTANG MINDCARE</div>
                <h2 class="section-title" style="text-align: left; margin-bottom: 20px; font-size: 28px;">Kami Hadir Untuk Mendukung Kesehatan Mental Setiap Hari</h2>
                <p style="color: var(--text-gray); font-size: 15px; line-height: 1.8;">
                    MindCare merupakan platform kesehatan mental yang membantu pengguna menjaga kesejahteraan psikologis melalui berbagai layanan digital seperti Self Check, Mood Tracker, AI Chatbot, Meditasi, Artikel edukasi, serta konsultasi dengan psikolog profesional.
                </p>
            </div>
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <div class="feature-card" style="display: flex; gap: 15px; align-items: flex-start;">
                    <div style="font-size: 28px;">🎯</div>
                    <div>
                        <h4 style="font-size: 15px; font-weight: 700; margin-bottom: 4px;">Visi Kami</h4>
                        <p style="font-size: 13px; color: var(--text-gray); margin: 0; line-height: 1.5;">Menjadi platform kesehatan mental terkemuka yang mudah diakses oleh semua orang.</p>
                    </div>
                </div>
                <div class="feature-card" style="display: flex; gap: 15px; align-items: flex-start;">
                    <div style="font-size: 28px;">🚀</div>
                    <div>
                        <h4 style="font-size: 15px; font-weight: 700; margin-bottom: 4px;">Misi Kami</h4>
                        <p style="font-size: 13px; color: var(--text-gray); margin: 0; line-height: 1.5;">Memberikan akses layanan kesehatan mental yang aman, terpercaya, dan didukung oleh psikolog profesional.</p>
                    </div>
                </div>
                <div class="feature-card">
                    <h4 style="font-size: 15px; font-weight: 700; margin-bottom: 15px;">Nilai Utama Kami</h4>
                    <div style="display: flex; justify-content: space-around; font-size: 12px; text-align: center;">
                        <div><span style="font-size: 22px;">🔒</span><br><span style="font-weight: 500; margin-top: 4px; display: inline-block;">Keamanan Data</span></div>
                        <div><span style="font-size: 22px;">⚕️</span><br><span style="font-weight: 500; margin-top: 4px; display: inline-block;">Profesionalitas</span></div>
                        <div><span style="font-size: 22px;">📱</span><br><span style="font-weight: 500; margin-top: 4px; display: inline-block;">Mudah Diakses</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="psikolog" class="section-padding" style="background: #ffffff;">
        <div class="section-header" style="flex-direction: column; text-align: center; gap: 8px;">
            <div class="section-tag">TIM PSIKOLOG KAMI</div>
            <h2 class="section-title">Temui Psikolog Terbaik Kami</h2>
            <p style="color: var(--text-gray); font-size: 14px; margin: 0;">Kenali psikolog berpengalaman yang siap mendukung perjalanan kesehatan mental Anda.</p>
        </div>
        
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="konsultasi-psikolog.php" class="link-green" style="font-weight: 600;">Lihat Semua Psikolog &rarr;</a>
        </div>
        
        <div class="grid-3" style="align-items: stretch;">
            <div class="team-card" style="display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <img src="https://dummyimage.com/150x150/e8f5e9/2e7d32&text=Dr.+Sarah" alt="Dr. Sarah" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 12px;">
                    <h4 style="font-size: 15px; font-weight: 700; margin-bottom: 4px;">Dr. Sarah Amalia, M.Psi., Psikolog</h4>
                    <p style="font-size: 12px; color: var(--primary-green); font-weight: 600; margin-bottom: 8px;">Psikolog Klinis & Organisasi</p>
                    <p style="font-size: 12px; color: var(--text-gray); margin-bottom: 16px; line-height: 1.5;">Spesialisasi: Burnout, stres kerja, dan kecemasan umum.</p>
                </div>
                <a href="konsultasi-psikolog.php" class="btn btn-outline btn-block" style="font-size: 12px; padding: 10px; border-radius: 10px;">Lihat Profil &rarr;</a>
            </div>

            <div class="team-card" style="display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <img src="https://dummyimage.com/150x150/e8f5e9/2e7d32&text=Dr.+Bima" alt="Dr. Bima" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 12px;">
                    <h4 style="font-size: 15px; font-weight: 700; margin-bottom: 4px;">Dr. Bima Prasetyo, M.Psi., Psikolog</h4>
                    <p style="font-size: 12px; color: var(--primary-green); font-weight: 600; margin-bottom: 8px;">Psikolog Anak & Remaja</p>
                    <p style="font-size: 12px; color: var(--text-gray); margin-bottom: 16px; line-height: 1.5;">Spesialisasi: Perkembangan anak, perilaku, dan emosi remaja.</p>
                </div>
                <a href="konsultasi-psikolog.php" class="btn btn-outline btn-block" style="font-size: 12px; padding: 10px; border-radius: 10px;">Lihat Profil &rarr;</a>
            </div>

            <div class="team-card" style="display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <img src="https://dummyimage.com/150x150/e8f5e9/2e7d32&text=Dr.+Amanda" alt="Dr. Amanda" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 12px;">
                    <h4 style="font-size: 15px; font-weight: 700; margin-bottom: 4px;">Dr. Amanda Syahputri, M.Psi., Psikolog</h4>
                    <p style="font-size: 12px; color: var(--primary-green); font-weight: 600; margin-bottom: 8px;">Psikolog Klinis</p>
                    <p style="font-size: 12px; color: var(--text-gray); margin-bottom: 16px; line-height: 1.5;">Spesialisasi: Depresi, trauma masa lalu dan manajemen stres.</p>
                </div>
                <a href="konsultasi-psikolog.php" class="btn btn-outline btn-block" style="font-size: 12px; padding: 10px; border-radius: 10px;">Lihat Profil &rarr;</a>
            </div>
        </div>

        <div style="text-align: center; margin-top: 50px; font-size: 16px; font-weight: 500; font-style: italic; color: var(--primary-green);">
            "Merawat kesehatan mental bukan suatu tanda kelemahan,<br>tetapi langkah berani untuk hidup yang lebih baik."
        </div>
    </section>

    <section id="testimoni" class="section-padding">
        <div class="section-header" style="flex-direction: column; text-align: center; gap: 8px;">
            <div class="section-tag">TESTIMONI PENGGUNA</div>
            <h2 class="section-title">Kata Mereka tentang MindCare</h2>
            <p style="color: var(--text-gray); font-size: 14px; margin: 0;">Pengalaman nyata dari pengguna yang telah menggunakan MindCare untuk kesehatan mental mereka.</p>
        </div>

        <div class="grid-3" style="gap: 20px; margin-top: 30px;">
            <div class="testi-card">
                <div style="color: #FFC107; font-size: 16px;">★★★★★</div>
                <p style="font-size: 12px; color: var(--text-gray); margin-top: 10px; line-height: 1.6;">"MindCare benar-benar mengubah cara saya memandang kesehatan mental. Fitur mood trackernya sangat membantu saya lebih sadar terhadap perasaan harian."</p>
                <div class="testi-user"><div class="testi-avatar">T</div><div><h4 style="font-size: 13px;">Tiara, 24 Tahun</h4><p style="font-size: 11px; color: var(--text-gray); margin: 0;">Mahasiswa</p></div></div>
            </div>

            <div class="testi-card">
                <div style="color: #FFC107; font-size: 16px;">★★★★★</div>
                <p style="font-size: 12px; color: var(--text-gray); margin-top: 10px; line-height: 1.6;">"AI chat-nya sangat responsif dan nyaman untuk bercerita kapan saja. Sangat pas untuk saya yang butuh teman ngobrol sebelum berkonsultasi dengan psikolog."</p>
                <div class="testi-user"><div class="testi-avatar" style="background: #E57373;">D</div><div><h4 style="font-size: 13px;">Dodi, 27 Tahun</h4><p style="font-size: 11px; color: var(--text-gray); margin: 0;">Karyawan Swasta</p></div></div>
            </div>

            <div class="testi-card">
                <div style="color: #FFC107; font-size: 16px;">★★★★★</div>
                <p style="font-size: 12px; color: var(--text-gray); margin-top: 10px; line-height: 1.6;">"Artikel-artikel edukasi di MindCare sangat bermanfaat. Saya jadi punya lebih banyak pengetahuan untuk menjaga kesehatan mental."</p>
                <div class="testi-user"><div class="testi-avatar" style="background: #4DB6AC;">R</div><div><h4 style="font-size: 13px;">Rina, 30 Tahun</h4><p style="font-size: 11px; color: var(--text-gray); margin: 0;">Guru</p></div></div>
            </div>

            <div class="testi-card">
                <div style="color: #FFC107; font-size: 16px;">★★★★★</div>
                <p style="font-size: 12px; color: var(--text-gray); margin-top: 10px; line-height: 1.6;">"Tampilan aplikasinya fresh dan gampang digunakan. Saya suka panduan meditasinya, sangat efektif saat saya lagi butuh menenangkan diri dari masalah."</p>
                <div class="testi-user"><div class="testi-avatar" style="background: #81C784;">A</div><div><h4 style="font-size: 13px;">Andi, 25 Tahun</h4><p style="font-size: 11px; color: var(--text-gray); margin: 0;">Wiraswasta</p></div></div>
            </div>

            <div class="testi-card">
                <div style="color: #FFC107; font-size: 16px;">★★★★★</div>
                <p style="font-size: 12px; color: var(--text-gray); margin-top: 10px; line-height: 1.6;">"Saya rutin menggunakan MindCare dan merasakan perubahan positif. Artikelnya informatif dan membantu. MindCare selalu menemani rutinitas harian saya!"</p>
                <div class="testi-user"><div class="testi-avatar" style="background: #A1887F;">D</div><div><h4 style="font-size: 13px;">Dewi, 23 Tahun</h4><p style="font-size: 11px; color: var(--text-gray); margin: 0;">Pekerja Lepas</p></div></div>
            </div>

            <div class="testi-card">
                <div style="color: #FFC107; font-size: 16px;">★★★★★</div>
                <p style="font-size: 12px; color: var(--text-gray); margin-top: 10px; line-height: 1.6;">"MindCare memberikan pengalaman yang nyaman. Pilihan konselingnya membuat saya merasa dihargai, sangat disarankan bagi yang mencari bantuan profesional."</p>
                <div class="testi-user"><div class="testi-avatar" style="background: #64B5F6;">L</div><div><h4 style="font-size: 13px;">Leo, 28 Tahun</h4><p style="font-size: 11px; color: var(--text-gray); margin: 0;">Akuntan</p></div></div>
            </div>
        </div>
    </section>

    <section id="faq" class="section-padding" style="max-width: 800px; margin: auto;">
        <div class="section-header" style="flex-direction: column; text-align: center; gap: 8px;">
            <div class="section-tag">PERTANYAAN UMUM</div>
            <h2 class="section-title">FAQ — Yang Sering Ditanyakan</h2>
            <p style="color: var(--text-gray); font-size: 14px; margin-bottom: 20px;">Temukan jawaban atas pertanyaan yang paling sering ditanyakan pengguna.</p>
        </div>

        <details>
            <summary>Apa itu Self Mental Check?</summary>
            <div class="faq-content">Self Mental Check adalah fitur untuk mengevaluasi kondisi emosional Anda secara mandiri melalui serangkaian pertanyaan berbasis psikologi.</div>
        </details>
        <details>
            <summary>Apakah AI Chat bisa menggantikan psikolog?</summary>
            <div class="faq-content">Tidak, AI Chat berfungsi sebagai teman cerita dan pertolongan pertama, bukan pengganti diagnosis atau terapi medis dari psikolog profesional.</div>
        </details>
        <details>
            <summary>Bagaimana cara booking konsultasi dengan psikolog?</summary>
            <div class="faq-content">Anda dapat masuk ke menu Konsultasi Psikolog, memilih paket dan jadwal yang tersedia, lalu melanjutkan ke proses pembayaran dengan mudah.</div>
        </details>
        <details>
            <summary>Apakah MindCare gratis?</summary>
            <div class="faq-content">Beberapa fitur dasar seperti Mood Tracker, Meditasi, dan Artikel edukasi dapat diakses gratis. Namun layanan Konsultasi Psikolog Profesional dikenakan biaya terjangkau.</div>
        </details>
        <details>
            <summary>Apakah saya harus memiliki masalah mental untuk menggunakan MindCare?</summary>
            <div class="faq-content">Sama sekali tidak. MindCare dirancang untuk siapa saja yang ingin merawat, menjaga, dan memahami kondisi emosional mereka sehari-hari.</div>
        </details>
    </section>

    <footer>
        <div class="footer-grid">
            <div>
                <div class="logo" style="margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                    <img src="logo.png" alt="MindCare Logo" style="height: 32px; width: auto;">
                    <span style="font-size: 20px; color: var(--primary-green); font-weight: 700;">MindCare</span>
                </div>
                <p style="font-size: 13px; color: var(--text-gray); margin-bottom: 15px; line-height: 1.6;">MindCare hadir untuk membantumu menjaga kesehatan mental dalam setiap langkah hidup, lebih seimbang dan bahagia.</p>
            </div>
            <div>
                <h4 style="font-size: 14px; font-weight: 700; margin-bottom: 15px;">Navigasi</h4>
                <ul style="font-size: 13px; color: var(--text-gray); line-height: 2.2; list-style: none; padding: 0;">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#psikolog">Psikolog</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4 style="font-size: 14px; font-weight: 700; margin-bottom: 15px;">Layanan</h4>
                <ul style="font-size: 13px; color: var(--text-gray); line-height: 2.2; list-style: none; padding: 0;">
                    <li><a href="self-check.php">Self Check</a></li>
                    <li><a href="mood-tracker.php">Mood Tracker</a></li>
                    <li><a href="chatbot.php">AI Chatbot</a></li>
                    <li><a href="meditasi.php">Meditasi</a></li>
                    <li><a href="artikel.php">Artikel Edukasi</a></li>
                </ul>
            </div>
            <div>
                <h4 style="font-size: 14px; font-weight: 700; margin-bottom: 15px;">Kontak</h4>
                <ul style="font-size: 13px; color: var(--text-gray); line-height: 2.2; list-style: none; padding: 0;">
                    <li>021-456-7890</li>
                    <li>hello@mindcare.id</li>
                    <li>Jakarta, Indonesia</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            Kami menjaga privasi dan data Anda dengan aman. Hak Cipta &copy; 2026 MindCare.
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>