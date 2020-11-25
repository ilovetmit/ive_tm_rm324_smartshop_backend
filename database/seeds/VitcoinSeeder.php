<?php

use Illuminate\Database\Seeder;
use App\Models\InformationManagement\Vitcoin;
use App\Http\Traits\MultiChain;
use App\Models\UserManagement\User;

class VitcoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $output = new Symfony\Component\Console\Output\ConsoleOutput();
        try {
            $multiChain = new MultiChain;
            $pairs = $multiChain->createkeypairs(User::count());
            $output->writeln("Connect Multichain Succeed. Importing addresses to blochchain...");
            foreach ($pairs as $key => $pair) {
                Vitcoin::create([
                    'user_id' => $key + 1,
                    'address' => $pair['address'],
                    'public_key' => $pair['pubkey'],
                    'primary_key' => $pair['privkey']
                ]);
                $multiChain->importaddress($pair['address'], '', false);        //test
                $multiChain->grant($pair['address'], 'issue,receive,send');
                $multiChain->grant($pair['address'], 'Vitcoin.issue,receive,send');
            }
        } catch (\Throwable $th) {
            $output->writeln("Connect Multichain Failed. Seeding stoped");
        }
    }
}
