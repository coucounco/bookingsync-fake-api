<?php

namespace App\Console\Commands;

use App\Models\Bathroom;
use App\Models\Bedroom;
use App\Models\Rental;
use Illuminate\Console\Command;

class FakeRentalsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fake:rentals {nb?} {--N|no-room}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create 1 or many fake rentals';

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
    public function handle()
    {
        $nb = $this->hasArgument('nb') ? intval($this->argument('nb')) : 1;

        $rentals = factory(Rental::class, $nb)->create();

        if(!$this->option('no-room')) {
            foreach($rentals as $rental) {
                factory(Bedroom::class, random_int(1, 3))->create(['rental_id' => $rental->id]);
                factory(Bathroom::class, random_int(1, 3))->create(['rental_id' => $rental->id]);
            }
        }
    }
}
