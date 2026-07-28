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
    <title>AI Chatbot - MindCare</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* ================= FIX STYLING CHATBOT SELF-CONTAINED ================= */
        .chatbot-container {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 16px;
            height: calc(100vh - 120px);
            min-height: 520px;
            overflow: hidden;
            box-sizing: border-box;
        }

        /* Box Chat Utama */
        .chat-box-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            height: 100%;
        }

        .chat-header {
            padding: 12px 18px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
        }

        .chat-header-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chat-avatar-icon {
            width: 36px;
            height: 36px;
            background: #e8f5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .chat-header-actions {
            display: flex;
            gap: 12px;
            color: #718096;
            font-size: 14px;
        }

        .chat-header-actions span {
            cursor: pointer;
        }

        /* Container Messages */
        .chat-messages {
            flex: 1;
            padding: 16px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: #fcfdfd;
        }

        /* Bubble Chat */
        .msg-row {
            display: flex;
            gap: 10px;
            max-width: 80%;
        }

        .msg-row.bot {
            align-self: flex-start;
        }

        .msg-row.user {
            align-self: flex-end;
            flex-direction: row-reverse;
        }

        .msg-bubble {
            background: #f1f8e9;
            padding: 10px 14px;
            border-radius: 14px;
            border-top-left-radius: 2px;
            font-size: 12.5px;
            line-height: 1.5;
            color: #2d3748;
        }

        .msg-row.user .msg-bubble {
            background: #e8f5e9;
            border-radius: 14px;
            border-top-right-radius: 2px;
        }

        .msg-time {
            font-size: 9.5px;
            color: #a0aec0;
            margin-top: 4px;
            text-align: right;
        }

        /* Quick Replies Chips */
        .quick-replies-wrapper {
            display: flex;
            gap: 8px;
            margin-left: 46px;
            margin-top: 4px;
            flex-wrap: wrap;
        }

        .chip-button {
            background: #ffffff;
            border: 1px solid #cbd5e0;
            padding: 6px 12px;
            border-radius: 16px;
            font-size: 11px;
            color: #2d3748;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .chip-button:hover {
            background: #e8f5e9;
            border-color: #2e7d32;
            color: #2e7d32;
        }

        /* Input Area */
        .chat-input-area {
            padding: 12px 16px;
            border-top: 1px solid #e2e8f0;
            background: #ffffff;
        }

        .chat-input-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f7fafc;
            padding: 6px 12px;
            border-radius: 24px;
            border: 1px solid #edf2f7;
        }

        .chat-input-wrapper input {
            flex: 1;
            border: none;
            background: transparent;
            outline: none;
            font-size: 12.5px;
            padding: 6px 4px;
        }

        .btn-send-msg {
            background: #2e7d32;
            color: white;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.2s;
            font-size: 12px;
            flex-shrink: 0;
        }

        .btn-send-msg:hover {
            background: #1b5e20;
        }

        .disclaimer-text {
            font-size: 10px;
            color: #a0aec0;
            text-align: center;
            margin-top: 8px;
            margin-bottom: 0;
        }

        /* Sidebar Kanan */
        .chat-sidebar-right {
            display: flex;
            flex-direction: column;
            gap: 12px;
            overflow-y: auto;
            height: 100%;
        }

        .sidebar-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 14px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
        }

        .popular-topic-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #edf2f7;
            font-size: 11.5px;
            cursor: pointer;
            color: #4a5568;
        }

        .popular-topic-item:last-child {
            border-bottom: none;
        }

        .popular-topic-item:hover {
            color: #2e7d32;
        }
    </style>
</head>
<body>

    <div class="dash-layout">
        <!-- SIDEBAR KIRI -->
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
                <a href="chatbot.php" class="menu-item active">🤖 AI Chatbot</a>
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

            <div class="support-sidebar-card">
                <h4 style="font-weight: 600;">Butuh Dukungan?</h4>
                <p>Kamu tidak sendirian.<br>Kami siap membantu.</p>
                <button class="btn-support">Chat Sekarang</button>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <!-- HEADER -->
            <div class="top-nav" style="margin-bottom: 12px;">
                <div>
                    <h2 style="font-size: 20px; color: var(--text-dark); font-weight: 700; margin: 0;">AI Chatbot</h2>
                    <p style="font-size: 12px; color: var(--text-gray); margin: 4px 0 0 0;">Teman virtualmu untuk mendengarkan dan mendukungmu kapan saja.</p>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="font-size: 20px; cursor: pointer; position: relative;">
                        🔔<span style="position: absolute; top: 0; right: 0; width: 8px; height: 8px; background: red; border-radius: 50%;"></span>
                    </div>
                    <div class="user-info">
                        <img src="https://via.placeholder.com/35" alt="<?php echo htmlspecialchars($nama_user); ?>">
                        <div style="line-height: 1.2; padding-right: 15px;">
                            <div style="font-size: 13px; font-weight: 600;"><?php echo htmlspecialchars($nama_user); ?></div>
                            <div style="font-size: 10px; color: var(--text-gray);">Pengguna</div>
                        </div>
                        <span style="font-size: 10px; padding-right: 5px;">⌄</span>
                    </div>
                </div>
            </div>

            <!-- CHATBOT MAIN CONTAINER -->
            <div class="chatbot-container">
                <!-- BOX CHAT UTAMA -->
                <div class="chat-box-card">
                    <div class="chat-header">
                        <div class="chat-header-info">
                            <div class="chat-avatar-icon">🤖</div>
                            <div>
                                <h4 style="font-size: 14px; font-weight: 600; margin: 0;">MindCare AI</h4>
                                <p style="font-size: 11px; color: #2e7d32; font-weight: 500; margin: 2px 0 0 0;">🟢 Online</p>
                            </div>
                        </div>
                        <div class="chat-header-actions">
                            <span>🔊</span>
                            <span>🔄</span>
                            <span>⋮</span>
                        </div>
                    </div>

                    <!-- AREA PESAN OBROLAN -->
                    <div class="chat-messages" id="chatMessages">
                        <!-- Bot Message 1 -->
                        <div class="msg-row bot">
                            <div class="chat-avatar-icon">🤖</div>
                            <div>
                                <div class="msg-bubble">
                                    Halo, <?php echo htmlspecialchars($nama_user); ?>! 👋<br>
                                    Aku MindCare AI.<br>
                                    Aku di sini untuk mendengarkan dan membantumu. Ada yang ingin kamu ceritakan hari ini?
                                </div>
                                <div class="msg-time">10:30</div>
                            </div>
                        </div>

                        <!-- Quick Replies -->
                        <div class="quick-replies-wrapper" id="quickReplies">
                            <button class="chip-button" onclick="sendQuickReply('Sulit tidur')">Sulit tidur</button>
                            <button class="chip-button" onclick="sendQuickReply('Overthinking')">Overthinking</button>
                            <button class="chip-button" onclick="sendQuickReply('Pekerjaan / Kuliah')">Pekerjaan / Kuliah</button>
                            <button class="chip-button" onclick="sendQuickReply('Lainnya')">Lainnya</button>
                        </div>
                    </div>

                    <!-- INPUT FORM -->
                    <div class="chat-input-area">
                        <form id="chatForm" style="margin: 0;">
                            <div class="chat-input-wrapper">
                                <input type="text" id="userInput" placeholder="Ketik pesanmu di sini..." autocomplete="off">
                                <span style="cursor: pointer; font-size: 18px;">😊</span>
                                <button type="submit" class="btn-send-msg">➤</button>
                            </div>
                        </form>
                        <p class="disclaimer-text">🛡️ Chatbot ini tidak menggantikan bantuan profesional. Jika kamu dalam keadaan darurat, silakan Konsultasi Psikolog.</p>
                    </div>
                </div>

                <!-- SIDEBAR KANAN -->
                <div class="chat-sidebar-right">
                    <!-- Topik Populer -->
                    <div class="sidebar-card">
                        <h4 style="font-size: 12.5px; font-weight: 600; margin: 0 0 8px 0; color: #2d3748;">📊 Topik Populer</h4>
                        <div class="popular-topic-item" onclick="sendQuickReply('Cara Mengatasi Kecemasan')">
                            <span>🌱 Mengatasi Kecemasan</span>
                            <span>&gt;</span>
                        </div>
                        <div class="popular-topic-item" onclick="sendQuickReply('Tips mengatasi Overthinking')">
                            <span>🧠 Overthinking</span>
                            <span>&gt;</span>
                        </div>
                        <div class="popular-topic-item" onclick="sendQuickReply('Bagaimana cara Self Love?')">
                            <span>💖 Self Love</span>
                            <span>&gt;</span>
                        </div>
                        <div class="popular-topic-item" onclick="sendQuickReply('Cara mengatasi Stres & Burnout')">
                            <span>🌧️ Stres & Burnout</span>
                            <span>&gt;</span>
                        </div>
                        <div class="popular-topic-item" onclick="sendQuickReply('Berikan Motivasi Diri')">
                            <span>⭐ Motivasi Diri</span>
                            <span>&gt;</span>
                        </div>
                    </div>

                    <!-- Tips Hari Ini -->
                    <div class="sidebar-card">
                        <h4 style="font-size: 12.5px; font-weight: 600; margin: 0 0 8px 0; color: #2d3748;">☀️ Tips Hari Ini</h4>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <span style="font-size: 24px;">🪴</span>
                            <p style="font-size: 10.5px; color: #718096; line-height: 1.4; margin: 0;">Tarik napas perlahan, tenangkan pikiran, dan fokus pada hal-hal yang bisa kamu syukuri hari ini. Kamu hebat! 💚</p>
                        </div>
                    </div>

                    <!-- Riwayat Chat -->
                    <div class="sidebar-card">
                        <h4 style="font-size: 12.5px; font-weight: 600; margin: 0 0 8px 0; color: #2d3748;">🕒 Riwayat Chat</h4>
                        <div class="popular-topic-item">
                            <div>
                                <p style="font-size: 11px; font-weight: 600; margin: 0;">Kecemasan tanpa alasan</p>
                                <p style="font-size: 9px; color: #a0aec0; margin: 2px 0 0 0;">Hari ini, 10:31</p>
                            </div>
                            <span>&gt;</span>
                        </div>
                        <div class="popular-topic-item">
                            <div>
                                <p style="font-size: 11px; font-weight: 600; margin: 0;">Cara mengatasi overthinking</p>
                                <p style="font-size: 9px; color: #a0aec0; margin: 2px 0 0 0;">Kemarin, 18:45</p>
                            </div>
                            <span>&gt;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>