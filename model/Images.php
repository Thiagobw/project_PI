<?php 
class Images {
    private $id;
    private $name;

    public function setId($id) {
        $this-> ids = $id;
    }
    public function getId() {
        return $this-> id;
    }
    public function setName($name) {
        $this-> name = $name;
    }
    public function getName() {
        return $this-> name;
    }
}
?>