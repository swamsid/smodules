<?php

namespace Arsoft\Module\Commands;

use Arsoft\Module\config;
use Illuminate\Console\Command;

class testCommand extends Command
{
    protected $signature    = 'armodule:test {name : The name of the class}';
    protected $name         = 'armodule:test';
    protected $description  = 'Inisialisasi Module Arsoft';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $path       = app_path().'\Modules';
        $str        = file_get_contents(__DIR__.'/Stubs/moduleServiceProvider.stub');
        $argument   = explode('/', $this->argument('name'));

        if(!file_exists($path)){
            $this->info(" Modul Belum Terinisialisasi");
            $this->info(" Gunakan perintah \"php artisan armodule:init\" untuk melakukan inisialisasi.");
            return 0;
        }

        if(count($argument) != 2){
            $this->info(" -- Invalid Modul Argument -- \n");
            $this->info(" Format Argument Modul Harus Berisikan Kelompok_Modul/Nama_Modul");
            $this->info(" Contoh : php artisan armodule:make Pembelian/modul_1 \n");
            return 0;
        }

        if(!file_exists($path.'\\'.ucfirst($argument[0]))){
            $this->info(" Kelompok Modul ".ucfirst($argument[0])." Tidak Terdaftar");
            $data = '[';
            foreach(config::getParrentModules() as $key => $parrent){
                $data .= $parrent.', ';
            }
            $data .= ']';
            $this->info(" Modul Yang Terdaftar Adalah ".$data);
            return 0;
        }

        $this->info(count($argument));
        return 0;

        if(file_exists($path.'\\'.ucfirst($argument[0]).'\\'.$argument[1])){
            $this->info('Modul "'.ucfirst($argument[0]).' - '.$argument[1].'" sudah ada. Gagal melakukan inisialisasi..!');
            return 0;
        }

        if(mkdir($path.'/'.ucfirst($argument[0]).'/'.$argument[1])){
            foreach(config::getModulStructure() as $key => $parrent){
                $this->info('Generating Module/'.ucfirst($argument[0]).'/'.$argument[1].'/'.$parrent.' Complete ...');
                mkdir($path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/'.$parrent);
            }
        }

        copy(__DIR__.'/Stubs/routeServiceProvider.stub', $path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Providers/routeServiceProvider.php');
        $str = file_get_contents($path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Providers/routeServiceProvider.php');
        $str = str_replace('__defaultNamespace__', ucfirst($argument[0]).'\\'.$argument[1], $str);
        $str = str_replace('__defaultPattern__', ucfirst($argument[0]).'/'.$argument[1], $str);
        file_put_contents($path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Providers/routeServiceProvider.php', $str);

        copy(__DIR__.'/Stubs/web.stub', $path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Routes/web.php');
        $str = file_get_contents($path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Routes/web.php');
        $str = str_replace('__defaultName__', $argument[1], $str);

        file_put_contents($path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Routes/web.php', $str);

        copy(__DIR__.'/Stubs/api.stub', $path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Routes/api.php');

        copy(__DIR__.'/Stubs/index.stub', $path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Views/index.blade.php');
        $str = file_get_contents($path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Views/index.blade.php');
        $str = str_replace('__defaultContent__', ucfirst($argument[0]).' / '.$argument[1], $str, $str);

        file_put_contents($path.'/'.ucfirst($argument[0]).'/'.$argument[1].'/Views/index.blade.php', $str);

        $this->info("\nModul Berhasil Dibuat => ".$this->argument('name')."\n");
    }
}