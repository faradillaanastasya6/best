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
    const kandidatWrapper = document.getElementById("kandidat-wrapper");

    kandidatData.forEach((kandidat, index) => {
        const kandidatElement = document.createElement("div");
        kandidatElement.classList.add("kandidat");
        kandidatElement.dataset.index = index;
        kandidatElement.style.display = "none"; // Semua kandidat disembunyikan di awal

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

        kandidatWrapper.appendChild(kandidatElement);
    });

    kandidatContainer.addEventListener("change", function(e) {
        if (e.target.classList.contains("rating-radio")) {
            const radio = e.target;
            const ratingValue = parseInt(radio.value);
            const ratingDiv = radio.closest(".rating");
            const kandidatIndex = parseInt(ratingDiv.dataset.index);
            const questionIndex = parseInt(ratingDiv.dataset.question);

            // Simpan nilai
            kandidatData[kandidatIndex].nilai[questionIndex] = ratingValue;

            // Tambahkan class untuk menandai bahwa rating telah dipilih
            radio.parentElement.querySelectorAll("label").forEach((label) => {
                label.classList.toggle("selected", parseInt(label.querySelector("input").value) <= ratingValue);
            });
        }
    });
</script>

<!-- Feather Icon -->
<script>
    feather.replace();
</script>

</html>