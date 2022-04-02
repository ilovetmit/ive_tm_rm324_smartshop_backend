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
            $this->MultiChain = new MultiChain;
            if ($this->MultiChain->getinfo() != null) {
                $Isimport = true;
                $output->writeln("Connect Multichain Succeed. Importing addresses to blochchain...");
            } else {
                $Isimport = false;
                $output->writeln("Connect Multichain Failed. Seeding without importing addresses");
            }

            $this->MultiChain = new MultiChain;
            $pairs = $this->MultiChain->createkeypairs(User::count());
            foreach ($pairs as $key => $pair) {
                Vitcoin::create([
                    'user_id' => $key + 1,
                    'address' => $pair['address'],
                    'public_key' => $pair['pubkey'],
                    'primary_key' => $pair['privkey']   
                ]);
                $this->MultiChain->importaddress($pair['address']);
                $this->MultiChain->grant($pair['address'], 'issue,receive,send');
                $this->MultiChain->grant($pair['address'], 'Vitcoin.issue,receive,send');
            }
        } catch (\Throwable $th) {
            $output->writeln("Connect Multichain Failed. Seeding without importing addresses");
        }
    }
}
