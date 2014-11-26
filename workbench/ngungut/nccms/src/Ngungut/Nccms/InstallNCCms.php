<?php namespace Ngungut\Nccms;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class InstallNCCms extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'nccms:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install all nccms database, asset, folder needed.';

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
	 * @return mixed
	 */
	public function fire()
	{
        //running migration command
        $this->info('Install Database Migration.');
        $this->call('migrate', ['--bench' => 'ngungut/nccms']);
        //create plugins folder
        $this->info('Creating Plugins Folder.');
        if(!is_dir(app_path() . '/plugins')){
            mkdir(app_path() . '/plugins');
        }
        //running seeding db
        $this->info('Start Seed Database.');
        $this->call('db:seed', ['--class' => 'DatabaseSeeder']);
        //publishing asset
        $this->info('Publishing Asset.');
        $this->call('asset:publish', ['package' => 'ngungut/nccms']);
        //publishing config
        $this->info('Publishing Config.');
        $this->call('config:publish', ['package' => 'ngungut/nccms']);
	}

}
