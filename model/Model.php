<?php

class Model {
    private string $description;

    public function setDescription ($description) {
        return $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }
}