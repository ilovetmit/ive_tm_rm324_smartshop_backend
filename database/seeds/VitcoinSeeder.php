<?php

use Illuminate\Database\Seeder;
use App\Models\InformationManagement\Vitcoin;
use App\Http\Traits\MultiChain;

class VitcoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallets = array(
            array(
                'user_id' => 1,
                'address' => '1N8RTrViBWMXfJ4tMWq3wrUacGhtEuT7qUWTct',
                'public_key' => '02f5a27e1d633d94650c69105820caa65757e429a14c9a39e5841eb25e676760b2',
                'primary_key' => 'VBjxdok1wbd3AMSZNaoFhJTnNVzcXpZiFWV6CaVs5FpfgVB7WCoDiDyW',
            ),
            array(
                'user_id' => 2,
                'address' => '13kYqmexPWZMSzH6wfbeHqQENcdsWMobo3v79Y',
                'public_key' => '03a1f632405d084062f6852d6cbe7017ad399dd6c09857e9c4ff18905fe298c3bb',
                'primary_key' => 'V6gbJLc23faCf98hD6SW4K7XWXH5oXVL4UihTTp34VWC2yYPJNpphTxB',
            ),
            array(
                'user_id' => 3,
                'address' => '16SbWoQJjYQ6kDdt65UYnMpto324HvskqoVmKJ',
                'public_key' => '03774c6b4ccd37facc6271e544f8ccc1fed9fcaf2497e386011c352e8c1355cf92',
                'primary_key' => 'VEg63wSbdmc2KTMMc4XsVvDUXSoxngvzHdqEniwn4C7akHNAqZeG2KXb',
            ),
            array(
                'user_id' => 4,
                'address' => '1XNhstk19FQ7auDwWMBdBKeEaC8KoRusjEdQ1C',
                'public_key' => '026de20f1279233b4f27da2b60db141a6a3504ab81b9d7af30852e5577514c7117',
                'primary_key' => 'V5eGrooSqeZGdga1LcDsZJ48vMjk2EZxSe26F7Cw2w52DaXCwhrTUunZ',
            ),
            array(
                'user_id' => 5,
                'address' => '1GUqZ113ouLNYi8hga9Gd7VTVwWbRy55JUdMZS',
                'public_key' => '02687866617461bd7e2c816120c3e9250bbadea9c49c3060ce6da1f4d499118691',
                'primary_key' => 'VC7v6RTKmHtHydCMobenD4Ntf5KPKkaJoQ5NAcPC7erh5foMsgeLsZqM',
            ),
            array(
                'user_id' => 6,
                'address' => '1JFZvpiHwqPqiGY6qEfit2n4Xzgc9vvTLUE33T',
                'public_key' => '03a80e3a9d27b74c63e05345a42631799c939b69fcd3b95616a3561dc34f1466ac',
                'primary_key' => 'V5CzJTF6nq4XzrRGnvaLF4bC3Ck9gWBKMSHTGzvwe3AKrdZroA41pWK5',
            ),
            array(
                'user_id' => 7,
                'address' => '1D7VrWYs3LFtbCHb2ZZVK3AvUvvbU8u4fN9SrX',
                'public_key' => '020cb07d03a389f62833c1b7982e63de1797dfef853e710dd35c180a1a78175391',
                'primary_key' => 'VG3ow7Z5qBoVMBgPjknztNkJ8URLeLhdDYgXA2eVUrVF5XThMGnYF8Dw',
            ),
            array(
                'user_id' => 8,
                'address' => '1Zhbke6bXiFAihrpLZEVUEF8mNZ3s1AvY8ZTx',
                'public_key' => '023f986d335fdce29a0762b319fca3e12cdee4fe81f15b4c5552143748a20eb7e4',
                'primary_key' => 'VDRPWaNcA8QYe65jaorUFPig27v8VQXKjGgSUsYxir7yhFTFwk1md1tQ',
            ),
            array(
                'user_id' => 9,
                'address' => '17KX2mKPXiwjxbj64Up4VS8KGGCxqv1wQNpk21',
                'public_key' => '0396bf172bb4b1397081564fa6bbfe7e1f989ad5616bbca9dc16ac54ccc5a5809b',
                'primary_key' => 'V67iqK4gai1hQ8QEnKUP3MdSfZW37DJ2H7VT7o4pBaske6hN3QDPFkK3',
            ),
            array(
                'user_id' => 10,
                'address' => '1P1BXfudNYjhyqeiBZHdJFzDDEJ9W2BnZDwwME',
                'public_key' => '02c207ab5d047b3b80fb3add87dcaae8550a2c51a1400096e9d75053f024726a29',
                'primary_key' => 'V8ibaPCoLVepK3ZaQPBKzG91fnD6KQNvbgDCUrNxEpnQpFzEqnoSkfAc',
            ),
            array(
                'user_id' => 11,
                'address' => '1HXuhrqgS1wEjAwAREVBvBDTZj8AxSiPTdxSHA',
                'public_key' => '03a32e53f4622a6d2bab6ebd20fd926fe8254c837110e9139cdf9ecf148d69cba9',
                'primary_key' => 'V6p8LJf3KM4vqTdLFZnxa6mxtEgbjXC7u5eyWE7vSUYBEb4DWN3SCuZa',
            ),
        );

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

            foreach ($wallets as $wallet) {
                Vitcoin::create($wallet);
                // if ($Isimport) {
                //     $this->MultiChain->importaddress($wallet['address']);
                //     $this->MultiChain->grant($wallet['address'], 'VitCoin.issue,receive,send');
                // }
            }
        } catch (\Throwable $th) {
            $output->writeln("Connect Multichain Failed. Seeding without importing addresses");
        }
    }
}
