<?php

namespace Modules\License\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\DB;
use Modules\License\Entities\License;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use App;


class LicenseExpiry extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'license:notice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Triggers a daily notification of licenses about to expire.';

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
        //get licenses that will expire in the next 30 days
        $now = Carbon::parse(Carbon::now()->format('Y-m-d'));
        $valid_licenses = License::where('status',License::LICENSE_ACTIVE)
                    ->orWhere('status',License::LICENSE_VALID)
                    ->orWhere('status',License::LICENSE_EXPIRING_SOON)
                    ->get();
        $licenses_expiring = array();
        if(!empty($valid_licenses)){
            foreach ($valid_licenses as $license){
                $expiry_date = Carbon::parse($license->expiry_date);
                $days_left_to_expiration = $now->diffInDays($expiry_date);
                echo $days_left_to_expiration."\n";
                if($days_left_to_expiration <= License::EXPIRATION_DAYS_NOTICE){
                    $licenses_expiring[] = $license;
                }
            }
            //trigger an email event here
            if(!empty($licenses_expiring)){
                $recipient = 'didwiz83@gmail.com';
                App\EmailMessages::sendExpiryNotice($licenses_expiring,$recipient);
//                Mail::to('didwiz83@gmail.com')->send(new Notification($licenses_expiring));
            }

            var_dump($licenses_expiring);
        }
        var_dump($licenses_expiring);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
//            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
//            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
