<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Best Employee Selection Tool</title>

    <!-- Poppin Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;800&display=swap"
        rel="stylesheet" />

    <!-- Feather Icon  -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="/asset/style-voter.css" />
</head>

<body>
    <!-- Vote Carousel Start -->
    <section id="vote-carousel" style="display:none;">
        <div id="kandidat-container"></div>
        <div class="vote-navigation">
            <button id="prevKandidat" style="display: none;">Sebelumnya</button>
            <button id="nextKandidat">Selanjutnya</button>
            <button id="submitVote" style="display: none;">Submit</button>
        </div>
        <div id="terima-kasih" style="display: none; text-align: center; margin-top: 2rem;">
            <h3>Terima kasih sudah memberikan penilaian!</h3>
            <p>Vote Anda sudah tercatat</p>
        </div>
    </section>
    <!-- Vote Carousel End -->

</body>

<script>
    const pertanyaan = [
        "Apakah kandidat mampu bekerja sama dalam tim?",
        "Apakah kandidat menunjukkan inisiatif tinggi?",
        "Seberapa baik kemampuan komunikasi kandidat?",
        "Apakah kandidat mampu menyelesaikan tugas tepat waktu?",
        "Seberapa baik kandidat dalam memecahkan masalah?",
        "Apakah kandidat memiliki sikap positif dalam bekerja?",
        "Seberapa baik kandidat memahami tugas pekerjaannya?",
        "Apakah kandidat disiplin dalam bekerja?",
        "Seberapa proaktif kandidat dalam menyampaikan ide?",
        "Apakah kandidat dapat diandalkan dalam kondisi darurat?",
        "Apakah kandidat menunjukkan kepemimpinan yang baik?",
        "Apakah kandidat cepat beradaptasi dengan perubahan?",
        "Apakah kandidat menjaga etika kerja dengan baik?",
        "Apakah kandidat memberikan kontribusi nyata bagi tim?",
        "Apakah kandidat mampu menyelesaikan konflik dengan baik?",
        "Apakah kandidat memiliki semangat kerja tinggi?",
        "Apakah kandidat memiliki pemahaman teknis yang baik?",
        "Apakah kandidat menerima umpan balik dengan baik?",
        "Apakah kandidat konsisten dalam performanya?",
        "Apakah kandidat memiliki kreativitas dalam bekerja?",
        "Apakah kandidat bisa menjadi role model bagi rekan kerja?"
    ];

    const kandidatData = <?= json_encode($kandidatData ?? []); ?>;
    const kandidatContainer = document.getElementById("kandidat-container");

    // Pastikan ada nilai untuk kandidat
    kandidatData.forEach(k => {
        if (!k.nilai) k.nilai = Array(pertanyaan.length).fill(null);
    });

    // Buat elemen untuk setiap kandidat
    kandidatData.forEach((kandidat, index) => {
        const kandidatElement = document.createElement("div");
        kandidatElement.classList.add("kandidat");
        kandidatElement.dataset.index = index;
        kandidatElement.style.display = "none"; // Awalnya disembunyikan

        kandidatElement.innerHTML = `
            <div class="card">
                <h3>${kandidat.nama}</h3>
                <p>${kandidat.jabatan}</p>
                <div class="pertanyaan-container">
                    ${pertanyaan.map((q, i) => `
                        <div class="pertanyaan-item">
                            <p>${q}</p>
                            <div class="rating" data-index="${index}" data-question="${i}">
                                ${[1, 2, 3, 4, 5].map(j => `
                                    <label>
                                        <input type="radio" name="rating-${index}-${i}" value="${j}" class="rating-radio" data-value="${j}">
                                        ${j}
                                    </label>
                                `).join('')}
                            </div>
                        </div>
                    `).join('')}
                </div>
                <button class="lanjut-kandidat btn-lanjut">Lanjut</button>
            </div>
        `;

        kandidatContainer.appendChild(kandidatElement);
    });

    // Tombol Mulai Voting
    document.getElementById("mulai-voting").addEventListener("click", function() {
        // Sembunyikan bagian voting awal, tampilkan carousel voting
        document.getElementById("vote-section").style.display = "none";
        document.getElementById("vote-carousel").style.display = "block";

        // Tampilkan kandidat pertama
        const kandidatList = document.querySelectorAll(".kandidat");
        if (kandidatList.length > 0) {
            kandidatList[0].style.display = "block";
        }

        // Atur navigasi
        document.getElementById("prevKandidat").style.display = "none";
        document.getElementById("nextKandidat").style.display = "inline-block";
        document.getElementById("submitVote").style.display = "none";
    });

    // Navigasi kandidat
    let currentKandidatIndex = 0;
    const kandidatList = document.querySelectorAll(".kandidat");

    // Tombol Lanjut
    document.querySelectorAll(".lanjut-kandidat").forEach((button, index) => {
        button.addEventListener("click", function() {
            if (index < kandidatList.length - 1) {
                kandidatList[index].style.display = "none";
                kandidatList[index + 1].style.display = "block";
                currentKandidatIndex = index + 1;

                // Cek apakah sudah di kandidat terakhir
                if (currentKandidatIndex === kandidatList.length - 1) {
                    document.getElementById("nextKandidat").style.display = "none";
                    document.getElementById("submitVote").style.display = "inline-block";
                }

                document.getElementById("prevKandidat").style.display = "inline-block";
            }
        });
    });

    // Tombol Sebelumnya
    document.getElementById("prevKandidat").addEventListener("click", function() {
        if (currentKandidatIndex > 0) {
            kandidatList[currentKandidatIndex].style.display = "none";
            currentKandidatIndex--;
            kandidatList[currentKandidatIndex].style.display = "block";

            // Cek jika tombol submit perlu disembunyikan
            if (currentKandidatIndex < kandidatList.length - 1) {
                document.getElementById("nextKandidat").style.display = "inline-block";
                document.getElementById("submitVote").style.display = "none";
            }
        }

        if (currentKandidatIndex === 0) {
            document.getElementById("prevKandidat").style.display = "none";
        }
    });

    // Submit Vote
    document.getElementById("submitVote").addEventListener("click", function() {
        // Tampilkan pesan terima kasih
        document.getElementById("vote-carousel").style.display = "none";
        document.getElementById("terima-kasih").style.display = "block";
    });
</script>



<!-- Feather Icon -->
<script>
    feather.replace();
</script>

</html>