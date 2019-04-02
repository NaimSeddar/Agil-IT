<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entreprise')->insert([
            'nom' => 'entreprise cool',
            'nomPDG' => 'Jerome',
            'siret' => 'fldshfljs',
            'siteP' => 'rslkgfsklm',
            'batimentP' => 'dhklsfhklsf',
            ]);

    }
}