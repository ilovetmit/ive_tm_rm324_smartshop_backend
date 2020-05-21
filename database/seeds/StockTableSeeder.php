<?php

use App\Models\SmartBankManagement\Stock;
use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create([
            "code"=>"0002",
            "name"=>"CLP HOLDINGS",
            "description"=>"",
            "data"=>serialize([
              87.050,
              87.050,
              87.400,
              88.900,
              88.350,
              88.750,
              88.500,
              88.650,
              88.700,
              88.950,
              90.600,
              88.900,
              89.450,
              87.850,
              86.250,
              86.000,
              86.300,
              88.050,
              87.800,
              88.700,
              87.950,
              87.700,
              87.350,
              87.650,
              88.100,
              89.550,
              89.150,
              88.300,
              88.500,
              88.800,
              89.700,
              89.100,
              88.950,
              88.500,
              87.250,
              87.250,
              88.900,
              88.850,
              89.900,
              90.450,
              90.650,
              91.000,
              90.950,
              91.550,
              91.300,
              90.800,
              90.550,
              90.200,
              90.900,
              91.350,
            ]),
            "icon"=>serialize(['https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/CLP_logo.svg/440px-CLP_logo.svg.png']),
            // "detail"=>null,
          ]);
          Stock::create([
            "code"=>"0003",
            "name"=>"HK & CHINA GAS",
            "description"=>"",
            "data"=>serialize([
              13.618,
              13.691,
              13.727,
              13.964,
              13.800,
              13.891,
              13.891,
              13.909,
              14.073,
              14.000,
              14.273,
              14.327,
              14.455,
              14.182,
              14.346,
              14.473,
              14.546,
              14.473,
              14.509,
              14.491,
              14.436,
              14.436,
              14.436,
              14.509,
              14.600,
              14.691,
              14.600,
              14.564,
              14.582,
              14.600,
              14.691,
              14.746,
              14.709,
              14.727,
              14.782,
              14.709,
              14.800,
              14.891,
              14.945,
              15.127,
              15.073,
              15.145,
              15.109,
              15.236,
              15.200,
              15.182,
              15.182,
              15.255,
              15.273,
              15.382,
            ]),
            "icon"=>serialize(['https://apptechprojectstorage.s3-ap-southeast-1.amazonaws.com/jobber_uat/129-1533537364.png']),
            // "detail"=>null,
          ]);
          Stock::create([
            "code"=>"0006",
            "name"=>"POWER ASSETS",
            "description"=>"",
            "data"=>serialize([
              52.65,
              53.00,
              53.05,
              53.70,
              53.55,
              53.80,
              53.50,
              53.20,
              53.65,
              53.60,
              54.40,
              53.90,
              54.55,
              53.45,
              53.00,
              52.90,
              52.70,
              52.55,
              52.70,
              53.20,
              53.05,
              52.95,
              53.95,
              54.20,
              54.30,
              54.90,
              54.45,
              54.35,
              54.35,
              54.25,
              54.85,
              54.55,
              54.20,
              54.50,
              53.50,
              53.75,
              54.85,
              54.85,
              55.00,
              55.55,
              54.40,
              54.65,
              54.10,
              54.25,
              54.45,
              54.10,
              54.30,
              54.25,
              53.80,
            ]),
            "icon"=>serialize(['https://2.bp.blogspot.com/-wZcQ0LIrvXw/WwD4oZJEmfI/AAAAAAAAq64/6hDacs44eQkfox3ah4EmSW0Wjp89yGH-gCPcBGAYYCw/s1600/6.jpg']),
            // "detail"=>null,
          ]);
          Stock::create([
            "code"=>"0011",
            "name"=>"HANG SENG BANK",
            "description"=>"",
            "data"=>serialize([
              52.65,
              53.00,
              53.05,
              53.70,
              53.55,
              53.80,
              53.50,
              53.20,
              53.65,
              53.60,
              54.40,
              53.90,
              54.55,
              53.45,
              53.00,
              52.90,
              52.70,
              52.55,
              52.70,
              53.20,
              53.05,
              52.95,
              53.95,
              54.20,
              54.30,
              54.90,
              54.45,
              54.35,
              54.35,
              54.25,
              54.85,
              54.55,
              54.20,
              54.50,
              53.50,
              53.75,
              54.85,
              54.85,
              55.00,
              55.55,
              54.40,
              54.65,
              54.10,
              54.25,
              54.45,
              54.10,
              54.30,
              54.25,
              53.80,
            ]),
            "icon"=>serialize(['https://yt3.ggpht.com/a/AGF-l7_9no5zk-mhoeLxqcB6F_5FuwgRqgjen77mFw=s900-c-k-c0xffffffff-no-rj-mo']),
            // "detail"=>null,
          ]);
          Stock::create([
            "code"=>"0012",
            "name"=>"HENDERSON LAND",
            "description"=>"",
            "data"=>serialize([
              33.909,
              33.818,
              34.227,
              34.864,
              34.818,
              35.364,
              34.773,
              34.909,
              35.091,
              34.864,
              35.864,
              35.409,
              35.727,
              36.455,
              36.545,
              37.091,
              36.909,
              36.364,
              36.182,
              36.227,
              35.636,
              35.364,
              36.045,
              36.409,
              36.227,
              36.091,
              36.318,
              36.545,
              35.727,
              35.591,
              35.818,
              35.273,
              35.045,
              35.455,
              34.773,
              35.182,
              36.955,
              37.455,
              37.818,
              38.182,
              38.227,
              38.545,
              38.545,
              39.091,
              39.182,
              38.773,
              39.227,
              39.455,
              38.864,
              39.136,
            ]),
            "icon"=>serialize(['https://upload.wikimedia.org/wikipedia/zh/thumb/7/76/Henderson_Land_Development.svg/150px-Henderson_Land_Development.svg.png']),
            // "detail"=>null,
          ]);
          Stock::create([
            "code"=>"0016",
            "name"=>"SHK PPT",
            "description"=>"",
            "data"=>serialize([
              101.80,
              102.90,
              102.70,
              105.30,
              106.60,
              110.10,
              108.00,
              109.30,
              109.30,
              108.80,
              111.80,
              111.70,
              112.20,
              113.30,
              111.50,
              114.20,
              113.60,
              113.00,
              112.20,
              113.20,
              111.20,
              110.20,
              112.20,
              115.00,
              113.50,
              113.90,
              113.20,
              114.90,
              114.20,
              113.10,
              113.40,
              111.80,
              110.20,
              111.60,
              108.80,
              112.00,
              117.40,
              118.20,
              119.50,
              120.00,
              120.80,
              122.00,
              120.60,
              123.70,
              123.50,
              121.50,
              124.00,
              124.20,
              123.70,
              125.20,
            ]),
            "icon"=>serialize(['https://upload.wikimedia.org/wikipedia/zh-yue/thumb/1/11/SHKP.svg/1024px-SHKP.svg.png']),
            // "detail"=>null,
          ]);
          Stock::create([
            "code"=>"0017",
            "name"=>"NEW WORLD DEV",
            "description"=>"",
            "data"=>serialize([
              10.22,
              10.26,
              10.30,
              10.54,
              10.60,
              10.76,
              10.62,
              10.64,
              10.32,
              10.26,
              10.64,
              10.56,
              10.60,
              10.74,
              10.52,
              10.78,
              10.84,
              10.68,
              10.60,
              10.70,
              10.44,
              10.46,
              10.66,
              10.88,
              10.76,
              10.82,
              10.82,
              10.90,
              10.66,
              10.52,
              10.66,
              10.48,
              10.34,
              10.36,
              10.14,
              10.18,
              10.68,
              10.84,
              11.18,
              11.24,
              11.26,
              11.38,
              11.30,
              11.50,
              11.62,
              11.38,
              11.70,
              11.62,
              11.60,
              11.70,
            ]),
            "icon"=>serialize(['https://fs.mingpao.com/fin/20170921/s00010/5acc10c8a8a1fbcdb14d930167a34282.jpg']),
            // "detail"=>null,
          ]);
          Stock::create([
            "code"=>"0083",
            "name"=>"SINO LAND",
            "description"=>"",
            "data"=>serialize([
              12.60,
              12.62,
              12.64,
              12.82,
              12.76,
              13.00,
              12.68,
              12.88,
              12.84,
              12.78,
              13.20,
              13.14,
              13.40,
              13.50,
              13.46,
              13.92,
              13.76,
              13.90,
              13.68,
              13.72,
              13.58,
              13.40,
              13.82,
              14.08,
              13.78,
              14.00,
              13.74,
              13.96,
              13.84,
              13.48,
              13.64,
              13.34,
              13.28,
              13.42,
              13.16,
              13.74,
              14.28,
              14.32,
              14.38,
              14.74,
              14.60,
              14.52,
              14.24,
              14.46,
              14.40,
              13.98,
              14.22,
              14.10,
              14.10,
              14.14,
            ]),
            "icon"=>serialize(['https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/SinoGroup_logo.svg/1200px-SinoGroup_logo.svg.png']),
            // "detail"=>null,
          ]);
          Stock::create([
            "code"=>"0101",
            "name"=>"HANG LUNG PPT",
            "description"=>"",
            "data"=>serialize([
              14.84,
              14.86,
              14.84,
              15.22,
              15.10,
              15.64,
              15.42,
              15.48,
              15.42,
              15.22,
              15.26,
              15.26,
              15.42,
              15.58,
              15.84,
              16.08,
              15.84,
              15.58,
              15.30,
              15.70,
              15.16,
              15.14,
              15.40,
              15.76,
              15.90,
              15.64,
              15.50,
              15.66,
              15.26,
              14.98,
              15.14,
              14.80,
              15.10,
              14.92,
              14.58,
              14.54,
              15.08,
              15.34,
              15.40,
              15.56,
              15.56,
              15.68,
              15.44,
              15.62,
              15.74,
              15.48,
              15.82,
              15.94,
              15.92,
              16.04,
            ]),
            "icon"=>serialize(['http://hanglung.com/CMSPages/GetAzureFile.aspx?path=~\hanglungcorporatesite\media\hanglung_media\logo_pressrelease_large_1.jpg&hash=b4fa63b9ab169b5672b0933362391552d0e09f2cc5e4b5acd1a982c3fc7cf79c&ext=.jpg']),
            // "detail"=>null,
          ]);
          Stock::create([
            "code"=>"0267",
            "name"=>"CITIC",
            "description"=>"",
            "data"=>serialize([
              12.10,
              12.14,
              12.26,
              12.38,
              12.44,
              12.48,
              12.32,
              12.38,
              12.36,
              12.38,
              12.60,
              12.50,
              12.66,
              12.54,
              12.56,
              12.96,
              12.90,
              12.70,
              12.58,
              12.92,
              12.60,
              12.46,
              12.86,
              13.08,
              12.94,
              13.02,
              12.68,
              12.60,
              12.36,
              12.30,
              12.18,
              12.12,
              12.12,
              12.28,
              11.84,
              12.14,
              12.36,
              12.32,
              12.28,
              12.48,
              12.50,
              12.40,
              12.18,
              12.28,
              12.20,
              11.80,
              11.88,
              11.92,
              11.84,
              11.82,
            ]),
            "icon"=>serialize(['https://upload.wikimedia.org/wikipedia/zh/thumb/f/fc/CITIC_Pacific_logo.svg/200px-CITIC_Pacific_logo.svg.png']),
            // "detail"=>null,
          ]);
    }
}
