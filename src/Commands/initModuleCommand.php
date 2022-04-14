<?php

namespace Swamsid\Smodules\Commands;

use Illuminate\Console\Command;

class initModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smodules:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inisialisasi Modul';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = app_path('Modules');

        // validate directory
        if (file_exists($path)) {
            $this->info('Direktori Modules sudah ada. Gagal melakukan inisialisasi');
            return false;
        }

        // make parent directory
        mkdir($path);
        // copy module service-provider
        copy(
            __DIR__ . DIRECTORY_SEPARATOR . 'Stubs' . DIRECTORY_SEPARATOR . 'moduleServiceProvider.php', 
            $path . DIRECTORY_SEPARATOR . 'moduleServiceProvider.php'
        );

        $this->info('Modul berhasil diinisialisasi');
        $this->info('Selanjutnya Tambahkan \'App\Modules\moduleServiceProvider::class\' pada file config/app.php');
        return false;
    }
}
