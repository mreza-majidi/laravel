<?php

namespace App\Interfaces;

/**
 * Interface DirectoryNamerInterface
 *
 * @package App\Interfaces
 */
interface DirectoryNamerInterface
{
    /**
     * @return string
     */
    public function generateDirectoryName(): string;

    /**
     * @return string
     */
    public function generateFileNamePrefix(): string;

    /**
     * @param string $fileName
     *
     * @return string
     */
    public function getPathFromFileName(string $fileName): string;
}
