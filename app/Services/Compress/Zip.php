<?php declare(strict_types=1);

namespace App\Services\Compress;

use ZipArchive;
use App\Services\Filesystem\Directory;

class Zip
{
    /**
     * @var string
     */
    protected string $folder;

    /**
     * @var array
     */
    protected array $extensions;

    /**
     * @var int
     */
    protected int $time;

    /**
     * @param string $folder
     * @param array $extensions
     * @param string $date
     *
     * @return self
     */
    public function __construct(string $folder, array $extensions, string $date)
    {
        $this->folder = $folder;
        $this->extensions = $extensions;
        $this->time = strtotime($date);
    }

    /**
     * @return void
     */
    public function compress(): void
    {
        foreach (Directory::files($this->folder, $this->extensions, ['zip']) as $file) {
            $this->file($file);
        }
    }

    /**
     * @param string $file
     *
     * @return void
     */
    protected function file(string $file): void
    {
        if (filemtime($file) < $this->time) {
            $this->pack($file);
        }
    }

    /**
     * @param string $file
     *
     * @return void
     */
    protected function pack(string $file): void
    {
        $zip = new ZipArchive();

        if ($zip->open($file.'.zip', ZIPARCHIVE::CREATE) !== true) {
            return;
        }

        $zip->addFile($file, basename($file));

        if ($zip->close()) {
            unlink($file);
        }
    }
}
