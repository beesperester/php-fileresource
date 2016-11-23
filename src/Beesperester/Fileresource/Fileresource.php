<?php

namespace Beesperester\Fileresource;

class Fileresource {

    public function __construct($path) {
        $this->path = $path;
        $this->dirname = '';
        $this->basename = '';
        $this->extension = '';
        $this->filename = '';

        foreach(pathinfo($this->path) as $key => $value) {
            $this->{$key} = $value;
        }

        #list($this->dirname, $this->basename, $this->extension, $this->filename) = pathinfo($path);
    }

    public function __toString() {
        return $this->path;
    }

    public function filesize() {
        if (is_file($this->path)) {
            return filesize($this->path);
        }

        return 0;
    }

    public static function create($filepath) {
        return new static($filepath);
    }
}
