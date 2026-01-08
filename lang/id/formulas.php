<?php

return [
    'title' => 'Rumus Matematika',
    'subtitle' => 'Klik kategori untuk melihat rumus.',
    'categories' => [
        'algebra' => [
            'title' => 'Aljabar',
            'formulas' => [
                ['title' => 'Rumus ABC (Kuadrat)', 'desc' => 'a,b,c: koefisien'],
                ['title' => 'Selisih Kuadrat', 'desc' => 'a,b: suku'],
                ['title' => 'Persamaan Garis', 'desc' => 'm: gradien, b: titik potong y'],
                ['title' => 'Deret Aritmatika', 'desc' => 'Sn: Jumlah, a: suku pertama, d: beda, n: banyak suku'],
                ['title' => 'Deret Geometri', 'desc' => 'r: rasio umum'],
                ['title' => 'Sifat Eksponen', 'desc' => 'a: basis, m,n: pangkat'],
            ]
        ],
        'geometry' => [
            'title' => 'Geometri',
            'formulas' => [
                ['title' => 'Luas Lingkaran', 'desc' => 'A: Luas, r: jari-jari'],
                ['title' => 'Teorema Pythagoras', 'desc' => 'a,b: sisi siku-siku, c: sisi miring'],
                ['title' => 'Volume Silinder', 'desc' => 'V: Volume, r: jari-jari, h: tinggi'],
                ['title' => 'Luas Segitiga', 'desc' => 'b: alas, h: tinggi'],
                ['title' => 'Volume Bola', 'desc' => 'r: jari-jari'],
                ['title' => 'Volume Kerucut', 'desc' => 'r: jari-jari, h: tinggi'],
            ]
        ],
        'trigonometry' => [
            'title' => 'Trigonometri',
            'formulas' => [
                ['title' => 'Identitas', 'desc' => 'θ: sudut'],
                ['title' => 'Aturan Sinus', 'desc' => 'a,b,c: sisi, A,B,C: sudut di hadapan'],
                ['title' => 'Aturan Cosinus', 'desc' => 'C: sudut di hadapan sisi c'],
                ['title' => 'Identitas Tangen', 'desc' => 'θ: sudut'],
                ['title' => 'Sudut Rangkap', 'desc' => 'θ: sudut'],
            ]
        ],
        'calculus' => [
            'title' => 'Kalkulus',
            'formulas' => [
                ['title' => 'Aturan Pangkat', 'desc' => 'n: konstanta pangkat'],
                ['title' => 'Integral Parsial', 'desc' => 'u,v: fungsi terdiferensiasi'],
                ['title' => 'Aturan Perkalian', 'desc' => 'u,v: fungsi dari x'],
                ['title' => 'Aturan Pembagian', 'desc' => 'u,v: fungsi dari x'],
                ['title' => 'Aturan Rantai', 'desc' => 'y: fungsi u, u: fungsi x'],
            ]
        ],
        'statistics' => [
            'title' => 'Statistika',
            'formulas' => [
                ['title' => 'Rata-rata (Mean)', 'desc' => 'μ: mean, Σx: jumlah nilai, n: jumlah data'],
                ['title' => 'Peluang', 'desc' => 'P(A): Peluang A, n(S): Ruang sampel'],
                ['title' => 'Varians', 'desc' => 'σ²: varians, μ: rata-rata'],
                ['title' => 'Simpangan Baku', 'desc' => 'σ: standar deviasi'],
            ]
        ],
        'logarithms' => [
            'title' => 'Logaritma',
            'formulas' => [
                ['title' => 'Aturan Perkalian', 'desc' => 'a,b: bilangan positif'],
                ['title' => 'Aturan Pangkat', 'desc' => 'b: eksponen'],
                ['title' => 'Aturan Pembagian', 'desc' => 'a,b: bilangan positif'],
            ]
        ],
        'physics' => [
            'title' => 'Fisika',
            'formulas' => [
                ['title' => 'Hukum Newton II', 'desc' => 'F: Gaya, m: Massa, a: Percepatan'],
                ['title' => 'Energi Kinetik', 'desc' => 'm: Massa, v: Kecepatan'],
                ['title' => 'Energi Einstein', 'desc' => 'E: Energi, m: Massa, c: Kecepatan Cahaya'],
                ['title' => 'Hukum Ohm', 'desc' => 'V: Tegangan, I: Arus, R: Hambatan'],
                ['title' => 'Daya Listrik', 'desc' => 'P: Daya, V: Tegangan, I: Arus'],
                ['title' => 'Massa Jenis', 'desc' => 'ρ: Massa Jenis, m: Massa, V: Volume'],
            ]
        ],
        'finance' => [
            'title' => 'Keuangan',
            'formulas' => [
                ['title' => 'Bunga Tunggal', 'desc' => 'I: Bunga, P: Pokok, r: Suku Bunga, t: Waktu'],
                ['title' => 'Bunga Majemuk', 'desc' => 'A: Jumlah Akhir, n: frekuensi bunga'],
                ['title' => 'Nilai Masa Depan', 'desc' => 'FV: Nilai Depan, PV: Nilai Sekarang'],
            ]
        ],
    ]
];
