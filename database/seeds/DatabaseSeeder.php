<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;
use App\Pages;
use App\Profession;
use App\CategoriaUser;
use App\General;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create(['nombre' => 'Juan Mellado', 'run' => '18.685.728-3' , 'email' => 'j.melladojimenez@hotmail.com', 'password' => bcrypt('123456'), 'tipo_usuario' => 1]);
        
        Category::create(['nombre' => 'Protocolos']);
        Category::create(['nombre' => 'Procedimientos de trabajo (PTS)']);
        Category::create(['nombre' => 'Matrices de riesgo']);
        Category::create(['nombre' => 'Registros']);

        Category::create(['nombre' => 'Reglamentos internos']);
        Category::create(['nombre' => 'Fichas de seguridad']);
        Category::create(['nombre' => 'Listas de chequeo']);
        Category::create(['nombre' => 'Material de apoyo']);
        Category::create(['nombre' => 'Comité Paritario']);
        Category::create(['nombre' => 'Instructivos']);
        Category::create(['nombre' => 'Planes de emergencias']);
        Category::create(['nombre' => 'Otros']);

        CategoriaUser::create(['nombre' => 'Nuevo', 'nivel' => 'NIVEL 1', 'gasto_inicio' => 0, 'gasto_fin' => 5000, 'color' => '#e8ecd1']);
        CategoriaUser::create(['nombre' => 'Principiante', 'nivel' => 'NIVEL 2', 'gasto_inicio' => 5001, 'gasto_fin' => 11250, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Amateur', 'nivel' => 'NIVEL 3', 'gasto_inicio' => 11251, 'gasto_fin' => 18750, 'color' => '#3f8a24', 'bonificacion' => 500]);
        CategoriaUser::create(['nombre' => 'Amateur', 'nivel' => 'NIVEL 4', 'gasto_inicio' => 18751, 'gasto_fin' => 27500, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Adelantado', 'nivel' => 'NIVEL 5', 'gasto_inicio' => 27501, 'gasto_fin' => 37500, 'color' => '#e8ecd1', 'bonificacion' => 1000]);
        CategoriaUser::create(['nombre' => 'Adelantado', 'nivel' => 'NIVEL 6', 'gasto_inicio' => 37501, 'gasto_fin' => 48750, 'color' => '#e8ecd1']);
        CategoriaUser::create(['nombre' => 'Adelantado', 'nivel' => 'NIVEL 7', 'gasto_inicio' => 48751, 'gasto_fin' => 61250, 'color' => '#e8ecd1']);
        CategoriaUser::create(['nombre' => 'Calificado', 'nivel' => 'NIVEL 8', 'gasto_inicio' => 61251, 'gasto_fin' => 75000, 'color' => '#8ab733', 'bonificacion' => 1500]);
        CategoriaUser::create(['nombre' => 'Calificado', 'nivel' => 'NIVEL 9', 'gasto_inicio' => 75001, 'gasto_fin' => 90000, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Calificado', 'nivel' => 'NIVEL 10', 'gasto_inicio' => 90001, 'gasto_fin' => 106250, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Calificado', 'nivel' => 'NIVEL 11', 'gasto_inicio' => 106251, 'gasto_fin' => 123750, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Experimentado', 'nivel' => 'NIVEL 12', 'gasto_inicio' => 123751, 'gasto_fin' => 142500, 'color' => '#3f8a24', 'bonificacion' => 2000]);
        CategoriaUser::create(['nombre' => 'Experimentado', 'nivel' => 'NIVEL 13', 'gasto_inicio' => 142501, 'gasto_fin' => 162500, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experimentado', 'nivel' => 'NIVEL 14', 'gasto_inicio' => 162501, 'gasto_fin' => 183750, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experimentado', 'nivel' => 'NIVEL 15', 'gasto_inicio' => 183751, 'gasto_fin' => 206250, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experimentado', 'nivel' => 'NIVEL 16', 'gasto_inicio' => 206251, 'gasto_fin' => 230000, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Avanzado', 'nivel' => 'NIVEL 17', 'gasto_inicio' => 230001, 'gasto_fin' => 255000, 'color' => '#e8ecd1', 'bonificacion' => 2500]);
        CategoriaUser::create(['nombre' => 'Avanzado', 'nivel' => 'NIVEL 18', 'gasto_inicio' => 255001, 'gasto_fin' => 281250, 'color' => '#e8ecd1']);
        CategoriaUser::create(['nombre' => 'Avanzado', 'nivel' => 'NIVEL 19', 'gasto_inicio' => 281251, 'gasto_fin' => 308750, 'color' => '#e8ecd1']);
        CategoriaUser::create(['nombre' => 'Avanzado', 'nivel' => 'NIVEL 20', 'gasto_inicio' => 308751, 'gasto_fin' => 337500, 'color' => '#e8ecd1']);
        CategoriaUser::create(['nombre' => 'Avanzado', 'nivel' => 'NIVEL 21', 'gasto_inicio' => 337501, 'gasto_fin' => 367500, 'color' => '#e8ecd1']);
        CategoriaUser::create(['nombre' => 'Avanzado', 'nivel' => 'NIVEL 22', 'gasto_inicio' => 367501, 'gasto_fin' => 398750, 'color' => '#e8ecd1']);
        CategoriaUser::create(['nombre' => 'Especialista', 'nivel' => 'NIVEL 23', 'gasto_inicio' => 398751, 'gasto_fin' => 431250, 'color' => '#8ab733', 'bonificacion' => 3000]);
        CategoriaUser::create(['nombre' => 'Especialista', 'nivel' => 'NIVEL 24', 'gasto_inicio' => 431251, 'gasto_fin' => 465000, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Especialista', 'nivel' => 'NIVEL 25', 'gasto_inicio' => 465001, 'gasto_fin' => 500000, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Especialista', 'nivel' => 'NIVEL 26', 'gasto_inicio' => 500001, 'gasto_fin' => 536250, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Especialista', 'nivel' => 'NIVEL 27', 'gasto_inicio' => 536251, 'gasto_fin' => 573750, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Especialista', 'nivel' => 'NIVEL 28', 'gasto_inicio' => 573751, 'gasto_fin' => 612500, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Especialista', 'nivel' => 'NIVEL 29', 'gasto_inicio' => 612501, 'gasto_fin' => 652500, 'color' => '#8ab733']);
        CategoriaUser::create(['nombre' => 'Experto', 'nivel' => 'NIVEL 30', 'gasto_inicio' => 652501, 'gasto_fin' => 693750, 'color' => '#3f8a24', 'bonificacion' => 3500]);
        CategoriaUser::create(['nombre' => 'Experto', 'nivel' => 'NIVEL 31', 'gasto_inicio' => 693751, 'gasto_fin' => 736250, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experto', 'nivel' => 'NIVEL 32', 'gasto_inicio' => 736251, 'gasto_fin' => 780000, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experto', 'nivel' => 'NIVEL 33', 'gasto_inicio' => 780001, 'gasto_fin' => 825000, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experto', 'nivel' => 'NIVEL 34', 'gasto_inicio' => 825001, 'gasto_fin' => 871250, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experto', 'nivel' => 'NIVEL 35', 'gasto_inicio' => 871251, 'gasto_fin' => 918750, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experto', 'nivel' => 'NIVEL 36', 'gasto_inicio' => 918751, 'gasto_fin' => 967500, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experto', 'nivel' => 'NIVEL 37', 'gasto_inicio' => 967501, 'gasto_fin' => 1017500, 'color' => '#3f8a24']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 38', 'gasto_inicio' => 1017501, 'gasto_fin' => 1068750, 'color' => '#d4af37', 'bonificacion' => 4000]);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 39', 'gasto_inicio' => 1068751, 'gasto_fin' => 1121250, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 40', 'gasto_inicio' => 1121251, 'gasto_fin' => 1175000, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 41', 'gasto_inicio' => 1175001, 'gasto_fin' => 1230000, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 42', 'gasto_inicio' => 1230001, 'gasto_fin' => 1286250, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 43', 'gasto_inicio' => 1286251, 'gasto_fin' => 1343750, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 44', 'gasto_inicio' => 1343751, 'gasto_fin' => 1402500, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 45', 'gasto_inicio' => 1402501, 'gasto_fin' => 1462500, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 46', 'gasto_inicio' => 1462501, 'gasto_fin' => 1523750, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 47', 'gasto_inicio' => 1523751, 'gasto_fin' => 1586250, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 48', 'gasto_inicio' => 1586251, 'gasto_fin' => 1650000, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Experto PRO', 'nivel' => 'NIVEL 49', 'gasto_inicio' => 1650001, 'gasto_fin' => 1715000, 'color' => '#d4af37']);
        CategoriaUser::create(['nombre' => 'Súper Experto PRO', 'nivel' => 'NIVEL 50', 'gasto_inicio' => 1715001, 'gasto_fin' => 999999999, 'color' => '#d4af37']);


        Pages::create(['nombre' => 'nosotros', 'contenido' => '<h1 style="text-align:right">Prevenci&oacute;n LebenCo.</h1><p style="text-align:right"><em>&iexcl;m&aacute;s que una biblioteca digital!</em></p><h2 style="text-align:justify">Nuestra misi&oacute;n</h2><p>&nbsp;&nbsp;&nbsp;&nbsp; Reencantar a las personas con el verdadero prop&oacute;sito de la Prevenci&oacute;n de Riesgos Laboral.</p><p style="text-align:justify">&nbsp;</p><h2 style="text-align:justify">Nuestra visi&oacute;n</h2><p style="text-align:justify">&nbsp;&nbsp;&nbsp;&nbsp; Desarrollar una comunidad colaborativa y ocupada de la Prevenci&oacute;n de Riesgos Laboral en Chile.</p><p style="text-align:justify">&nbsp;</p><h2 style="text-align:justify">&iquest;Por qu&eacute; confiar en nosotros?</h2><p style="text-align:justify">&nbsp;&nbsp;&nbsp;&nbsp; Porque nos ocupamos diariamente en identificar las confusiones e incertidumbres que en general las personas tienen respecto a este importante rubro. Por esto, decidimos hacernos presentes y crear una plataforma de comunicaci&oacute;n pensada en facilitar la implementaci&oacute;n de la Prevenci&oacute;n de Riesgos Laborales junto a ti, en tu trabajo y/o empresa.</p><p style="text-align:justify">&iexcl;Vamos!, participe en este desarrollo colectivo pensado para que su Seguridad Laboral, sea parte de todos.</p><p style="text-align:justify">&nbsp;</p><h2 style="text-align:justify">Historia</h2><p style="text-align:justify">&nbsp;&nbsp;&nbsp;&nbsp; Prevenci&oacute;n LebenCo. Nace en 2017 producto de la colaboraci&oacute;n de personas an&oacute;nimas y de las propias experiencias obtenidas del equipo LebenCo. en esta materia. En 2018 se logra sumar a personas y empresas de distintos rubros que aportan valiosos datos e informaci&oacute;n esencial para desarrollar estrategias y contenido de apoyo a la gesti&oacute;n de la Prevenci&oacute;n de Riesgos Laborales.</p><p style="text-align:justify">A principios de 2019 y producto de la colaboraci&oacute;n de m&uacute;ltiples esfuerzos, se concluye el desarrollo de la plataforma web, logrando presentar el primer sitio colaborativo del rubro llamado &ldquo;prevenci&oacute;nlebenco.cl&rdquo;, el cual queremos mejorar y desarrollar junto a ti. &nbsp;</p><p style="text-align:justify">&nbsp;</p><p style="text-align:right">&hellip;Gracias por confiar en nosotros.</p>']);
    
        Profession::create(['nombre' => 'SIN PROFESIÓN']);

        General::create(['id' => 1]);
    }
}
