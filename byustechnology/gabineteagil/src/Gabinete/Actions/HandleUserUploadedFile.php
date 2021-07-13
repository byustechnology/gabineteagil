<?php

namespace ByusTechnology\Gabinete\Actions;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class HandleUserUploadedFile
{

    protected $maxFilenameLength = 32;

    public $file;

    public $slug;

    public $extension;

    public $sluggedFilename;

    public $mime;

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
        $this->slug = Str::limit(Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)), $this->maxFilenameLength, '') . '-' . Str::random(12);
        $this->extension = $file->extension();
        $this->sluggedFilename = $this->slug . '.' . $this->extension;
        $this->mime = $file->getClientMimeType();
    }

    public function setMaxFilenameLength($length)
    {
        $this->maxFilenameLength = $length;
    }

    public function getMaxFilenameLength()
    {
        return $this->maxFilenameLength;
    }

}