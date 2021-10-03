<?php

namespace App\Services\FileManagement;

use App\Constants\FileConstants;
use App\Interfaces\DirectoryNamerInterface;
use App\Services\BaseService;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChain;

/**
 * Class FileService
 *
 * @package App\Services
 */
class FileService extends BaseService
{
    /**
     * @var DirectoryNamerInterface
     */
    private DirectoryNamerInterface $directoryNamer;

    /**
     * FileService constructor.
     *
     * @param DirectoryNamerInterface $directoryNamer
     */
    public function __construct(DirectoryNamerInterface $directoryNamer)
    {
        parent::__construct();
        $this->directoryNamer = $directoryNamer;
    }


    /**
     * @param string|null $directoryPath
     *
     * @return string
     */
    public function getTempPath(string $directoryPath = null)
    {
        if (!$directoryPath) {
            $directoryPath = $this->generateDirectoryName();
        }

        return \sprintf(FileConstants::TEMPORARY_PATH, $directoryPath);
    }

    /**
     * @param string|null $directoryPath
     *
     * @return string
     */
    public function getPermanentPath(string $directoryPath = null)
    {
        if (!$directoryPath) {
            $directoryPath = $this->generateDirectoryName();
        }

        return \sprintf(FileConstants::PERMANENT_PATH, $directoryPath);
    }

    /**
     * @return string
     */
    public function generateDirectoryName()
    {
        return $this->directoryNamer->generateDirectoryName();
    }

    /**
     * @param string $fileExtension
     *
     * @return string
     */
    public function generateFileName(string $fileExtension)
    {
        $fileNamePrefix = $this->directoryNamer->generateFileNamePrefix().'%s.%s';

        return \sprintf($fileNamePrefix, \generateRandomString(4), $fileExtension);
    }

    /**
     * @param string $extension
     *
     * @return boolean
     */
    public function checkIfImage(string $extension): bool
    {
        $compressibleExtensions = ['jpeg', 'bmp', 'png', 'gif', 'jpg', 'svg'];

        return \in_array($extension, $compressibleExtensions);
    }

    /**
     * @param string $filePath
     *
     * @return integer
     *
     * @throws \LogicException
     */
    public function getFileSize(string $filePath): int
    {
        if (File::exists($filePath)) {
            return File::size($filePath);
        }
        throw new \LogicException(\sprintf('No file was found at %s', $filePath));
    }

    /**
     * @param string $filePath
     *
     * @return boolean
     *
     * @throws \LogicException
     */
    public function removeFile(string $filePath): bool
    {
        if (File::exists($filePath)) {
            return File::delete($filePath);
        }
        throw new \LogicException(\sprintf('No file was found at %s', $filePath));
    }

    /**
     * @param string $filePath
     */
    public function compressImage(string $filePath)
    {
        if (File::exists($filePath)) {
            app(OptimizerChain::class)->optimize($filePath);
        }
    }

    /**
     * @param string $originalFilePath
     * @param string $thumbnailFilePath
     *
     * @return \Intervention\Image\Image|null
     */
    public function createThumbnail(string $originalFilePath, string $thumbnailFilePath): ?\Intervention\Image\Image
    {
        if (File::exists($originalFilePath)) {
            $thumbnail = Image::make($originalFilePath)->fit(FileConstants::THUMBNAIL_WIDTH, FileConstants::THUMBNAIL_HEIGHT);

            return $thumbnail->save($thumbnailFilePath);
        }

        return null;
    }

    /**
     * @param string $originalFilePath
     * @param string $thumbnailFilePath
     *
     * @return \Intervention\Image\Image
     */
    public function createThumbnailWithCompression(string $originalFilePath, string $thumbnailFilePath): \Intervention\Image\Image
    {
        $image = $this->createThumbnail($originalFilePath, $thumbnailFilePath);

        $this->compressImage($thumbnailFilePath);

        return $image;
    }
}
