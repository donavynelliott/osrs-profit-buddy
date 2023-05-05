<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item_sets = [      
            [
                //Adamant gold-trimmed set (lg)
                'set_item_id' => 13020,
                'item_ids' => '2613,2607,2609,2611'
            ],
            [
                //Adamant gold-trimmed set (sk)
                'set_item_id' => 13022,
                'item_ids' => '2613,2607,3475,2611'
            ],
            [
                //Adamant set (lg)
                'set_item_id' => 13012,
                'item_ids' => '1161,1123,1073,1199'
            ],
            [
                //Adamant set (sk)
                'set_item_id' => 13014,
                'item_ids' => '1161,1123,1091,1199'
            ],
            [
                //Adamant trimmed set (lg)
                'set_item_id' => 13016,
                'item_ids' => '2605,2599,2601,2603'
            ],
            [
                //Adamant trimmed set (sk)
                'set_item_id' => 13018,
                'item_ids' => '2605,2599,3474,2603'
            ],
            [
                //Ahrim's armour set
                'set_item_id' => 12881,
                'item_ids' => '4708,4712,4714,4710'
            ],
            [
                //Ancestral robes set
                'set_item_id' => 21049,
                'item_ids' => '21018,21021,21024'
            ],
            [
                //Ancient dragonhide set
                'set_item_id' => 13171,
                'item_ids' => '12496,12492,12494,12490'
            ],
            [
                //Ancient rune armour set (lg)
                'set_item_id' => 13060,
                'item_ids' => '12466,12460,12462,12468'
            ],
            [
                //Ancient rune armour set (sk)
                'set_item_id' => 13062,
                'item_ids' => '12466,12460,12464,12468'
            ],
            [
                //Armadyl dragonhide set
                'set_item_id' => 13169,
                'item_ids' => '12512,12508,12510,12506'
            ],
            [
                //Armadyl rune armour set (lg)
                'set_item_id' => 13052,
                'item_ids' => '12476,12470,12472,12478'
            ],
            [
                //Armadyl rune armour set (sk)
                'set_item_id' => 13054,
                'item_ids' => '12476,12470,12474,12478'
            ],
            [
                //Bandos dragonhide set
                'set_item_id' => 13167,
                'item_ids' => '12504,12500,12502,12498'
            ],
            [
                //Bandos rune armour set (lg)
                'set_item_id' => 13056,
                'item_ids' => '12486,12480,12482,12488'
            ],
            [
                //Bandos rune armour set (sk)
                'set_item_id' => 13058,
                'item_ids' => '12486,12480,12484,12488'
            ],
            [
                //Black dragonhide set
                'set_item_id' => 12871,
                'item_ids' => '2503,2497,2491'
            ],
            [
                //Black gold-trimmed set (lg)
                'set_item_id' => 12996,
                'item_ids' => '2595,2591,2593,2597'
            ],
            [
                //Black gold-trimmed set (sk)
                'set_item_id' => 12998,
                'item_ids' => '2595,2591,3473,2597'
            ],
            [
                //Black set (lg)
                'set_item_id' => 12988,
                'item_ids' => '1165,1125,1077,1195'
            ],
            [
                //Black set (sk)
                'set_item_id' => 12990,
                'item_ids' => '1165,1125,1059,1195'
            ],
            [
                //Black trimmed set (lg)
                'set_item_id' => 12992,
                'item_ids' => '2587,2583,2585,2589'
            ],
            [
                //Black trimmed set (sk)
                'set_item_id' => 12994,
                'item_ids' => '2587,2583,3472,2589'
            ],
            [
                //Blue dragonhide set
                'set_item_id' => 12867,
                'item_ids' => '2499,2493,2487'
            ],
            [
                //Book of balance page set
                'set_item_id' => 13153,
                'item_ids' => '3835,3836,3837,3838'
            ],
            [
                //Book of darkness page set
                'set_item_id' => 13159,
                'item_ids' => '12621,12622,12623,12624'
            ],
            [
                //Book of law page set
                'set_item_id' => 13157,
                'item_ids' => '12617,12618,12619,12620'
            ],
            [
                //Book of war page set
                'set_item_id' => 13155,
                'item_ids' => '12613,12614,12615,12616'
            ],
            [
                //Bronze gold-trimmed set (lg)
                'set_item_id' => 12968,
                'item_ids' => '12211,12205,12207,12213'
            ],
            [
                //Bronze gold-trimmed set (sk)
                'set_item_id' => 12970,
                'item_ids' => '12211,12205,12209,12213'
            ],
            [
                //Bronze set (lg)
                'set_item_id' => 12960,
                'item_ids' => '1155,1117,1075,1189'
            ],
            [
                //Bronze set (sk)
                'set_item_id' => 12962,
                'item_ids' => '1155,1117,1087,1189'
            ],
            [
                //Bronze trimmed set (lg)
                'set_item_id' => 12964,
                'item_ids' => '12221,12215,12217,12223'
            ],
            [
                //Bronze trimmed set (sk)
                'set_item_id' => 12966,
                'item_ids' => '12221,12215,12219,12223'
            ],
            [
                //Combat potion set
                'set_item_id' => 13064,
                'item_ids' => '2428,113,2432'
            ],
            [
                //Dagon'hai robes set
                'set_item_id' => 24333,
                'item_ids' => '24288,24291,24294'
            ],
            [
                //Dharok's armour set
                'set_item_id' => 12877,
                'item_ids' => '4716,4720,4722,4718'
            ],
            [
                //Dragon armour set (lg)
                'set_item_id' => 21882,
                'item_ids' => '11335,21892,4087,21895'
            ],
            [
                //Dragon armour set (sk)
                'set_item_id' => 21885,
                'item_ids' => '11335,21892,4585,21895'
            ],
            [
                //Dragonstone armour set
                'set_item_id' => 23667,
                'item_ids' => '24034,24037,24040,24046'
            ],
            [
                //Dwarf cannon set
                'set_item_id' => 12863,
                'item_ids' => '6,8,10,12'
            ],
            [
                //Gilded armour set (lg)
                'set_item_id' => 13036,
                'item_ids' => '3486,3481,3483,3488'
            ],
            [
                //Gilded armour set (sk)
                'set_item_id' => 13038,
                'item_ids' => '3486,3481,3485,3488'
            ],
            [
                //Gilded dragonhide set
                'set_item_id' => 23124,
                'item_ids' => '23264,23267,23261'
            ],
            [
                //Green dragonhide set
                'set_item_id' => 12865,
                'item_ids' => '1135,1099,1065'
            ],
            [
                //Guthan's armour set
                'set_item_id' => 12873,
                'item_ids' => '4724,4728,4730,4726'
            ],
            [
                //Guthix armour set (lg)
                'set_item_id' => 13048,
                'item_ids' => '2673,2669,2671,2675'
            ],
            [
                //Guthix armour set (sk)
                'set_item_id' => 13050,
                'item_ids' => '2673,2669,3480,2675'
            ],
            [
                //Guthix dragonhide set
                'set_item_id' => 13165,
                'item_ids' => '10382,10378,10380,10376'
            ],
            [
                //Halloween mask set
                'set_item_id' => 13175,
                'item_ids' => '1057,1055,1053'
            ],
            [
                //Holy book page set
                'set_item_id' => 13149,
                'item_ids' => '3827,3828,3829,3830'
            ],
            [
                //Inquisitor's armour set
                'set_item_id' => 24488,
                'item_ids' => '24419,24420,24421'
            ],
            [
                //Iron gold-trimmed set (lg)
                'set_item_id' => 12980,
                'item_ids' => '12241,12235,12237,12243'
            ],
            [
                //Iron gold-trimmed set (sk)
                'set_item_id' => 12982,
                'item_ids' => '12241,12235,12239,12243'
            ],
            [
                //Iron set (lg)
                'set_item_id' => 12972,
                'item_ids' => '1153,1115,1067,1191'
            ],
            [
                //Iron set (sk)
                'set_item_id' => 12974,
                'item_ids' => '1153,1115,1081,1191'
            ],
            [
                //Iron trimmed set (lg)
                'set_item_id' => 12976,
                'item_ids' => '12231,12225,12227,12233'
            ],
            [
                //Iron trimmed set (sk)
                'set_item_id' => 12978,
                'item_ids' => '12231,12225,12229,12233'
            ],
            [
                //Justiciar armour set
                'set_item_id' => 22438,
                'item_ids' => '22326,22327,22328'
            ],
            [
                //Karil's armour set
                'set_item_id' => 12883,
                'item_ids' => '4732,4736,4738,4734'
            ],
            [
                //Masori armour set (f)
                'set_item_id' => 27355,
                'item_ids' => '27235,27238,27241'
            ],
            [
                //Mithril gold-trimmed set (lg)
                'set_item_id' => 13008,
                'item_ids' => '12283,12277,12279,12285'
            ],
            [
                //Mithril gold-trimmed set (sk)
                'set_item_id' => 13010,
                'item_ids' => '12283,12277,12281,12285'
            ],
            [
                //Mithril set (lg)
                'set_item_id' => 13000,
                'item_ids' => '1159,1121,1071,1197'
            ],
            [
                //Mithril set (sk)
                'set_item_id' => 13002,
                'item_ids' => '1159,1121,1085,1197'
            ],
            [
                //Mithril trimmed set (lg)
                'set_item_id' => 13004,
                'item_ids' => '12293,12287,12279,12281'
            ],
            [
                //Mithril trimmed set (sk)
                'set_item_id' => 13006,
                'item_ids' => '12293,12287,12285,12281'
            ],
            [
                //Mystic set (blue)
                'set_item_id' => 23113,
                'item_ids' => '4089,4091,4093'
            ],
            [
                //Mystic set (dark)
                'set_item_id' => 23116,
                'item_ids' => '4099,4101,4103'
            ],
            [
                //Mystic set (dusk)
                'set_item_id' => 23119,
                'item_ids' => '23047,23050,23053'
            ],
            [
                //Mystic set (light)
                'set_item_id' => 23110,
                'item_ids' => '4109,4111,4113'
            ],
            [
                //Obsidian armour set
                'set_item_id' => 21279,
                'item_ids' => '21298,21301,21304'
            ],
            [
                //Partyhat set
                'set_item_id' => 13173,
                'item_ids' => '1038,1040,1042,1044,1046,1048'
            ],
            [
                //Red dragonhide set
                'set_item_id' => 12869,
                'item_ids' => '2501,2495,2489'
            ],
            [
                //Rune armour set (lg)
                'set_item_id' => 13024,
                'item_ids' => '1163,1127,1079,1201'
            ],
            [
                //Rune armour set (sk)
                'set_item_id' => 13026,
                'item_ids' => '1163,1127,1093,1201'
            ],
            [
                //Rune gold-trimmed set (lg)
                'set_item_id' => 13032,
                'item_ids' => '2619,2615,2617,2621'
            ],
            [
                //Rune gold-trimmed set (sk)
                'set_item_id' => 13034,
                'item_ids' => '2619,2615,3477,2621'
            ],
            [
                //Rune trimmed set (lg)
                'set_item_id' => 13028,
                'item_ids' => '2627,2623,2625,2629'
            ],
            [
                //Rune trimmed set (sk)
                'set_item_id' => 13030,
                'item_ids' => '2627,2623,3476,2629'
            ],
            [
                //Saradomin armour set (lg)
                'set_item_id' => 13040,
                'item_ids' => '2665,2661,2663,2667'
            ],
            [
                //Saradomin armour set (sk)
                'set_item_id' => 13042,
                'item_ids' => '2665,2661,3479,2667'
            ],
            [
                //Saradomin dragonhide set
                'set_item_id' => 13163,
                'item_ids' => '10390,10386,10388,10384'
            ],
            [
                //Shattered relic hunter (t1) armour set
                'set_item_id' => 26554,
                'item_ids' => '26436,26439,26442,26445'
            ],
            [
                //Shattered relic hunter (t2) armour set
                'set_item_id' => 26557,
                'item_ids' => '26448,26445,26442,26439'
            ],
            [
                //Shattered relic hunter (t3) armour set
                'set_item_id' => 26560,
                'item_ids' => '26460,26457,26454,26451'
            ],
            [
                //Steel gold-trimmed set (lg)
                'set_item_id' => 20382,
                'item_ids' => '20178,20169,20172,20180'
            ],
            [
                //Steel gold-trimmed set (sk)
                'set_item_id' => 20385,
                'item_ids' => '20178,20169,20175,20180'
            ],
            [
                //Steel set (lg)
                'set_item_id' => 12984,
                'item_ids' => '1157,1119,1069,1193'
            ],
            [
                //Steel set (sk)
                'set_item_id' => 12986,
                'item_ids' => '1157,1119,1083,1193'
            ],
            [
                //Steel trimmed set (lg)
                'set_item_id' => 20376,
                'item_ids' => '20193,20189,20187,20195'
            ],
            [
                //Steel trimmed set (sk)
                'set_item_id' => 20379,
                'item_ids' => '20193,20189,20190,20195'
            ],
            [
                //Super potion set
                'set_item_id' => 13066,
                'item_ids' => '2436,2440,2442'
            ],
            [
                //Torag's armour set
                'set_item_id' => 12879,
                'item_ids' => '4745,4749,4751,4747'
            ],
            [
                //Trailblazer relic hunter (t1) armour set
                'set_item_id' => 25380,
                'item_ids' => '25037,25034,25031,25028'
            ],
            [
                //Trailblazer relic hunter (t2) armour set
                'set_item_id' => 25383,
                'item_ids' => '25025,25028,25031,25034'
            ],
            [
                //Trailblazer relic hunter (t3) armour set
                'set_item_id' => 25386,
                'item_ids' => '25010,25007,25004,25001'
            ],
            [
                //Twisted relic hunter (t1) armour set
                'set_item_id' => 24469,
                'item_ids' => '24411,24409,24407,24405'
            ],
            [
                //Twisted relic hunter (t2) armour set
                'set_item_id' => 24472,
                'item_ids' => '24403,24401,24399,24397'
            ],
            [
                //Twisted relic hunter (t3) armour set
                'set_item_id' => 24475,
                'item_ids' => '24393,24391,24389,24387'
            ],
            [
                //Unholy book page set
                'set_item_id' => 13151,
                'item_ids' => '3831,3832,3833,3834'
            ],
            [
                //Verac's armour set
                'set_item_id' => 12875,
                'item_ids' => '4753,4757,4759,4755'
            ],
            [
                //Zamorak armour set (lg)
                'set_item_id' => 13044,
                'item_ids' => '2657,2653,2655,2659'
            ],
            [
                //Zamorak armour set (sk)
                'set_item_id' => 13046,
                'item_ids' => '2657,2653,3478,2659'
            ],
            [
                //Zamorak dragonhide set
                'set_item_id' => 13161,
                'item_ids' => '10374,10370,10372,10368'
            ]
        ];

        foreach ($item_sets as $item_set) {
            \App\Models\ItemSet::create($item_set);
        }
    }
}
