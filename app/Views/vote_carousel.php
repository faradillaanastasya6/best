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
    <section id="vote-carousel">
        <form id="kandidat-container"></form>
        <div class="vote-navigation">
            <button id="prevKandidat" style="display:none;">Sebelumnya</button>
            <button id="nextKandidat">Selanjutnya</button>
            <button id="submitVote">Submit</button>
        </div>
        <div id="terima-kasih" style="text-align: center; margin-top: 2rem; display: none;">
            <h3>Terima kasih sudah memberikan penilaian!</h3>
            <p>Vote Anda sudah tercatat</p>
        </div>
    </section>
    <!-- Vote Carousel End -->

</body>

<script>
    const kandidatData = <?= json_encode($kandidatData ?? []); ?>;
    const pertanyaan = <?= json_encode($questionsData ?? []); ?>;
    const kandidatContainer = document.getElementById("kandidat-container");
    // Pastikan ada nilai untuk kandidat
    kandidatData.forEach((k, i) => {
        // if (!k.nilai) k.nilai = Array(pertanyaan.length).fill({
        //     'id_question': k.id_question,
        //     'score': null
        // });
        k.nilai = pertanyaan.map(p => {
            return {
                'id_question': p.id_question,
                'score': 5
            }
        })
    });

    console.log(kandidatData)

    function handleChangeRating(el) {
        const employeeIndex = el.getAttribute('data-employee-index');
        const questionIndex = el.getAttribute('data-question-index');
        kandidatData[Number(employeeIndex)]['nilai'][Number(questionIndex)]['score'] = el.value;
        console.log(kandidatData[employeeIndex])
    }

    // Buat elemen untuk setiap kandidat
    kandidatData.forEach((kandidat, index) => {
        const kandidatElement = document.createElement("div");
        kandidatElement.classList.add("kandidat");
        kandidatElement.dataset.index = index;
        if (index !== 0) {
            kandidatElement.style.display = "none"; // Awalnya disembunyikan
        }
        kandidatElement.innerHTML = `
            <div class="card">
                <h3>${kandidat.name}</h3>
                <p>${kandidat.nip}</p>
                <div class="pertanyaan-container">
                    ${pertanyaan.map((q, i) => `
                        <div class="pertanyaan-item">
                            <p>${q.question}</p>
                            <div class="rating" data-index="${index}" data-question="${i}">
                                ${[1, 2, 3, 4, 5].map(j => `
                                    <label>
                                        <input type="radio" name="rating-${index}-${i}" value="${j}" class="rating-radio" data-value="${j}" data-employee-index="${index}" data-question-index="${i}" onChange="handleChangeRating(this)" checked="checked">
                                        ${j}
                                    </label>
                                `).join('')}
                            </div>
                        </div>
                    `).join('')}
                </div>
              <!--  <button class="lanjut-kandidat btn-lanjut">Lanjut</button> -->
            </div>
        `;

        kandidatContainer.appendChild(kandidatElement);
    });

    // Navigasi kandidat
    let currentKandidatIndex = 0;
    const kandidatList = document.querySelectorAll(".kandidat");

    if (currentKandidatIndex !== kandidatList.length - 1) {
        document.querySelector("#submitVote").style.display = 'none';
    }


    // Tombol Lanjut
    document.getElementById("nextKandidat").addEventListener("click", function() {
        if (currentKandidatIndex < kandidatList.length - 1) {
            console.log('next from: ', currentKandidatIndex)
            kandidatList[currentKandidatIndex].style.display = "none";
            kandidatList[currentKandidatIndex + 1].style.display = "block";
            currentKandidatIndex += +1;

            // Cek apakah sudah di kandidat terakhir
            if (currentKandidatIndex === kandidatList.length - 1) {
                document.getElementById("nextKandidat").style.display = "none";
                document.getElementById("submitVote").style.display = "inline-block";
            }

            document.getElementById("prevKandidat").style.display = "inline-block";
        }
    });

    // Tombol Sebelumnya
    document.getElementById("prevKandidat").addEventListener("click", function() {
        if (currentKandidatIndex > 0) {
            console.log('prev from: ', currentKandidatIndex)
            kandidatList[currentKandidatIndex].style.display = "none";
            kandidatList[currentKandidatIndex - 1].style.display = "block";
            currentKandidatIndex -= 1;

            // Cek jika tombol submit perlu disembunyikan
            if (currentKandidatIndex < kandidatList.length - 1) {
                document.getElementById("nextKandidat").style.display = "inline-block";
                document.getElementById("submitVote").style.display = "none";
            }
            if (currentKandidatIndex === 0) {
                document.getElementById("prevKandidat").style.display = "none";
            }
            document.getElementById("nextKandidat").style.display = "inline-block";
        }
    });

    // Submit Vote
    document.getElementById("submitVote").addEventListener("click", function() {
        document.getElementById("vote-carousel").style.display = "none";
        document.getElementById("terima-kasih").style.display = "block";
        console.log(JSON.stringify(kandidatData))

        // return;
        fetch('<?= base_url('voter/poll') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(kandidatData)
        }).catch(e => console.log(e)).finally(() => {
            window.location.replace('<?= base_url('/voter') ?>')
        })
    });
</script>



<!-- Feather Icon -->
<script>
    feather.replace();
</script>

</html>