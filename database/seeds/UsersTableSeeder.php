    <?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('roles')->delete();

        $roles = [

            ['name' => 'adminstrator'],
            ['name' => 'assistance'],
            ['name' => 'teacher']
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $users = [
            [
                'name' => 'adminUser',
                'first_name' => 'Nikolina',
                'last_name' => 'Hrga',
                'mobile' => '0997540779',
                'email' => 'admin@foliot.com',
                'password' => bcrypt('admin'),
                'active' => true,
                'remember_token' => str_random(10),
            ],
            [   'name' => 'assistanceUser',
                'first_name' => 'Marija',
                'last_name' => 'Doe',
                'mobile' => '091445445',
                'email' => 'assistance@foliot.com',
                'password' => bcrypt('assistance'),
                'active' => true,
                'remember_token' => str_random(10),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'name' => 'teacherUser',
                'mobile' => '098225225',
                'email' => 'teacher@foliot.com',
                'password' => bcrypt('teacher'),
                'active' => true,
                'remember_token' => str_random(10),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $adminUser = User::whereName('adminUser')->first();
        $adminRole = Role::whereName('adminstrator')->first()->id;
        $adminUser->assignRole($adminRole);


        $assistanceUser = User::whereName('assistanceUser')->first();
        $assistanceRole = Role::whereName('assistance')->first()->id;
        $assistanceUser->assignRole($assistanceRole);

        $teacherUser = User::whereName('teacherUser')->first();
        $teacherRole = Role::whereName('teacher')->first()->id;
        $teacherUser->assignRole($teacherRole);
    }

}
