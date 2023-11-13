<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GiveNumber extends Command
{
    /**
     * Acceptable range constanst
     */
    const ACCEPTABE_MIN_VALUE = 1;
    const ACCEPTABE_MAX_VALUE = PHP_INT_MAX;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:give-number {min=' .self::ACCEPTABE_MIN_VALUE. ': The minimum integer value} {max=' .self::ACCEPTABE_MAX_VALUE. ' : The maximum integer value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Outputs numbers between the minimum and maximum values';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->validateNumericArgs($this->argument('min'), $this->argument('max'));

        $min = (int) $this->argument('min');
        $max = (int) $this->argument('max');

        $this->validateRange($min, $max);

        for ($i = $min; $i <= $max; $i++) {
            $this->info($i);
        }
    }

    private function validateNumericArgs($min, $max) 
    {
        if (!is_numeric($min) || !is_numeric($max)) {
            $this->error('The range values must be numeric');
            exit(1);
        }
    }

    private function validateRange($min, $max) 
    {
        if ($min < self::ACCEPTABE_MIN_VALUE) {
            $this->error('The minimum value must be at least ' . self::ACCEPTABE_MIN_VALUE);
            exit(1);
        }
        if ($max < $min || $max > self::ACCEPTABE_MAX_VALUE) {
            $this->error('The maximum value must be at least the given minimum value and no more than ' . self::ACCEPTABE_MAX_VALUE);
            exit(1);
        }
    }
}
