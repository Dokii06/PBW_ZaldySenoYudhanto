<?php

class Book {
    private $code_book;
    private $name;
    private $qty;
    
    // Setter private
    private function setCodeBook($code_book) {
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            echo "Error: Format code_book harus berupa 2 huruf kapital diikuti 2 angka (contoh: BB00).\n";
        }
    }
    
    // Getter
    public function getCodeBook() {
        return $this->code_book;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getQty() {
        return $this->qty;
    }

    private function setQty($qty) {
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            echo "Error: Jumlah buku harus berupa angka integer positif.\n";
        }
    }

    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book);
        $this->name = $name;
        $this->setQty($qty);
    }
}

// Pengujian:
$book1 = new Book("BB01", "Pemrograman PHP", 10);
$book2 = new Book("AB12", "Dasar Java", 5);

echo "Kode Buku 1: " . $book1->getCodeBook() . "\n";
echo "Nama Buku 1: " . $book1->getName() . "\n";
echo "Jumlah Buku 1: " . $book1->getQty() . "\n";

echo "Kode Buku 2: " . $book2->getCodeBook() . "\n";
echo "Nama Buku 2: " . $book2->getName() . "\n";
echo "Jumlah Buku 2: " . $book2->getQty() . "\n";

// Pengujian dengan format kode buku yang salah
$book3 = new Book("BB1", "Pemrograman Python", 7); // Format salah
$book4 = new Book("BB02", "Pemrograman C++", -5); // Jumlah buku salah

// Pegujian setter tidak bisa karena private hanya bisa diakses dari dalam class
?>
