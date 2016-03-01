<?php namespace App\Console\Commands;

use App\Models\Loginserver\AccountData;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class EventReset extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'event:reset';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Reset Event vote';

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
		//
	}

	public function handle()
	{
		// Select the best voter and add 200 real
		$bestVoter = AccountData::orderBy('vote', 'desc')->take(1)->increment('real', 200);

		// Reset all vote count
		AccountData::where('vote', '>', 0)->update(['vote' => 0]);
	}

}
