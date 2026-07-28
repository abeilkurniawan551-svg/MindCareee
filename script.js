// ================= 2. CLAUDE AI CHATBOT INTEGRATION =================
// PERINGATAN: Menyimpan API Key di frontend sangat tidak disarankan untuk aplikasi produksi.
const OPENROUTER_API_KEY = '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'; 

document.addEventListener('DOMContentLoaded', () => {
    const chatForm = document.getElementById('chatForm');
    const userInput = document.getElementById('userInput');
    
    if (chatForm && userInput) {
        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault(); 
            
            const text = userInput.value.trim();
            if (!text) return;

            // 1. Tampilkan pesan pengguna
            appendMessage('user', text);
            userInput.value = ''; 

            // Sembunyikan quick replies jika ada
            const quickReplies = document.getElementById('quickReplies') || document.getElementById('quickRepliesWrapper');
            if (quickReplies) quickReplies.style.display = 'none';

            // 2. Tampilkan indikator ketik
            const typingIndicator = appendTypingIndicator();

            try {
                // 3. Panggil API Claude via OpenRouter
                const aiResponse = await fetchClaudeResponse(text);
                typingIndicator.remove();
                appendMessage('bot', aiResponse);
            } catch (error) {
                console.warn('API Error / Quota Limit:', error.message);
                
                // Fallback ke Smart Reply lokal
                setTimeout(() => {
                    typingIndicator.remove();
                    const smartReply = getMindCareSmartReply(text);
                    appendMessage('bot', smartReply);
                }, 600);
            }
        });
    }
});

// Fungsi untuk Tombol Cepat (Quick Reply)
window.sendQuickReply = function(text) {
    const userInput = document.getElementById('userInput');
    const chatForm = document.getElementById('chatForm');
    if (userInput && chatForm) {
        userInput.value = text;
        chatForm.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
    }
};

// Sanitasi HTML dasar untuk mencegah XSS
function escapeHTML(str) {
    return str.replace(/[&<>'"]/g, 
        tag => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            "'": '&#39;',
            '"': '&quot;'
        }[tag])
    );
}

// Format Teks (Bold & Line Break)
function formatResponseText(text) {
    // Sanitasi teks terlebih dahulu, baru terapkan format Markdown sederhana
    let safeText = escapeHTML(text);
    return safeText
        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
        .replace(/\n/g, '<br>');
}

// Menambahkan pesan ke UI
function appendMessage(sender, text) {
    const chatMessages = document.getElementById('chatMessages');
    if (!chatMessages) return;

    const timeStr = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    const msgDiv = document.createElement('div');
    
    msgDiv.className = `msg-row ${sender}`;

    if (sender === 'bot') {
        msgDiv.innerHTML = `
            <div class="chat-avatar-icon">🤖</div>
            <div>
                <div class="msg-bubble">${formatResponseText(text)}</div>
                <div class="msg-time">${timeStr}</div>
            </div>
        `;
    } else {
        msgDiv.innerHTML = `
            <div>
                <div class="msg-bubble">${formatResponseText(text)}</div>
                <div class="msg-time">${timeStr} ✔✔</div>
            </div>
        `;
    }

    chatMessages.appendChild(msgDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Indikator Ketik
function appendTypingIndicator() {
    const chatMessages = document.getElementById('chatMessages');
    if (!chatMessages) return null;

    const msgDiv = document.createElement('div');
    msgDiv.className = 'msg-row bot';
    msgDiv.innerHTML = `
        <div class="chat-avatar-icon">🤖</div>
        <div>
            <div class="msg-bubble" style="color: #718096; font-style: italic;">
                MindCare AI sedang berpikir...
            </div>
        </div>
    `;
    chatMessages.appendChild(msgDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
    return msgDiv;
}

// Fetch API ke AI Claude
async function fetchClaudeResponse(userPrompt) {
    const endpoint = 'https://openrouter.ai/api/v1/chat/completions';

    const payload = {
        model: "anthropic/claude-3-haiku", 
        messages: [
            {
                role: "system",
                content: "Kamu adalah MindCare AI, asisten virtual kesehatan mental yang ramah, empatik, dan suportif. Berikan jawaban dalam bahasa Indonesia yang menenangkan dan bermanfaat. Selalu ingatkan bahwa kamu adalah AI dan bukan pengganti psikolog profesional jika pengguna menunjukkan indikasi bahaya darurat."
            },
            {
                role: "user",
                content: userPrompt
            }
        ]
    };

    const response = await fetch(endpoint, {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${OPENROUTER_API_KEY}`,
            'HTTP-Referer': window.location.href, 
            'X-Title': 'MindCare Platform'
        },
        body: JSON.stringify(payload)
    });

    const data = await response.json();

    if (!response.ok) {
        throw new Error(data.error?.message || `HTTP ${response.status}`);
    }

    if (data.choices && data.choices[0]?.message?.content) {
        return data.choices[0].message.content;
    } else {
        throw new Error('Respon kosong dari AI');
    }
}

// SMART REPLY BACKUP (LOKAL)
function getMindCareSmartReply(prompt) {
    const p = prompt.toLowerCase();

    if (p.includes('anxiety') || p.includes('cemas') || p.includes('panik') || p.includes('gelisah') || p.includes('deg-degan') || p.includes('takut')) {
        return "Mengatasi **anxiety** memang butuh waktu dan ketenangan. 💚\n\nBeberapa langkah praktis yang bisa langsung kamu coba saat ini:\n1. **Teknik Pernapasan 4-7-8**: Tarik napas 4 detik, tahan 7 detik, lalu hembuskan perlahan 8 detik.\n2. **Grounding 5-4-3-2-1**: Sebutkan 5 benda yang kamu lihat dan 4 benda yang bisa kamu sentuh di sekitarmu.\n\nKamu juga bisa mencoba latihan relaksasi di menu **Meditasi** ya!";
    } 
    if (p.includes('overthinking') || p.includes('pikir') || p.includes('insomnia') || p.includes('tidur') || p.includes('malam')) {
        return "Ketika **overthinking** menyerang, pikiran kita suka berisik membayangkan hal yang belum terjadi. 🧠\n\nCoba tuliskan semua isi pikiranmu di kertas (*brain dump*) atau catat beban pikiranmu di menu **Mood Tracker** agar terasa lebih ringan. Kamu sudah berusaha yang terbaik!";
    }
    if (p.includes('stres') || p.includes('burnout') || p.includes('kerja') || p.includes('kuliah') || p.includes('capek') || p.includes('tugas')) {
        return "Perasaan lelah atau **burnout** akibat tugas dan pekerjaan itu hal yang sangat wajar. 💪\n\nJangan lupa berikan dirimu jeda istirahat sejenak. Mengambil napas panjang dan istirahat **bukan berarti kamu menyerah**, tapi bentuk perhatian untuk dirimu sendiri.";
    }
    if (p.includes('hi') || p.includes('halo') || p.includes('pagi') || p.includes('malam') || p.includes('sore') || p.includes('siang') || p.includes('tes')) {
        return "Halo! 👋 Senang sekali bisa menyapamu hari ini. Bagaimana perasaanmu saat ini? Aku siap mendengarkan cerita atau keluh kesahmu. 💚";
    }
    if (p.includes('terima kasih') || p.includes('makasih') || p.includes('thanks')) {
        return "Sama-sama! 💚 Selalu ingat kalau kamu tidak sendiri. MindCare AI siap nemenin kamu 24/7 kapan pun kamu butuh!";
    }
    
    return "Terima kasih sudah berbagi denganku. 💚 Membagikan apa yang kamu rasakan adalah bentuk keberanian yang luar biasa.\n\nKamu bisa memanfaatkan fitur **Self Check** untuk mengukur kondisi emosionalmu, atau mencoba sesi **Meditasi** singkat agar pikiranmu terasa lebih tenang.";
}

// ================= 3. FUNGSIONALITAS MULTI-STEP DETAIL EVENT =================
window.goToStep = function(stepNumber) {
    const steps = document.querySelectorAll('.step-container');
    if (steps.length > 0) {
        steps.forEach(el => el.classList.remove('active'));
        const targetStep = document.getElementById('step' + stepNumber);
        if (targetStep) {
            targetStep.classList.add('active');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }
};
