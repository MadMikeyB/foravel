<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\ModelMakeCommand as ModelMakeCommand;

class MakeModelCommand extends ModelMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:model {model : The name of the Model} {--directory= : The directory to store the model in. (optional)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an Eloquent Model in a given directory';
    
    /**
     * The filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @param Illuminate\Filesystem\Filesystem
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        if ($this->option('directory')) {
            // do something with directory to make it mac / windows friendly
            // $model = $this->option('directory') .'/'. $this->argument('model')

            // call make:model or just parent::fire();
            // $this->call('make:model', ['model' => $model]);
        }
    }


}
