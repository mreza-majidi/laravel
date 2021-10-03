<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

/**
 * Class MakeServiceCommand
 *
 * @package App\Console\Commands
 */
class MakeServiceCommand extends GeneratorCommand
{
    private string $helperFunctionTemplate = "
if (!function_exists('{{functionName}}')) {
    /**
     * @return \\{{classFQN}}
     */
    function {{functionName}}(): \\{{classFQN}}
    {
        return resolve('{{serviceName}}');
    }
}
";

    private string $serviceProviderTemplate = '$this->app->bind(\'{{serviceName}}\', \\{{classFQN}}::class);';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $parentCall = parent::handle();
        if ($parentCall !== false) {
            $this->addHelperFunction();
            $this->addToServiceProvider();
        }
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/service.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param string $stub
     *
     * @return string
     */
    protected function resolveStubPath(string $stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.$stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace) //phpcs:ignore
    {
        return $rootNamespace.'\Services';
    }

    /**
     * @return string|string[]
     */
    private function getHelperFunctionData()
    {
        $renderedText = $this->replaceFunctionName($this->helperFunctionTemplate);
        $renderedText = $this->replaceClassFqn($renderedText);
        $renderedText = $this->replaceServiceName($renderedText);

        return $renderedText;
    }

    /**
     * @return string
     */
    private function getFunctionName()
    {
        $serviceName = $this->getNameInput();

        return lcfirst($serviceName);
    }

    /**
     * @return string
     */
    private function getClassFqn()
    {
        return $this->qualifyClass($this->getNameInput());
    }

    /**
     * @param string $value
     *
     * @return string|string[]
     */
    private function replaceFunctionName(string $value)
    {
        return str_replace(
            '{{functionName}}',
            $this->getFunctionName(),
            $value
        );
    }

    /**
     * @param string $value
     *
     * @return string|string[]
     */
    private function replaceClassFqn(string $value)
    {
        return str_replace(
            '{{classFQN}}',
            $this->getClassFqn(),
            $value
        );
    }

    /**
     * @param string $value
     *
     * @return string|string[]
     */
    private function replaceServiceName(string $value)
    {
        return str_replace(
            '{{serviceName}}',
            $this->getNameInput(),
            $value
        );
    }

    /**
     *
     */
    private function addHelperFunction(): void
    {
        $helperFilePath = base_path('app/Helpers/helpers.php');
        file_put_contents($helperFilePath, $this->getHelperFunctionData(), FILE_APPEND | LOCK_EX);
    }

    /**
     *
     */
    private function addToServiceProvider(): void
    {
        $newProviderTemplate          = $this->replaceServiceName($this->serviceProviderTemplate);
        $newProviderTemplate          = $this->replaceClassFqn($newProviderTemplate);
        $appServiceProviderPath       = base_path('app/Providers/AppServiceProvider.php');
        $content                      = file_get_contents($appServiceProviderPath);
        $stringToFind                 = "    private function bindServices()
    {";
        $lastServicePosition          = strrpos($content, $stringToFind) + strlen($stringToFind);
        $stringToAppend               = PHP_EOL.'        '.$newProviderTemplate;
        $newAppServiceProviderContent = substr_replace($content, $stringToAppend, $lastServicePosition, 0);
        file_put_contents($appServiceProviderPath, $newAppServiceProviderContent);
    }
}
