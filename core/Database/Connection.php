<?php
namespace StelinDB\Database;

/**
 * Membuat Koneksi ke database
 */
class Connection
{
    /**
   * Fungsi untuk menyambungkan ke database
   */
    public static function Connect()
    {
        try {
            return new \PDO('mysql:dbname=cerdas;host=localhost', 'root', '');
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
