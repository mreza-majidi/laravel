<?php

namespace App\Factories;

use App\Interfaces\DirectoryNamerInterface;
use App\Services\FileManagement\DirectoryNamers\TwoCharsDirectoryNamer;

/**
 * Class DirectoryNamerFactory
 *
 * @package App\Factories
 */
class DirectoryNamerFactory implements DirectoryNamerInterface
{
    /**
     * @var DirectoryNamerInterface|null
     */
    private ?DirectoryNamerInterface $activeNamer;

    /**
     * DirectoryNamerFactory constructor.
     */
    public function __construct()
    {
        $this->activeNamer = $this->getActiveDriver();
    }

    /**
     * @return string
     */
    public function generateDirectoryName(): string
    {
        return $this->activeNamer->generateDirectoryName();
    }

    /**
     * @return string
     */
    public function generateFileNamePrefix(): string
    {
        return $this->activeNamer->generateFileNamePrefix();
    }

    /**
     * @param string $fileName
     *
     * @return string
     */
    public function getPathFromFileName(string $fileName): string
    {
        return $this->activeNamer->getPathFromFileName($fileName);
    }

    /**
     * We could check current active namer from environment variables, config or sth else.
     * Instead of directly return the default directory namer
     *
     * @return DirectoryNamerInterface
     */
    private function getActiveDriver(): DirectoryNamerInterface
    {
        return new TwoCharsDirectoryNamer();
    }
}
