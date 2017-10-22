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
            return new \PDO("{$_ENV['DRIVER']}:dbname={$_ENV['DBNAME']};host={$_ENV['HOST']}", $_ENV['USERDB'], $_ENV['PASSWORD']);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
