<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {


    \DB::table('users')->delete();

    \DB::table('users')->insert(array(
      0 =>
        array(
          'id' => 1,
          'name' => 'admin',
          'google_id' => NULL,
          'google_token' => NULL,
          'google_refresh_token' => NULL,
          'username' => 'admin',
          'img' => 'profile_admin_1747751631.png',
          'email' => 'admin@gmail.com',
          'email_verified_at' => NULL,
          'password' => '$2y$12$03MdGVNvxcw9WlnK2HE84u.lpIXNoa6NYnq4PLdlz34brz8V2.uae',
          'role_id' => 2,
          'remember_token' => NULL,
          'created_at' => NULL,
          'updated_at' => '2025-05-20 21:33:51',
        ),
      1 =>
        array(
          'id' => 2,
          'name' => 'Rifqi Munawar R.',
          'google_id' => '116773779989527340914',
          'google_token' => 'ya29.a0AW4XtxjDA878twr0bN-_aTuBMo8VrwccaXDxNL5-qraZp_43vqPkr_aTJyrw11-Hu21eWG2SqZCVC8Yk4pHvVflcFCw8fXmc22XnRqwWIxtNZtq0Hvf19R96Rrgm5f-AS7SXiO5wu3IHxHfPyzwh45tcQkEAylsPcNXgxl6VaCgYKAVYSARESFQHGX2MiNu3AGq8SRz1Y4Vzme6Bsiw0175',
          'google_refresh_token' => NULL,
          'username' => 'Rifqi Munawar R.',
          'img' => 'https://lh3.googleusercontent.com/a/ACg8ocKKlwp7XhjLpLXEudZ6f7-edsw_udWp-x1OlmFwbigekZ9n2rwV=s96-c',
          'email' => 'rifqimunawar48@gmail.com',
          'email_verified_at' => NULL,
          'password' => NULL,
          'role_id' => 3,
          'remember_token' => NULL,
          'created_at' => '2025-05-22 22:05:49',
          'updated_at' => '2025-05-22 22:05:49',
        ),
    ));


  }
}
