<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Insert standard subscription formulas to the database
        DB::table('subscriptions')->insert([
            'formula' => 'Formule 1 mois',
            'description' => 'Payez 10€ par mois pour profiter de toute l\'offre WatchMe.',
            'plan_id' => '1',
            'amount' => '10'
        ]);

        DB::table('subscriptions')->insert([
            'formula' => 'Formule 3 mois',
            'description' => 'Payez 27€ tous les 3 mois, soit l\'équivalent de 9€ par mois, pour profiter de toute l\'offre WatchMe.',
            'plan_id' => '2',
            'amount' => '27'
        ]);

        DB::table('subscriptions')->insert([
            'formula' => 'Formule 6 mois',
            'description' => 'Payez 46€ tous les 6 mois, soit l\'équivalent de 8€ par mois, pour profiter de toute l\'offre WatchMe.',
            'plan_id' => '3',
            'amount' => '46'
        ]);
    }
}
