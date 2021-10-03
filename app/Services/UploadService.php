<?php

namespace App\Services;

use App\Models\Media;
use App\Traits\InteractsWithMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class UploadService
 *
 * @package App\Services
 */
class UploadService extends BaseService
{
    /**
     * @param UploadedFile $uploadedFile
     *
     * @return Media|null
     */
    public function upload(UploadedFile $uploadedFile): ?Media
    {
        $fileExtension = strtolower($uploadedFile->getClientOriginalExtension());
        $fileName      = fileService()->generateFileName($fileExtension);
        $filePath      = $this->doUploadFile($uploadedFile, $fileName);

        if ($filePath) {
            return $this->storeMediaInDatabase($fileName, $uploadedFile->getSize(), $fileExtension);
        }

        return null;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param Model        $owner
     *
     * @return Media
     *
     * @throws \InvalidArgumentException
     */
    public function uploadFileWithOwner(UploadedFile $uploadedFile, Model $owner): Media
    {
        if ($owner) {
            if ($this->checkInteractsWithMediaTrait($owner)) {
                return $this->handleUploadOperation($uploadedFile, $owner);
            }

            throw new \InvalidArgumentException(\sprintf('The %s class is not using %s trait.', \get_class($owner), InteractsWithMediaTrait::class));
        }

        throw new \InvalidArgumentException(\sprintf('The second parameter ( %s ) should be a class which extends %s, null given.', '$owner', 'Illuminate\Database\Eloquent\Model'));
    }

    /**
     * @param Model $owner
     *
     * @return boolean
     */
    public function checkInteractsWithMediaTrait(Model $owner): bool
    {
        return \in_array(InteractsWithMediaTrait::class, \class_uses($owner));
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param string       $fileName
     *
     * @return false|string
     */
    private function doUploadFile(UploadedFile $uploadedFile, string $fileName): string
    {
        return Storage::putFileAs(fileService()->getPermanentPath(), $uploadedFile, $fileName);
    }

    /**
     * @param string  $fileName
     * @param integer $size
     * @param string  $fileExtension
     *
     * @return Media
     */
    private function storeMediaInDatabase(string $fileName, int $size, string $fileExtension): Media
    {
        $media            = new Media();
        $media->file_name = $fileName;
        $media->extension = $fileExtension;
        $media->size      = $size;
        $media->save();
        $media->refresh();

        return $media;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param Model        $owner
     *
     * @return Media
     *
     * @throws \Exception
     */
    private function handleUploadOperation(UploadedFile $uploadedFile, Model $owner): Media
    {
        $media = $this->upload($uploadedFile);

        return $this->handleAfterUpload($media, $owner);
    }

    /**
     * @param Model $owner
     * @param Media $media
     *
     * @return Media
     *
     * @throws \Exception
     */
    private function saveMediaToModel(Model $owner, Media $media): Media
    {
        $owner->media()->save($media);

        return $media;
    }

    /**
     * @param Media|null $media
     * @param Model      $owner
     *
     * @return Media
     *
     * @throws \LogicException
     */
    private function handleAfterUpload(?Media $media, Model $owner): Media
    {
        if ($media) {
            return $this->saveMediaToModel($owner, $media);
        }

        throw new \LogicException('Unable to finish upload operation.');
    }
}
