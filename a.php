<?php
class Sewa {
    public $nama;
    public $diskon;
    public $hargaRental;
    public $pajak;
    public $member;
    public $hari;

    public function __construct($nama, $hari, $diskon = 5, $hargaRental = 80000, $pajak = 5000, $member = ['ziyad', 'hantu', 'ambatron']) {
        $this->nama = $nama;
        $this->diskon = $diskon;
        $this->hargaRental = $hargaRental;
        $this->pajak = $pajak;
        $this->member = $member;
        $this->hari = $hari;
    }

    public function setHarga() {
        return $this->hargaRental * $this->hari;
    }

    public function setDiskon() {
        return ($this->diskon / 100) * $this->setHarga();
    }

    public function isMember() {
        return in_array($this->nama, $this->member);
    }

    public function setPajak() {
        if ($this->isMember()) {
            return ($this->setHarga() + $this->pajak) - $this->setDiskon();
        } else {
            return $this->setHarga() + $this->pajak;
        }
    }
}
?>
