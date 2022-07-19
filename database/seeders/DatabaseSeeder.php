<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Doctors;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create([
            'name' => 'user'
        ]);
        Role::factory()->create([
            'name' => 'doctor'
        ]);
        Role::factory()->create([
            'name' => 'admin'
        ]);
        Category::factory()->create([
           'name' => 'Šeimos gydytojai'
        ]);
        Category::factory()->create([
            'name' => 'LOR'
        ]);
        Category::factory()->create([
            'name' => 'Chirurgai'
        ]);
         User::factory()->create([
             'name' => 'Lukas',
             'lastname' => 'Martinkus',
             'email' => 'lukas.sqand@gmail.com',
             'role_id' => 3,
             'password' =>Hash::make('lukaslukas')
         ]);
        User::factory()->create([
            'name' => 'Greta',
            'lastname' => 'Martinkiene',
            'email' => 'greta.mart@gmail.com',
            'role_id' => 2,
            'password' =>Hash::make('lukaslukas')
        ]);
        Doctors::factory()->create([
            'user_id' => 2,
            'category_id' => 1,
            'body' => '<p>Gydytoja konsultuoja lietuvių, rusų ir anglų kalbomis.</p>
<p><strong>Specializacija</strong></p>
<p>&scaron;eimos gydytoja, vidaus ligų gydytoja, gydytoja-echoskopuotoja.</p>
<p><strong>Domėjimosi sritys</strong></p>
<p>sveikatos rizika, balneoterapija, stresas.</p>
<p><strong>Biografija</strong></p>
<p>1996 m. baigė Kauno medicinos akademiją, 1999 m. įgijo vidaus ligų gydytojo, 2005 m. &scaron;eimos gydytojo profesinę kvalifikaciją;</p>
<p>2017 m. Vilniaus universitete apgynė medicinos mokslo daktaro disertaciją tema &bdquo;Integrali gyvensenos ir psichoemocinės būklės lemiama sveikatos rizika, jos vertinimas ir prevencija&ldquo;.</p>
<p><strong>Profesinė darbo patirtis nuo 2000 m.</strong></p>
<p>Anksčiau dirbo Klaipėdos Jūrininkų sveikatos priežiūros centre &scaron;eimos gydytoja, skyriaus vedėja, vidaus ligų gydytoja, echoskopuotoja, N. Imbrasienės privačioje ambulatorijoje, Jūrininkų ligoninėje;</p>
<p>Dirba Klaipėdos universiteto Sveikatos mokslų fakulteto Slaugos katedroje docente;</p>
<p>Patyrusi specialistė nuolat tobulina savo kvalifikaciją &ndash; dalyvauja nacionalinėse ir tarptautinėse konferencijose ir seminaruose.</p>
<p><strong>Kursai</strong></p>
<p>2013 m. Dislipidemijos diagnostika ir gydymas (30 val.);</p>
<p>2012 m. Arterinės hipertenzijos įvertinimo ir kontrolės svarba, siekiant i&scaron;vengti organų taikinių pažeidimo ir nepalankių kardiovaskulinių i&scaron;eičių (14 val.);</p>
<p>2014 m. Klinikinė elektrokardiografija (36 val.);</p>
<p>2015 m. Pilvo organų echoskopijos įvadinis kursas (120 val.);</p>
<p>Kraujagyslių echoskopijos įvadinis kursas (240 val.);</p>
<p>2017 m. Sveikas senėjimas: depresijų ir demencijų prevencija (36 val.);</p>
<p>Effective healthcare management programme (52 val.);</p>
<p><em>Open Medicine Institute-Duke University</em>&nbsp;kursai&nbsp;<em>Family medicine</em>&nbsp;(40 val.).</p>
<p><strong>Dalyvavimo biomedicininiuose tyrimuose patirtis</strong></p>
<p>2018 m. biomedicininis tyrimas &bdquo;Skirtingos mineralizacijos geoterminio vandens poveikis distresui ir organizmo būklei&ldquo;- pagrindinė tyrėja;</p>
<p>2015 m. projektas VP2-1.3-ŪM-02-K-02-100 Vakarų Lietuvos gamtinių i&scaron;teklių panaudojimas kosmetikos ir sveikatinimo produktų gamybai ir paslaugų teikimui;</p>
<p>2012 m. biomedicininis tyrimas &bdquo;Psichoemocinis stresas ir nuovargis jūrininko darbe ir jų mažinimo galimybės&ldquo;- tyrėja;</p>
<p>Gydytoja yra Lietuvos Medikų Sąjūdžio narė.</p>',
            'thumbnail' => 'doctors/4hSUlcdOzwJww6l1OzclDLo0IwRu4eLiZih7drwJ.jpg'

        ]);

         User::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
