-- menampilkan dan menghitung skor dan jumlah dan order by jumlah tertinggi dan where idBea
CREATE VIEW skor_mahasiswa AS
SELECT pendaftar.nim nimMhs, identitas_mhs.namaLengkap, pendaftar.idBea, bea.namaBeasiswa, pendaftar.ipk, (
    SELECT SUM(set_sub_kategori_skor.skor)
    FROM pendaftar
    RIGHT JOIN pendaftar_skor ON pendaftar.id=pendaftar_skor.idPendaftar
    LEFT JOIN kategori_skor ON pendaftar_skor.idKategori=kategori_skor.id
    LEFT JOIN set_sub_kategori_skor ON pendaftar_skor.idSubKategori=set_sub_kategori_skor.id
    WHERE pendaftar.nim=nimMhs
) skor, (
    SELECT SUM(set_sub_kategori_skor.skor)+pendaftar.ipk
    FROM pendaftar
    RIGHT JOIN pendaftar_skor ON pendaftar.id=pendaftar_skor.idPendaftar
    LEFT JOIN kategori_skor ON pendaftar_skor.idKategori=kategori_skor.id
    LEFT JOIN set_sub_kategori_skor ON pendaftar_skor.idSubKategori=set_sub_kategori_skor.id
    WHERE pendaftar.nim=nimMhs
) jumlah,
pendaftar.status, pendaftar.waktuDiubah updated
FROM pendaftar
LEFT JOIN bea ON pendaftar.idBea=bea.id
LEFT JOIN identitas_mhs ON pendaftar.nim=identitas_mhs.nimMhs
ORDER BY jumlah DESC
