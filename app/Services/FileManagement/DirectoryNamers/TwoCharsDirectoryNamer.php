<?php

namespace App\Services\FileManagement\DirectoryNamers;

use App\Interfaces\DirectoryNamerInterface;
use DateTime;

/**
 * Class TwoCharsDirectoryNamer
 *
 * @package App\Services\FileManagement\DirectoryNamers
 */
class TwoCharsDirectoryNamer implements DirectoryNamerInterface
{
    /**
     * @return string
     */
    public function generateDirectoryName(): string
    {
        $dateTime = $this->generateFileNamePrefix(); // 2020121821
        $path     = $this->generatePathFromDateTimePrefix($dateTime);

        return $path;
    }

    /**
     * @return string
     */
    public function generateFileNamePrefix(): string
    {
        $dateTime = (new DateTime())->format('YmdH');

        return $dateTime;
    }

    /**
     * @param string $fileName
     *
     * @return string
     */
    public function getPathFromFileName(string $fileName): string
    {
        $dateTimePrefix = substr($fileName, 0, 10);

        return $this->generatePathFromDateTimePrefix($dateTimePrefix);
    }

    /**
     * @param string $dateTime
     *
     * @return string
     */
    private function generatePathFromDateTimePrefix(string $dateTime): string
    {
        $date = str_split($dateTime, 2);  // ['20', '20', '12, '18', '21']
        $path = implode(DIRECTORY_SEPARATOR, $date);            // 20/20/12/18/21

        return $path;
    }
}
