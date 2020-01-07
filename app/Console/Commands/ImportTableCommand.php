<?php

namespace App\Console\Commands;

use App\Repositories\ImportTablesRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:table {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $importRepo = new ImportTablesRepository();
//        $users = DB::connection('mysql2')->select('select * from user WHERE user_type != "DEPENDANT"');
//        $bar = $this->output->createProgressBar(count($users));

//        foreach ($users as $user) {
//            $importRepo->createUser($user);
//            $bar->advance();
//        }
//        $bar->finish();

//        $users = DB::connection('mysql2')->select('select * from user WHERE user_type = "DEPENDANT"');
//        $bar = $this->output->createProgressBar(count($users));
//
//        foreach ($users as $user) {
//            $importRepo->createDependant($user);
//            $bar->advance();
//        }

        //organizations
//        $organization_types = DB::connection('mysql2')->select('select * from institution_org_type');
//        $bar = $this->output->createProgressBar(count($organization_types));
//
//        foreach ($organization_types as $organization_type) {
//            $importRepo->createOrganization($organization_type);
//            $bar->advance();
//        }

        //institution levels
//        $institution_levels = DB::connection('mysql2')->select('select * from institution_level');
//        $bar = $this->output->createProgressBar(count($institution_levels));
//
//        foreach ($institution_levels as $institution_level) {
//            $importRepo->createInstitutionLevel($institution_level);
//            $bar->advance();
//        }


        //Institutions
//        $institutionss = DB::connection('mysql2')->select('select * from institution');
//        $bar = $this->output->createProgressBar(count($institutionss));
//
//        foreach ($institutionss as $institution) {
//            $importRepo->createInstitution($institution);
//            $bar->advance();
//        }

//        $identifications = DB::connection('mysql2')->select('select * from identification');
//        $bar = $this->output->createProgressBar(count($identifications));
//        foreach ($identifications as $identification) {
//            $importRepo->createIdentification($identification);
//            $bar->advance();
//        }

//        $profiles = DB::connection('mysql2')->select("select profile.* from profile inner join user ON user.id = profile.user_id where user.user_type != 'DEPENDANT' ");
//        $bar = $this->output->createProgressBar(count($profiles));
//
//        foreach ($profiles as $profile) {
//            $importRepo->createProfile($profile);
//            $bar->advance();
//        }

        //didn't work
//        $profiles = DB::connection('mysql2')->select("select profile.* from profile inner join user ON user.id = profile.user_id where user.user_type = 'DEPENDANT' ");
//        $bar = $this->output->createProgressBar(count($profiles));
//
//        foreach ($profiles as $profile) {
//            $importRepo->createDependantProfile($profile);
//            $bar->advance();
//        }

        //previous package table
//        $packages = DB::connection('mysql2')->select("select * from package  ");
//        $bar = $this->output->createProgressBar(count($packages));
//
//        foreach ($packages as $package) {
//            $importRepo->createPackage($package);
//            $bar->advance();
//        }

        $member_payments = DB::connection('mysql2')->select("SELECT member_payment.* FROM `member_payment` INNER JOIN user on user.id = member_payment.member_id WHERE user.user_type <> 'DEPENDANT'");
        $bar = $this->output->createProgressBar(count($member_payments));

        foreach ($member_payments as $member_payment) {
            $importRepo->createPayment($member_payment);
            $bar->advance();
        }


        return true;
    }
}
