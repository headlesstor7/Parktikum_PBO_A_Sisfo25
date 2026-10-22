<?php

class DatabaseConnection
{
    private static $connection = null;

    // constructor private supaya tidak bisa dibuat dengan new
    private function __construct()
    {
    }

    public static function getConnection()
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=localhost;dbname=materi_pdo;charset=utf8",
                    "root",
                    ""
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Koneksi gagal!");
            }
        }

        return self::$connection;
    }
}
