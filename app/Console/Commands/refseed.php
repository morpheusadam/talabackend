<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class refseed extends Command
{
      /**
        * The name and signature of the console command.
        *
        * @var string
        */
        protected $signature = 'refseed';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Run migrations and seed the database for the application and specified modules';

        /**
         * Execute the console command.
         *
         * @return int
         */
        public function handle()
        {
            // Run the main application migrations and seed
            $this->call('migrate:fresh', ['--seed' => true]);

            // Run the module migrations and seed for Auth
            $this->call('module:migrate-refresh', ['--seed' => true, 'module' => 'Auth']);

            // Run the module migrations and seed for Mag
          //  $this->call('module:migrate-refresh', ['--seed' => true, 'module' => 'Mag']);

            $this->info('All migrations and seeders have been run successfully.');

            return 0;
        }
    }
