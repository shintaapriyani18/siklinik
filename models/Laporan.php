<?php

namespace app\models;

use yii\db\Query;

class Laporan
{
    public static function getKunjunganPerHari()
    {
        return (new Query())
            ->select(['DATE(tanggal) AS tanggal', 'COUNT(*) AS jumlah'])
            ->from('pendaftaran')
            ->groupBy(['DATE(tanggal)'])
            ->all();
    }

    public static function getTindakanTerbanyak($limit = 5)
    {
        return (new Query())
            ->select(['t.nama_tindakan', 'COUNT(*) AS jumlah'])
            ->from('tindakan_medis tm')
            ->leftJoin('tindakan t', 'tm.tindakan_id = t.id')
            ->groupBy('t.nama_tindakan')
            ->orderBy(['jumlah' => SORT_DESC])
            ->limit($limit)
            ->all();
    }

    public static function getObatTerbanyak($limit = 5)
    {
        return (new Query())
            ->select(['o.nama_obat', 'COUNT(*) AS jumlah'])
            ->from('resep_obat ro')
            ->leftJoin('obat o', 'ro.obat_id = o.id')
            ->groupBy('o.nama_obat')
            ->orderBy(['jumlah' => SORT_DESC])
            ->limit($limit)
            ->all();
    }
}
