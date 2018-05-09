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
use Modules\License\Repositories\MailList\MailListRepositoryInterface as MailListRepoInterface;



class LicenseExpiry extends Command
{

    private $mailListRepo;

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

    const DEFAULT_MAIL_RECIPIENTS =  'mario@dettlaffinc.com';


    /**
     * Create a new command instance.
     * LicenseExpiry constructor.
     * @param MailListRepoInterface $MailListRepository
     *
     */
    public function __construct(MailListRepoInterface $MailListRepository)
    {
        $this->mailListRepo =  $MailListRepository;
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
//                echo $days_left_to_expiration."\n";

                if($days_left_to_expiration <= License::EXPIRATION_DAYS_NOTICE){
                    $licenses_expiring[] = $license;
                }
            }
            //trigger an email event here
            if(!empty($licenses_expiring)){
                $recipients = '';

                $mails = $this->mailListRepo->findAll();
                if($mails){
                    foreach ($mails as $key => $value) {

                        $recipients .= ','.$value->email;
                    }
                }
                $recipients = self::DEFAULT_MAIL_RECIPIENTS.$recipients;
                App\EmailMessages::sendExpiryNotice($licenses_expiring,$recipients);
                echo "Mail(s) Sent Out! \n";
            }
        }else{
            echo "No Data To Process \n";
        }
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
